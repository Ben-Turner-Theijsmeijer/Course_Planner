$(document).ready(function () {
    let serverRoot = $('#serverRoot').html()
    $("#sendRequest").click(function () {
        $command = jQuery("#command").val();
        console.log($('#method').val());
        console.log(serverRoot + '/api/v1/course/' + $command);;

        $.ajax({
            url: serverRoot + '/api/v1/course/' + $command,
            method: $('#method').val(),
            success: function (stuff) {
                //alert(JSON.stringify(stuff));
                $('#results').text(JSON.stringify(stuff));
            }
        });
    });
    $("#StudentRequest").click(function () {
        $command = jQuery("#command1").val();
        $grade = jQuery("#grade").val();
        console.log($('#requestType').val());
        console.log(serverRoot + '/api/v1/student/' + $command + '/' + $grade);

        $.ajax({
            url: serverRoot + '/api/v1/student/' + $command + '/' + $grade,
            method: $('#requestType').val(),
            success: function (stuff) {
                //alert(JSON.stringify(stuff));
                $('#results').text(JSON.stringify(stuff));
            }
        });
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
});