$(document).ready(function()
{

	//form input
$('#hostSubmitForm').click(function()
{
    //not working
    loadContent();
    $.post('controller/host-form-post.php', $('#hostForm').serialize());
});
$('#masterSubmitForm').click(function()
{
    //not working
    loadContent();
    $.post('controller/master-form-post.php', $('#masterForm').serialize());
});
// Reload the upcoming queue
$('.reloadQueue').click(function()
{
    // Current Queue
    $.ajax(
    {
        url: "../model/current-queue.php",
        cache: false,
        success: function(html)
        {
            $("#currentQueue").html(html);
        }
    });
    // Timed Queue
    $.ajax(
    {
        url: "../model/timed-queue.php",
        cache: false,
        success: function(html)
        {
            $("#timedQueue").html(html);
        }
    });
});

}); //end document