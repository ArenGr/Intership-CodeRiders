$(document).ready(function(){
    $(document).on('click', '#delete_image', function(){
        var id = $(this).data('id');
        var name = $(this).data('name');
        $clicked_btn = $(this);
        $.ajax({
            url: 'delete_image.php',
            type: 'GET',
            data: {
                'delete_image': 1,
                'id': id,
                'name': name,
            },
            success: function(){
                $clicked_btn.parents("div").remove();
            },
            error: function(xhr, status, error) {
              var err = eval("(" + xhr.responseText + ")");
              alert(err.Message);
            }
        });
    });
});
