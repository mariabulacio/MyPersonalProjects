var lun="Lunes"
var mar="Martes"
var mier="Miércoles"
var jue="Jueves"
var vier="Viernes"
var sab="Sábado"
var dom="Domingo"

var dia1={
    1:lun,2:mar,3:mier,4:jue,5:vier,6:sab,7:dom
}

for (var key in dia1){
    document.write(key,dia1[key])
}