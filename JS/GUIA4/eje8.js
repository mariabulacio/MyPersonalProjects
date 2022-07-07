var masculino='m'
var femenino='f'
var bot= document.getElementById("btn")
bot.addEventListener("click",form)
function form(masculino,femenino){
    if (document.getElementById("nom").value==''){
        alert("Ingrese su nombre")
    }
    if (document.getElementById("ape").value==''){
        alert("Ingrese su apellido")
    }
    if (isNaN(document.getElementById("dn").value)){
        alert("Ingrese su numero de documento")
    }
    if (document.getElementById("se").value!=masculino||document.getElementById("se").value!=femenino){
        alert("Ingrese Femenino o masculino")
    }
}