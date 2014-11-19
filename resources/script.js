var vocaLoad = '<iframe id="vocaFrame" src="http://vocaroo.com/?minimal" seamless></iframe>';
var chanLoad = '<iframe id="chanFrame" src="http://4chan.org/s4s" seamless></iframe>';
var uploadLoad = '<iframe id="uploadFrame" src="./ajax/upload.php" seamless></iframe>';

$(document).ready(function()
{

//Chat
//Load chat display
function loadLog()
{
    $.ajax(
    {
        url: "/s4sradio/ajax/chatload.php",
        cache: false,
        success: function(html)
        {
            $("#chatBox").html(html);
            //$("#chatbox").scrollTop($("#chatbox")[0].scrollHeight);
        }
    });
}
// Refresh
setInterval(loadLog, 2000); 


//frame loading
$('#uploadBtn').click(function()
{
    $('#viewer').html(uploadLoad);
});
$('#vocaBtn').click(function()
{
    $('#viewer').html(vocaLoad);
});
$('#chanBtn').click(function()
{
    $('#viewer').html(chanLoad);
});



//chat input
$("#submitChat").click(function()
{
    var clientchat = $("#chatInput").val();
    $.post("/s4sradio/ajax/chatpost.php",
    {
        text: clientchat
    });
     $("#chatForm :input").val("");
    return false;
});

//form input
$('#submitForm').click(function()
{
    $.post('ajax/formpost.php', $('#uploadForm').serialize());
});



}); //end document