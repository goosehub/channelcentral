$(document).ready(function()
{

	//form input
$('#HostSubmitForm').click(function()
{
    //not working
    loadContent();
    $.post('controller/host-form-post.php', $('#hostForm').serialize());
});
// Reload the upcoming queue
$('#reloadQueue').click(function()
{
    // $("#currentQueue").html('Loading...');
    $.ajax(
    {
        url: "../model/current-queue.php",
        cache: false,
        success: function(html)
        {
            $("#currentQueue").html(html);
        }
    });
});



}); //end document