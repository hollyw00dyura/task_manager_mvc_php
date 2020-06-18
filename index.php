<?php
include 'app/bootstrap.php';

if (($controller = Registry::get('controller')) === null) {
    $controller = new Controller();
    Registry::set('controller', $controller);
}

if (!empty($_GET['page'])) {
    $id_page = intval($_GET['page']);
    Registry::set('showPage', $id_page);
} elseif (Registry::get('showPage') === null)
    Registry::set('showPage', 0);

if (!empty($_GET['login'])) {
    $controller->onLogin($_GET['login']);
} elseif (!empty($_GET['register'])) {
    $controller->onRegister();
} elseif (!empty($_GET['close'])) {
    $controller->onExitUser();
} elseif(!empty($_GET['createUser'])) {
    $controller->verifyAndCreateUser($_GET['createUser']);
} elseif (!empty($_GET['goChange'])) {
    $controller->onShowChangeTask($_GET['goChange']['id']);
} elseif (!empty($_GET['changeTask'])) {
    $controller->verifyAndUpdateTask($_GET['changeTask']);
} elseif (!empty($_GET['doneTask'])) {
    $controller->onDoneTask($_GET['doneTask']['id']);
} elseif (!empty($_GET['newTask'])) {
    $controller->onShowCreateTask();
} elseif (!empty($_GET['createNewTask'])){
    $controller->verifyAndCreateTask($_GET['createNewTask']);
} else {
    $controller->onShowTasks(); // здесь же отработка и экшена back
}
?>