$(document).ready(function () {
    
    $('.btn-delete').click(function(){
        let id = $(this).attr('id');
        let parent = $(this).parent().parent().parent().parent().parent();
        del(parent.attr('class')+'_delete', id);
        
    });

    $('.btn-edit').click(function(){
        let id = $(this).attr('id');
        let button = $('#'+ id);
        let col = button.parent();
        let row = col.parent();
        let tbody = row.parent();
        let table = tbody.parent();
        let parentDiv = table.parent();

        if(parentDiv.attr('class') === 'manage-infos') {
            let anunt = row.children('.anunt');
            let data = row.children('.data');
            
            $('#i_text').empty();
            $('#i_text').empty();
            $('#i_text').val(anunt.text().trim());
            $('#i_date').val(data.text().trim());

            $('button[name=submit_info]').html('Editeaza');

            $('button[name=submit_info]').click(function(e){
                e.preventDefault();
    
                $.ajax({
                    type: "POST",
                    url: "admin-panel",
                    data: {
                        update_info: 1,
                        id: id,
                        i_text: $('#i_text').val(),
                        i_date: $('#i_date').val()
                    },
                    dataType: "text",
                    success: function (response) {
                       location.reload();
                    }
                });
            })
        }

        if(parentDiv.attr('class') === 'manage-services') {

            let service = row.children('.name')

            $('#s_name').empty();
            $('#s_name').val(service.text().trim());

            $('button[name=submit_service]').html('Editeaza');

            $('button[name=submit_service]').click(function(e){
                e.preventDefault();
    
                $.ajax({
                    type: "POST",
                    url: "admin-panel",
                    data: {
                        update_service: 1,
                        id: id,
                        s_name: $('#s_name').val()
                    },
                    dataType: "text",
                    success: function (response) {
                       location.reload();
                    }
                });
            })
        }
    });


    function del (post,id) { 

        let button = $('#'+ id);
        let col = button.parent();
        let row = col.parent();
        $('.confirmDelete').click(function (e) { 
            e.preventDefault();

            $.ajax({
                type: "POST",
                url: "admin-panel",
                data: {
                    delete: post,
                    id: id
                },
                dataType: "text",
                success: function (response) {
                    row.remove();
                }
            });
        });
    }

    function update (post) {

    }

});