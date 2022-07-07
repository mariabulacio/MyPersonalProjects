var text = prompt("Ingrese el texto");
function eje4 (text){
    if (text==text.toLowerCase())
    {
        document.write("contiene minúsculas")
    }
    else if (text==text.toUpperCase()){
        document.write("contiene mayúsculas")
    }
    else {
        document.write("contiene mayúsculas y minúsculas")
    }
}
eje4(text)