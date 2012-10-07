<?php

/*
CREATE table if not exists customers 
(
	cid int auto_increment primary key,
	email varchar(30) not null,
	first_name varchar(30),
	last_name varchar(30),
	password varchar(30),
	addr varchar(30),
	cc_num int(16),
	u_type int(2)    
*/
?>

<h2>Allow Deselect on Single Selects</h2>
  <div class="side-by-side clearfix">
		<p>When a single select box isn't a required field, you can set <code>allow_single_deselect: true</code> and Chosen will add a UI element for option deselection. This will only work if the first option has blank text.</p>
		<div class="side-by-side clearfix">
		<select data-placeholder="Your Favorite Type of Bear" style="width:350px;" class="chzn-select-deselect" tabindex="7">
			<option value=""></option>
			<option>American Black Bear</option>
			<option>Asiatic Black Bear</option>
			<option>Brown Bear</option>
			<option>Giant Panda</option>
			<option selected>Sloth Bear</option>
			<option>Sun Bear</option>
			<option>Polar Bear</option>
			<option>Spectacled Bear</option>
		</select>
		</div>
  </div>
  
<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="chosen/chosen.jquery.js" type="text/javascript"></script>
<!-- Chosen JQuery Plugin -->
<script type="text/javascript">
  $(".chzn-select").chosen();
  $(".chzn-select-deselect").chosen({allow_single_deselect:true});
</script>