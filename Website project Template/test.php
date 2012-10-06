<!-- Just using this page to test some jquery and other stuff. Will be deleted -->

<!DOCTYPE html>
<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
	<script> 
$(document).ready(function(){
    $("#parent1").css("display","none");
        $(".aboveage1").click(function(){
        if ($('input[name=age1]:checked').val() == "No" ) {
            $("#parent1").slideDown("fast"); //Slide Down Effect
        } else {
            $("#parent1").slideUp("fast");  //Slide Up Effect
        }
     });
});      
</script>
 
<style type="text/css"> 
#panel,#flip
{
padding:5px;
text-align:center;
background-color:#e5eecc;
border:solid 1px #c3c3c3;
}
#panel
{
padding:50px;
display:none;
}
</style>
</head>
<body>
 
<fieldset>
<ol class="formset">
        <li><label for="fname1">First Name: </label>
    <input type="text" id="fname1" value="" name="fname1"/></li>
 
        <li><label for="lname1">Last Name: </label>
    <input type="text" id="lname1" value="" name="lname1"/></li>
 
        <li><label for="email1">Email Address: </label><br />
    <input type="text" id="email1" value="" name="email1" /></li>
 
        <li><label for="age1">Are you above 21 yrs old?</label>
    <input type="radio" name="age1" value="Yes" class="aboveage1" /> Yes
    <input type="radio" name="age1" value="No" class="aboveage1" /> No</li>
</ol>
<ol id="parent1" class="formset">
<li><strong>Parent/Guardian Information:</strong></li>
        <li><label for="pname1">Parent Name: </label>
    <input type="text" id="pname1" value="" name="pname1"/></li>
        <li><label for="contact1">Contact No.: </label>
    <input type="text" id="contact1" value="" name="contact1"/></li>
</ol>
<input type="submit" name="submit" value="Submit" class="submitbtn" />
</fieldset>

</body>
</html>


