<?php

// Intenta usar config.local.php (claves reales).
$configFile = __DIR__ . '/config.local.php';

// Si no existe (por ejemplo, en alguien que recién clona el repo), usa el ejemplo.
if (!file_exists($configFile)) {
    $configFile = __DIR__ . '/config.example.php';
}

return require $configFile;
