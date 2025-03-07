USE banmeca;

INSERT INTO benefactors (Nombre, Tipo, RIF_Cedula, Direccion, Telefono, email) VALUES
('UNICEF', 'INSTITUCION', 'J145789654111', 'LONDRES, INGLATERRA', '196554213245', 'unicef@gmail.com'),
('GOBERNACION DEL ESTADO YARACUY', 'INSTITUCION', 'G57411234555', 'SAN FELIPE, YARACUY', '0254-4915144', 'gobiernode yaracuy@gmail.com');

INSERT INTO insumos(benefactor_id, Tipo_Insumo) VALUES
(1,'MEDICAMENTO'),
(2,'EQUIPO MEDICO');

INSERT INTO categorias (Nombre, Descripcion) VALUES
('analgesico-antipiretico', 'RESFRIO, FIEBRE, DOLOR DE CABEZA'),
('analgesico-ANTIINFLAMATORIO', 'GOLPES Y TORCEDURAS');

INSERT INTO medicamentos (categoria_id, insumo_id, Nombre, Laboratorio, Componente, Existencia, Fecha_Vencimiento) VALUES
(1, 1, 'ACETAMINOFEN JARABE 180ML', 'CALOX', 'ACETAMINOFEN 5MG/1ML', 200, '2025-01-29'),
(1, 1, 'ACETAMINOFEN TABLETAS 500MG', 'GENVEN', 'ACETAMINOFEN 500MG', 150, '2025-04-30'),
(2, 1, 'IODEX UNGUENTO 180GMS', 'PIFANO', 'IODURO DE SODIO', 215, '2028-08-01');

INSERT INTO equipments (insumo_id, Tipo, Marca, Modelo, Existencia, Estado) VALUES 
(2, 'SILLA DE RUEDAS', 'RICHKOCK', 'HANDLE', 7, 'BUENO'),
(2, 'COLCHON ANTIESCARAS', 'DREAMS', 'GENERICO', 11, 'BUENO'),
(2, 'MULETAS X2', 'HOLCH', 'GENERICO', 10, 'BUENO');