$(document).ready(function()
{

	//form input
$('#hostSubmitForm').click(function()
{
    //not working
    loadContent();
    $.post('post/host-form-post.php', $('#hostForm').serialize());
});
$('#masterSubmitForm').click(function()
{
    //not working
    loadContent();
    $.post('post/master-form-post.php', $('#masterForm').serialize());
});
// Reload the upcoming queue
$('.reloadQueue').click(function()
{
    // Current Queue
    $.ajax(
    {
        url: "../ajax/current-queue.php",
        type: "POST",
        data: { slug: slug },
        cache: false,
        success: function(html)
        {
            $("#currentQueue").html(html);
        }
    });
    // Timed Queue
    $.ajax(
    {
        url: "../ajax/timed-queue.php",
        type: "POST",
        data: { slug: slug },
        cache: false,
        success: function(html)
        {
            $("#timedQueue").html(html);
        }
    });
});

}); //end document