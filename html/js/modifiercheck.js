

function modifierbonus(a) {

var modifier = a;
var modifierbonus;
switch (modifier) {
    case 1:
        modifierbonus = "-5";
        break;
    case 2:
        modifierbonus = "-4";
        break;
    case 3:
        modifierbonus = "-4";
        break;
    case 4:
        modifierbonus = "-3";
        break;
    case 5:
        modifierbonus = "-3";
        break;
    case  6:
        modifierbonus = "-2";
        break;
    case  7:
        modifierbonus = "-2";
        break;
    case  8:
        modifierbonus = "-1";
        break;
    case  9:
        modifierbonus = "-1";
        break;
    case  10:
        modifierbonus = "+0";
        break;   
    case 11:
        modifierbonus = "+0";
        break;
    case 12:
        modifierbonus = "+1";
        break;
    case 13:
        modifierbonus = "+1";
        break;
    case 14:
        modifierbonus = "+2";
        break;
    case 15:
        modifierbonus = "+2";
        break;
    case  16:
        modifierbonus = "+3";
        break;
    case  17:
        modifierbonus = "+3";
        break;
    case  18:
        modifierbonus = "+4";
        break;
    case  19:
        modifierbonus = "+4";
        break;
    case  20:
        modifierbonus = "+5";
        break;
    case  21:
        modifierbonus = "+5";
        break;
    default: 
        modifierbonus = "-5";      
}

return("Modifier:" + modifierbonus) ;

}