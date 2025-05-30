// Limpiar mensajes anteriores
function limpiarErrores() {
  const errores = document.querySelectorAll(".error");
  errores.forEach(e => e.textContent = "");
}

// Mostrar error en un campo específico
function mostrarError(idCampo, mensaje) {
  document.getElementById(idCampo + "Error").textContent = mensaje;
}

// Validación para el formulario de registro
function validarRegistro() {
  limpiarErrores();

  const nombre = document.getElementById("nombre_cliente").value.trim();
  const direccion = document.getElementById("direccion_cliente").value.trim();
  const telefono = document.getElementById("telefono").value.trim();
  const email = document.getElementById("email_cliente").value.trim();

  const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  const regexTelefono = /^\d{7,15}$/;

  let valido = true;

  if (!nombre) {
    mostrarError("nombre_cliente", "Ingresa tu nombre.");
    valido = false;
  } else if (/\d/.test(nombre)) {
    mostrarError("nombre_cliente", "El nombre no debe tener números.");
    valido = false;
  }

  if (!direccion) {
    mostrarError("direccion_cliente", "Ingresa una dirección.");
    valido = false;
  }

  if (!telefono) {
    mostrarError("telefono", "Ingresa un número de teléfono.");
    valido = false;
  } else if (!regexTelefono.test(telefono)) {
    mostrarError("telefono", "Teléfono inválido. Usa solo dígitos (7-15).");
    valido = false;
  }

  if (!email) {
    mostrarError("email_cliente", "Ingresa un correo.");
    valido = false;
  } else if (!regexEmail.test(email)) {
    mostrarError("email_cliente", "Correo no válido.");
    valido = false;
  }

  return valido;
}

// Validación para login
function validarLogin() {
  limpiarErrores();

  const email = document.getElementById("email").value.trim();
  const contrasena = document.getElementById("contrasena").value;

  const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  let valido = true;

  if (!email) {
    mostrarError("email", "Ingresa tu correo.");
    valido = false;
  } else if (!regexEmail.test(email)) {
    mostrarError("email", "Correo no válido.");
    valido = false;
  }

  if (!contrasena) {
    mostrarError("contrasena", "Ingresa tu contraseña.");
    valido = false;
  }

  return valido;
}
