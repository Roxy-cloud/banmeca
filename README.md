
Pasos para Cambiar la Política de Ejecución en PowerShell
Abrir PowerShell como Administrador:
Haz clic en el botón de Inicio.
Escribe "Windows PowerShell".
Haz clic derecho sobre "Windows PowerShell" y selecciona Ejecutar como administrador.
Verificar la Política Actual:
Ejecuta el siguiente comando para ver la política de ejecución actual:
powershell
Get-ExecutionPolicy -List
Cambiar la Política de Ejecución:
Para permitir la ejecución de scripts, puedes establecer la política en RemoteSigned, que permite ejecutar scripts locales sin firmar y requiere que los scripts descargados estén firmados por un editor de confianza. Ejecuta el siguiente comando:
powershell
Set-ExecutionPolicy RemoteSigned -Scope CurrentUser
Si prefieres permitir todos los scripts (lo cual no se recomienda por razones de seguridad), puedes usar:
powershell
Set-ExecutionPolicy Unrestricted -Scope CurrentUser
Confirmar el Cambio:
Cuando se te pregunte si deseas cambiar la política, escribe Y (sí) y presiona Enter.
Cerrar PowerShell:
Cierra la ventana de PowerShell.

PROBLEMA CON XAMPP: NO ABRE PHPMYADMIN: 
1. **Edita el archivo `httpd-xampp.conf`:**
   - Abre el archivo ubicado en `xampp/apache/conf/extra/httpd-xampp.conf`.
   - Busca la sección que comienza con `<Directory "/xampp/phpMyAdmin">` o `<LocationMatch "^/(?i:(?:xampp|security|licenses|phpmyadmin|webalizer|server-status|server-info))">`.

2. **Modifica los permisos:**
   - Cambia `Require local` por `Require all granted`. Esto permitirá el acceso desde cualquier red.
   - Si encuentras líneas como `Deny from all`, cámbialas por `Allow from all`.

   Ejemplo:
   ```apache
   <Directory "/xampp/phpMyAdmin">
       AllowOverride AuthConfig
       Require all granted
   </Directory>
   ```

3. **Reinicia Apache:**
   - Después de guardar los cambios, reinicia el servidor Apache desde el panel de control de XAMPP.

4. **Precaución de seguridad:**
   - Si decides permitir el acceso desde cualquier red, asegúrate de proteger phpMyAdmin con una contraseña para evitar accesos no autorizados.
----------------------------------------


version de trabajo actual: Laravel v11.42.1 (PHP v8.4.3)

se esta utilizando Laravel Breeze con Blade
comando ejecutados: 
abres tu terminal cmd y ejecutas para instalar laravel de forma global
composer global require laravel/installer 
composer create-project --prefer-dist laravel/laravel banmecaweb // CON ESTO SE INSTALA EL PROYECTO BANMECA DESDE CERO
composer reguire laravel/sanctum este comando ejecuta los archivos de autenticacion de usuario
composer require qcod/laravel-settings :complemento para autenticacion de usuario de laravel 11
php artisan route:list : muestra la lista de rutas de archivo activas
php artisan serve : activa el servidor para ver la pagina en el navegador
php artisan db:seed para activar los seeder que llenan la base de datos con informacion predeterminada
php artisan key:generate : genera una llave unica de acceso para el super admin. se usa luego de db:seed
php artisan cache:clear borra el cache de la consola
php artisan migrate para migrar las tablas a la base de datos
composer update spatie/laravel-permission
php artisan make:model PermisionRole -fms al ejecutar este comando, automaticamente se crea el modelo y el controlador
php artisan make:middleware RoleMiddleware para crear archivo de rutas personalizadas
php artisan storage:link Si usas almacenamiento en public/storage
guit init inicia el git
php artisan make:model NombreDelModelo -mcrf crea de una ver el modelo, controlador, migracion y factory de la tabla
cd banmecaweb accede de una vez al directorio desde cmd
npm install
npm install chart.js para instalar el conjunto de graficos.
npm run build
composer run dev
composer require spatie/laravel-permission
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
composer dump-autoload esto para cuando se hacen cambios, se actualicen los archivos composer referentes al proyecto

php artisan tinker para crear los roles de usuario. esto abre una pequeña consola donde deben ejecutarse los comandos: 
use Spatie\Permission\Models\Role; para acceder al modelo
 Role::create(['name' => 'responsable_parroquial']); se van creando los roles de usuarios. los necesarios. por ahora 4: admin, benefactor, beneficiario y responsable_parroquial
 se ejecta control c para salir de la consola de thinker y volvemos a la consola del terminal
 php artisan db:seed --class=UserSeeder ejecutamos el seeder para ingresar a nuestros usuarios: 

------------------------------------------------------------------
creando servidor para postgreSQL en el servidor supabase:
me logueo con mi cuenta de github.
contraseña elegida banmecaritas.
Creando cuenta en GoogieHost:
banmeca.whf.bz CLAVE: CARITASBANMECA.
Your Order Number is: 9136419836

para que laravel trabaje con supabase, se coloca en el archivo .env: 
DB_CONNECTION=pgsql
DATABASE_URL=postgres://postgres.xxxx:password@xxxx.pooler.supabase.com:5432/postgres

en config.database.php colocamos este codigo:
 'pgsql' => [
    'driver' => 'pgsql',
    'url' => env('DATABASE_URL'),
    'host' => env('DB_HOST', '127.0.0.1'),
    'port' => env('DB_PORT', '5432'),
    'database' => env('DB_DATABASE', 'forge'),
    'username' => env('DB_USERNAME', 'forge'),
    'password' => env('DB_PASSWORD', ''),
    'charset' => 'utf8',
    'prefix' => '',
    'prefix_indexes' => true,
    'search_path' => 'laravel',
    'sslmode' => 'prefer',
],


cree la cuenta de Supabase y Railway con mi Github
voy a instalar Railway Cli con el siguiente comando: npm i -g @railway/cli
luego me logueo desde el mismo terminal con railway login
el ultimo comando es railway init para iniciar el proyecto. le doy el nombre: banmeca
en railway, dentro de mi proyecto le doy a settings y busco shared variables
______________________________________________
Entidades Clave
Benefactor: Representa a quienes donan medicamentos, insumos o equipos.

Insumo: Representa lo que se recibe de una donacion, incluyendo qué tipo de insumo (medicamento, equipo medico) y cuándo se recibe.

Medicamento/Insumo: Representa los medicamentos en existencia para ser dados en donacion al beneficiario.

Equipo Médico (Comodato7donacion): Representa los equipos médicos para ser entregados en comodato/donacion.

Beneficiario: Representa a las personas que reciben el insumo en donacion/comodato.

Sede Cáritas: Representa las diferentes ubicaciones de Cáritas donde se distribuyen las insumo.

Atributos de las Entidades
Benefactor:

ID_Benefactor (Clave Primaria)

Nombre (Nombre del benefactor, ya sea persona o institución)

Tipo (Persona Natural/Institución)

RIF/Cédula (Identificación del benefactor)3

Dirección

Teléfono

Correo Electrónico

Insumo:

ID_Benefactor (Clave Foránea, referencia a Benefactor)

Tipo_Insumo Tipo de Insumo Recibido(medicamento/equipo medico)

Fecha_Donación fecha en la que se recibe la donacion del insumo


Medicamento/Insumo:

ID_Medicamento (Clave Primaria)

Nombre

Descripción

Fecha_Vencimiento

Cantidad

Equipo Médico (Comodato):

ID_Equipo (Clave Primaria)

Tipo (Silla de ruedas, muleta, bastón, etc.)

Marca

Modelo

Estado (Bueno, Regular, Malo)

Beneficiario:

ID_Beneficiario (Clave Primaria)

Nombre

Cédula

Fecha_Nacimiento

Dirección

Teléfono

Informe Médico (Archivo o referencia al mismo)

Sede Cáritas:

ID_Sede (Clave Primaria)

Nombre

Dirección

Teléfono

Responsable

Relaciones entre las Entidades
Benefactor - Insumo:

Un benefactor realiza una donacion de uno o muchos insumos que puede ser Medicamento/Equipo Medico. (Uno a Muchos)

Un insumo (Medicamento/Equipo Medico) es donado por un benefactor. (Uno a Uno)



Un beneficiario puede realizar una o muchas solicitudes

la solicitud puede ser de Comodato/Donativo de Equipos Médicos y/o Donativo  de Medicamentos

Uno o varios medicamento/equipo medico es recibida por un beneficiario. (Uno a Uno)

Beneficiario - Equipo Médico (Comodato):

Sede Cáritas - Donación:

Sede Cáritas - Beneficiario:

Una sede de Cáritas atiende a varios beneficiarios. (Uno a Muchos)

Un beneficiario es atendido por una sede de Cáritas. (Uno a Uno)

Diagrama ER Básico
A continuación, te proporciono una representación textual del diagrama ER.

text
Benefactor *--1 dona 1--* Medicamento/Insumo
           |
           1
           |
           * beneficiario 1--* solicita-- Equipo Médico (Donativo/Comodato) o Medicamento (Donativo)
           |
           1
           |
           * Beneficiario
           |
           1
           |
           * Sede Cáritas
Descripción de las Relaciones
un benefactor dona Insumo de uno a muchos insumos medicos
los insumos medicos pueden ser de dos tipos: Equipos medicos y medicamentos. los insumos se reciben en la sede caritas regional. 
la sede caritas regional distribuye de uno a muchos medicamentos a las sedes caritas parroquiales.
los beneficiarios pueden pedir que les donen medicamentos en cualquiera de las distintas sedes caritas, incluyendo la regional. 
los equipos medicos el beneficiario debe solicitarlos en la sede caritas regional en calidad de comodato.

Notas Adicionales
Comodato: La entidad "Equipo Médico (Comodato)" es crucial para gestionar los equipos prestados. Debe incluir atributos que permitan controlar el estado del equipo y la fecha de devolución.

Benefactores: Es importante categorizar a los benefactores como personas naturales o instituciones, ya que los requisitos y el seguimiento pueden ser diferentes.

Sedes: La relación con las sedes permite rastrear la distribución de los recursos y dónde se están utilizando.

Documentación: Mantener un registro de los informes médicos de los beneficiarios es crucial para justificar las insumo y asegurar que se están utilizando correctamente.

Cáritas San Felipe.

Escalabilidad: pudiera usarse tanto a nivel regional como nacional.

Seguridad: Implementa medidas de seguridad adecuadas para proteger la información sensible de los benefactores y beneficiarios.

-----------------------------------------
 formulario de solicitudes: 
 Estructura del Formulario (conceptual):

Paso 1: Buscar Beneficiario Existente:

Campo de búsqueda (por cédula, por ejemplo).

Botón "Buscar".

Si se encuentra el beneficiario, mostrar sus datos (solo lectura) y avanzar al paso 3.

Si no se encuentra, avanzar al paso 2.

Paso 2: Registrar Nuevo Beneficiario:

Campos para Nombre, Cédula, etc.

(Opcional) Botón "Cancelar" (vuelve al paso 1).

Botón "Siguiente".

Paso 3: Tipo de Solicitud y Tipo de Insumo:

Select para "Tipo de Solicitud" (Donativo/Comodato). Mostrar solo si el tipo de insumo es equipo médico.

Select para "Tipo de Insumo" (Medicamento/Equipo Médico).

Si es medicamento, ocultar el select de tipo de solicitud (solo donativo)

Botón "Siguiente".

Paso 4: Detalles del Insumo y Existencia:

Campo para buscar el medicamento/equipo médico (puede ser un autocomplete).

Mostrar detalles del medicamento/equipo médico (nombre, descripción, cantidad en existencia).

Si no hay suficiente en existencia, mostrar un mensaje de advertencia.

Botón "Siguiente".

Paso 5: Formalizar Solicitud:

Campo de "Observación" (solo para el administrador, oculto al usuario).

Resumen de la solicitud (datos del beneficiario, tipo de solicitud, insumo, cantidad, etc.).

Botón "Guardar Solicitud".

Implementar el formulario de solicitudes vinculado al beneficiario

Crear relaciones entre solicitudes y equipos/medicamentos

Desarrollar lógica para diferenciar tipos de insumos (comodato/donativo)

Implementar validación de disponibilidad de equipos/medicamentos



