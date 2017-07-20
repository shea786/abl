
$(document).ready(function(){

$("#lo_btn").click(function(){

    event.preventDefault(); 
    document.getElementById('logout-form').submit();


return false

})
//load inbox.js
$.getScript("/js/inbox.js");

})