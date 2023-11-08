$(document).ready(function () {
  let serverRoot = $("#serverRoot").html();
  $("#sendRequest").click(function () {
    $command = jQuery("#command").val();
    console.log($("#method").val());
    console.log(serverRoot + "/api/v1/course/" + $command);

    $.ajax({
      url: serverRoot + "/api/v1/course/" + $command,
      method: $("#method").val(),
      success: function (stuff) {
        //alert(JSON.stringify(stuff));
        $("#results").text(JSON.stringify(stuff));
      },
    });
    $("#StudentRequest").click(function () {});
    $command = jQuery("#command1").val();
    $grade = jQuery("#grade").val();
    console.log($("#requestType").val());
    console.log(serverRoot + "/api/v1/student/" + $command + "/" + $grade);

    $.ajax({
      url: serverRoot + "/api/v1/student/" + $command + "/" + $grade,
      method: $("#requestType").val(),
      success: function (stuff) {
        //alert(JSON.stringify(stuff));
        $("#results").text(JSON.stringify(stuff));
      },
    });
  });
  $("#SubjectRequest").click(function () {
    $endpoint = jQuery("#endpointType").val();
    console.log("GET");

    if ($endpoint == "All") {
      console.log(serverRoot + "/api/v1/subject/all/");
      $.ajax({
        url: serverRoot + "/api/v1/subject/all/",
        method: "GET",
        success: function (stuff) {
          $("#results").text(JSON.stringify(stuff));
        },
      });
    } else if ($endpoint == "Specific") {
      $subjectCode = jQuery("#subjectCode").val();
      console.log(serverRoot + "/api/v1/subject/" + $subjectCode);
      $.ajax({
        url: serverRoot + "/api/v1/subject/" + $subjectCode,
        method: "GET",
        success: function (stuff) {
          $("#results").text(JSON.stringify(stuff));
        },
      });
    }
  });
});

$(document).ready(function () {
  $("#requestType").change(function () {
    if ($(this).val() === "PUT") {
      // Show the textbox if "PUT" is selected
      $("#textbox").show();
    } else {
      // Hide the textbox for other options
      $("#textbox").hide();
    }
  });
  $("#requestType").trigger("change");
  $("#endpointType").change(function () {
    if ($(this).val() == "Specific") {
      $("#subjectCodeBox").show();
    } else {
      $("#subjectCodeBox").hide();
    }
  });
  $("#endpointType").trigger("change");
});
