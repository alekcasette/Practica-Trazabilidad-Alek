<?php
/**
 * Item de Configuración: auth.php
 * Propósito: Validar credenciales de usuario de forma segura.
 * Requisito: Sec-Req-01 (Autenticación de Usuarios)
 */

function validarAcceso($usuarioIngresado, $passwordIngresado) {
    // Simulación de datos en Base de Datos (Password en hash para seguridad)
    $usuarioDB = "admin_user";
    $passwordHashDB = password_hash("PasswordSeguro123!", PASSWORD_BCRYPT);

    // 1. Verificación de identidad
    if ($usuarioIngresado === $usuarioDB) {
        // 2. Verificación de integridad del password
        if (password_verify($passwordIngresado, $passwordHashDB)) {
            return "ACCESO_CONCEDIDO";
        }
    }
    
    // 3. Registro para Auditoría (PCA)
    error_log("Intento de acceso fallido para el usuario: " . $usuarioIngresado);
    return "ACCESO_DENEGADO";
}

// Lógica de ejecución
$resultado = validarAcceso($_POST['user'], $_POST['pass']);
echo $resultado;
?>
