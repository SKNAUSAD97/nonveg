$(document).ready(function () {
    $('#form').submit(function (e) { 
        e.preventDefault(); 
        var url = $(this).attr('data-action');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "post",
            url: url,
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                console.log(response);
                if(response.status == 200){
                    $('.alert-success').removeClass('hide');
                    $('.message').text(response.message);
                }
            }
        }); 
    });
    $(document).on('click', '.close', function(){
        location.reload();
    });
});