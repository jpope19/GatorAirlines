// Validate admin input when adding new customers
$(document).ready(function()
{
    $("#AddCustomerForm").live('submit', function()
	{
		$('.req').each(function() 
		{// Check each input and see if it is empty
			if($($this).val() == '')
			{// If it is empty, add the class highlight
				$(this).addClass('highlight');
			}// end if
		});
		if ($('.req').hasClass('highlight'))
		{// If there is any highlighted input, it is empty and thus alert the user and terminate process
			alert("Please fill in all the required fields (indicated by *)");
			return false;
		}// end if
		else
		{// None of the fields are empty, we can now sanitize them
			
			
		}// end else
    });
});