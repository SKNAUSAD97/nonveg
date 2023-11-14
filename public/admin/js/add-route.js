$(document).ready(function () {
    $('#is_parent').click(function(){
        if($(this).is(':checked') == true){
            // alert('khkej');
            $('.parent-route').prop('disabled', true);
            $('.table-bordered').removeClass('hide');
        }else{
            $('.parent-route').prop('disabled', false);
            $('.table-bordered').addClass('hide')
        }
    })
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
                if(response.status == 200){
                    $('.alert-success').removeClass('hide');
                    $('.message').text(response.message);
                }
            }
        }); 
    });
    $(document).on('click', '#remove', function(){
        $(this).closest('tr').remove();
    });
    $(document).on('click', '.close', function(){
        location.reload();
    });
});

addMore = () =>{
    var count = $('#myTable tr').length;
    let adddata = `<tr>
                        <th>${count}</th>
                        <th>
                            <input type="text" class="form-control" name="data[${count}][label]" placeholder="Enter label" />
                        </th>
                        <th>
                            <input type="text" class="form-control" name="data[${count}][route]" placeholder="Route" />
                        </th>
                        <th>
                            <button class="btn btn-danger" id="remove" type="button">Remove</button>
                        </th>
                    </tr>`;
    

    $('#tbody').append(adddata);
}


