$(document).ready(function () {
  function removeAsterisk(courseCode) {
    return courseCode.replace("*", "");
  }

  let courseCounter = 1; // counter for generating unique IDs
  let studentCourses = []; // List of student courses they have taken
  let completedCredits = 0; // Keeps track of the number of credits a student has completed
 
  if (completedCredits === 0) {
    $("#credits_completed").text("No credits");
  }
  
let noPreReqCourses = [{}];
  //Get all the noPreReqs
  async function loadNoPreReqs(){

    try {
      const response = await axios.get(
        `https://cis3760f23-12.socs.uoguelph.ca/api/v1/courses?prerequisites=none`
      );
      if (response.data) {
        noPreReqCourses = response.data.courses;
        for (let index = 0; index < noPreReqCourses.length; index++) {
          updatePageWithNoPreReqs(noPreReqCourses[index].code,noPreReqCourses[index].title);
          
        }
        
      }
        
      
    } catch (error) {
      console.error(error);
    }

  }
  //Update the nopreReqs on the page
  function updatePageWithNoPreReqs(code,title){
    let div = document.createElement('div');
    div.classList.add('bg-blue-300','p-5', 'rounded-lg');
    let pCourseCode = document.createElement('p');
    pCourseCode.classList.add('text-xl', 'font-semibold');
    let pTitle = document.createElement('p');
    textCourseCode = document.createTextNode(code);
    textCourseTitle = document.createTextNode(title);

    pCourseCode.appendChild(textCourseCode);
    pTitle.appendChild(textCourseTitle);
    div.appendChild(pCourseCode);
    div.appendChild(textCourseTitle);
    document.getElementById("noPreReqs").appendChild(div);
  }
  loadNoPreReqs();
  //console.log(JSON.stringify(loadNoPreReqs()));
  //updatePageWithNoPreReqs(noPreReqCourses[0].code,noPreReqCourses[0].code);

  
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
      alert("No courses entered!")
    }
    // Include logic here to output prerequisites when the button is clicked
    // will require an API call passing in the studentCourses array
  })

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
