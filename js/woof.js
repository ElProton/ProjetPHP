var step = 0;

function init(){
    document.addEventListener('keydown', woof);
}

function woof(event) {
    // UP    = 38
    // DOWN  = 40
    // LEFT  = 37
    // RIGHT = 39
    // A     = 66
    // B     = 65
    
    var keyCode = event.keyCode;
    
    switch(step)
    {
        case 0:
            if(keyCode == 38)
                step++;
            else
                step = 0;
        break;
        
        case 1:
            if(keyCode == 38)
                step++;
            else
                step = 0;                
        break;
        
        case 2:
            if(keyCode == 40)
                step++;
            else
                step = 0;                
        break;
        
        case 3:
            if(keyCode == 40)
                step++;
            else
                step = 0;                
        break;
        
        case 4:
            if(keyCode == 37)
                step++;
            else
                step = 0;                
        break;
        
        case 5:
            if(keyCode == 39)
                step++;
            else
                step = 0;                
        break;
        
        case 6:
            if(keyCode == 37)
                step++;
            else
                step = 0;                
        break;
        
        case 7:
            if(keyCode == 39)
                step++;
            else
                step = 0;                
        break;
        
        case 8:
            if(keyCode == 66)
                step++;
            else
                step = 0;                
        break;
        
        case 9:
            if(keyCode == 65){
                step = 0;
                                
                var query = document.getElementById("main_style");
                query.setAttribute('href', "css/index-kawaii.css");
            }
            else
                step = 0;   
        break;
        
        default:
            step = 0;
        break;
        
    }
}

window.addEventListener("load", init);
