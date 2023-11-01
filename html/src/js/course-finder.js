$(document).ready(function () {
  function removeAsterisk(courseCode) {
    return courseCode.replace("*", "");
  }

  let courseCounter = 1; // counter for generating unique IDs
  let studentCourses = []; // List of student courses they have taken
  let completedCredits = 0; // Keeps track of the number of credits a student has completed
  let noPreReqCourses = [{}]; // Keeps track of the courses with no prerequisites

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

        $("#no-prereq-courses").empty(); // Removes the initial empty element

        // Iterates through the courses and creates the cards
        for (let index = 0; index < noPreReqCourses.length; index++) {
          const courseCode = noPreReqCourses[index].code;
          const courseTitle = noPreReqCourses[index].title;
          courseCard(courseCode, courseTitle);
        }
      }
    } catch (error) {
      console.error(error);
    }
  }

  // Creates a course card to display a given course
  function courseCard(courseCode, courseTitle) {
    const $courseCard = $(
      "<div class='bg-blue-300 p-4 rounded-lg course'></div>"
    );
    $courseCard.append(
      $("<p class='text-xl font-semibold'></p>").text(courseCode)
    );
    $courseCard.append($("<p></p>").text(courseTitle));
    $("#no-prereq-courses").append($courseCard);
  }

  // Adds a new course to the course table
  async function addCourseToTable(courseCode) {
    const table = $("#my-courses tbody");
    const newRow = $("<tr>");
    const uniqueID = `course-${courseCounter++}`;
    newRow.attr("data-course-id", uniqueID);

    // removes the star in the course code
    courseCode = removeAsterisk(courseCode);

    try {
      // API Call to fetch course information from group 304's api
      const response = await axios.get(
        `https://cis3760f23-12.socs.uoguelph.ca/api/v1/courses/${courseCode}`
      );

      if (response.data) {
        const courseData = response.data.course[0];

        // Handles duplicate courses
        if (!studentCourses.includes(courseData.code)) {
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

          studentCourses.push(courseData.code); // Keeps track of the courses that are added to the student's schedule
          completedCredits += courseData.credits; // Credit tracker

          $("#credits_completed").text(completedCredits);

          console.log(studentCourses);
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
  $("#generate-courses").click(function () {
    if (studentCourses.length === 0) {
      alert("No courses entered!");
    }
    // Include logic here to output prerequisites when the button is clicked
    // will require an API call passing in the studentCourses array
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
});
