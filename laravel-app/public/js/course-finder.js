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
        possibleCourses = [];
        availableCourses = [];
        // Include logic here to output prerequisites when the button is clicked
        // will require an API call passing in the studentCourses array

        const response = await axios.post(
            `${API_ENDPOINT}prereq/future`,
            (data = studentCourses.map((course) => ({ CourseCode: course })))
        );
        possibleCourses = response.data;
        possibleCourses = [
            //  Eliminate duplicate courses from the list
            ...new Map(
                possibleCourses.map((v) => [v["CourseCode"], v])
            ).values(),
        ];

        for (const course of possibleCourses) {
            compiled = compilePrerequisites(course["Prerequisites"]);
            compiled = nestCompiled(compiled);
            evaluateStudentCourses(compiled, studentCourses);

            match = matchPrerequisites(compiled);

            if (match === true) {
                availableCourses.push(course);
            }
        }

        // Iterates through the courses and creates the cards
        $(availableCoursesTable + " tbody").empty(); // Removes the existing courses
        addButton = "<button class='add text-blue-600'>Add</button>";
        availableCourses.forEach(function (course) {
            if (studentCourses.includes(course.CourseCode)) { } else {
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

    // Parses a string of prerequisites into an easily parsable nested array
    function compilePrerequisites(prerequisites) {
        let compiled = [];
        let temp = prerequisites;

        while (temp) {
            // Match a course code
            match = temp.match(/^[A-Z]{3,4}\*?[0-9]{4}\s*/g);
            if (match) {
                compiled.push({
                    type: "code",
                    data: match[0].trim(),
                });
                temp = temp.substring(match[0].length);
                continue;
            }

            // Match open brackets
            match = temp.match(/^[\(\[]\s*/g);
            if (match) {
                compiled.push({
                    type: "open_bracket",
                    data: match[0].trim(),
                });
                temp = temp.substring(match[0].length);
                continue;
            }

            // Match closed brackets
            match = temp.match(/^[\)\]]\s*/g);
            if (match) {
                compiled.push({
                    type: "close_bracket",
                    data: match[0].trim(),
                });
                temp = temp.substring(match[0].length);
                continue;
            }

            // Match commas
            match = temp.match(/^,\s*/g);
            if (match) {
                compiled.push({
                    type: "comma",
                    data: match[0].trim(),
                });
                temp = temp.substring(match[0].length);
                continue;
            }

            // Match or
            match = temp.match(/^or\s*/g);
            if (match) {
                compiled.push({
                    type: "or",
                    data: match[0].trim(),
                });
                temp = temp.substring(match[0].length);
                continue;
            }

            // Match x of
            match = temp.match(/^\d\s*of\s*/g);
            if (match) {
                compiled.push({
                    type: "x of",
                    data: match[0][0],
                });
                temp = temp.substring(match[0].length);
                continue;
            }

            // Advance string if no character matched
            temp = temp.substring(1);
        }

        return compiled;
    }

    // Turn a compiled prerequisite string into a nested array
    function nestCompiled(compiledPrerequisites) {
        let stack = [];
        let list = [];

        for (element of compiledPrerequisites) {
            if (element["type"] === "open_bracket") {
                stack.push(list);
                list = [];
            } else if (
                element["type"] === "close_bracket" &&
                stack.length > 0
            ) {
                temp = stack.pop();
                temp.push(list);
                list = temp;
            } else {
                list.push(element);
            }
        }

        return list;
    }

    // Recursively evaluates each course in the compiled prerequisites, and marks if the student has completed that course
    function evaluateStudentCourses(compiledPrerequisites, studentCourses) {
        for (let i = 0; i < compiledPrerequisites.length; i++) {
            if (Array.isArray(compiledPrerequisites[i])) {
                evaluateStudentCourses(
                    compiledPrerequisites[i],
                    studentCourses
                );
            } else if (compiledPrerequisites[i]["type"] == "code") {
                if (studentCourses.includes(compiledPrerequisites[i]["data"])) {
                    compiledPrerequisites[i]["type"] = true;
                } else {
                    compiledPrerequisites[i]["type"] = false;
                }
            }
        }
    }

    // Recursively check to see if all course requirements are met
    function matchPrerequisites(compiledPrerequisites) {
        // Count amount of matches in "x of" arrays, return true if condition is met
        if (
            compiledPrerequisites[0] &&
            compiledPrerequisites[0]["type"] === "x of"
        ) {
            numOf = compiledPrerequisites[0]["data"];
            x = 0;

            for (const element of compiledPrerequisites.slice(1)) {
                if (matchPrerequisites(element)) {
                    x++;
                }
            }

            if (x >= numOf) {
                return true;
            } else {
                return false;
            }
        }
        if (
            compiledPrerequisites[1] &&
            compiledPrerequisites[1]["type"] === "comma"
        ) {
            // Treat commas as AND
            return (
                matchPrerequisites(compiledPrerequisites[0]) &&
                matchPrerequisites(compiledPrerequisites.slice(2))
            );
        }
        if (
            compiledPrerequisites[1] &&
            compiledPrerequisites[1]["type"] === "or"
        ) {
            // Treat 'or' as OR
            return (
                matchPrerequisites(compiledPrerequisites[0]) ||
                matchPrerequisites(compiledPrerequisites.slice(2))
            );
        }
        // Recursively parse nested arrays
        if (Array.isArray(compiledPrerequisites[0])) {
            return matchPrerequisites(compiledPrerequisites[0]);
        }
        if (
            compiledPrerequisites[0] &&
            compiledPrerequisites[0]["type"] === true
        ) {
            // If no more codes to parse, evaluate if passed code is met by the student courses
            return true;
        }
        if (compiledPrerequisites && compiledPrerequisites["type"] === true) {
            return true;
        }

        return false;
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

    // Function to generate the roadmap will require API Calls
    $("#generateRoadmapBtn").click(async function () {
        // 1. User enters subject code (I.E CIS)
        var subject = $("#subjectText").val();

        $("#subjectText").val("");

        // Algorithm to generate subject road map here:
        // 2. go to the subject end point to retrieve all course codes for the particular subject (i.e CIS 1300)

        try {
            // Retrieve all subject courses
            const response = await axios.get(
                `${API_ENDPOINT}subject/${subject}`
            );
            if (response.data) {
                subjectCourses = response.data;
            }
        } catch {
            alert(`Failed to retrieve ${subject} courses`);
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

            compiled = compilePrerequisites(subjectCourses[i]["Prerequisites"]);
            console.log(compiled);
            // set default pre-req type to "and"
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
                    console.log("open");
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
                        color: { color: color_dict[curr_prereq_type] } // set color to current pre-req type colour
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
        var container = document.getElementById("subject-roadmap");
        var data = {
            nodes: new vis.DataSet(course_nodes),
            edges: new vis.DataSet(course_edges),
        };



        //Create the network
        network = new vis.Network(container, data, network_options);

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
    });
});