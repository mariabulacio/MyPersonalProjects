var element1=document.getElementById("a").className
var element2= document.getElementById("b")
element2.addEventListener("click",cambio)

function cambio(){
    document.getElementById("a").className="visible"
    document.getElementById("b").className="oculto"
}

