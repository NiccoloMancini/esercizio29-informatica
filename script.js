function changeFlag(){
    let flag = document.getElementById("flag");
    let valuta = document.getElementById("valuta");
    switch (valuta.value) {
        case "sterline":
            flag.src = "./bandiere/UK.gif";
            break;
        case "dollaro":
            flag.src = "./bandiere/USA.gif";
            break;
        case "franchi":
            flag.src = "./bandiere/svizzera.gif";
            break;
        case "yen":
            flag.src = "./bandiere/giappone.gif";
            break;
    }
}