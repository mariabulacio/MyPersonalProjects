<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="ListadoComentarios.aspx.cs" Inherits="Parcial2_Grupo6.ListadoComentarios" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title>Mostrar Datos</title>
    <script defer="defer" src="src/JS/index.js"></script>
</head>
<body>
    <form id="form1" runat="server">
        <div>
            <asp:GridView runat="server" ID="GridView1" AutoGenerateColumns="False" BorderStyle="Solid" BorderWidth="10px">
                <Columns>
                    <asp:BoundField DataField="dni_alumno" HeaderText="DNI"/>
                    <asp:BoundField DataField="apellido_alumno" HeaderText="Apellido"/>
                    <asp:BoundField DataField="comentario_alumno" HeaderText="Comentario"/>
                </Columns>
            </asp:GridView>
            <br />
            <asp:Button Text="Volver" runat="server" onClick="Volver_Click"/>
        </div>
    </form>
</body>
</html>
