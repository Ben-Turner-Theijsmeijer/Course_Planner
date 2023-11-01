$(document).ready(function () {
  function removeAsterisk(courseCode) {
    return courseCode.replace("*", "");
  }
  let courseCounter = 1; // counter for generating unique IDs
  let studentCourses = [];

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
        newRow.append(
          $("<td>")
            .addClass("px-6 py-3 text-left text-gray-600 border-b-2")
            .text(courseData.code)
        );
        newRow.append(
          $("<td>")
            .addClass("px-6 py-3 text-left text-gray-600 border-b-2")
            .text(courseData.title)
        );
        newRow.append(
          $("<td>")
            .addClass("px-6 py-3 text-left text-red-600 border-b-2")
            .html("<button class='delete'>Delete</button>")
        );
        table.append(newRow);

        studentCourses.push(courseData.code); // Keeps track of the courses that are added to the student's schedule

        console.log(studentCourses);
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

  // Removes a course from the table
  $("#my-courses").on("click", ".delete", function () {
    const courseCode = $(this).closest("tr").find("td:first").text();

    $(this).closest("tr").remove();

    // Find the corresponding course index
    const index = studentCourses.indexOf(courseCode);

    if (index !== -1) {
      // Remove the course from the student's schedule
      studentCourses.splice(index, 1);
    }

    // console.log(studentCourses)
  });
});
