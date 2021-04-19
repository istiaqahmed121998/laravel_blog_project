var categoryClass = function () {

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

    return {
        // public functions
        init: function () {
            table();
            
        }
    };

}();

jQuery(document).ready(function () {

    categoryClass.init();
});