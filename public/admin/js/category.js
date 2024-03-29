$(function () {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
       "ajax": "index",
       "columns": [
            {data: 'id', name: 'id'},
            {data: 'category_name', name: 'category_name'},
            {data: 'category_image', name: 'category_image'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
});

categoryDelete = ($id) => {
    var conf = confirm('Are You Sure?');
        if(!conf){
            return false;
        }

        $.ajax({
          type: "get",
          url: "delete/" + $id,
          success: function (response) {
            if(response.status == 200){
              $('.alert-success').removeClass('hide');
              $('.message').text(response.message);
            }
          }
        });
        $(document).on('click', '.close', function(){
          location.reload();
        });
  }