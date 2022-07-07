<%
  Response.Cookies("nameUser")=Request.Form("firstName")
  Response.Cookies("lastNameUser")=Request.Form("lastName")
  Response.Cookies("email")=Request.Form("email")
  Response.Cookies("tickets")=Request.Form("tickets")
  Response.Cookies("price")=Request.Form("price")
  Response.Cookies("card")=Request.Form("card")
 %>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>POST Confirm</title>
  </head>

  <style>

    tbody {
        background-color: #e4f0f5;
    }

    table {
        border-collapse: collapse;
        border: 2px solid rgb(200, 200, 200);
        letter-spacing: 1px;
        font-family: sans-serif;
        font-size: .8rem;
    }

    td
    {
        border: 1px solid rgb(190, 190, 190);
        padding: 5px 10px;
    }

    #qr {
        width: 200px;
        height: 200px;
        margin: 20px 20px;
    }

    </style>

  <body>
    <h1>Por favor, confirme la compra haciendo click en el QR</h1>
    <table>
      <tr>
          <td><strong>Encuentro:</strong> <% Response.Write(Request.Form("games")) %></td>
          <td><strong>Ubicacion:</strong> <% Response.Write(Request.Form("location")) %> </td>
          <td><strong>Cantidad:</strong>  <% Response.Write(Request.Form("tickets")) %> </td>
          <td><strong>Precio:</strong> $ <% Response.Write(Request.Form("price")) %> </td>
      </tr>

      <tr>
          <td><strong>Apellido:</strong> <% Response.Write(Request.Form("lastName")) %></td>
          <td><strong>Nombre:</strong> <% Response.Write(Request.Form("firstName")) %> </td>
          <td><strong>E-mail:</strong> <% Response.Write(Request.Form("email")) %> </td>
          <td><strong>Tarjeta:</strong> <% Response.Write(Request.Form("card")) %> </td>
      </tr>
  </table>

  <a href="finalize.asp" rel="noopener noreferrer">
    <img src="./assets/img/qr.png" alt="qr" id="qr" />
  </a>

  </body>
</html>
