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