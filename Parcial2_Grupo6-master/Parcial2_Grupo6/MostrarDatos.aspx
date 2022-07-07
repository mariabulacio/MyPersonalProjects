<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="MostrarDatos.aspx.cs" Inherits="Parcial2_Grupo6.MostrarDatos" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title>Mostrar Datos</title>
    <script defer="defer" src="src/JS/comentario.js"></script>
</head>
<body>
    <form id="form1" runat="server">
        <div>
            <h1>Confirmación de datos</h1>
            <table>
                <tbody>
                    <tr>
                        <td> <span>Nombre</span> </td>
                        <td> <span>Apellido</span> </td>
                        <td> <span>DNI</span> </td>
                        <td> <span>E-mail</span> </td>
                        <td> <span>Turno</span> </td>
                    </tr>
                    <tr>
                        <td>  <asp:Label runat="server" id="txtNombre"/> </td>
                        <td>  <asp:Label runat="server" id="txtApellido"/></td>
                        <td>  <asp:Label runat="server" id="txtDocumento"/> </td>
                        <td>  <asp:Label runat="server" id="txtEmail"/> </td>
                        <td>  <asp:Label runat="server" id="txtTurno"/> </td> 
                    </tr>
                </tbody>
            </table>

            <asp:TextBox runat="server" id="txtComentario" TextMode="MultiLine" Columns="50" Rows="5" placeholder="Ingrese un comentario"/>
            <br />
            <asp:Button Text="Agregar comentario" runat="server" id="btnEnviarComentario" onClick="Enviar_Click"/>
        </div>
    </form>
</body>
</html>
