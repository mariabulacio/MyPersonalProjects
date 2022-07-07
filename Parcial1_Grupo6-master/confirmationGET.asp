<%  
  Response.Cookies("nameUser")=Request.QueryString("firstName")
  Response.Cookies("lastNameUser")=Request.QueryString("lastName")
  Response.Cookies("email")=Request.QueryString("email")
  Response.Cookies("tickets")=Request.QueryString("tickets")
  Response.Cookies("price")=Request.QueryString("price")
  Response.Cookies("card")=Request.QueryString("card")
%>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GET Confirm</title>
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
          <td><strong>Encuentro:</strong> <% Response.Write(Request.QueryString("games")) %></td>
          <td><strong>Ubicacion:</strong> <% Response.Write(Request.QueryString("location")) %> </td>
          <td><strong>Cantidad:</strong>  <% Response.Write(Request.QueryString("tickets")) %> </td>
          <td><strong>Precio:</strong> $ <% Response.Write(Request.QueryString("price")) %> </td>
      </tr>

      <tr>
          <td><strong>Apellido:</strong> <% Response.Write(Request.QueryString("lastName")) %></td>
          <td><strong>Nombre:</strong> <% Response.Write(Request.QueryString("firstName")) %> </td>
          <td><strong>E-mail:</strong> <% Response.Write(Request.QueryString("email")) %> </td>
          <td><strong>Tarjeta:</strong> <% Response.Write(Request.QueryString("card")) %> </td>
      </tr>
  </table>

  <a href="finalize.asp" rel="noopener noreferrer">
    <img src="./assets/img/qr.png" alt="qr" id="qr" />
  </a>

  </body>
</html>
