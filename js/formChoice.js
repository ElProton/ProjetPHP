/*
 * Initialize the event listeners
 */
function init()
{
    var select = document.querySelector("section p select");
    select.addEventListener("change", changeSelect);
    
    var form = document.getElementById("formulaire");

}

/*
 * Redirect the users when they change the type of the form
 */
function changeSelect()
{
    var form = document.getElementById('formulaire');
    var select = document.querySelector("section p select");
    
    switch(select.value)
    {
        case "jour":
            document.location.href="index.php?type=jour";
        break;
        
        case "mois":
            document.location.href="index.php?type=mois";
        break;
        
        default:
        
        break;
    }
    
    
}


window.addEventListener("load", init);
