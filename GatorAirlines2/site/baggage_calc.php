<?php


?>






<!DOCTYPE html>
<html lang="en">
<head>
  <title>Services</title>
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
    <link rel="stylesheet" href="/resources/demos/style.css" />

</head>


<body id="page4">


<div class="main">
<!--header -->
	<?include('section/header2.php')?>
<!-- / header -->


<!--content -->
	<section id="content">
		   <div class="wrapper pad1">


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		</style>
		<link href="zoom.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<script type="text/javascript">
			<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}

		</script>
		<style type="text/css">

		</style>
		<script type="text/javascript">

	$(document).ready(function () {
	$('#calculate').click(function(){
	$('#bagWt').html("");
	
	var wt = $('#wght').val();
	var weightType = $('input[name=weightUnit]:checked').val();
	if(weightType == 'kgs')
	{
		wt = wt * 2.204622;
	}
	var ln = $('#len').val();
	var wth = $('#wdth').val();
	var ht = $('#hght').val();
	
	var lenType = $('input[name=lengthUnit]:checked').val();
	if(lenType == 'cm')
	{
		ln = ln * 0.393700787;
		wth = wth * 0.393700787;
		ht = ht * 0.393700787;
	}

	var total = ln * wth * ht;
	
	var lbs = 0;
	var divide = total/166;//for US
	divide = Math.ceil(divide); 
	if(wt > divide) 
	{
		lbs = wt;
	}
	else
	{
		lbs = divide;
	}
	lbs = Math.ceil(lbs);
	$('#bagWt').append(lbs + " LBS");

	});//end of click function

	});//end of document ready function
//-->
		</script>
<script type="text/javascript"> 

var _gaq = _gaq || []; 
_gaq.push(['_setAccount', 'UA-19667277-1']); 
_gaq.push(['_trackPageview']); 

(function() { 
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true; 
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js'; 
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s); 
})(); 

</script>
	</head>

							<h2>Bag Size Calculator:</h2>
											</div>
										</td>
									</tr>
									<tr>
										<td valign="top">
											<table width="100%" border="0" cellspacing="0" cellpadding="0">
												<tr>
													<td height="25">
														<div class="notes">Please enter the parameters below:</div>
													</td>
												</tr>
												<tr>
													<td valign="top" class="quote-table-bg">
														<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="text-11">
													
															<tr>
																<td width="45" height="8" align="left">&nbsp;</td>
																<td height="8" align="left">&nbsp;</td>
															</tr>
															<tr>
																<td width="45" align="left" valign="top">&nbsp;</td>
																<td align="left" valign="top">
																	<table width="100%" border="0" cellspacing="0" cellpadding="0">
														
											
																		<tr>
																			<td height="25">
																				<strong>Dimensions: L</strong>
																				<input name="len" id="len" class="text-11" onchange="proofNumber(this);" size="5" maxlength="4" autocomplete="off" />
																				<strong>W</strong>
																				<input name="width" id="wdth" class="text-11" onchange="proofNumber(this);" size="5" maxlength="4" autocomplete="off" />
																				<strong>H</strong>
																				<input name="height" id="hght" class="text-11" onchange="proofNumber(this);" size="5" maxlength="4" autocomplete="off" />
																			</td>
																			<td>
																				<input value="in" checked="checked" type="radio" name="lengthUnit" />
																				in 
																				<input value="cm" type="radio" name="lengthUnit" />
																				cm
																			</td>
																			<td>&nbsp;</td>
																		</tr>
																		<tr>
																			<td colspan="3">
																				<input type="image" id="calculate" src="images/buttons_calculate.png" width="105" height="23" hspace="25" align="right" />
																			</td>
																		</tr>
																		<tr>
																			<td colspan="3">&nbsp;</td>
																		</tr>
																	</table>
																</td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
											<br />
											<table width="100%" border="0" cellpadding="5" cellspacing="0" class="quote-table-bg">
												<tr>
													<td width="82%">
														<div class="price-quote">ESTIMATED BAGGAGE WEIGHT:</div>
													</td>
													<td width="14%">
														<div id="bagWt" class="price-large"></div>
													</td>
													<td width="4%">&nbsp;</td>
												</tr>
											</table>
											<br />
											<table width="100%" border="0" cellpadding="0" cellspacing="0" class="text-11">
											
				        </div>
			</section>
			
			
			
			
			
			
			
			
			
			
			
			
			<!--content end-->
			<!--footer -->
			<?include('section/footer2.php')?>
			<!--footer end-->
		</div>

</body>
</html>
