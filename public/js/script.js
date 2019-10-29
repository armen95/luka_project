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

    $('.edit-freelancer').click(function(event){
        var _this = $(this);
        var id = $(this).data('id');
        var _modal = $('#editFreelancerModal');
        var _form = $('#editFreelancerForm');
        if(id != ''){
            $.ajax({
                url: '/admin/getFreelancer',
                type: 'POST',
                dataType: 'json',
                data: {id: id},
                success: function (data) {
                    if(data.success){
                        var result = data.result;
                        $("#editFreelancerForm #freelancer_id").val(result.id);
                        $("#editFreelancerForm #name").val(result.name);
                        $("#editFreelancerForm #email").val(result.email);
                        $("#editFreelancerForm #contact").val(result.contact);
                        $("#editFreelancerForm #source_lang").val(result.source_lang);
                        $("#editFreelancerForm #target_lang").val(result.target_lang);
                        $("#editFreelancerForm #hourly_payment").val(result.hourly_payment);
                        $("#editFreelancerForm #word_payment").val(result.word_payment);
                        $("#editFreelancerForm #speciality").val(result.speciality);
                        $("#editFreelancerForm #availability").val(result.availability);
                        $("#editFreelancerForm #tracking_system").val(result.tracking_system);
                        _modal.modal('show');
                    }
                }
            })
        }

    });




});