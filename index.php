<?php
/**
 * Created by PhpStorm.
 * User: selim
 * Date: 15/06/2016
 * Time: 21:54
 */
require_once "init.php";
$page = new \Controller\PageController($pdo);

$action = '';
if (isset($_GET['a'])) {
    $action = $_GET['a'];
}

switch($action){
    case 'partager':
        $page->partager();
        break;

    case 'down':
        $page->addDown();
        break;

    case 'ajouter':
        $page->form();
        break;

    case 'home':
    default:
        $page->displayPage();
        break;
}