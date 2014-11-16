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



});