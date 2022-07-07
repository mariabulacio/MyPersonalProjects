use Northwind
/*1 Esta consulta DEBE dar resultados. Si su BD no tiene
un dato que cumpla lo solicitado, cárguelo (debe incluir
el código insert correspondiente)
Categorías que no tiene productos*/

INSERT INTO Categories VALUES ('9', 'Seafood', 'Fish of sea')
SELECT CategoryID FROM Categories WHERE CategoryID NOT IN (SELECT CategoryID FROM Products)

/*2 Se necesita el listado de ordenes que fueron realizados
por los clientes cuyo id es TORTU Y RATTC, debiendo
verse los clientes que adquirieron la orden, el nro de
orden, el identificador del cliente, la fecha de la orden,
nombre y apellido del vendedor.*/

SELECT C.CompanyName ClienteOrden, O.OrderID NumeroOrden, C.CustomerID IDCliente, O.OrderDate FechaOrden, E.FirstName NombreVendedor, E.LastName ApellidoVendedor FROM Orders O 
INNER JOIN Customers C ON C.CustomerID = O.CustomerID 
INNER JOIN Employees E ON E.EmployeeID = O.EmployeeID
WHERE C.CustomerID IN ('TORTU','RATTC')

/*3 Se necesita un listado de los empleados que vendieron
productos provistos por proveedores provenientes de
los países EEUU y Australia y el título del contacto (del
proveedor) contenga la palabra ventas (sales en
inglés)
Debe verse, nombre y apellido del empleado, nombre
del proveedor, la ciudad, la región y todas las líneas de
las ordenes de compra realizadas.*/

SELECT E.FirstName NombreEmpleado, E.LastName ApellidoEmpleado, S.CompanyName NombreProveedor, S.City Ciudad, S.Region Region, O.* 
FROM Employees E 
INNER JOIN Orders O ON E.EmployeeID = O.EmployeeID
INNER JOIN [Order Details] OD ON O.OrderID = OD.OrderID
INNER JOIN Products P ON OD.ProductID = P.ProductID
INNER JOIN Suppliers S ON S.SupplierID = P.SupplierID
WHERE (S.Country = 'Australia' OR S.Country = 'USA') AND S.ContactTitle LIKE '%sales%'

/*4 Se necesita un listado que muestre el identificador de
empleado, la cantidad de pedidos, el apellido del
empleado el total de envio de cada empleado, el
promedio de envíos de cada empleado, cuya cantidad
de pedidos de cada empleado sea superior a 100*/

SELECT E.EmployeeID IDEmpleado, COUNT(O.OrderID) AS CantidadPedidos, E.LastName ApellidoEmpleado, 
SUM(OD.Quantity*OD.UnitPrice) TotalEnvios, AVG(OD.Quantity*OD.UnitPrice) PromedioEnvios FROM Employees E
INNER JOIN Orders O ON O.EmployeeID = E.EmployeeID
INNER JOIN [Order Details] OD ON O.OrderID = OD.OrderID
GROUP BY E.EmployeeID, E.LastName
HAVING COUNT(O.OrderID) > 100

/*5 Se necesita un listado que muestre la cantidad de
ordenes pedidas por cada cliente, debiendo aparecer
el nombre del cliente, la cantidad de ordenes pedidas
por cada uno y un total de todas las ordenes pedidas*/

SELECT C.CompanyName NombreCliente, COUNT(O.OrderID) CantidadOrdenesPedidas 
FROM Orders O 
INNER JOIN Customers C ON O.CustomerID = C.CustomerID
GROUP BY C.CustomerID, C.CompanyName
