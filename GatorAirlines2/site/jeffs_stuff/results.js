<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script>
$(function(){
    $(".layovers_link").live("click", function(){
        i = $(this).attr("ref");
        $("#layover_div_" + i).show();
        $("#layover_link_" + i).hide();
        $("#layover_div_" + i).append("<a href='#' class='hide_layovers_link' id='hide_layover_link_" + i + "' ref='" + i + "'>Hide Layovers</a><br>");
        return false;
    });
    $(".hide_layovers_link").live("click", function(){
        i = $(this).attr("ref");
        $("#layover_div_" + i).hide();
        $("#hide_layover_link_" + i).hide();
        $("#layover_link_" + i).show();
        return false;
    });
    
});
</script>