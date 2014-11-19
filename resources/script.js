var vocaLoad = '<iframe id="vocaFrame" src="http://vocaroo.com/?minimal" seamless></iframe>';
var chanLoad = '<iframe id="chanFrame" src="http://4chan.org/s4s" seamless></iframe>';
var uploadLoad = '<iframe id="uploadFrame" name="uploadFrameName" src="controller/upload.php" seamless></iframe>';

$(document).ready(function()
{

//Chat
//Load chat display
function loadLog()
{
    $.ajax(
    {
        url: "controller/chatload.php",
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
    $.post("controller/chatpost.php",
    {
        text: clientchat
    });
     $("#chatForm :input").val("");
    return false;
});

//form input
$('#submitForm').click(function()
{
    $.post('controller/formpost.php', $('#uploadForm').serialize());
    document.getElementById("#uploadFrameName").src = "http://WWW.microsoft.com";
});



}); //end document