<?php

// Verifica si el campo está vacío
function validarVacio($campo){
    return empty(trim($campo));
}

// Verifica formato de correo
function validarEmail($correo){
    return filter_var($correo, FILTER_VALIDATE_EMAIL);
}

// Verifica longitud mínima de contraseña
function validarPassword($password){
    return strlen($password) >= 8;
}
