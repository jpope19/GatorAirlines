var doConfirmDelete = function(id)
{
    var link = document.getElementById(id);
    if(confirm("Do you really want to delete?"))
        return true;
    else
        return false;
}