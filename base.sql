CREATE DATABASE tienda_postres
    DEFAULT CHARACTER SET = 'utf8mb4';

USE tienda_postres;

CREATE TABLE Provincia(
    id int AUTO_INCREMENT,
    nombre_provincia varchar(50),
    PRIMARY KEY (id)
);

CREATE TABLE Ciudad(
    id int AUTO_INCREMENT,
    nombre_ciudad varchar(50),
    provincia_id int,
    PRIMARY KEY (id),
    FOREIGN KEY (provincia_id) REFERENCES Provincia(id)
);

CREATE TABLE Direccion(
    id int AUTO_INCREMENT,
    calle_principal varchar(50),
    calle_secundaria varchar(50),
    ciudad_id int,
    PRIMARY KEY (id),
    FOREIGN KEY (ciudad_id) REFERENCES Ciudad(id)
);

CREATE TABLE Usuario(
    id int AUTO_INCREMENT,
    nombre varchar(50),
    apellido varchar(50),
    direccion_id int,
    correo varchar(100) UNIQUE,
    clave VARCHAR(100),
    rol VARCHAR(10) DEFAULT 'cliente',
    telefono VARCHAR(10),
    PRIMARY KEY (id),
    FOREIGN KEY (direccion_id) REFERENCES Direccion(id)
);

CREATE TABLE Producto(
    id int AUTO_INCREMENT,
    nombre_producto varchar(50),
    precio DECIMAL(10,2),
    stock int,
    img_url varchar(150),
    PRIMARY KEY (id)
);

CREATE TABLE Ingrediente(
    id int AUTO_INCREMENT,
    nombre_ingrediente varchar(50),
    PRIMARY KEY (id)
);

CREATE TABLE ProductoIngrediente(
    id int AUTO_INCREMENT,
    producto_id int,
    ingrediente_id int,
    PRIMARY KEY (id),
    FOREIGN KEY (producto_id) REFERENCES Producto(id),
    FOREIGN KEY (ingrediente_id) REFERENCES Ingrediente(id)
);

CREATE TABLE Categoria(
    id int AUTO_INCREMENT,
    nombre_categoria varchar(50),
    PRIMARY KEY (id)
);

CREATE TABLE ProductoCategoria(
    id int AUTO_INCREMENT,
    producto_id int,
    categoria_id int,
    PRIMARY KEY (id),
    FOREIGN KEY (producto_id) REFERENCES Producto(id),
    FOREIGN KEY (categoria_id) REFERENCES Categoria(id)
);

CREATE TABLE Pedido(
    id int AUTO_INCREMENT,
    usuario_id int,
    fecha_pedido DATE,
    subtotal DECIMAL(10,2),
    iva DECIMAL(10,2),
    total DECIMAL(10,2),
    PRIMARY KEY (id),
    FOREIGN KEY (usuario_id) REFERENCES Usuario(id)
);

CREATE TABLE DetallePedido(
    id int AUTO_INCREMENT,
    pedido_id int,
    producto_id int,
    cantidad int,
    precio DECIMAL(10,2),
    iva DECIMAL(10,2),
    PRIMARY KEY (id),
    FOREIGN KEY (pedido_id) REFERENCES Pedido(id),
    FOREIGN KEY (producto_id) REFERENCES Producto(id)
);

INSERT INTO Provincia(nombre_provincia) VALUES('Pichincha');
INSERT INTO Ciudad(nombre_ciudad, provincia_id) VALUES('Quito', 1);
INSERT INTO Direccion(calle_principal, calle_secundaria, ciudad_id) VALUES('Av. 6 de Diciembre', 'NNUU', 1);
INSERT INTO Usuario(nombre, apellido, direccion_id, correo, clave, rol, telefono) 
                            VALUES('Andres', 'Gaibor', 1, 'androymartin99@gmail.com', '1234', 'admin', '0987654321');

INSERT INTO Producto(nombre_producto, precio, stock, img_url) VALUES('Torta de Chocolate', 20.00, 10, 'https://cdn0.recetasgratis.net/es/posts/4/8/8/torta_humeda_de_chocolate_decorada_47884_orig.jpg');
INSERT INTO Ingrediente(nombre_ingrediente) VALUES('Chocolate');
INSERT INTO ProductoIngrediente(producto_id, ingrediente_id) VALUES(1, 1);
INSERT INTO Categoria(nombre_categoria) VALUES('Tortas');
INSERT INTO ProductoCategoria(producto_id, categoria_id) VALUES(1, 1);

INSERT INTO Pedido(usuario_id, fecha_pedido, subtotal, iva, total) VALUES(1, '2023-12-12', 20.00, 2.00, 22.00);
INSERT INTO DetallePedido(pedido_id, producto_id, cantidad, precio, iva) VALUES(1, 1, 1, 20.00, 2.00);
-- actualizar el stock 
UPDATE Producto SET stock = stock - 1 WHERE id = 1;