function getMessages(inboxURL,friend_id,inboxID){
    var msgarea = "";
        
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });
    //ajax code to push to server
    $.ajax({
        type: "GET",
        url: inboxURL,
        data: { id: inboxID },
        success: function (data) {
            $.each(data, function(key,value) {
                if(value.user_id == friend_id ){
                    msgarea += "<div class='to'>" + value.message + "</div>";
                }else{
                    msgarea += "<div class='from'>" + value.message + "</div>";
                }
            });
       
            $('#msgarea').html(msgarea);
            return false;
        },
        error: function (xhr, success, thrownError) {
            alert("data not posted");
        },
        complete: function () {
            
        }
    });
}

function displayMessageTextArea(inboxURL){
    var msginput = "";
    msginput += "<form name='message_form' id='message_form' method='post' action='" + inboxURL + "'>";
    /*
        msginput += "<input type='hidden' name='friend_id' value='"+friend_id+"'>";
        msginput += "<input type='hidden' name='inboxID' value='"+inboxID+"'>";
        msginput += "<input type='hidden' name='inboxURL' value='"+inboxURL+"'>";
    */
        msginput += "<textarea id='msginput' name='msginput' cols='50' rows='10'></textarea>";
        msginput += "<input id='ibsub'  class='btn btn-success' type='submit' value='Send Message'>";
    msginput += "</form>";
    
    $('#msgform').html(msginput);
}

function postNewInbox(){
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });
    //ajax code to push to server
    $.ajax({
        url: "",
        data: {},
        type: "GET",
        beforeSend: function () {
            
        },
        success: function (data) {
            
        },
        error: function (xhr, success, thrownError) {
            alert("data not posted");
        },
        complete: function () {
            
        }
    });
    return false;
}

function postMessages(){
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });
    //ajax code to push to server
    $.ajax({
        url: "",
        data: {},
        type: "GET",
        beforeSend: function () {
            
        },
        success: function (data) {
            
        },
        error: function (xhr, success, thrownError) {
            alert("data not posted");
        },
        complete: function () {
            
        }
    });
    return false;
}

$( document ).ready(function() {
    $('.profile_link').click(function(){
        var inboxURL = $(this).attr('link');
        var inboxID = $(this).attr("name");
        var friend_id = $(this).attr("value");
        
        getMessages(inboxURL,friend_id,inboxID);
        
        displayMessageTextArea(inboxURL);
    });
});