// Class definition
var KTcreateBlog = function () {

    var tagify1;
    var categorySelect;
    var edit;
    var tagify1GetValue = [];
    var convertToSlug = (Text) => {
        $('#slug').val(Text
            .toLowerCase()
            .replace(/[^\w ]+/g, '')
            .replace(/ +/g, '-'));
    }
    var tags = function () {
        var input = document.getElementById('kt_tagify_6');
        tagify1 = new Tagify(input, {
            pattern: /^.{0,20}$/, // Validate typed tag(s) by Regex. Here maximum chars length is defined as "20"
            delimiters: ", ", // add new tags when a comma or a space character is entered
            maxTags: 6,
            blacklist: ["fuck", "shit", "pussy"],
            //keepInvalidTags: true, // do not remove invalid tags (but keep them marked as invalid)
            transformTag: transformTag,
            dropdown: {
                enabled: 3,
            }
        });
        function transformTag(tagData) {
            var states = [
                'success',
                'primary',
                'danger',
                'success',
                'warning',
                'dark',
                'primary',
                'info'];

            tagData.class = 'tagify__tag tagify__tag-light--' + states[KTUtil.getRandomInt(0, 7)];

            if (tagData.value.toLowerCase() == 'shit') {
                tagData.value = 's✲✲t'
            }
        }
        let tagUrl = '/panel/post/' + parseInt($.trim($('#id').text())) + '/tags';
        $.ajax({
            type: 'GET',
            url: tagUrl,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function (data) {
                tagify1.addTags(data);
                
            }
        });

        tagify1.on('invalid', function (e) {
            console.log(e, e.detail);
        });
        tagify1.on('add', function (e) {
            tagify1GetValue.push(e.detail.data.value);
            console.log(e, e.detail);
        });
    }
    var categories = function () {
        // basic
        categorySelect = $('#kt_select2_1, #kt_select2_1_validate');
        categorySelect.select2({
            placeholder: 'Select a state',
        });
    }
    hljs.configure({   // optionally configure hljs
        languages: ['javascript', 'ruby', 'python']
    });

    var autoSizing = function () {
        // basic demo
        var demo1 = $('#kt_autosize_1');

        autosize(demo1);
    }
    var reset = () => {
        $('#blogpost').trigger("reset");
        categorySelect.val([]).trigger('change');
        CKEDITOR.instances.editor1.setData("");
        $('#description').val("");
        $('#metadescription').val("")
        tagify1.removeAllTags();
    }
    var pageBlock = () => {
        $('#kt_blockui_page_custom_text_1').click(function (e) {
            e.preventDefault();
            
            fv.validate().then(function (status) {
                if (status == 'Valid') {
                    var Post = {
                        'body': CKEDITOR.instances.editor1.getData(),
                        'description': $('#description').val(),
                        'metadescription': $('#metadescription').val(),
                        'tags': tagify1GetValue,
                        'category_id': categorySelect.val(),
                    };
                    let uploadpostUrl = '/panel/update/' + parseInt($.trim($('#id').text()));
                    $.ajax({
                        type: 'PATCH',
                        url: uploadpostUrl,
                        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                        data: Post,
                        success: function (data) {
                            console.log(data);
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
                        }
                    });
                    KTApp.blockPage({
                        overlayColor: '#000000',
                        state: 'danger',
                        message: 'Please wait...'
                    }); 
                    setTimeout(function () {
                        KTApp.unblockPage();
                        reset();
                        window.location.href = '/panel/postlist';
                    }, 2000);
                }
                else {
                    Swal.fire("Good job!", "You clicked the button!", "error");
                }
            });
            
        });
    }
    var validation = () => {

        fv = FormValidation
            .formValidation(
                document.getElementById('blogpost'),
                {
                    fields: {
                        title: {
                            validators: {
                                notEmpty: {
                                    message: 'Please enter title of this post'
                                },
                                stringLength: {
                                    min: 10,
                                    max: 70,
                                    message: 'Please enter a menu within text length range 50 and 70'
                                }
                            }
                        },
                        editor1: {
                            validators: {
                                callback: {
                                    message: 'Please choose 2-4 color you like most',
                                    callback: function (input) {

                                        // Get the selected options
                                        const options = CKEDITOR.instances.editor1.document.getBody().getText();
                                        return (options !== null && options.length >= 100 && options.length <= 50000);
                                    }
                                }
                            }
                        },
                        description: {
                            validators: {
                                notEmpty: {
                                    message: 'Please enter title of this post'
                                },
                                stringLength: {
                                    min: 100,
                                    max: 500,
                                    message: 'Please enter a menu within text length range 100 and 500'
                                }
                            }
                        },
                        metadescription: {
                            validators: {
                                notEmpty: {
                                    message: 'Please enter title of this post'
                                },
                                stringLength: {
                                    min: 55,
                                    max: 160,
                                    message: 'Please enter a menu within text length range 55 and 160'
                                }
                            }
                        },
                        category: {
                            validators: {
                                notEmpty: {
                                    message: 'Please select an option'
                                }
                            }
                        },
                        tags: {
                            validators: {
                                notEmpty: {
                                    message: 'Please enter tag of this post'
                                }
                            }
                        }
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        // Bootstrap Framework Integration
                        bootstrap: new FormValidation.plugins.Bootstrap(),
                    },
                }
            );

    }
    var Editor = function () {
        CKEDITOR.replace('editor1',
            // {
            //     customConfig : '/Users/istiaqahmed/PHPSTORM_Project/laravel_blog_project/public/js/pages/crud/forms/widgets/config.js'
            // }
            {
                filebrowserUploadUrl: "upload",
                filebrowserUploadMethod: 'form',
                disallowedContent: 'img{width,height}'
            }
        );
        // CKEDITOR.config.customConfig='customconfig.js'
        //         CKEDITOR.editorConfig = function( config ) {
        //     config.language = 'fr';
        //     config.uiColor = '#AADC6E';
        // };
        // CKEDITOR.config.toolbar = [


        //     ['NumberedList','BulletedList','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
        //     ['Image','Table','-','Link','Flash','Smiley','TextColor','BGColor','Source']
        //  ] ; 

    }
    $('#title').keyup(() => {
        convertToSlug($('#title').val())
    });

    return {
        // public functions
        init: function () {
            tags();
            categories();
            Editor();
            autoSizing();
            validation();
            pageBlock();

        }
    };

}();

jQuery(document).ready(function () {

    KTcreateBlog.init();
});