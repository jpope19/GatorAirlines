<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script>
$(function(){
    $("#add_flight_form").live('submit', function(){
       $.post('add_flight_to_db.php', $(this).serialize(), function(data){
           alert(data);
       });
       return false;
    });
});
</script>