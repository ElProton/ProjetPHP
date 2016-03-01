function init(){
    var Date = document.getElementsByClassName('dateChange')

    Date[0].addEventListener("change", changeDay);
    Date[1].addEventListener("change", changeDay);
}



function changeDay(event){
    var Date = document.getElementsByClassName('dateChange');
    var mois = Date[0];
    var annee = Date[1];

    var choiceMois = mois.selectedIndex;

    var mounths = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];
    if(choiceMois != null) {
        var jour = document.getElementById("modificationDate");
        if (choiceMois == 0 || choiceMois == 2 || choiceMois == 4 || choiceMois == 6 ||choiceMois == 7 || choiceMois == 9 || choiceMois == 11){
            var dayoptions = document.getElementsByClassName("dayOptions");
            if (dayoptions == undefined || dayoptions.length != 0) {
                for (var i = 0; i < dayoptions.length; i) {
                    document.getElementById("modificationDate").removeChild(dayoptions[parseInt(i, 10)]);
                }
            }
            for (var i = 29; i <= 31; i++) {
                var option = new Option(i, i);
                option.className = "dayOptions";
                jour.appendChild(option);
            }
        }
        else {
            if (choiceMois == 1) {
                var dayoptions = document.getElementsByClassName("dayOptions");
                for (var i = 0; i < dayoptions.length; i) {
                    jour.removeChild(dayoptions[parseInt(i, 10)]);
                }
            }

            else {
                var dayoptions = document.getElementsByClassName("dayOptions");
                if (dayoptions == undefined || dayoptions.length != 0) {
                    for (var i = 0; i < dayoptions.length; i) {
                        document.getElementById("modificationDate").removeChild(dayoptions[parseInt(i, 10)]);
                    }
                }
                for (var i = 29; i <= 30; i++) {
                    var option = new Option(i, i);
                    option.className = "dayOptions";
                    jour.appendChild(option);
                }

            }
        }
    }


}

window.addEventListener("load", init);


