$(document).ready(function()
{

	//form input
$('#HostSubmitForm').click(function()
{
    //not working
    loadContent();
    $.post('controller/host-form-post.php', $('#hostForm').serialize());
});



}); //end document