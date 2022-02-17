/* Javascript for deleting product */
$(document).on('click', '.delete-object', function(){

    var id = $(this).attr('delete-id');

    bootbox.confirm({
        message: '<h4>Are you sure?</h4>',
        buttons: {
            confirm: {
                label: '<i class="glyphicon glyphicon-ok"></i> Yes',
                className: 'btn-danger'
            },
            cancel: {
                label: '<i class="glyphicon glyphicon-remove"></i> No',
                className: 'btn-primary'
            }
        },
        callback: function (result) {
            if(result==true){
                $.post('delete.php', {
                    object_id: id,
                }, function(data){
                    location.reload();
                }).fail(function(){
                    alert('Unable to delete.');
                });
            }
        }
    });
    return false;
});