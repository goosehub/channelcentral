$(document).ready(function()
{

//Load upload information
    function loadUploadInfo()
    {
// upload information
        $.ajax(
        {
            url: "/radio/view/upload-info.php",
            cache: false,
            success: function(html)
            {
                $("#uploadInfo").html(html);
            }
        });
    }
    // Initial Load
    loadUploadInfo();
    // Refresh
    setInterval(loadUploadInfo, 10000); 

// Load contribute buttons
// Must refresh more frequently, so it is seperate
    function activeSubmit()
    {
        $.ajax(
        {
            url: "/radio/view/active-submit.php",
            cache: false,
            success: function(html)
            {
                $("#contributeA").html(html);
                $("#contributeB").html(html);
            }
        });
    }
    // Initial Load
    activeSubmit();
    // Refresh
    setInterval(activeSubmit, 2000); 

//form input
$('#submitForm').click(function()
{
    loadContent();
    $.post('controller/form-post.php', $('#uploadForm').serialize());
});



}); //end document