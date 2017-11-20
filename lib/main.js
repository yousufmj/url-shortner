function generate (url) {
    $.post('controller/url.php',{ url: url}, function(data){
        var callout = document.getElementById("Message");
        if (data == 'no_url') {
            callout.className += "callout warning";
            $('#Message').html('<p>No Url entered </p>');
        }else if(data == 'not_valid'){
            callout.className += "callout alert";
            $('#Message').html('<p>Not a Valid URl</p>');
        }else if(data.indexOf("shortened") >= 0){
            callout.className += "callout primary";
            $('#Message').html(data);
        }else{
            $('#url').val(data);
            callout.className += "callout success";
             $('#Message').html('<p>Url Has been shortened</p>');
        };
    });
}