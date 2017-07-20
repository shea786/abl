
/*


onclick="var inboxID = {{ $inbox->id }}; var inboxURL = $(this).attr('href'); var friend_id = {{ $user->id }}; getMessages(inboxURL,friend_id,inboxID); return false;"
*/

    

    /*
    setInterval(function() {
      getMessages();
    }, 1000);
    <a class="profile_link" href="http://ablfinal-shea786.c9users.io/tests/messages/1" name="1" value="1"><img src="/images/newyork.jpg">
    */
    

function displayMessageTextArea(inboxURL,friend_id,inboxID){
  
    $('#msgform').html("");
    var msginput = "";
    msginput += "<form name='message_form' id='message_form' method='post' action='" + inboxURL + "'>";
        msginput += "<input type='text' id='friend_id' name='friend_id' value='"+friend_id+"'>";
        msginput += "<input type='text' id='inboxID' name='inboxID' value='"+inboxID+"'>";
        msginput += "<input type='text' id='inboxURL' name='inboxURL' value='"+inboxURL+"'>";
        
        msginput += "<textarea id='msginput' name='msginput' cols='50' rows='10'></textarea>";
        msginput += "<input id='ibsub'  class='btn btn-success' type='submit' value='Send Message'>";
    msginput += "</form>";
    
    $('#msgform').html(msginput);

}
function getMessages(inboxURL,friend_id,inboxID){
    var msgarea = "";
    $.ajaxSetup({
    headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "GET",
        url: inboxURL,
        data: { id: inboxID },
        dataType: "json",
        success: function(data){
            $.each(data, function(key,value) {
                if(value.user_id == friend_id ){
                    msgarea += "<div class='to'>" + value.message + "</div>";
                }else{
                    msgarea += "<div class='from'>" + value.message + "</div>";
                }
            });
       
            $('#msgarea').html(msgarea);
            return false;
        }
    });
    displayMessageTextArea(inboxURL,friend_id,inboxID);
    $(document).on('click', "#ibsub" , function() {
            //var message = $("msginput").attr("");
            postMessage();
           
            return false;
        });
}

function postMessage(){
    var message = $('textarea#msginput').val();
    //inserts the csrf token into ajax
    var inboxID = $("#inboxID").val();
    var friend_id = $("#friend_id").val();
    var inboxURL = $("#inboxURL").val();
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });
    //ajax code to push to server
    $.ajax({
        url: inboxURL,
        data: {iid: inboxID, friend_id: friend_id, inboxURL: inboxURL,messg: message},
        type: "POST",
        beforeSend: function () {
            
        },
        success: function (data) {
            
        },
        error: function (xhr, success, thrownError) {
            alert("data not posted");
        },
        complete: function () {
            $('textarea#msginput').val("");
            getMessages(inboxURL,friend_id,inboxID);
        }
    });
    return false;
}



    /*
   $(document).on("click",".profile_link",function(e){
       e.preventDefault();
       e.stopPropagation();
    
        var inboxURL = $(this).attr('link');
        var inboxID = $(this).attr("name");
        var friend_id = $(this).attr("value");
     
        //alert(inboxURL+" " + inboxid + " - " + friendid);
        getMessages(inboxURL,friend_id,inboxID);
        displayMessageTextArea(inboxURL,friend_id,inboxID);
        
        $(document).on('click', "#ibsub" , function() {
            //var message = $("msginput").attr("");
            postMessage();
           
            return false;
        });
        
       //setInterval(function() {
        // getMessages(inboxURL,friend_id,inboxID);
        //}, 5000);
        return false;
        
    });
    */