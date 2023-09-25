CREATE DATABASE app;

USE app;

CREATE TABLE `categoria` (
  `id_cat` int(2) NOT NULL,
  `nombre` char(25) NOT NULL,
  `tipo` char(25) NOT NULL,
  `precio_x_uni` int(6) NOT NULL,
  `cantidad` int(4) NOT NULL,
  `id_prov` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `categoria` (`id_cat`, `nombre`, `tipo`, `precio_x_uni`, `cantidad`, `id_prov`) VALUES
(1, 'Televisores', 'Electronico', 1500000, 10, 101),
(2, 'Portatiles', 'Electronico', 1000000, 5, 106),
(3, 'Computadores', 'Electronico', 1500000, 5, 103),
(4, 'Neveras', 'Electrodomestico', 1000000, 5, 105),
(5, 'Celulares', 'Celular', 500000, 15, 104),
(6, 'Lavadoras', 'Electrodomestico', 750000, 10, 102);

CREATE TABLE `detalles` (
  `id_det` int(7) NOT NULL,
  `descripcion` text NOT NULL,
  `valor_x_uni` int(8) NOT NULL,
  `id_fact` int(5) NOT NULL,
  `id_prod` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `detalles` (`id_det`, `descripcion`, `valor_x_uni`, `id_fact`, `id_prod`) VALUES
(101, 'celular', 1000000, 10001, 1020),
(102, 'televisor', 2100000, 10002, 1001),
(103, 'celular', 1000000, 10003, 1030);

CREATE TABLE `empleados` (
  `id_emp` int(2) NOT NULL,
  `nombre` char(20) NOT NULL,
  `telefono` char(15) DEFAULT NULL,
  `direccion` char(30) DEFAULT NULL,
  `cedula` char(15) NOT NULL,
  `cargo` char(15) NOT NULL,
  `id_sede` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `empleados` (`id_emp`, `nombre`, `telefono`, `direccion`, `cedula`, `cargo`, `id_sede`) VALUES
(1, 'Nicolas Gomez', '322 387 9145', 'cll 41c #78n-49 sur', '1032491834', 'administrador', 1),
(2, 'Marcela Hortua', '315 677 8901', 'cra 29 #33-59', '99876120', 'vendedor', 1),
(3, 'Kevin Lozano', '318 371 6970', 'cra 104 #22-4', '1030489971', 'vendedor', 2),
(4, 'Carlos Barreto', '310 478 9344', 'cll 34 #88b-45', '86777129', 'vendedor', 3);

CREATE TABLE `facturas` (
  `id_fact` int(5) NOT NULL,
  `fecha` date NOT NULL,
  `valor_total` int(9) NOT NULL,
  `id_sede` int(3) NOT NULL,
  `id_emp` int(2) NOT NULL,
  `id_user` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `facturas` (`id_fact`, `fecha`, `valor_total`, `id_sede`, `id_emp`, `id_user`) VALUES
(10001, '2017-10-10', 1190000, 1, 2, 105),
(10002, '2017-10-10', 2499000, 1, 2, 105),
(10003, '2017-10-10', 1190000, 1, 2, 105);

CREATE TABLE `producto` (
  `id_prod` int(5) NOT NULL,
  `descripcion` text NOT NULL,
  `color` char(15) DEFAULT NULL,
  `peso` char(10) DEFAULT NULL,
  `fecha_i` date NOT NULL,
  `precio_v` int(8) NOT NULL,
  `id_cat` int(3) NOT NULL,
  `id_sede` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `producto` (`id_prod`, `descripcion`, `color`, `peso`, `fecha_i`, `precio_v`, `id_cat`, `id_sede`) VALUES
(1001, 'Televisor LG LED de 55", conexion a internet y puertos HDMI y USB. ', 'Gris', '15 KG', '2017-05-20', 2300000, 1, 1),
(1002, 'Televisor LG LED de 55", conexion a internet y puertos HDMI y USB.', 'Gris', '15 KG', '2017-05-20', 2300000, 1, 1),
(1003, 'Televisor LG LED de 55", conexion a internet y puertos HDMI y USB.', 'Gris', '15 KG', '2017-05-20', 2300000, 1, 1),
(1004, 'Televisor LG LED de 55", conexion a internet y puertos HDMI y USB.', 'Gris', '15 KG', '2017-05-20', 2300000, 1, 1),
(1005, 'Televisor LG LED de 55", conexion a internet y puertos HDMI y USB.', 'Gris', '15 KG', '2017-05-20', 2300000, 1, 2),
(1006, 'Televisor LG LED de 55", conexion a internet y puertos HDMI y USB.', 'Negro', '15 KG', '2017-05-20', 2100000, 1, 2),
(1007, 'Televisor LG LED de 55", conexion a internet y puertos HDMI y USB.', 'Negro', '15 KG', '2017-05-20', 2100000, 1, 2),
(1008, 'Televisor LG LED de 55", conexion a internet y puertos HDMI y USB.', 'Negro', '15 KG', '2017-05-20', 2100000, 1, 3),
(1009, 'Televisor LG LED de 55", conexion a internet y puertos HDMI y USB.', 'Negro', '15 KG', '2017-05-20', 2100000, 1, 3),
(1010, 'Televisor LG LED de 55", conexion a internet y puertos HDMI y USB.', 'Negro', '15 KG', '2017-05-20', 2100000, 1, 3),
(1011, 'Portatil Lenovo de 15", RAM de 4GB y disco duro de 500GB y procesador intel i5', 'Azul', '3 KG', '2017-12-20', 1300000, 2, 1),
(1012, 'Portatil Lenovo de 15", RAM de 4GB y disco duro de 500GB y procesador intel i5', 'Azul', '3 KG', '2017-12-20', 1300000, 2, 2),
(1013, 'Portatil Lenovo de 15", RAM de 4GB y disco duro de 500GB y procesador intel i5', 'Rojo', '3 KG', '2017-12-20', 1300000, 2, 1),
(1014, 'Portatil Lenovo de 15", RAM de 4GB y disco duro de 500GB y procesador intel i5', 'Rojo', '3 KG', '2017-02-12', 1300000, 2, 2),
(1015, 'Portatil Lenovo de 15", RAM de 4GB y disco duro de 500GB y procesador intel i5', 'Azul', '3 KG', '2017-12-20', 1300000, 2, 3),
(1016, 'Celular Huawei de 5.8", camara de alta definicion, e internet y conexion de Datos 4G.', 'Blanco', '250 g', '2017-10-10', 1000000, 5, 1),
(1017, 'Celular Huawei de 5.8", camara de alta definicion, e internet y conexion de Datos 4G.', 'Gris', '250 g', '2017-10-10', 1000000, 5, 1),
(1018, 'Celular Huawei de 5.8", camara de alta definicion, e internet y conexion de Datos 4G.', 'Negro', '250 g', '2017-10-10', 1000000, 5, 1),
(1019, 'Celular Huawei de 5.8", camara de alta definicion, e internet y conexion de Datos 4G.', 'Azul', '250 g', '2017-10-10', 1000000, 5, 1),
(1020, 'Celular Huawei de 5.8", camara de alta definicion, e internet y conexion de Datos 4G.', 'Rojo', '250 g', '2017-10-10', 1000000, 5, 1),
(1021, 'Celular Huawei de 5.8", camara de alta definicion, e internet y conexion de Datos 4G.', 'Blanco', '250 g', '2017-10-10', 1000000, 5, 2),
(1022, 'Celular Huawei de 5.8", camara de alta definicion, e internet y conexion de Datos 4G.', 'Gris', '250 g', '2017-10-10', 1000000, 5, 2),
(1023, 'Celular Huawei de 5.8", camara de alta definicion, e internet y conexion de Datos 4G.', 'Negro', '250 g', '2017-10-10', 1000000, 5, 2),
(1024, 'Celular Huawei de 5.8", camara de alta definicion, e internet y conexion de Datos 4G.', 'Azul', '250 g', '2017-10-10', 1000000, 5, 2),
(1025, 'Celular Huawei de 5.8", camara de alta definicion, e internet y conexion de Datos 4G.', 'Rojo', '250 g', '2017-10-10', 1000000, 5, 2),
(1026, 'Celular Huawei de 5.8", camara de alta definicion, e internet y conexion de Datos 4G.', 'Blanco', '250 g', '2017-10-10', 1000000, 5, 3),
(1027, 'Celular Huawei de 5.8", camara de alta definicion, e internet y conexion de Datos 4G.', 'Gris', '250 g', '2017-10-10', 1000000, 5, 3),
(1028, 'Celular Huawei de 5.8", camara de alta definicion, e internet y conexion de Datos 4G.', 'Negro', '250 g', '2017-10-10', 1000000, 5, 3),
(1029, 'Celular Huawei de 5.8", camara de alta definicion, e internet y conexion de Datos 4G.', 'Azul', '250 g', '2017-10-10', 1000000, 5, 3),
(1030, 'Celular Huawei de 5.8", camara de alta definicion, e internet y conexion de Datos 4G.', 'Rojo', '250 g', '2017-10-10', 1000000, 5, 3),
(1031, 'Computador Hp de 25", RAM de 8GB, disco duro de 1TB y procesador intel i7', 'Blanco', '7 KG', '2017-08-15', 2000000, 3, 1),
(1032, 'Computador Hp de 25", RAM de 8GB, disco duro de 1TB y procesador intel i7', 'Negro', '7 KG', '2017-08-15', 2000000, 3, 1),
(1033, 'Computador Hp de 25", RAM de 8GB, disco duro de 1TB y procesador intel i7', 'Blanco', '7 KG', '2017-08-15', 2000000, 3, 2),
(1034, 'Computador Hp de 25", RAM de 8GB, disco duro de 1TB y procesador intel i7', 'Negro', '7 KG', '2017-08-15', 2000000, 3, 2),
(1035, 'Computador Hp de 25", RAM de 8GB, disco duro de 1TB y procesador intel i7', 'Blanco', '7 KG', '2017-08-15', 2000000, 3, 3),
(1036, 'Lavadora Samsung de 11,5KG de capacidad, sistema de lavado de burbujas y add wash.', 'Negro', '25 KG', '2017-11-07', 1250000, 6, 1),
(1037, 'Lavadora Samsung de 11,5KG de capacidad, sistema de lavado de burbujas y add wash.', 'Gris', '25 KG', '2017-11-07', 1250000, 6, 1),
(1038, 'Lavadora Samsung de 11,5KG de capacidad, sistema de lavado de burbujas y add wash.', 'Blanco', '25 KG', '2017-11-07', 1250000, 6, 1),
(1039, 'Lavadora Samsung de 11,5KG de capacidad, sistema de lavado de burbujas y add wash.', 'Negro', '25 KG', '2017-11-07', 1250000, 6, 1),
(1040, 'Lavadora Samsung de 11,5KG de capacidad, sistema de lavado de burbujas y add wash.', 'Negro', '25 KG', '2017-11-07', 1250000, 6, 2),
(1041, 'Lavadora Samsung de 11,5KG de capacidad, sistema de lavado de burbujas y add wash.', 'Gris', '25 KG', '2017-11-07', 1250000, 6, 2),
(1042, 'Lavadora Samsung de 11,5KG de capacidad, sistema de lavado de burbujas y add wash.', 'Blanco', '25 KG', '2017-11-07', 1250000, 6, 2),
(1043, 'Lavadora Samsung de 11,5KG de capacidad, sistema de lavado de burbujas y add wash.', 'Blanco', '25 KG', '2017-11-07', 1250000, 6, 2),
(1044, 'Lavadora Samsung de 11,5KG de capacidad, sistema de lavado de burbujas y add wash.', 'Negro', '25 KG', '2017-11-07', 1250000, 6, 3),
(1045, 'Lavadora Samsung de 11,5KG de capacidad, sistema de lavado de burbujas y add wash.', 'Gris', '25 KG', '2017-11-07', 1250000, 6, 3),
(1046, 'Nevera Whirlpool No frost, cajon de enfriamiento, tecnologia de flujo de aire.', 'Gris', '50 KG', '2017-09-25', 1500000, 4, 1),
(1047, 'Nevera Whirlpool No frost, cajon de enfriamiento, tecnologia de flujo de aire.', 'Gris', '50 KG', '2017-09-25', 1500000, 4, 1),
(1048, 'Nevera Whirlpool No frost, cajon de enfriamiento, tecnologia de flujo de aire.', 'Gris', '50 KG', '2017-09-25', 1500000, 4, 2),
(1049, 'Nevera Whirlpool No frost, cajon de enfriamiento, tecnologia de flujo de aire.', 'Gris', '50 KG', '2017-09-25', 1500000, 4, 2),
(1050, 'Nevera Whirlpool No frost, cajon de enfriamiento, tecnologia de flujo de aire.', 'Gris', '50 KG', '2017-09-25', 1500000, 4, 3);

CREATE TABLE `proveedor` (
  `id_prov` int(3) NOT NULL,
  `proveedor` char(25) NOT NULL,
  `NIT` char(15) NOT NULL,
  `direccion` char(30) DEFAULT NULL,
  `telefono` char(15) DEFAULT NULL,
  `Contacto` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `proveedor` (`id_prov`, `proveedor`, `NIT`, `direccion`, `telefono`, `Contacto`) VALUES
(101, 'LG', '800.900.700-3', 'cll 13 #45-55', '755 7070', 'Julian Garcia'),
(102, 'Samsung', '843.983.122-0', 'calle 100 # 16d-8', '456 8989', 'Cristian Espinoza'),
(103, 'Hp', '835.683.752-7', 'cra 60 # 56a-81', '755 1919', 'Manuel Cardona'),
(104, 'Huawei', '930.481.902-4', 'cra 15 # 4-56 sur', '815 2020', 'Jessica fuentes'),
(105, 'Whirlpool', '822.701.826-2', 'calle 33 # 7-12', '766 9889', 'Camila Duarte'),
(106, 'Lenovo', '900.123.456-7', 'calle 45 # 6-71 este', '655 5050', 'Jaime Zapata');

CREATE TABLE `sedes` (
  `id_sede` int(3) NOT NULL,
  `sede` char(15) DEFAULT NULL,
  `telefono` char(15) DEFAULT NULL,
  `direccion` char(30) DEFAULT NULL,
  `director` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `sedes` (`id_sede`, `sede`, `telefono`, `direccion`, `director`) VALUES
(1, 'NORTE', '855 0022', 'cll 150 #21-5', 'Mateo Fernandez'),
(2, 'CENTRO', '915 6666', 'cll 19 #7-12', 'Luis Hurtado'),
(3, 'SUR', '611 2121', 'cra 41 #26-77 sur', 'William Gonzalez');

CREATE TABLE `usuarios` (
  `id_user` int(3) NOT NULL,
  `nomb_u` char(20) DEFAULT NULL,
  `tipo` char(15) NOT NULL,
  `usuario` char(10) NOT NULL,
  `password` char(10) NOT NULL,
  `cedula` char(15) NOT NULL,
  `telefono` char(15) DEFAULT NULL,
  `direccion` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `usuarios` (`id_user`, `nomb_u`, `tipo`, `usuario`, `password`, `cedula`, `telefono`, `direccion`) VALUES
(101, 'Nicolas Gomez', 'Administrador', 'adm1', '12345', '1032491834', '322 387 9145', 'cll 41c # 78n-49 sur'),
(102, 'Marcela Hortua', 'Empleado', 'emp1', '10001', '99876120', '315 677 8901', 'cra 29 #33-59'),
(103, 'Kevin Lozano', 'Empleado', 'emp2', '50505', '1030489971', '318 371 6970', 'cra 104 #22-4'),
(104, 'Carlos Barreto', 'Empleado', 'emp3', '67890', '86777129', '310 478 9344', 'cll 34 #88b-45'),
(105, 'Yaritza Guerrero', 'cliente', 'cli1', '51868', '602884967', '314 758 4746', 'Apartado num.: 181, 9355 Sit C'),
(106, 'Jheremy Garcia', 'cliente', 'cli2', '72214', '35153337', '320 996 4817', 'Apdo.:879-2190 Suspendisse Cal'),
(107, 'Marisol Yalez', 'cliente', 'cli3', '42394', '667669998', '315 172 7479', '193-4616 Velit. Calle'),
(108, 'Sebastian Ruiz', 'cliente', 'cli4', '55528', '369952379', '320 412 2656', '7882 Ac, Avenida'),
(109, 'Felix Saenz', 'cliente', 'cli5', '98924', '533781209', '318 940 4314', '747-9572 Lobortis Carretera'),
(110, 'Thomas Zapata', 'cliente', 'cli6', '32857', '757213178', '313 849 9966', 'Apdo.:694-4900 Turpis Avenida'),
(111, 'Jack Caceres', 'cliente', 'cli7', '38051', '898864004', '319 119 8106', '439-6050 Dictum'),
(112, 'Osvaldo Saavedra', 'cliente', 'cli8', '25289', '176704138', '312 563 1564', '4387 Elit C/'),
(113, 'Yerald Guzman', 'cliente', 'cli9', '66755', '678987355', '318 577 7832', 'Apartado num.: 748, 7694 Phare'),
(114, 'Reinaldo Olivares', 'cliente', 'cli10', '55866', '943608729', '313 035 1628', 'Apdo.:673-1049 Accumsan C/'),
(115, 'Viverra Donec LLP', 'cliente', 'cli11', '43991', '441916140', '661 5555', 'Ap #672-7900 Nunc Rd.'),
(116, 'Lorem PC', 'cliente', 'cli12', '97872', '241443361	', '897 4444', 'Ap #836-5874 Ultricies Street'),
(117, 'Rutrum Associates	', 'cliente', 'cli13', '35143', '327571699	', '235 1111', 'P.O. Box 365, 3947  Street'),
(118, 'Commodo Ltd	', 'cliente', 'cli14', '79997	', '316304028	', '755 8181', '6484 Suspendisse St.'),
(119, 'Curabitur Foundation', 'cliente', 'cli15', '23574	', '496101367	', '955 1414', '8848 Nulla Rd.');

ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_cat`),
  ADD KEY `id_prov` (`id_prov`);

ALTER TABLE `detalles`
  ADD PRIMARY KEY (`id_det`),
  ADD KEY `id_fact` (`id_fact`),
  ADD KEY `id_ref` (`id_prod`);

ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_emp`),
  ADD KEY `id_sede` (`id_sede`);

ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id_fact`),
  ADD KEY `id_sede` (`id_sede`),
  ADD KEY `id_emp` (`id_emp`),
  ADD KEY `id_user` (`id_user`);

ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_prod`),
  ADD KEY `id_cat` (`id_cat`),
  ADD KEY `id_sede` (`id_sede`);

ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_prov`);

ALTER TABLE `sedes`
  ADD PRIMARY KEY (`id_sede`);

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`);

ALTER TABLE `categoria`
  MODIFY `id_cat` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `detalles`
  MODIFY `id_det` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

ALTER TABLE `empleados`
  MODIFY `id_emp` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `facturas`
  MODIFY `id_fact` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10004;

ALTER TABLE `producto`
  MODIFY `id_prod` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1071;

ALTER TABLE `proveedor`
  MODIFY `id_prov` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

ALTER TABLE `sedes`
  MODIFY `id_sede` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `usuarios`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

ALTER TABLE `categoria`
  ADD CONSTRAINT `categoria_ibfk_1` FOREIGN KEY (`id_prov`) REFERENCES `proveedor` (`id_prov`);

ALTER TABLE `detalles`
  ADD CONSTRAINT `detalles_ibfk_1` FOREIGN KEY (`id_fact`) REFERENCES `facturas` (`id_fact`),
  ADD CONSTRAINT `detalles_ibfk_2` FOREIGN KEY (`id_prod`) REFERENCES `producto` (`id_prod`);

ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`id_sede`) REFERENCES `sedes` (`id_sede`);

ALTER TABLE `facturas`
  ADD CONSTRAINT `facturas_ibfk_1` FOREIGN KEY (`id_sede`) REFERENCES `sedes` (`id_sede`),
  ADD CONSTRAINT `facturas_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `usuarios` (`id_user`),
  ADD CONSTRAINT `facturas_ibfk_3` FOREIGN KEY (`id_emp`) REFERENCES `empleados` (`id_emp`);

ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_sede`) REFERENCES `sedes` (`id_sede`),
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`id_cat`) REFERENCES `categoria` (`id_cat`);
