var nombre = prompt("Ingrese su nombre");
var apellido = prompt("Ingrese su apellido");

function MostrarNombreApellido(nombre,apellido){
    nombre=nombre.charAt(0).toUpperCase()+nombre.slice(1);
    apellido=apellido.toUpperCase();
    document.write(apellido+","+nombre)
}
MostrarNombreApellido(nombre,apellido)