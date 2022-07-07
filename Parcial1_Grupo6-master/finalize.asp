<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Finalize</title>
  </head>

  <style>

    h1 {
      text-align: center;
      font-size: 2rem;
      font-weight: bold;
      margin-top: 20px;
    }	

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
  </style>
  <body>
    <h1>Compra Confirmada</h1>
    <table>
      <tr>
          <td><strong>Nombre: </strong> <% Response.Write(Request.Cookies("nameUser")) %></td>
          <td><strong>Apellido: </strong> <% Response.Write(Request.Cookies("lastNameUser")) %> </td>
          <td><strong>E-mail: </strong> <% Response.Write(Request.Cookies("email")) %> </td>
      </tr>

      <tr>
        <td><strong>Cantidad tickets:</strong>  <% Response.Write(Request.Cookies("tickets")) %> </td>
        <td><strong>Precio total: </strong> $ <% Response.Write(Request.Cookies("price")) %> </td>
        <td><strong>Tarjeta de pago: </strong> <% Response.Write(Request.Cookies("card")) %> </td>
      </tr>
  </table>

  <footer>
    <h4>Gracias por su compra</h4>
  </footer>
  </body>
</html>
