// input field styles
    $('.inputBox').addClass('border border-gray-500 rounded-md focus:cursor-none focus:outline-blue-500');

    $('.inputField').addClass('flex flex-col w-full text-xl');
// input field styles


    $('#createCourseForm').on('submit',
        function(event) {
            event.preventDefault();

            var formData = {
                courseCode: $('#formCourseCode').val(),
                courseTitle: $('#formCourseTitle').val(),
                courseUnits: $('#formCourseUnits').val(),
                courseReq: 1
            };


            $.ajax(
                {
                    type: "POST",
                    url: "../core/handleForms.php",
                    data: formData,
                    success: function(data) {
                        switch (data) {
                            case 'Success':
                                alert("Course created!");
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