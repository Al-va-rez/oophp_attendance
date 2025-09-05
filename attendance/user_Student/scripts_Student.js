// input field styles
    $('.inputBox').addClass('border border-gray-500 rounded-md focus:cursor-none focus:outline-blue-500');

    $('.inputField').addClass('flex flex-col w-full text-xl');
// input field styles


    $('#createEnrollmentForm').on('submit',
        function(event) {
            event.preventDefault();

            var formData = {
                student_username: $('#formStudentUsername').val(),
                course_title: $('#formCourseTitle').val(),
                enrollReq: 1
            };


            $.ajax(
                {
                    type: "POST",
                    url: "../core/handleForms.php",
                    data: formData,
                    success: function(data) {
                        switch (data) {
                            case 'Success':
                                alert("Enrolled to course!");
                                setTimeout(function() {
                                    window.location.href = "index.php";
                                }, 500);
                                break;
                        
                            default:
                                console.log('something went wrong');
                                console.log(data);
                                break;
                        }
                        
                    }
                }
            )
        }
    )

    $('#createAttendanceForm').on('submit',
        function(event) {
            event.preventDefault();

            var formData = {
                year_level: $('#formYearLevel').val(),
                student_username: $('#formStudentUsername').val(),
                course_title: $('#formEnrolledCourseTitle').val(),
                attendance_Status: $('#formAttendanceStatus').val(),
                attendanceReq: 1
            };


            $.ajax(
                {
                    type: "POST",
                    url: "../core/handleForms.php",
                    data: formData,
                    success: function(data) {
                        switch (data) {
                            case 'Success':
                                alert("Attendance filed!");
                                setTimeout(function() {
                                    window.location.href = "index.php";
                                }, 500);
                                break;
                        
                            default:
                                console.log('something went wrong');
                                console.log(data);
                                break;
                        }
                        
                    }
                }
            )
        }
    )