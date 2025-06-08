<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Registro</title>
  <link rel="stylesheet" href="CSS/register.css" />
</head>
<body>
  <div class="form-container">
    <h1>Registrarse</h1>

    <!-- Mensaje de error o éxito -->
    <?php if (isset($_SESSION['mensaje'])): ?>
      <p style="color: <?php echo $_SESSION['mensaje_tipo'] === 'error' ? 'red' : 'green'; ?>; text-align:center;">
        <?php 
          echo $_SESSION['mensaje']; 
          unset($_SESSION['mensaje'], $_SESSION['mensaje_tipo']);
        ?>
      </p>
    <?php endif; ?>

    <form action="php/registeraded.php" method="POST" onsubmit="return validarRegistro()">
      <div class="form-section">
        <h3>Datos de acceso</h3>

        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" name="email" required />
        <div class="error" id="emailError"></div>

        <label for="username">Usuario:</label>
        <input type="text" id="username" name="username" required />
        <div class="error" id="usernameError"></div>

        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required />
        <div class="error" id="contrasenaError"></div>
      </div>

      <div class="form-section">
        <h3>Datos del cliente</h3>

        <label for="nombre">Nombre completo:</label>
        <input type="text" id="nombre" name="nombre" required />
        <div class="error" id="nombreError"></div>

        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" required />
        <div class="error" id="direccionError"></div>

        <label for="telefono">Teléfono:</label>
        <input type="tel" id="telefono" name="telefono" required pattern="[0-9]{7,10}" />
        <div class="error" id="telefonoError"></div>
      </div>

      <div style="width: 100%;">
        <button type="submit">Registrarse</button>
        <a href="index.php" class="volver-btn">Volver al inicio</a>
      </div>
    </form>

    <p style="text-align:center; margin-top: 20px; color: #E3D4FF;">
      ¿Ya tienes una cuenta?
      <a href="login.php" style="color: #BCA6FF; font-weight: bold; text-decoration: none;">
        Inicia sesión
      </a>
    </p>
  </div>

  <script>
    function validarRegistro() {
      let valido = true;

      // Limpiar errores anteriores
      document.querySelectorAll('.error').forEach(e => e.textContent = '');

      const email = document.getElementById("email").value.trim();
      const username = document.getElementById("username").value.trim();
      const contrasena = document.getElementById("contrasena").value.trim();
      const nombre = document.getElementById("nombre").value.trim();
      const direccion = document.getElementById("direccion").value.trim();
      const telefono = document.getElementById("telefono").value.trim();

      if (email === "" || !email.includes("@")) {
        document.getElementById("emailError").textContent = "Correo inválido.";
        valido = false;
      }
      if (username.length < 4) {
        document.getElementById("usernameError").textContent = "Usuario muy corto (min 4 caracteres).";
        valido = false;
      }
      if (contrasena.length < 6) {
        document.getElementById("contrasenaError").textContent = "Contraseña muy corta (min 6 caracteres).";
        valido = false;
      }
      if (nombre === "") {
        document.getElementById("nombreError").textContent = "Nombre requerido.";
        valido = false;
      }
      if (direccion === "") {
        document.getElementById("direccionError").textContent = "Dirección requerida.";
        valido = false;
      }
      if (!/^\d{7,10}$/.test(telefono)) {
        document.getElementById("telefonoError").textContent = "Teléfono inválido.";
        valido = false;
      }

      return valido;
    }
  </script>
</body>
</html>
