/**
 * Created by Vichey
 */
$(document).ready(function () {
    getSize();
});
// function to get size
function getSize()
{
    // get size
    $.ajax({
        type: "GET",
        url: burl + "/item/getsize",
        success: function (data) {
            var opts = "";
            for(var i=0; i<data.length; i++)
            {
                opts +="<option value='" + data[i].id + "'>" + data[i].name + "</option>";
            }
            $("#size").html(opts);
        }
    });
}