// Used in admin page to retain menu state
$(document).ready(function()
{
	// Click Events for AdminStyle
	$(".AdminStyle").ready(function()
	{
		if ($('input[name=AdminStyle]:checked').val() == "Admin" ) 
		{
			$("#Admin").show(); //Slide Down Effect
			$("#Developer").hide(); //Slide Up Effect
		}// end if
		else
		{
			$("#Admin").hide(); //Slide Up Effect
			$("#Developer").show(); //Slide Down Effect
		}// end else
	});
});
