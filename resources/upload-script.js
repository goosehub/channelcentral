$(document).ready(function()
{

//Load upload information
    function loadUploadInfo()
    {
// upload information
        $.ajax(
        {
            url: "model/upload-info.php",
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
    setInterval(loadUploadInfo, 30000); 

// Load contribute buttons
// Must refresh more frequently, so it is seperate
// If uploading gets competitive, refresh may need to be upped
    function activeSubmit()
    {
        $.ajax(
        {
            url: "model/active-submit.php",
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
    setInterval(activeSubmit, 6000); 

//form input
$('#submitForm').click(function()
{
    loadContent();
    $.post('controller/form-post.php', $('#uploadForm').serialize());
});



}); //end document