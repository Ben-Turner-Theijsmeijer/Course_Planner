$(document).ready(function () {
    const API_ENDPOINT = "https://cis3760f23-11.socs.uoguelph.ca/api/v1/";

    $("#course-code").on("keypress", function (event) {
        var keyPressed = event.keyCode || event.which;
        if (keyPressed === 13) {
            event.preventDefault();
            $("#add-course").click();
            return false;
        }
    });
    let courseCounter = 1; // counter for generating unique IDs
    let studentCourses = []; // List of student courses they have taken
    let completedCredits = 0; // Keeps track of the number of credits a student has completed
    let noPreReqCourses = [{}]; // Keeps track of the courses with no prerequisites

    let noPreReqTable = "#no-prereq-courses";
    let studentCoursesTable = "#my-courses";
    let availableCoursesTable = "#available-courses";

    if (completedCredits === 0) {
        $("#credits_completed").text("N/A");
    }

    loadNoPreReqs(); // Loads courses with no prerequisites

    //Get all the noPreReqs
    async function loadNoPreReqs() {
        try {
            const response = await axios.get(
                `${API_ENDPOINT}prereq/future/none`
            );
            if (response.data) {
                noPreReqCourses = response.data;

                $(noPreReqTable).empty(); // Removes the initial empty element

                // Iterates through the courses and creates the cards
                for (let index = 0; index < noPreReqCourses.length; index++) {
                    // Extracted values that are added to each course card
                    const courseCode = noPreReqCourses[index].CourseCode;
                    const courseTitle = noPreReqCourses[index].CourseName;
                    const courseOffering =
                        noPreReqCourses[index].CourseOffering;
                    const addButton =
                        "<button class='add text-blue-700'>Add</button>";

                    courseCard(
                        noPreReqTable,
                        courseCode,
                        courseTitle,
                        courseOffering,
                        addButton
                    );
                }
            }
        } catch (error) {
            // Handle errors
            console.error(error);
        }
    }

    // Creates a course card to display a given course
    function courseCard(
        tableID,
        courseCode,
        courseTitle,
        courseOffering,
        addButton
    ) {
        const $courseCard = $(
            "<div class='bg-blue-200 p-4 rounded-lg course'></div>"
        );
        $courseCard.append(
            $("<p class='text-xl font-semibold'></p>").text(courseCode)
        );
        $courseCard.append($("<p></p>").text(courseTitle));
        $(tableID).append($courseCard);

        $courseCard.append($("<p></p>").text(courseOffering));
        $(tableID).append($courseCard);

        $courseCard.append($("<p class='mt-4'></p>").html(addButton));
        $(tableID).append($courseCard);
    }

    // Adds row to given table
    function courseRow(tableID, courseData, rowFunction, rowIndex = 1) {
        const table = $(tableID + " tbody");
        const newRow = $("<tr>");
        const uniqueID = `course-${rowIndex++}`;
        newRow.attr("data-course-id", uniqueID);

        // Handles duplicate courses
        newRow.append(
            // Course Code
            $("<td>")
                .addClass(
                    "px-3 py-2 sm:px-6 sm:py-3 text-gray-600 text-center border-b-2"
                )
                .text(courseData.CourseCode)
        );
        newRow.append(
            // Course Name
            $("<td>")
                .addClass(
                    "px-3 py-2 sm:px-6 sm:py-3 text-gray-600 text-center border-b-2"
                )
                .text(courseData.CourseName)
        );
        newRow.append(
            // Course Weight
            $("<td>")
                .addClass(
                    "px-3 py-2 sm:px-6 sm:py-3 text-gray-600 text-center border-b-2"
                )
                .text(courseData.CourseWeight)
        );
        newRow.append(
            // Delete button
            $("<td>")
                .addClass("px-3 py-2 sm:px-6 sm:py-3 text-center border-b-2")
                .html(rowFunction)
        );
        table.append(newRow);
    }

    // Adds course that user took
    async function addCourseToTable(courseCode) {
        try {
            // API Call to fetch course information from our API
            const response = await axios.get(
                `${API_ENDPOINT}course/${courseCode}`
            );

            if (response.data) {
                // console.log(response.data);
                const courseData = response.data[0];
                if (!studentCourses.includes(courseData.CourseCode)) {
                    studentCourses.push(courseData.CourseCode); // Keeps track of the courses that are added to the student's schedule
                    deleteButton =
                        "<button class='delete text-red-600'>Delete</button>";
                    courseRow(
                        studentCoursesTable,
                        courseData,
                        deleteButton,
                        courseCounter
                    );
                    completedCredits += courseData.CourseWeight; // Credit tracker
                    $("#credits_completed").text(completedCredits);
                } else {
                    alert("Course already added!");
                }
            }
        } catch (error) {
            // Handle errors
            alert("Warning:\nCourse not Found in Database");
            console.error(error);
        }
    }

    // Adds a course to the table
    $("#add-course").click(function () {
        courseCode = $("#course-code").val();

        if (courseCode) {
            courseCode = courseCode.split(",");
            courseCode.forEach((course) => addCourseToTable(course.trim()));
            $("#course-code").val("");
        }
    });

    // Generates the courses a student can take
    $("#generate-courses").click(async function () {
        if (studentCourses.length === 0) {
            alert("No courses entered!");
        }
        availableCourses = [];
        // Include logic here to output prerequisites when the button is clicked
        // will require an API call passing in the studentCourses array

        const response = await axios.post(
            `${API_ENDPOINT}prereq/future`,
            (data = studentCourses.map((course) => ({ CourseCode: course })))
        );
        availableCourses = response.data;

        console.log(response.data);

        // Iterates through the courses and creates the cards
        $(availableCoursesTable + " tbody").empty(); // Removes the existing courses
        addButton = "<button class='add text-blue-600'>Add</button>";
        availableCourses.forEach(function (course) {
            if (!studentCourses.includes(course.CourseCode)) {
                courseRow(availableCoursesTable, course, addButton);
            }
        });
    });

    // Removes a course from the table
    $("#my-courses").on("click", ".delete", function () {
        const courseCode = $(this).closest("tr").find("td:first").text();
        const courseWeight = $(this).closest("tr").find("td:eq(2)").text(); // retrieves the 3rd row

        $(this).closest("tr").remove();

        // Find the corresponding course index
        const index = studentCourses.indexOf(courseCode);

        if (index !== -1) {
            // Remove the course from the student's schedule
            studentCourses.splice(index, 1);
            // Update the credit count after removing
            completedCredits -= parseFloat(courseWeight);
            $("#credits_completed").text(completedCredits);
        }
    });

    // Adds a course to user schedule
    $(availableCoursesTable).on("click", ".add", function () {
        tableRow = $(this).closest("tr");
        const courseCode = tableRow.find("td:first").text();
        addCourseToTable(courseCode);
        tableRow.empty();
    });

    $(noPreReqTable).on("click", ".add", function () {
        tableRow = $(this).closest("div");
        const courseCode = tableRow.find("p:first").text();
        addCourseToTable(courseCode);
        tableRow.remove();
    });

    var accordion = $(".accordion");

    accordion.click(function () {
        $(this).toggleClass("active");
        var panel = $(this).next();

        if (panel.css("max-height") === "0px") {
            panel.css("max-height", panel.prop("scrollHeight") + "100px");
            $("#course-filter").css("display", "block");
        } else {
            panel.css("max-height", "0");
            $("#course-filter").css("display", "none");
        }
    });

    // Filters courses based on the user input
    function filterCourses(courseInput, semesterInput) {
        $(noPreReqTable).empty();
        const addButton = "<button class='add text-blue-700'>Add</button>";
        noPreReqCourses.forEach(function (course) {
            if (
                course.CourseCode.toLowerCase().includes(
                    courseInput.toLowerCase()
                ) &&
                course.CourseOffering.toLowerCase().includes(
                    semesterInput.toLowerCase()
                )
            ) {
                courseCard(
                    noPreReqTable,
                    course.CourseCode,
                    course.CourseName,
                    course.CourseOffering,
                    addButton
                );
            }
        });
    }

    // Course filters
    $("#course-filter").on("input", function () {
        var courseFilterValue = $(this).val();
        var semesterFilterValue = $("#semester-filter").val();
        filterCourses(courseFilterValue, semesterFilterValue);
    });

    // Semester Filters
    $("#semester-filter").on("input", function () {
        var courseFilterValue = $("#course-filter").val();
        var semesterFilterValue = $(this).val();
        filterCourses(courseFilterValue, semesterFilterValue);
    });

    // Course Roadmap Section

    // function to generate a node
    function GenerateNode(course_code, course_node_group = "") {
        return {
            id: course_code,
            label: course_code,
            group: course_node_group,
        };
    }
    const $toggleIcon = $("#toggleIcon");
    let isToggled = false;

    let network_options = {
        physics: {
            enabled: true,
            repulsion: {
                springLength: 10,
                nodeDistance: 20,
                centralGravity: 0,
            },
            maxVelocity: 10,
        },
        interaction: {
            hover: true,
            hoverConnectedEdges: true,
        },
        layout: {
            hierarchical: {
                nodeSpacing: 100,
                treeSpacing: 30,
                direction: "UD",
                sortMethod: "directed",
                shakeTowards: "roots",
            },
        },
        nodes: {
            shape: 'circle',
            font: {
                color: "#FFFFFF"
            },
            color: {
                border: "#000000",
                background: "#290f28",
                hover: {
                    border: "#000000",
                    background: "#6b2769"
                },
                highlight: {
                    border: "#610218",
                    background: "#C20430"
                }
            }
        },
        edges: {
            hidden: isToggled ? false : true,
            //color: "#FFC72A"
        }
    };

    let network = null;
    let data = null;
    let container = document.getElementById("subject-roadmap");


    // Function to toggle the arrows on/off
    $("#toggleArrowsBtn").on("click", function () {
        isToggled = !isToggled;
        $toggleIcon.attr(
            "class",
            isToggled ?
                "fas fa-toggle-on text-green-500 text-4xl" :
                "fas fa-toggle-off text-gray-500 text-4xl"
        );
        network_options.edges.hidden = isToggled ? false : true;
        if (network !== null) {
            network.setOptions(network_options)
        }
    });

    // Function to reset the roadmap
    $("#resetRoadmapBtn").click(async function () {
        if (network !== null) {
            $(container).empty()
            network = new vis.Network(container, data, network_options);
            setNetworkEvents()
        } else {
            alert("No network to reset!")
        }
    })

    // Function to generate the roadmap will require API Calls
    $("#generateRoadmapBtn").click(async function () {
        // 1. User enters subject code (I.E CIS)
        var subject = $("#subjectText").val();

        $("#subjectText").val("");

        // Algorithm to generate subject road map here:
        // 2. go to the subject end point to retrieve all course codes for the particular subject (i.e CIS 1300)
        let subjectCourses = [];
        let compiledPrereqs = [];

        try {
            // Retrieve all subject courses
            const response = await axios.get(
                `${API_ENDPOINT}subject/${subject}`
            );
            if (response.data) {
                subjectCourses = response.data;
            }
        } catch(error) {
            alert(`Failed to retrieve ${subject} courses`);
            console.log(error);
        }

        try {
            const response = await axios.post(
                `${API_ENDPOINT}prereq/compiled`,
                (data = subjectCourses.map((course) => ({ CourseCode: course['CourseCode'] })))
            );
            if (response.data) {
                compiledPrereqs = response.data;
            }
        } catch(error) {
            alert(`Failed to compile ${subject} courses`);
            console.log(error);
        }
        // 3. pass in the course code to the get course end point to retrieve pre-requisite data
        // Parse the prerequisite data for the course - each course in prerequisites will represent a FROM course node to the course that is initially
        // passed in the course end point
        // 4. Create nodes for each course as well as the edges which represent the prerequisite to and from a particular course
        let course_nodes = [];
        let course_edges = [];
        let color_dict = { "and": "#e61919", "or": "#1953e6", "x of": "#f6ff00" }

        for (let i = 0; i < subjectCourses.length; i++) {

            if (!course_nodes.some((element) => element["id"] === subjectCourses[i]["CourseCode"]))
                course_nodes.push(GenerateNode(subjectCourses[i]["CourseCode"]));

            // set default pre-req type to "and"
            compiled = compiledPrereqs[i];
            curr_prereq_type = "and";

            // initial scan for pre-req type
            //  if there are no brackets to parse, then all pre-reqs for the course will use this type
            for (let j = 0; j < compiled.length; j++) {
                if (compiled[j]["type"] === "or") {
                    curr_prereq_type = "or";
                } else if (compiled[j]["type"] === "x of") {
                    curr_prereq_type = "x of";
                }
            }

            // create edges for each pre-req
            for (let j = 0; j < compiled.length; j++) {

                // find type of pre-req inside bracket
                if (compiled[j]["type"] === "open_bracket") {
                    let k = j;
                    curr_prereq_type = "and";
                    while ((k < compiled.length) && (compiled[k]["type"] != "close_bracket")) {
                        if (compiled[k]["type"] === "x of") {
                            curr_prereq_type = "x of"
                            break;
                        } else if (compiled[k]["type"] === "or") {
                            curr_prereq_type = "or";
                            break;
                        }
                        k++;
                    }
                }

                // create course node
                if (compiled[j]["type"] === "code") {
                    if (!course_nodes.some((element) => element["id"] === subjectCourses[i]["CourseCode"]))
                        course_nodes.push(GenerateNode(subjectCourses[i]["CourseCode"]));
                    console.log(curr_prereq_type);
                    course_edges.push({
                        from: compiled[j]["data"],
                        to: subjectCourses[i]["CourseCode"],
                        dashes: false,
                        arrows: "to",
                        color:{color:color_dict[curr_prereq_type], hover:color_dict[curr_prereq_type]} // set color to current pre-req type colour
                    });
                }

                // reset to "and" once outside bracket (this isn't totally correct but it's close enough)
                if (compiled[j]["type"] === "close_bracket") {
                    console.log("closed");
                    curr_prereq_type = "and";
                }
            }

            /*
            compiled.forEach((token) => {
                if (token["type"] === "code") {
                    if (!course_nodes.some((element) => element["id"] === subjectCourses[i]["CourseCode"]))
                        course_nodes.push(GenerateNode(subjectCourses[i]["CourseCode"]));

                    course_edges.push({
                        from: token["data"],
                        to: subjectCourses[i]["CourseCode"],
                        dashes: false,
                        arrows: "to"
                    });
                }
            });
            */
        }

        // Show the road map on the webpage at the element subject-roadmap
        data = {
            nodes: new vis.DataSet(course_nodes),
            edges: new vis.DataSet(course_edges),
        };



        //Create the network
        network = new vis.Network(container, data, network_options);
        setNetworkEvents()
    });

    function setNetworkEvents() {
        // Network on Node Select
        network.on('selectNode', function (event) {
            console.log("Select");
            console.log(event);

            if (isToggled) {
                for (edge of event["edges"]) {
                    network.clustering.updateEdge(edge, {
                        hidden: true
                    });
                }
            }
            for (edge of event["edges"]) {
                network.clustering.updateEdge(edge, {
                    hidden: false,
                });
            }
        });

        network.on("deselectNode", function (event) {
            console.log("Deselect");
            console.log(event);

            if (isToggled) {
                for (edge of event["previousSelection"]["edges"]) {
                    network.clustering.updateEdge(edge["id"], {
                        hidden: true,
                    });
                }
            }
            for (edge of event["previousSelection"]["edges"]) {
                network.clustering.updateEdge(edge["id"], {
                    hidden: false,
                });
            }

        });
    }
});