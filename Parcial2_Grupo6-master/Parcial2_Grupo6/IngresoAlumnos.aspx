<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="IngresoAlumnos.aspx.cs" Inherits="Parcial2_Grupo6.IngresoAlumnos" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title>Ingreso Alumnos</title>
    <link href="src/CSS/style.css" rel="stylesheet" />
    <script defer="defer" src="src/JS/formulario.js"></script>
</head>

<body>
    <form id="form1" runat="server">
        <div>
            <table>
                <thead>
                    <tr>
                        <th id="labelDT" colspan="6">
                            <asp:Label Text="Datos Personales" runat="server" class="enfocada"/> <%--no es un TextBox pero asi coincide con la imagen del pdf--%>
                         </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td rowspan="2" colspan="2">
                            <asp:Label Text="Datos obligatorios" runat="server" class="obligatorio"/>
                        </td>
                        <td> 
                            <asp:Label Text="Apellido" runat="server" class="obligatorio"/>
                        </td>
                        <td>
                            <asp:TextBox runat="server" id="txtApellido" class="desenfocada"/>
                        </td>
                        <td>
                            <asp:Label Text="Nombre" runat="server" class="obligatorio"/>
                        </td>
                        <td>
                            <asp:TextBox runat="server" id="txtNombre" class="desenfocada"/>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <asp:Label Text="DNI" runat="server" class="obligatorio"/>
                        </td>
                        <td>
                            <asp:TextBox runat="server" id="txtDocumento" class="desenfocada"/>
                        </td>
                        <td>
                            <asp:Label Text="E-mail" runat="server" class="obligatorio"/>
                        </td>
                        <td>
                            <asp:TextBox runat="server" id="txtEmail" class="desenfocada"/>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <asp:Label Text="Preferencias" runat="server" class="preferencias"/>
                        </td>
                        <td>
                            <asp:Label Text="Turno" runat="server" class="preferencias"/>
                        </td>
                        <td colspan="4" >
                            <asp:DropDownList runat="server" ID="ddlTurnos" class="desenfocada"> </asp:DropDownList>
                        </td>
                    </tr>
                </tbody>

                <tfoot>
                    <tr>
                        <td colspan="6">
                            <asp:Button Text="Enviar" runat="server" id="btnEnviar" onClick="Enviar_Click"/>
                            <input type="reset" name="Limpiar" value="Limpiar" />
                        </td>
                    </tr>
                </tfoot>
            </table>
            <br />
            <asp:Button Text="Ver listado" runat="server" onClick="Listado_Click"/>
        </div>
    </form>
</body>
</html>
