// Nav bar buttons

show = '';

var invisible = 0;

var joined = 0;

$(document).ready(function()
{

// When entering room, set user as joined for session logic later
$("#enter-room").click(function()
{
    joined = 'on';
});

// Press button to fade out and back in
$('#fadeoutBtn').click(function()
{
    if (invisible === 0)
    {
        $('#pageWrapper').css({
            'opacity': 0
        });
        invisible = 1;
    } 
    else 
    {
        $('#pageWrapper').css({
            'opacity': 1
        });
        invisible = 0;
    }
});

// Load content
function loadContent()
{
    $.ajax(
    {
        url: "ajax/load-content.php",
        type: "POST",
        data: { slug: slug },
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
// Chat functions also work with making session logic work

// Initial Chat Load
function chatLoad()
{
    $.ajax(
    {
        url: "ajax/chat-load.php",
        type: "POST",
        data: { slug: slug },
        cache: false,
        success: function(html)
        {
            $("#chatBox").html(html);
            $("#chatBox").scrollTop($("#chatBox")[0].scrollHeight);
        }
    });
}
chatLoad();

// Refresh
setInterval(chatLoad, 1000);

function loadViewerCount()
{
    $.ajax(
    {
        url: "ajax/get-viewer-count.php",
        type: "POST",
        data: { slug: slug },
        cache: false,
        success: function(html)
        {
            $("#viewersBtn").html(html);
        }
    });
}

loadViewerCount();
setInterval(loadViewerCount, 1000);

// Used to determine current background image
var background = '';
//Load host information
    function loadHostInfo()
    {
// background image
        $.ajax(
        {
            url: "ajax/background.php",
            type: "POST",
            data: { slug: slug },
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
            url: "ajax/check-reload.php",
            type: "POST",
            data: { slug: slug },
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



    function reloadShowInfo()
    {
        $.ajax(
        {
            url: "ajax/current-show.php",
            type: "POST",
            data: { slug: slug },
            cache: false,
            success: function(html)
            {
                if (show === html)
                {
                }
                else
                {
                    show = html;
                    $("#info-content").html(html);
                }
            }
        });
    }

// Initial Load
    reloadShowInfo();
// Refresh
    setInterval(reloadShowInfo, 10000); 



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
        window.location = 'post/leave.php';   
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
    $.post("post/chat-post.php",
    {
        message: clientchat,
        name: 'name',
        slug: slug
    });
     $("#chatForm :input").val("");
// Load log so user can instantly see his message
    $('#chatInput').focus();
    return false;
});


}); //end document