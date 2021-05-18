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
    var signUpSignIn = () => {
        $('.tab a').on('click', function (e) {
            e.preventDefault();

            $(this).parent().addClass('active');
            $(this).parent().siblings().removeClass('active');

            var href = $(this).attr('href');
            $('.forms > form').hide();
            $(href).fadeIn(500);
        });
    }
    var submitLogin = () => {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#loginSubmit').click(function (e) {
            e.preventDefault();
            var email = $('#loginemail').val();
            var password = $('#loginpassword').val();
            $.ajax({
                url: '/login/ajax',
                type: 'POST',
                data: {
                    email: email,
                    password: password
                },
                success: function (data) {
                    console.log(data)
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
                    }, 1500);
                    modal.style.display = "none";
                },
                error: function (error) {
                    Swal.fire({
                        title: "Good job!",
                        text: "Please Type Valid Credential",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Confirm me!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
                }
            });
        });


    }
    var submitregister = () => {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#registerSubmit').click(function (e) {
            e.preventDefault();
            var email = $('#registermail').val();
            $.ajax({
                url: '/register/ajax',
                type: 'POST',
                data: {
                    email: email,
                },
                success: function (data) {
                    console.log(data)
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
                    }, 1500);
                    modal.style.display = "none";
                },
                error: function (error) {
                    console.log(error);
                    Swal.fire({
                        title: "Good job!",
                        text: "Please Type Valid Credential",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Confirm me!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
                }
            });
        });


    }
    var submitComment = () => {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#commentSubmit').click(function (e) {
            e.preventDefault();
            var comment = $('#comment').val();
            $.ajax({
                url: window.location.href+'/comment',
                type: 'POST',
                data: {
                    comment: comment,
                },
                success: function (data) {
                    $('#comment').val("");
                    $(`<div class="comment__item">
            <div class="comment__item__avatar"><img src="../assets/images/post_detail/avatar/3.png" alt="Author avatar"></div>
            <div class="comment__item__content">
                <div class="comment__item__content__header">
                    <h5>`+data.data[0].user.name+`</h5>
                    <div class="data">
                        <p><i class="far fa-clock"></i>`+moment(data.data[0].created_at).format("MMM,DD YYYY")+`</p>
                        <p><i class="far fa-heart"></i>0</p>
                        <p><i class="far fa-share-square"></i>0</p>
                    </div>
                </div>
                <p>`+data.data[0].comment+`</p>
            </div>
        </div>`).hide().appendTo('.post-footer__comment__detail').show('slow');
                },
                error: function (error) {
                    Swal.fire({
                        title: "Good job!",
                        text: "Please Type Valid Credential",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Confirm me!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
                }
            });
            
        });

    }

    return {
        // public functions
        init: function () {
            submitComment();
            modalContent();
            signUpSignIn();
            submitLogin();
            submitregister();
            
        }
    };

}();

jQuery(document).ready(function () {

    blogPostClass.init();
    
});