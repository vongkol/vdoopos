$(document).ready(function(evt){
    $('#v-pills-tab a').click(function() {
        $("a.active").removeClass("active");
        $(this).addClass('active');
        $('#v-pills-tabContent div').addClass('show');
    });
    $('#chktime').change(function(){
        var t = $(this).is(':checked');
        if(t){
            $('#starttime').removeAttr('disabled');
            $('#endtime').removeAttr('disabled');
        } else {
            $('#starttime').attr('disabled','disabled');
            $('#endtime').attr('disabled','disabled');
        }
    });
});