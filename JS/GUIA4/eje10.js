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

document.addEventListener("click",btnmouse)
function btnmouse(){
    document.getElementById("p1").className="mouse"
    document.getElementById("p2").className="mouse"
    document.getElementById("p3").className="mouse"
    document.getElementById("p4").className="mouse"
}

document.addEventListener("keypress",btnkey)
function btnkey(){
    document.getElementById("p1").className="key"
    document.getElementById("p2").className="key"
    document.getElementById("p3").className="key"
    document.getElementById("p4").className="key"
}

document.addEventListener("mousemove",btnmove)
function btnmove(){
    document.getElementById("p1").className="move"
    document.getElementById("p2").className="move"
    document.getElementById("p3").className="move"
    document.getElementById("p4").className="move"
}



