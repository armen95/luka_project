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

    $('.delete-client').click(function(event) {
        var _this = $(this);
        var id = $(this).data('id');
        if(id != ''){
            $.ajax({
                url: '/admin/deleteClient',
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
    $('.delete-order').click(function(event) {
        var _this = $(this);
        var id = $(this).data('id');
        if(id != ''){
            $.ajax({
                url: '/admin/deleteOrder',
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

    $('.edit-client').click(function(event){
        var _this = $(this);
        var id = $(this).data('id');
        var _modal = $('#editClientModal');
        var _form = $('#editClientForm');
        if(id != ''){
            $.ajax({
                url: '/admin/getClient',
                type: 'POST',
                dataType: 'json',
                data: {id: id},
                success: function (data) {
                    if(data.success){
                        var result = data.result;
                        $("#editClientForm #client_id").val(result.id);
                        $("#editClientForm #name").val(result.name);
                        $("#editClientForm #email").val(result.email);
                        $("#editClientForm #legal_name").val(result.legal_name);
                        $("#editClientForm #address").val(result.address);
                        $("#editClientForm #post_index").val(result.post_index);
                        $("#editClientForm #city").val(result.city);
                        $("#editClientForm #country").val(result.country);
                        $("#editClientForm #vat_number").val(result.vat_number);
                        $("#editClientForm #contact_person").val(result.contact_person);
                        $("#editClientForm #requirements").val(result.requirements);
                        _modal.modal('show');
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