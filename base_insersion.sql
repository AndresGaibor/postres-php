use tienda_postres;
INSERT INTO Producto(nombre_producto, precio, stock, img_url) VALUES('Torta de Chocolate', 20.00, 10, 'https://cdn0.recetasgratis.net/es/posts/4/8/8/torta_humeda_de_chocolate_decorada_47884_orig.jpg');

--  https://content-cocina.lecturas.com/medio/2022/01/19/paso_a_paso_para_realizar_tarta_de_flan_con_galletas_y_chocolate_sin_azucar_resultado_final_1ce8842f_600x600.jpg
INSERT INTO Producto(nombre_producto, precio, stock, img_url) VALUES('Tarta de Flan con Galletas y Chocolate', 25.00, 10, 'https://content-cocina.lecturas.com/medio/2022/01/19/paso_a_paso_para_realizar_tarta_de_flan_con_galletas_y_chocolate_sin_azucar_resultado_final_1ce8842f_600x600.jpg');
--  https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQvyJlCEW4RI5EL_yrpa3L0fbt1VagA_6GE8KgNB1UcyQ&s
INSERT INTO Producto(nombre_producto, precio, stock, img_url) VALUES('Tarta de Queso', 30.00, 10, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQvyJlCEW4RI5EL_yrpa3L0fbt1VagA_6GE8KgNB1UcyQ&s');
--  https://www.recetasnestle.com.mx/sites/default/files/styles/crop_recipe_card/public/srh_recipes/54c6cbcbc6d611e056122d64560cd9c1.jpg.webp?itok=j5bk2Uro
INSERT INTO Producto(nombre_producto, precio, stock, img_url) VALUES('Flan', 35.00, 10, 'https://www.recetasnestle.com.mx/sites/default/files/styles/crop_recipe_card/public/srh_recipes/54c6cbcbc6d611e056122d64560cd9c1.jpg.webp?itok=j5bk2Uro');
--  https://mandolina.co/wp-content/uploads/2023/06/postre-de-maracuya.png
INSERT INTO Producto(nombre_producto, precio, stock, img_url) VALUES('Postre de Maracuya', 40.00, 10, 'https://mandolina.co/wp-content/uploads/2023/06/postre-de-maracuya.png');
-- https://images.hola.com/imagenes/cocina/noticiaslibros/20220509209297/recetas-postres-franceses/1-84-447/interior-postres-adobe-a.jpg
INSERT INTO Producto(nombre_producto, precio, stock, img_url) VALUES('Alfajores', 45.00, 10, 'https://images.hola.com/imagenes/cocina/noticiaslibros/20220509209297/recetas-postres-franceses/1-84-447/interior-postres-adobe-a.jpg');
--  https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQTZpSYY9EkFIEu9YAGEKCYazICZOahqPiHbj8tkOI2qg&s
INSERT INTO Producto(nombre_producto, precio, stock, img_url) VALUES('Copa de oreo', 50.00, 10, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQTZpSYY9EkFIEu9YAGEKCYazICZOahqPiHbj8tkOI2qg&s');
-- INSERTAR CATEGORIAS
INSERT INTO Categoria(nombre_categoria) VALUES('Helado');
INSERT INTO Categoria(nombre_categoria) VALUES('Galleta');


INSERT INTO Provincia(nombre_provincia) VALUES('Azuay');
INSERT INTO Ciudad(nombre_ciudad, provincia_id) VALUES('Cuenca', 2);

INSERT INTO Provincia(nombre_provincia) VALUES('Bolívar');
INSERT INTO Ciudad(nombre_ciudad, provincia_id) VALUES('Guaranda', 3);
INSERT INTO Ciudad(nombre_ciudad, provincia_id) VALUES('Chillanes', 3);
INSERT INTO Ciudad(nombre_ciudad, provincia_id) VALUES('Chimbo', 3);
INSERT INTO Ciudad(nombre_ciudad, provincia_id) VALUES('Echeandía', 3);
INSERT INTO Ciudad(nombre_ciudad, provincia_id) VALUES('San Miguel', 3);


INSERT INTO Provincia(nombre_provincia) VALUES('Cañar');
INSERT INTO Ciudad(nombre_ciudad, provincia_id) VALUES('Azogues', 4);
INSERT INTO Ciudad(nombre_ciudad, provincia_id) VALUES('El Tambo', 4);

INSERT INTO Provincia(nombre_provincia) VALUES('Carchi');
INSERT INTO Ciudad(nombre_ciudad, provincia_id) VALUES('Tulcán', 5);


INSERT INTO Provincia(nombre_provincia) VALUES('Chimborazo');
INSERT INTO Ciudad(nombre_ciudad, provincia_id) VALUES('Riobamba', 6);
INSERT INTO Ciudad(nombre_ciudad, provincia_id) VALUES('Guano', 6);
INSERT INTO Ciudad(nombre_ciudad, provincia_id) VALUES('Alausí', 6);
INSERT INTO Ciudad(nombre_ciudad, provincia_id) VALUES('Colta', 6);
INSERT INTO Ciudad(nombre_ciudad, provincia_id) VALUES('Chambo', 6);
INSERT INTO Ciudad(nombre_ciudad, provincia_id) VALUES('Chunchi', 6);
INSERT INTO Ciudad(nombre_ciudad, provincia_id) VALUES('Cumandá', 6);

INSERT INTO Provincia(nombre_provincia) VALUES('Cotopaxi');
INSERT INTO Ciudad(nombre_ciudad, provincia_id) VALUES('Latacunga', 7);

INSERT INTO Provincia(nombre_provincia) VALUES('El Oro');
INSERT INTO Ciudad(nombre_ciudad, provincia_id) VALUES('Machala', 8);

INSERT INTO Provincia(nombre_provincia) VALUES('Esmeraldas');
INSERT INTO Ciudad(nombre_ciudad, provincia_id) VALUES('Ciudad Esmeraldas', 9);
INSERT INTO Ciudad(nombre_ciudad, provincia_id) VALUES('Atacames', 9);

INSERT INTO Provincia(nombre_provincia) VALUES('Galápagos');
INSERT INTO Ciudad(nombre_ciudad, provincia_id) VALUES('Puerto Baquerizo Moreno', 10);

INSERT INTO Provincia(nombre_provincia) VALUES('Guayas');
INSERT INTO Ciudad(nombre_ciudad, provincia_id) VALUES('Guayaquil', 11);

INSERT INTO Provincia(nombre_provincia) VALUES('Imbabura');
INSERT INTO Ciudad(nombre_ciudad, provincia_id) VALUES('Ibarra', 12);

INSERT INTO Provincia(nombre_provincia) VALUES('Loja');
INSERT INTO Ciudad(nombre_ciudad, provincia_id) VALUES('Loja', 13);

INSERT INTO Provincia(nombre_provincia) VALUES('Los Ríos');
INSERT INTO Ciudad(nombre_ciudad, provincia_id) VALUES('Babahoyo', 14);

INSERT INTO Provincia(nombre_provincia) VALUES('Manabí');
INSERT INTO Ciudad(nombre_ciudad, provincia_id) VALUES('Portoviejo', 15);

INSERT INTO Provincia(nombre_provincia) VALUES('Morona Santiago');
INSERT INTO Ciudad(nombre_ciudad, provincia_id) VALUES('Macas', 16);

INSERT INTO Provincia(nombre_provincia) VALUES('Napo');
INSERT INTO Ciudad(nombre_ciudad, provincia_id) VALUES('Tena', 17);

INSERT INTO Provincia(nombre_provincia) VALUES('Orellana');
INSERT INTO Ciudad(nombre_ciudad, provincia_id) VALUES('Francisco de Orellana', 18);

INSERT INTO Provincia(nombre_provincia) VALUES('Pastaza');
INSERT INTO Ciudad(nombre_ciudad, provincia_id) VALUES('Puyo', 19);

-- INSERT INTO Provincia(nombre_provincia) VALUES('Pichincha');
-- INSERT INTO Ciudad(nombre_ciudad, provincia_id) VALUES('Quito', 20);

INSERT INTO Provincia(nombre_provincia) VALUES('Santa Elena');
INSERT INTO Ciudad(nombre_ciudad, provincia_id) VALUES('Santa Elena', 20);

INSERT INTO Provincia(nombre_provincia) VALUES('Santo Domingo de los Tsáchilas');
INSERT INTO Ciudad(nombre_ciudad, provincia_id) VALUES('Santo Domingo', 21);

INSERT INTO Provincia(nombre_provincia) VALUES('Sucumbíos');
INSERT INTO Ciudad(nombre_ciudad, provincia_id) VALUES('Nueva Loja', 22);

INSERT INTO Provincia(nombre_provincia) VALUES('Tungurahua');
INSERT INTO Ciudad(nombre_ciudad, provincia_id) VALUES('Ambato', 23);
INSERT INTO Ciudad(nombre_ciudad, provincia_id) VALUES('Baños de Agua Santa', 23);

INSERT INTO Provincia(nombre_provincia) VALUES('Zamora Chinchipe');
INSERT INTO Ciudad(nombre_ciudad, provincia_id) VALUES('Zamora', 24);