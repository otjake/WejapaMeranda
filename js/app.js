
$('#subscribe_b').click(function (e) {
    e.preventDefault();
    alert("jquery is working");
    let form=$(this);
    let data=$(form).serialize();
    let action= $(form).attr('action');
    $.ajax({
        url:action,
        type:"POST",
        data:data,
        success:function (response) {
            $dataresult=JSON.parse(response);
            if($dataresult.success){
                $('#msg').text($dataresult.success);
            }
            if($dataresult.error){
                $('#msg').text($dataresult.error)

            }

        }
    });


});
