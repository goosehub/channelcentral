var uploadLoad = '<iframe id="uploadFrame" src="view/upload.php" seamless></iframe>' + 
                    '<iframe id="vocaFrame" src="http://vocaroo.com/?minimal" seamless></iframe>';

var chanLoad = '<iframe id="chanFrame" src="http://4chan.org"></iframe>';

var tribuneLoad = '<iframe id="tribuneFrame" src="/tribune/news/"></iframe>';

var pulpLoad = '<iframe id="pulpFrame" src="http://interplay.xyz/pulp/winter2013.pdf" seamless></iframe>'; 

var sumoLoad = '<center><img class="img-circle" src="http://bbsimg.ngfiles.com/1/21938000/ngbbs4cbd66710a5ea.gif"/></center>'; 

$(document).ready(function()
{

var contentRefresher = 4000;

function loadContent()
{
    $.ajax(
    {
        url: "controller/loadContent.php",
        cache: false,
        success: function(html)
        {
// seperate content from counter data
            var myArray = html.split("|");
            var content = myArray[0];
            var counter = myArray[1];
// turn counter string into int
            counter = parseInt(counter);
// Load content
            $("#contentWindow").html(content);
// Set countdown to next reload
            startCounter(counter);
        }
    });
}
// Sets countdown
function startCounter(counter){
    setTimeout(loadContent, counter);
}
// Initial Load
loadContent();

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
// Initial Load
loadLog();
// Refresh
setInterval(loadLog, 4000); 


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
$('#tribuneBtn').click(function()
{
    $('#viewer').html(tribuneLoad);
});
$('#pulpBtn').click(function()
{
    $('#viewer').html(pulpLoad);
});
$('#sumoBtn').click(function()
{
    $('#viewer').html(sumoLoad);
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
// Load log so user can instantly see his message
    loadLog();
// Seperate so loadLog stays instant
    $.ajax(
    {
        url: "controller/trim-chat.php",
        cache: false,
        success: function(html)
        {
        // no action needed
        }
    });
    return false;
});

//form input
$('#submitForm').click(function()
{
    //not working
    loadContent();

    $.post('controller/formpost.php', $('#uploadForm').serialize());
});



}); //end document