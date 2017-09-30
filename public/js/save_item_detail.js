$("#save_item_detail").click(function(event) {
    var counter = $("tbody tr").length + 1;
    event.preventDefault();
    $.ajax({
        type: "post",
        url: burl + "/item/view/"+item_id+ "/save",
        dataType: "json",
        data: $('form').serialize(),
        success: function(data){
            var row = "<tr id='" + data.id + "'>" +
            '<td>' + counter + '</td>' +
            '<td>' + data.size + '</td>' +
            '<td>' + data.price + '</td>' +
            '<td>' + data.cost + '</td>' +
            '<td>' + data.discount + '</td>' +
            '<td>' + data.point + '</td>' +
            '<td>' + (data.free_able==0?'NO':'Yes')  + '</td>' +
            '<td>' + '<a href="#" onclick="editItemDetail(this, event)" data-toggle="modal" data-target=".bd-example-modal-lg" title="Edit"><i class="fa fa-edit text-success"></i></a>'+ "&nbsp;&nbsp;"+
            '<a href="#" onclick="deleteItem(this, event)" title="Delete"><i class="fa fa-remove text-danger"></i></a>' + '</td>' +
            '<tr>';
            $('tbody').append(row);
            $('form').trigger('reset');
            $('#success_add_item').text('The new item detail has been created successfully.');
        },
        error: function(data){
            alert('Please check you item price!');
        }
    });
});