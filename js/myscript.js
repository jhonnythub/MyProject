$(document).ready(function()
{
    $('#cari').hide();
    $('#content').hide();
    $('#keyword').keyup(function(){
        $('#content').show();
        var keyword = $('#keyword').val();
        if(keyword!='')
        {
            $.ajax(
                {
                    url: 'ajax/list.php',
                    method: 'POST',
                    data:{query:keyword},
                    success:function(data){
                        $("#content").html(data);
                }
            })
        }
        else{
            $('#content').html('');
        }
        $(document).on('click', 'a', function(){
            $('#keyword').val($(this).text());
            $('#content').html('');
        })
    });
    $(document).on('click', '#cari', function(){
        var value = $('#keyword').val();
        $.ajax({
            url: 'ajax/display.php',
            method: 'POST',
            data: {keyword:value},
            success: function(data){
                $('#list').html(data);
            }
        });
    });
});