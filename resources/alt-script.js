// Nav bar buttons

var uploadLoad = '<iframe id="uploadFrame" src="view/upload.php" seamless></iframe>' + 
                    '<iframe id="vocaFrame" src="http://vocaroo.com/?minimal" seamless></iframe>';

var showsLoad = '<iframe id="showsFrame" src="view/shows.php" seamless></iframe>';

var purpleLoad = '<iframe id="pulpFrame" src="http://interplay.xyz/pulp/winter2013.pdf" seamless></iframe>'; 

var orangeLoad = '<iframe id="chanFrame" src="http://4chan.org/s4s/"></iframe>';

var greenLoad = '<center><img class="img-circle questionImg" src="resources/sumo.gif"/></center>'; 

var invisible = 0;

$(document).ready(function()
{

$('#headline').mousedown(function()
{
    $('#pageWrapper').css({
        'opacity': 0
    });
});
$('#headline').mouseup(function()
{
    $('#pageWrapper').css({
        'opacity': 1
    });
});

// Load content
function loadContent()
{
    $.ajax(
    {
        url: "model/load-content.php",
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
// Sets countdown til next content load
function startCounter(counter){
    setTimeout(loadContent, counter);
}
// Initial Load
loadContent();

//Chat

// Initial Chat Load
function chatLoad()
{
    $.ajax(
    {
        url: "model/chat-load.php",
        cache: false,
        success: function(html)
        {
            $("#chatBox").html(html);
            $("#chatBox").scrollTop($("#chatBox")[0].scrollHeight);
        }
    });
}
chatLoad();
setInterval(chatLoad, 4000);

// Used to determine current background image
var background = '';
//Load host information
    function loadHostInfo()
    {
// Navbar
        $.ajax(
        {
            url: "model/navbar.php",
            cache: false,
            success: function(html)
            {
            // seperate content from counter data
            var myArray = html.split("|");
            purpleLoad = myArray[0];
            orangeLoad = myArray[1];
            greenLoad = myArray[2];
            }
        });
// Headline
        $.ajax(
        {
            url: "model/headline.php",
            cache: false,
            success: function(html)
            {
                $("#headline").html(html);
            }
        });
// background image
        $.ajax(
        {
            url: "model/background.php",
            cache: false,
            success: function(html)
            {
// Check if background has changed
// Prevents blinking background
                if (background === html)
                {
                }
                else
                {
                    background = html;
                    document.body.style.backgroundImage = 'url(upload/background/'+background+')';
                }
            }
        });
// Check if current song is still playing
        $.ajax(
        {
            url: "model/check-reload.php",
            cache: false,
            success: function(html)
            {
// If reload signal was sent
                if (html.length > 3)
                {
// Load content
                    loadContent();
                }
            }
        });
    }
// Initial Load
    loadHostInfo();
// Refresh
    setInterval(loadHostInfo, 10000); 


// NavBar
$('#showsBtn').click(function()
{
    $('#viewer').html(showsLoad);
});
$('#uploadBtn').click(function()
{
    $('#viewer').html(uploadLoad);
});
// End user session
  $("#leaveBtn ").click(function(){
        window.location = 'controller/leave.php';   
    });
$('#purpleBtn').click(function()
{
    $('#viewer').html(purpleLoad);
});
$('#orangeBtn').click(function()
{
    $('#viewer').html(orangeLoad);
});
$('#greenBtn').click(function()
{
    $('#viewer').html(greenLoad);
});



//chat input
$("#submitChat").click(function()
{
    var clientchat = $("#chatInput").val();
    $.post("model/chat-post.php",
    {
        text: clientchat
    });
     $("#chatForm :input").val("");
// Load log so user can instantly see his message
    chatLogger();
    $.ajax(
    {
        url: "model/trim-chat.php",
        cache: false,
        success: function(html)
        {
        // no action needed
        }
    });
    return false;
});



}); //end document