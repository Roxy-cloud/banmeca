<<<<<<< HEAD
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
=======
USE banmeca;

INSERT INTO benefactors (Nombre, Tipo, RIF_Cedula, Direccion, Telefono, email) VALUES
('UNICEF', 'INSTITUCION', 'J145789654111', 'LONDRES, INGLATERRA', '196554213245', 'unicef@gmail.com'),
('GOBERNACION DEL ESTADO YARACUY', 'INSTITUCION', 'G57411234555', 'SAN FELIPE, YARACUY', '0254-4915144', 'gobiernode yaracuy@gmail.com');

INSERT INTO insumos(Tipo_Insumo) VALUES
('MEDICAMENTO'),
('EQUIPO MEDICO');

INSERT INTO categorias (Nombre, Descripcion) VALUES

('Analgésico, Antiinflamatorio','Medicamentos que combinan propiedades para aliviar el dolor y reducir inflamaciones.'),
('Analgésicos, Antipiréticos','Medicamentos utilizados para aliviar el dolor.'),
('Antihistamínico, Descongestionante','Medicamentos que alivian los síntomas de alergias y la congestión nasal.'),
('Antibiótico, Antiinflamatorio','Fármacos que combaten infecciones bacterianas y a su vez disminuyen inflamaciones.'),
('Antipsicótico, Antidepresivo','Medicamentos utilizados para tratar trastornos psicóticos y síntomas depresivos.'),
('Antiemético, Gastroprotector','Fármacos que previenen las náuseas y protegen el estómago.'),
('Antibióticos','Fármacos que combaten infecciones bacterianas.'),
('Anticonvulsivos','Medicamentos para controlar crisis epilépticas'),
('Hipotensores','Fármacos para controlar la presión arterial alta'),
('Diuréticos','Medicamentos que aumentan la producción de orina para tratar problemas como la hipertensión'),
('Antidiabéticos','Fármacos utilizados para controlar los niveles de azúcar en sangre'),
('Antipsicóticos','Medicamentos para tratar trastornos psicóticos.'),
('Laxantes','Medicamentos que facilitan la evacuación intestinal.'),
('Antieméticos','Fármacos para prevenir o tratar náuseas y vómitos'),
('Antivirales','Medicamentos para combatir infecciones virales'),
('Suplementos vitamínicos y minerales','Productos destinados a cubrir deficiencias nutricionales'),
('Inmunosupresores','Fármacos que reducen la actividad del sistema inmunológico');


INSERT INTO medicamentos (categoria_id, insumo_id, benefactor_id, Nombre, Laboratorio, Componente, Existencia, Fecha_Vencimiento) VALUES
(1, 1,1, 'ACETAMINOFEN JARABE 180ML', 'CALOX', 'ACETAMINOFEN 5MG/1ML', 200, '2025-01-29'),
(1, 1,2, 'ACETAMINOFEN TABLETAS 500MG', 'GENVEN', 'ACETAMINOFEN 500MG', 150, '2025-04-30'),
(2, 1,1, 'IODEX UNGUENTO 180GMS', 'PIFANO', 'IODURO DE SODIO', 215, '2028-08-01');

INSERT INTO equipments (insumo_id, benefactor_id, Tipo, Marca, Modelo, Existencia, Estado) VALUES 
(2,2, 'SILLA DE RUEDAS', 'RICHKOCK', 'HANDLE', 7, 'BUENO'),
(2,1, 'COLCHON ANTIESCARAS', 'DREAMS', 'GENERICO', 11, 'BUENO'),
(2,2, 'CAMILLA AMBULATORIA', 'CHEMS', 'QUARTZ', 9, 'REGULAR'),
(2,2, 'MULETAS X2', 'HOLCH', 'GENERICO', 10, 'BUENO');

INSERT INTO beneficiarios(Nombre, Cedula, Direccion, Telefono, Informe_Medico) VALUES 
('ROSANA GARRIDO','11273786','INDEPENDENCIA, YARACUY','04145442255',''),
('JESUS PIÑERO','16206120','INDEPENDENCIA, YARACUY','04143551767',''),
('ELIEZER SANCHEZ','30000000','COCOROTE, YARACUY','0412201214444',''),
('ALEJANDRO TOVAR','32341544','PEÑA, YARACUY','042451447475','');

INSERT INTO solicitudes(beneficiario_id, tipo, categoria, descripcion) VALUES 
(1,'DONATIVO','MEDICAMENTO','EN ESPERA DE INFORME MEDICO'),
(2,'DONATIVO','EQUIPO MEDICO','PACIENTE EN SITUACION DE RIESGO'),
(3,'COMODATO','EQUIPO MEDICO','SILLA DE RUEDAS');


INSERT INTO solicitud_medicamentos(solicitud_id, medicamento_id) VALUES 
(1,1),
(1,2);

INSERT INTO seguimientos(solicitud_id, estado, observaciones) VALUES 
(1,'APROBADO','POR ENTREGAR'),
(2,'APROBADO','POR ENTREGAR'),
(3,'PENDIENTE','POR APROBACION');

INSERT INTO `sede_regional`(Nombre, Direccion, Responsable) VALUES 
('SEDE DIOCESANA SAN FELIPE','Edificio Curia Diocesana, San Felipe, Yaracuy','Yimmy Garcia');


estructura de las tablas

    {
        Schema::create('benefactors', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre'); // Nombre del benefactor
            $table->enum('Tipo', ['Persona Natural', 'Institución']); // Tipo de benefactor
            $table->string('RIF_Cedula')->unique(); // Identificación del benefactor
            $table->string('Direccion')->nullable(); // Dirección
            $table->string('Telefono')->nullable(); // Teléfono
            $table->string('email')->nullable(); // Correo Electrónico
            $table->timestamps();
        });
    }

    {
        Schema::create('insumos', function (Blueprint $table) {
            $table->id();
            $table->enum('Tipo_Insumo', ['MEDICAMENTO', 'EQUIPO']);
            $table->timestamps();
        });
    }

    {
        Schema::create('medicamentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categoria_id'); // Clave Foránea
            $table->unsignedBigInteger('insumo_id'); // Clave Foránea
            $table->unsignedBigInteger('benefactor_id'); // Clave Foránea
            $table->dateTime('Fecha_Donacion'); // Fecha de la Donación
            $table->string('Nombre');
            $table->string('Laboratorio');
            $table->string('Componente');
            $table->string('Existencia');
            $table->date('Fecha_Vencimiento');
            $table->string('imagen')->default('assets/parring.png'); // Imagen por defecto
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
            $table->foreign('insumo_id')->references('id')->on('insumos')->onDelete('cascade');
            $table->foreign('benefactor_id')->references('id')->on('benefactors')->onDelete('cascade');
            $table->timestamps();
        });
    }
    {
        Schema::create('equipments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('insumo_id'); // Clave Foránea
            $table->unsignedBigInteger('benefactor_id'); // Clave Foránea
            $table->dateTime('Fecha_Donacion'); // Fecha de la Donación
            $table->string('Tipo'); // Tipo de equipo (Silla de ruedas, muleta, bastón, etc.)
            $table->string('Marca'); // Marca del equipo
            $table->string('Modelo'); // Modelo del equipo
            $table->string('Existencia'); // existencia
            $table->string('imagen')->default('parring.png'); // Imagen por defecto
            $table->enum('Estado', ['Bueno', 'Regular', 'Malo']); // Estado del equipo
            $table->foreign('insumo_id')->references('id')->on('insumos')->onDelete('cascade');
            $table->foreign('benefactor_id')->references('id')->on('benefactors')->onDelete('cascade');
            $table->timestamps();
        });
    }
>>>>>>> e2a8b4e (Primer commit)
