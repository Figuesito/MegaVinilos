<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Iniciar Sesión</title>
  <link rel="stylesheet" href="CSS/login.css" />
</head>
<body>
  <div class="form-container">
    <h1>Iniciar Sesión</h1>
    
    <!-- Mostrar mensaje si existe -->
    <?php if (isset($_SESSION['mensaje'])): 
      $color = ($_SESSION['mensaje_tipo'] == 'success') ? 'green' : 'red'; ?>
      <p style="color: <?= $color ?>; text-align:center;">
        <?= htmlspecialchars($_SESSION['mensaje']) ?>
      </p>
      <?php 
      unset($_SESSION['mensaje']);
      unset($_SESSION['mensaje_tipo']);
    endif; ?>

    <form action="php/loginaded.php" method="POST">
      <div class="form-section" style="flex: 1; min-width: 300px;">
        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" name="email" required />
      </div>

      <div class="form-section" style="flex: 1; min-width: 300px;">
        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required />
      </div>

      <div style="width: 100%; margin-top: 20px;">
        <button type="submit">Ingresar</button>
        <a href="index.php" class="volver-btn">Volver al inicio</a>
      </div>
    </form>
    
    <p style="text-align:center; margin-top: 20px; color: #E3D4FF;">
      ¿No tienes una cuenta?
      <a href="register.php" style="color: #BCA6FF; font-weight: bold; text-decoration: none;">
        Regístrate
      </a>
    </p>
  </div>
</body>
</html>
