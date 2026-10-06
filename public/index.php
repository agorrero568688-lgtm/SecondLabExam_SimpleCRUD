<?php
session_start();
require __DIR__ . '/../app/PatientController.php';

function h($v) { return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8'); }
function redirect($route, $msg = null) { if ($msg) $_SESSION['flash'] = $msg; header("Location: index.php?r=$route"); exit; }
function view($name, $data = []) {
    extract($data);
    ob_start(); require __DIR__ . "/../app/views/$name.php"; $content = ob_get_clean();
    require __DIR__ . '/../app/views/layout.php';
}

// Routes: "route" => [HTTP method, controller method]
$routes = [
    'patients'        => ['GET',  'index'],
    'patients/show'   => ['GET',  'show'],
    'patients/create' => ['GET',  'create'],
    'patients/store'  => ['POST', 'store'],
    'patients/edit'   => ['GET',  'edit'],
    'patients/update' => ['POST', 'update'],
    'patients/delete' => ['POST', 'destroy'],
];
$r = $_GET['r'] ?? 'patients';
if (!isset($routes[$r]) || $routes[$r][0] !== $_SERVER['REQUEST_METHOD']) { http_response_code(404); exit('404 Not Found'); }
try {
    (new PatientController)->{$routes[$r][1]}();
} catch (PDOException $e) {
    http_response_code(500); echo 'Database error: ' . h($e->getMessage());
}
