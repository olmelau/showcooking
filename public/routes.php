<?php
// Ruta absoluta al directorio raíz del proyecto
define('ROOT_PATH', dirname(__DIR__) . '/');

// Rutas principales
define('APP_PATH', ROOT_PATH . 'app/');
define('CONFIG_PATH', ROOT_PATH . 'config/');
define('PUBLIC_PATH', ROOT_PATH . 'public/');
define('FRONTEND_PATH', ROOT_PATH . 'frontend/');

// Rutas dentro de app/
define('CONTROLLER_PATH', APP_PATH . 'controllers/');
define('MODEL_PATH', APP_PATH . 'models/');
define('VIEW_PATH', APP_PATH . 'views/');

?>