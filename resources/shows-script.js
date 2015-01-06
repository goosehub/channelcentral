$(document).ready(function()
{
    function reloadShowInfo()
    {
        $.ajax(
        {
            url: "../ajax/current-show.php",
            cache: false,
            success: function(html)
            {
                $("#current-show-cnt").html(html);
            }
        });
    }

// Initial Load
    reloadShowInfo();
// Refresh
    setInterval(reloadShowInfo, 10000); 

}); //end document