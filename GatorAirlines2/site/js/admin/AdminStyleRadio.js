// Used in admin page to select between admin or developer options
$(document).ready(function()
{
	// Click Events for AdminStyle
	$(".AdminStyle").click(function()
	{
		if ($('input[name=AdminStyle]:checked').val() == "Admin" ) 
		{
			$("#Admin").slideDown("fast"); //Slide Down Effect
			$("#Developer").slideUp("fast"); //Slide Up Effect
		}// end if
		else
		{
			$("#Admin").slideUp("fast"); //Slide Up Effect
			$("#Developer").slideDown("fast"); //Slide Down Effect
		}// end else
	});
});
