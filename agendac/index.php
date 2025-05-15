<?php
session_start();

header("X-Frame-Options: DENY");
header("X-Content-Type-Options: nosniff");
header("X-XSS-Protection: 1; mode=block");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once 'auth.php'; 
}

include_once("cabecera.html");
include_once("menu.php");
include_once("aside.html");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistema de autenticación">
    <title>Iniciar Sesión | Sistema</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    
    <style>
        :root {
            --color-fondo: #121212;
            --color-contenedor: #1e1e1e;
            --color-input: #2c2c2c;
            --color-borde: #444;
            --color-primario: #ff4d4d;
            --color-primario-hover: #cc0000;
            --color-texto: #ffffff;
            --color-error: #f44336;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background-color: var(--color-fondo);
            color: var(--color-texto);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .login-main {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-container {
            width: 100%;
            max-width: 400px;
            padding: 2.5rem;
            border-radius: 12px;
            background-color: var(--color-contenedor);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
            animation: fadeIn 0.5s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 1.5rem;
            color: var(--color-primario);
            font-size: 1.8rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: rgba(255, 255, 255, 0.9);
        }

        .input-wrapper {
            position: relative;
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 12px 16px;
            border-radius: 8px;
            border: 1px solid var(--color-borde);
            background-color: var(--color-input);
            color: var(--color-texto);
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .login-container input:focus {
            border-color: var(--color-primario);
            outline: none;
            box-shadow: 0 0 0 3px rgba(255, 77, 77, 0.2);
        }

        .btn {
            width: 100%;
            padding: 14px;
            background-color: var(--color-primario);
            color: white;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 1rem;
        }

        .btn:hover {
            background-color: var(--color-primario-hover);
            transform: translateY(-2px);
        }

        .btn:active {
            transform: translateY(0);
        }

        .error-message {
            color: var(--color-error);
            font-size: 0.85rem;
            margin-top: 0.5rem;
            display: none;
        }

        .show-password {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: rgba(255, 255, 255, 0.6);
            cursor: pointer;
            font-size: 1.1rem;
        }

        .additional-options {
            margin-top: 1.5rem;
            text-align: center;
            font-size: 0.9rem;
        }

        .additional-options a {
            color: var(--color-primario);
            text-decoration: none;
            transition: color 0.2s;
        }

        .additional-options a:hover {
            text-decoration: underline;
        }

        .notification {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            display: none;
        }

        .notification.error {
            background-color: rgba(244, 67, 54, 0.1);
            border-left: 4px solid var(--color-error);
            color: var(--color-error);
        }

        @media (max-width: 576px) {
            .login-container {
                padding: 1.5rem;
            }
            
            .login-container h2 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <main class="login-main">
        <div class="login-container">


            <?php if (isset($_GET['error'])): ?>
                <div class="notification error">
                    <?php echo htmlspecialchars($_GET['error'], ENT_QUOTES, 'UTF-8'); ?>
                </div>
            <?php endif; ?>

            <h2>Iniciar Sesión</h2>
            
            <form id="loginForm" method="post" action="login.php" autocomplete="off" novalidate>
                <div class="form-group">
                    <label for="txtUsuario">Usuario</label>
                    <input type="text" name="txtUsuario" id="txtUsuario" required 
                           aria-describedby="usuarioHelp" autocomplete="username" />
                    <div id="usuarioHelp" class="error-message"></div>
                </div>

                <div class="form-group">
                    <label for="txtContrasena">Contraseña</label>
                    <div class="input-wrapper">
                        <input type="password" name="txtContrasena" id="txtContrasena" required 
                               autocomplete="current-password" />
                        <button type="button" class="show-password" aria-label="Mostrar contraseña">
                            👁️
                        </button>
                    </div>
                    <div id="contrasenaHelp" class="error-message"></div>
                </div>

                <button type="submit" class="btn">Ingresar</button>

    </main>

    <script>


document.querySelector('.show-password').addEventListener('click', function() {
            const passwordInput = document.getElementById('txtContrasena');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                this.innerHTML = '👁️';
                this.setAttribute('aria-label', 'Ocultar contraseña');
            } else {
                passwordInput.type = 'password';
                this.innerHTML = '👁️';
                this.setAttribute('aria-label', 'Mostrar contraseña');
            }
        });


        document.getElementById('loginForm').addEventListener('submit', function(e) {
            let usuario = document.getElementById('txtUsuario').value.trim();
            let contrasena = document.getElementById('txtContrasena').value.trim();
            let valido = true;

            document.querySelectorAll('.error-message').forEach(el => {
                el.style.display = 'none';
            });

            if (usuario.length < 4) {
                document.getElementById('usuarioHelp').textContent = 'El usuario debe tener al menos 4 caracteres';
                document.getElementById('usuarioHelp').style.display = 'block';
                valido = false;
            }

            if (contrasena.length < 6) {
                document.getElementById('contrasenaHelp').textContent = 'La contraseña debe tener al menos 6 caracteres';
                document.getElementById('contrasenaHelp').style.display = 'block';
                valido = false;
            }

            if (!valido) {
                e.preventDefault();
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            const notifications = document.querySelectorAll('.notification');
            notifications.forEach(notification => {
                notification.style.display = 'block';
                setTimeout(() => {
                    notification.style.opacity = '1';
                }, 50);
            });
        });
    </script>
</body>
</html>

<?php
include_once("pie.html");
?>