$(document).ready(function () {
  function removeAsterisk(courseCode) {
    return courseCode.replace("*", "");
  }

  let courseCounter = 1; // counter for generating unique IDs
  let studentCourses = []; // List of student courses they have taken
  let completedCredits = 0; // Keeps track of the number of credits a student has completed
  let noPreReqCourses = [{}]; // Keeps track of the courses with no prerequisites

  let noPreReqTable = '#no-prereq-courses'
  let studentCoursesTable = '#my-courses'
  let availableCoursesTable = '#available-courses'

  if (completedCredits === 0) {
    $("#credits_completed").text("No credits");
  }

  loadNoPreReqs(); // Loads courses with no prerequisites

  //Get all the noPreReqs
  async function loadNoPreReqs() {
    try {
      const response = await axios.get(
        `https://cis3760f23-12.socs.uoguelph.ca/api/v1/courses?prerequisites=none`
      );
      if (response.data) {
        noPreReqCourses = response.data.courses;

        $(noPreReqTable).empty(); // Removes the initial empty element

        // Iterates through the courses and creates the cards
        for (let index = 0; index < noPreReqCourses.length; index++) {
          // Extracted values that are added to each course card
          const courseCode = noPreReqCourses[index].code;
          const courseTitle = noPreReqCourses[index].title;
          const courseOffering = noPreReqCourses[index].offered;

          courseCard(noPreReqTable, courseCode, courseTitle, courseOffering);
        }
      }
    } catch (error) {
      console.error(error);
    }
  }

  // Creates a course card to display a given course
  function courseCard(tableID, courseCode, courseTitle, courseOffering) {
    const $courseCard = $(
      "<div class='bg-blue-300 p-4 rounded-lg course'></div>"
    );
    $courseCard.append(
      $("<p class='text-xl font-semibold'></p>").text(courseCode)
    );
    $courseCard.append($("<p></p>").text(courseTitle));
    $(tableID).append($courseCard);

    $courseCard.append($("<p></p>").text(courseOffering));
    $(tableID).append($courseCard);
  }

  function courseRow(tableID, courseData, rowIndex = 1) {
    const table = $(tableID + " tbody");
    const newRow = $("<tr>");
    const uniqueID = `course-${rowIndex++}`;
    newRow.attr("data-course-id", uniqueID);
    console.log("available-courses")
    // removes the star in the course code
    courseCode = removeAsterisk(courseData.code);
    // Handles duplicate courses
    newRow.append(
      // Course Code
      $("<td>")
        .addClass("px-6 py-3 text-left text-gray-600 border-b-2")
        .text(courseData.code)
    );
    newRow.append(
      // Course Name
      $("<td>")
        .addClass("px-6 py-3 text-left text-gray-600 border-b-2")
        .text(courseData.title)
    );
    newRow.append(
      // Course Weight
      $("<td>")
        .addClass("px-6 py-3 text-left text-gray-600 border-b-2")
        .text(courseData.credits)
    );
    newRow.append(
      // Delete button
      $("<td>")
        .addClass("px-6 py-3 text-left text-red-600 border-b-2")
        .html("<button class='delete'>Delete</button>")
    );
    table.append(newRow);
    console.log(studentCourses);
  }

  // Adds course that user took
  async function addCourseToTable(courseCode) {
    try {
      // API Call to fetch course information from group 304's api
      const response = await axios.get(
        `https://cis3760f23-12.socs.uoguelph.ca/api/v1/courses/${courseCode}`
      );

      if (response.data) {
        const courseData = response.data.course[0];
        if (!studentCourses.includes(courseData.code)) {
          studentCourses.push(courseData.code); // Keeps track of the courses that are added to the student's schedule
          courseRow(studentCoursesTable, courseData, courseCounter)
          completedCredits += courseData.credits; // Credit tracker
          $("#credits_completed").text(completedCredits);
        } else {
          alert("Course already added!");
        }
      }
    } catch (error) {
      // Handle errors
      console.error(error);
    }
  }

  // Adds a course to the table
  $("#add-course").click(function () {
    const courseCode = $("#course-code").val();

    if (courseCode) {
      addCourseToTable(courseCode);
      $("#course-code").val("");
    }
  });

  // Generates the courses a student can take
  $("#generate-courses").click(async function () {
    if (studentCourses.length === 0) {
      alert("No courses entered!");
    }
    console.log('student courses: ' + studentCourses);
    // Include logic here to output prerequisites when the button is clicked
    // will require an API call passing in the studentCourses array
    formattedCourses = studentCourses.map((course) => course + '_contains')
    const response = await axios.get(
      `https://cis3760f23-12.socs.uoguelph.ca/api/v1/courses?prerequisites=[${formattedCourses.toString()}]`
    );
    availableCourses = response.data['courses']
    console.log(availableCourses);
    // Iterates through the courses and creates the cards
    $(availableCoursesTable + ' tbody').empty(); // Removes the existing courses
    availableCourses.forEach(course => courseRow(availableCoursesTable, course))
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

    noPreReqCourses.forEach(function (course) {
      if (
        course.code.toLowerCase().includes(courseInput.toLowerCase()) &&
        course.offered.toLowerCase().includes(semesterInput.toLowerCase())
      ) {
        courseCard(course.code, course.title, course.offered);
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
});