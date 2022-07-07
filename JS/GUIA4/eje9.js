var masculino='m'
var femenino='f'
var bot= document.getElementById("btn")
bot.addEventListener("click",form)
function form(masculino,femenino){
    if (document.getElementById("nom").value==''){
        var v2=document.getElementById("nom")
        v2.className="novalido"
        alert("Ingrese su nombre")
    }
    if (document.getElementById("ape").value==''){
        var v1=document.getElementById("ape")
        v1.className="novalido"
        alert("Ingrese su apellido")
    }
    if (isNaN(document.getElementById("dn").value)){
        var v3=document.getElementById("dn")
        v3.className="novalido"
        alert("Ingrese su Documento")
    
    }
    if (document.getElementById("se").value!=masculino||document.getElementById("se").value!=femenino){
        var v4=document.getElementById("se")
        v4.className="novalido"
        alert("Ingrese Femenino o masculino")
    }
}