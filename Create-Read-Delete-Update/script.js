$(document).ready(function(){
    $(document).on('click', '#delete', function(){
        var id = $(this).data('id');
        $clicked_btn = $(this);
        $.ajax({
            url: 'delete.php',
            type: 'GET',
            data: {
                'delete': 1,
                'id': id,
            },
            success: function(){
                $clicked_btn.parents("tr").remove();
            }
        });
    });
});
