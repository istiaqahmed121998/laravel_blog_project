var categoryClass = function () {
    var convertToSlug = (Text) => {
        $('#categoryslug').val(Text
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
                }
            });
            console.log(Category);
        })
    }
    var table = function() {

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

    return {
        // public functions
        init: function () {
            convertToSlug('');
            $('#categoryname').keyup(() => {
                convertToSlug($('#categoryname').val());
            })
            afterSubmit();
            table();

        }
    };

}();

jQuery(document).ready(function () {

    categoryClass.init();
});