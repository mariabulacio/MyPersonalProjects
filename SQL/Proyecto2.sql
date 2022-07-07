create database COMPRA

create table CLIENTE
(id_CLIENTE int IDENTITY (1,1), 
Nombrecliente varchar (200),
Apellidocliente varchar (200),
Direccioncliente varchar (200),
CONSTRAINT PK_id_CLIENTE PRIMARY KEY (id_CLIENTE))

create table EMPLEADOS
(id_EMPLEADOS int IDENTITY (1,1), 
Nombreempleado varchar (200),
Apellidoempleado varchar (200),
Porcentajequelecorresponde float,
fechacontrato date,
CONSTRAINT PK_id_EMPLEADOS PRIMARY KEY (id_EMPLEADOS))



create table PROVEEDORES
(id_PROVEEDORES int IDENTITY (1,1), 
Nombreproveedor varchar (200),
Apellidoproveedor varchar (200),
CONSTRAINT PK_id_PROVEEDORES PRIMARY KEY (id_PROVEEDORES))



create table PRODUCTOS
(id_PRODUCTOS int IDENTITY (2,2), 
Descripcion varchar (200),
CantStock int,
Preciounitarioacobrar float,
Preciounitarioapagar float,
id_PROVEEDORES int, 
CONSTRAINT PK_id_PRODUCTOS PRIMARY KEY (id_PRODUCTOS),
CONSTRAINT fk_id_PROVEEDORES FOREIGN KEY (id_PROVEEDORES) references PROVEEDORES (id_PROVEEDORES))

create table ENCABEZADOFACT
(id_FACTURA int IDENTITY (1,1), 
fechadefactura date,
id_EMPLEADOS int, 
id_CLIENTE int, 
CONSTRAINT PK_id_FACTURA PRIMARY KEY (id_FACTURA),
CONSTRAINT fk_id_EMPLEADOS FOREIGN KEY (id_EMPLEADOS) references EMPLEADOS (id_EMPLEADOS),
CONSTRAINT fk_id_CLIENTE FOREIGN KEY (id_CLIENTE) references CLIENTE (id_CLIENTE))

create table LINEAFACT
(cantcomprada int,
id_PRODUCTOS int, 
id_FACTURA int, 
CONSTRAINT fk_id_PRODUCTOS FOREIGN KEY (id_PRODUCTOS) references PRODUCTOS (id_PRODUCTOS),
CONSTRAINT fk_id_FACTURA  FOREIGN KEY (id_FACTURA ) references ENCABEZADOFACT (id_FACTURA ),
CONSTRAINT PK_id_LINEAFACT PRIMARY KEY (id_PRODUCTOS, id_FACTURA))



insert into CLIENTE
(Nombrecliente,
Apellidocliente,
Direccioncliente) values 
('Ricardo', 'Mollo', 'Hurlingham 38')

insert into PROVEEDORES
(Nombreproveedor,
Apellidoproveedor) values 
('Diego', 'Arnedo'),
('Diegote', 'Maradona'),
('Leo', 'Messi')

insert into PRODUCTOS
(CantStock,
Descripcion,
Preciounitarioacobrar,
Preciounitarioapagar,
id_PROVEEDORES) values 
(8,'Vinito', 850.36, 900,1),
(10,'Fernet', 850, 1000,2)

insert into ENCABEZADOFACT
(fechadefactura) values
('11/22/2021')

insert into LINEAFACT
(cantcomprada) values
(12)

insert into EMPLEADOS
(Nombreempleado,
Apellidoempleado,
Porcentajequelecorresponde,
fechacontrato)values
('Maria', 'Bulacio',18.5,'1984-05-2'),
('Elton', 'Mbappe',11,'1987-03-25'),
('Luciana', 'Drogba',11,'1986-07-11')


alter table PRODUCTOS
drop column preciounitarioapagar

alter table PRODUCTOS
drop column preciounitarioacobrar

alter table PRODUCTOS
add preciodecobro float

alter table PRODUCTOS
add preciodepago float


select COUNT(PRO.id_PROVEEDORES), PRO.Apellidoproveedor, PRO.Nombreproveedor from PROVEEDORES PRO
inner join PRODUCTOS P on  PRO.id_PROVEEDORES=P.id_PROVEEDORES
group by PRO.Apellidoproveedor, PRO.Nombreproveedor




select P.id_PRODUCTOS, P.descripcion from LINEAFACT LF
right join PRODUCTOS P  on LF.id_PRODUCTOS=P.id_PRODUCTOS
where lf.id_FACTURA is null


select LF.id_FACTURA,sum(LF.cantcomprada*P.preciodecobro) monto from ENCABEZADOFACT ENC
inner join LINEAFACT LF on LF.id_FACTURA=ENC.id_FACTURA
inner join PRODUCTOS P on P.id_PRODUCTOS=LF.id_PRODUCTOS
where LF.id_FACTURA=1
group by LF.id_FACTURA, LF.cantcomprada, P.preciodecobro


select * from EMPLEADOS
where fechacontrato between '1985-07-02' AND '1989-03-27'

select LF.id_FACTURA,sum(LF.cantcomprada*P.preciodecobro) monto from ENCABEZADOFACT ENC
inner join LINEAFACT LF on LF.id_FACTURA=ENC.id_FACTURA
inner join PRODUCTOS P on P.id_PRODUCTOS=LF.id_PRODUCTOS
where LF.id_FACTURA=1
group by LF.id_FACTURA,LF.cantcomprada, P.preciodecobro
