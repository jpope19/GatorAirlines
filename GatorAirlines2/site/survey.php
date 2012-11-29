
<!DOCTYPE html>
<html lang="en">
<head>
  <title>SURVEY</title>
 
  <link rel="stylesheet" href="css/login.css" type="text/css" media="all">
<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
<script type="text/javascript" src="js/test.js"></script>
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<script type="text/javascript" src="js/jquery-1.5.2.js" ></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>


	<script>
    $(function() {
        $( "#departure" ).datepicker();
		   $( "#return" ).datepicker();
		   $( "#flexibleD" ).datepicker();
		   $( "#flexibleR" ).datepicker();
    });
   	
	
	
	
	$(document).ready(function()
	{
		$("#advanced").css("display","none");
		
		$(".advanced").click(function()
		{
			if ($('input[name=advanced]:checked').val() == "Yes" ) 
			{
				$("#advanced").slideDown("fast"); //Slide Down Effect
			}// end if
			else
			{
				$("#advanced").slideUp("fast"); //Slide Up Effect
			}// end else
		});
	});
	</script>
	




<form id="DoneGoHome" action="home.php" method="post">
</head>
<h1>THANK YOU FOR CHOOSING GATOR AIRLINES!!</h1>
<p>Please take a couple minutes to fill out our survey on your experience</p>
<br />
<p>

On a scale of 1 to 5 how easy was booking a ticket?
<br />
1 = very easy <br />
5 = very difficult

</p>



<input type="radio" name="survey" value="one" /> 1 &#09;
<input type="radio" name="survey" value="two" /> 2
<input type="radio" name="survey" value="three" /> 3
<input type="radio" name="survey" value="four" /> 4
<input type="radio" name="survey" value="five" /> 5


<p>

On a scale of 1 to 5 how easy was selecting a seat?
<br />
1 = very easy <br />
5 = very difficult

</p>

<input type="radio" name="survey" value="one" /> 1 &#09;
<input type="radio" name="survey" value="two" /> 2
<input type="radio" name="survey" value="three" /> 3
<input type="radio" name="survey" value="four" /> 4
<input type="radio" name="survey" value="five" /> 5



<p>

On a scale of 1 to 5 how likely will you return to fly with us?
<br />
1 = very likely <br />
5 = very unlikely

</p>

<input type="radio" name="survey" value="one" /> 1 &#09;
<input type="radio" name="survey" value="two" /> 2
<input type="radio" name="survey" value="three" /> 3
<input type="radio" name="survey" value="four" /> 4
<input type="radio" name="survey" value="five" /> 5

</br>
    
        <input type="submit" id="done" value="Done">
       
        </div>
	
	<div id="extra" style="clear: both;">&nbsp;</div>
	
<!-- <input type="submit" id ="btnShowNew" value="Done> 
-->
<br>
</br>
</form>

</html>