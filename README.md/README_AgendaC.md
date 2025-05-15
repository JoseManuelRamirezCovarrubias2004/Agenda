
#  AgendaC - Aplicación de Gestión de Contactos

**AgendaC** es una aplicación web desarrollada en PHP que permite a los usuarios gestionar una agenda de contactos personales y realizar operaciones CRUD (Crear, Leer, Actualizar y Eliminar) sobre dichos contactos y usuarios registrados.

##  Tecnologías utilizadas

- PHP (versión recomendada: 7.4 o superior)
- HTML5 y CSS3
- MySQL/MariaDB
- XAMPP o similar (servidor local)
- SQL (archivo `.sql` para estructura de base de datos)

##  Estructura del proyecto

```
agendac/
├── agendac.sql                # Archivo SQL para la base de datos
├── index.php                  # Página principal (login)
├── login.php                  # Formulario de autenticación
├── inicio.php                 # Página de inicio tras iniciar sesión
├── crudusuario.php           # Gestión CRUD de usuarios
├── crudcontactos.php         # Gestión CRUD de contactos
├── CreacionContacto.php      # Formulario para crear contactos
├── error.php                 # Página de error
├── aside.html                # Menú lateral
├── cabecera.html             # Cabecera de la aplicación
└── estilos/                  # (si aplica) Archivos CSS
```

##  Instalación y configuración

1. **Descargar o clonar el repositorio** en tu entorno local:
   ```bash
   git clone https://github.com/tuusuario/agendac.git
   ```

2. **Importar la base de datos**:
   - Abre **phpMyAdmin**
   - Crea una base de datos llamada `agendac`
   - Importa el archivo `agendac.sql` incluido

3. **Configurar la conexión a la base de datos**:
   - Verifica que los archivos PHP que se conectan a la base de datos (por ejemplo `crudusuario.php`, `crudcontactos.php`) tengan los datos correctos:
     ```php
     $conexion = new mysqli("localhost", "root", "", "agendac");
     ```

4. **Ejecutar la aplicación**:
   - Inicia Apache y MySQL desde XAMPP
   - Abre tu navegador en: `http://localhost/agendac/index.php`

##  Funcionalidades

- Autenticación de usuarios
- Gestión de usuarios (crear, editar, eliminar, listar)
- Gestión de contactos personales
- Interfaz modular con cabecera y menú lateral
- Control de errores y sesiones

##  Consideraciones de seguridad

- Asegurar validación de entradas para prevenir inyecciones SQL.
- Implementar cifrado de contraseñas con `password_hash()`.
- Agregar manejo de sesiones con control de tiempo de inactividad.

##  Autor

Desarrollado por Ramirez Covarrubias Jose Manuel 
Instituto Tecnológico de Orizaba  
Proyecto académico 2025

