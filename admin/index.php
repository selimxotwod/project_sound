
<?php
chdir($appRoot = dirname(__DIR__));
require_once "init.php";
$page = new \Controller\PageController($pdo);
$action = '';
if (isset($_GET['a'])) {
    $action = $_GET['a'];
}
switch($action){
    case 'stats':
        $page->statistiques();
        break;

    case 'list':
    default:
        $page->listeMessageAdmin();
        break;
}

