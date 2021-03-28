var KTcreateBlog = function () {

    var tagify1;
    var tagify2;
    var categorySelect;
    var edit;
    var tagify1GetValue = [];
    var tagify2GetValue = [];
    var getText;
    var convertToSlug= (Text)=>
    {
        $('#slug').val(Text
            .toLowerCase()
            .replace(/[^\w ]+/g,'')
            .replace(/ +/g,'-'));
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

        tagify1.on('invalid', function (e) {
            console.log(e, e.detail);
        });
    }
    var categories = function () {
        // basic
        categorySelect = $('#kt_select2_1, #kt_select2_1_validate');
        categorySelect.select2({
            placeholder: 'Select a Category',
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
    var keywords = function () {

        var input = document.getElementById('kt_tagify_4');
        tagify2 = new Tagify(input, {
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

            tagData.class = 'tagify__tag tagify__tag--' + states[KTUtil.getRandomInt(0, 7)];

            if (tagData.value.toLowerCase() == 'shit') {
                tagData.value = 's✲✲t'
            }
        }
        tagify2.on('invalid', function (e) {
            console.log(e, e.detail);
        });

    }
    var reset =()=>{
        $('#blogpost').trigger("reset");
        categorySelect.val([]).trigger('change');
        CKEDITOR.instances.editor1.setData("");
        tagify1.removeAllTags();
        tagify2.removeAllTags();
    }
    var pageBlock = () => {
        $('#kt_blockui_page_custom_text_1').click(function (e) {
            var error = [];
            e.preventDefault();

            KTApp.blockPage({
                overlayColor: '#000000',
                state: 'danger',
                message: 'Please wait...'
            });
            if ($('#kt_tagify_4').val() == "") {
                error.push('Tags Error');
            }
            if ($('#kt_tagify_6').val() == "") {
                error.push('Keywords Error');
            }
            if ($('#title').val() == '') {
                error.push('Title is empty');
            }
            if ($('#description').val() == '') {
                error.push('Description is empty');
            }
            if (categorySelect.val() == '') {
                error.push('Category is not selected');
            }
            if (CKEDITOR.instances.editor1.getData()=='') {
                error.push('body is empty');
            }
            if (!error.length) {
                $.each(JSON.parse($('#kt_tagify_4').val()), function( key, data ) {
                    tagify1GetValue.push(data.value);
                });
                $.each(JSON.parse($('#kt_tagify_6').val()), function( key, data ) {
                    tagify2GetValue.push(data.value);
                });

                var Post = {
                    'title': $('#title').val(),
                    'slug': $('#slug').val(),
                    'body': CKEDITOR.instances.editor1.getData(),
                    'description': $('#description').val(),
                    'tags': tagify1GetValue,
                    'keyword': tagify2GetValue,
                    'category': categorySelect.val(),
                    '_token': $('meta[name="csrf-token"]').attr('content')
                };
                $.ajax({
                    type: 'POST',
                    url: '/admin/store',
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    data: Post,
                    success: function (data) {
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
            }
            else {
                Swal.fire("Good job!", "You clicked the button!", "error");
            }
            

            //console.log(Post);
            setTimeout(function () {
                KTApp.unblockPage();
                reset();
            }, 2000);
        });
    }
    var Editor = function () {
        CKEDITOR.replace('editor1', 
        // {
        //     customConfig : '/Users/istiaqahmed/PHPSTORM_Project/laravel_blog_project/public/js/pages/crud/forms/widgets/config.js'
        // }
        {
            filebrowserUploadUrl: "upload",
            filebrowserUploadMethod: 'form',
            disallowedContent : 'img{width,height}'
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
    $('#title').keyup(()=>{
        convertToSlug($('#title').val())
    });
    
    return {
        // public functions
        init: function () {
            tags();
            categories();
            Editor();
            autoSizing();
            keywords();
            pageBlock();
            
        }
    };

}();

jQuery(document).ready(function () {
    
    KTcreateBlog.init();
});