function init()
{
    var select = document.querySelector("section p select");
    select.addEventListener("change", changeSelect);
}

function changeSelect()
{
    var form = document.getElementById('formulaire');
    var select = document.querySelector("section p select");
    
    switch(select.value)
    {
        case "jour":
            form.innerHTML = "<?php include('includes/formulaires.php'); ?>";
        break;
        
        case "mois":
        
        break;
        
        default:
        
        break;
    }
    
    
}


window.addEventListener("load", init);
