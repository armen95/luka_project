$(function() {
    $('.delete-freelancer').click(function(event) {
        var _this = $(this);
        var id = $(this).data('id');
        if(id != ''){
            $.ajax({
                url: '/admin/deleteFreelancer',
                type: 'POST',
                dataType: 'json',
                data: {id: id},
                success: function (data) {
                    if(data.success){
                        _this.parent().parent().remove();
                    }
                }
            })
        }
    });

});