function deleteItem(obj, evt)
{
    evt.preventDefault();
    var tr = $(obj).parent().parent();
    var id= $(tr).attr('id');
    var o = confirm('You want to delete?');
    if(o){
        $.ajax({
            type: 'GET',
            url: burl + "/item/deleteitemdetail/" + id,
            success: function(sms){
                if(sms>0){
                    tr.remove();
                }
            }
        });
    }
    
}