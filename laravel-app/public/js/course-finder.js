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

        // console.log(studentCourses);
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
        console.log("student courses: " + studentCourses);
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
            compiled = compilePrerequisites(
                studentCourses,
                course["Prerequisites"]
            );
            match = matchPrerequisites(compiled);

            if (match === true) {
                availableCourses.push(course);
            }
        }

        // Iterates through the courses and creates the cards
        $(availableCoursesTable + " tbody").empty(); // Removes the existing courses
        addButton = "<button class='add text-blue-600'>Add</button>";
        availableCourses.forEach(function (course) {
            if (studentCourses.includes(course.CourseCode)) {
            } else {
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
    function compilePrerequisites(studentCourses, prerequisites) {
        let compiled = [];
        let temp = prerequisites;

        console.log("Prerequisites: " + prerequisites);

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

        // Convert course codes to 'true' or 'false' based on the passed list of courses taken
        for (let i = 0; i < compiled.length; i++) {
            if (compiled[i]["type"] === "code") {
                if (studentCourses.includes(compiled[i]["data"])) {
                    compiled[i]["type"] = true;
                } else {
                    compiled[i]["type"] = false;
                }
            }
        }

        // Turn brackets into nested arrays
        let stack = [];
        let list = [];
        for (element of compiled) {
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

        compiled = list;
        return compiled;
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

    // Function to generate the roadmap will require API Calls
    $("#generateRoadmapBtn").click(function () {
      var subject = $("#subjectText").val();

      $("#subjectText").val(""); 

      $("#subjectTitle").text(subject + " Roadmap"); 

  });
});
