$(document).ready(function()
{

//Load upload information
    function loadUploadInfo()
    {
// upload information
        $.ajax(
        {
            url: "../ajax/upload-info.php",
            type: "POST",
            data: { slug: slug },
            cache: false,
            success: function(html)
            {
                $(".upload-reload").html(html);
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
            url: "../ajax/active-submit.php",
            type: "POST",
            data: { slug: slug },
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
    $.post('post/form-post.php', $('#uploadForm').serialize());
});

// Flash alerts

    window.setTimeout(function(){
        $('.flash_alert').remove(); 
    }, 3000);



}); //end document