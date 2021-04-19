var categoryClass = function () {
    var categoryId;
    var convertToSlug = (Text,target) => {
        $(target).val(
        Text
            .toLowerCase()
            .replace(/[^\w ]+/g, '')
            .replace(/ +/g, '-'));
    }
    var afterSubmit = () => {
        $('#submit').click(() => {
            console.log('click')
            var Category = {
                'name': $('#categoryname').val(),
                'slug': $('#categoryslug').val()
            }
            $.ajax({
                type: 'POST',
                url: '/admin/category/store',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                data: Category,
                success: function (data) {
                    console.log(data);
                    location.reload();
                }
            });
            console.log(Category);
        })
    }
    var table = ()=> {

        var datatable = $('#kt_datatable').KTDatatable({
          data: {
            saveState: {cookie: false},
          },
          search: {
            input: $('#kt_datatable_search_query'),
            key: 'generalSearch',
          },
          layout: {
            class: 'datatable-bordered',
          },
          columns: [
             
            
          ],
        });
    
    
    };
    var getData=()=>{
        $(document).on("click", ".edit", function () {
            categoryId = $(this).data('id');
            $.ajax({
                type: 'GET',
                url: '/admin/category/show/'+categoryId,
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                success: function (data) {
                    $('#editcategoryname').val(data.name);
                    $('#editcategoryslug').val(data.slug);
                
                }
            });
            //$(".modal-body #bookId").val( myBookId );
            // As pointed out in comments, 
            // it is unnecessary to have to manually call the modal.
            // $('#addBookDialog').modal('show');
       });
    }
    var updateData=()=>{
        $('#update').click(() => {
            var Category = {
                'name': $('#editcategoryname').val(),
                'slug': $('#editcategoryslug').val()
            }
            $.ajax({
                type: 'PATCH',
                url: '/admin/category/update/'+categoryId,
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                data: Category,
                success: function (data) {
                    location.reload();
                }
            });
        });
    }

    return {
        // public functions
        init: function () {
            convertToSlug('');
            $('#categoryname').keyup(() => {
                convertToSlug($('#categoryname').val(),'#categoryslug');
            });
            $('#editcategoryname').keyup(() => {
                convertToSlug($('#editcategoryname').val(),'#editcategoryslug');
            });
            afterSubmit();
            table();
            getData();
            updateData();
            
        }
    };

}();

jQuery(document).ready(function () {

    categoryClass.init();
});