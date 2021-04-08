var blogPostClass = function () {
    var modal = document.getElementById("myModal");
    var modalContent = () => {
        // Get the modal
        

        // Get the button that opens the modal
        var btn = document.getElementById("loginbutton");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function () {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function () {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    }
    var signUpSignIn=()=>{
        $('.tab a').on('click', function (e) {
            e.preventDefault();
             
            $(this).parent().addClass('active');
            $(this).parent().siblings().removeClass('active');
             
            var href = $(this).attr('href');
            $('.forms > form').hide();
            $(href).fadeIn(500);
          });
    }
    var submitLogin=()=>{
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#loginSubmit').click(function(e){
            var email=$('#loginemail').val();
            var password=$('#loginpassword').val();
            $.ajax({
                url: '/ajax/login',
                type: 'POST',
                data: {
                    email: email,
                    password: password
                },
                success: function(data) {
                    console.log(data)
                    if(data.error){
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'Please type correct id and password',
                            showConfirmButton: false,
                            timer: 1500
                          })
                    }
                    else{
                        Swal.fire({
                            title: "Good job!",
                            text: "You clicked the button!",
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Confirm me!",
                            customClass: {
                             confirmButton: "btn btn-primary"
                            }
                           });
                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                        modal.style.display = "none";
                    }
                }
            });
        });

        
    }

    return {
        // public functions
        init: function () {
            modalContent();
            signUpSignIn();
            submitLogin();
        }
    };

}();

jQuery(document).ready(function () {

    blogPostClass.init();
});