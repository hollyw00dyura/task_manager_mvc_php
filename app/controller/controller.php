<?php

class Controller {
    private $model;
    private $view;

    public function __construct()
    {
        $this->model = new Model();
        Registry::set('model', $this->model);

        $this->view = new View();
        Registry::set('view', $this->view);
    }

    function onShowTasks($sort = null) {
        if($sort === null) $sort = Registry::get('sort');
        $data_from_bd = $this->model->getDataTasks($sort, null);
        $this->view->updateViewTasks($data_from_bd);
    }

    function onShowChangeTask($id_task) {
        $data_from_bd = $this->model->getDataTasks(0, $id_task);
        $this->view->showChangeTaskView($data_from_bd);
    }

    function verifyAndUpdateTask($array_new_data) {
        if ($this->model->updateDataTask($array_new_data))
            $this->onShowTasks();
        else
            $this->onShowChangeTask($array_new_data['id']);
    }

    function onDoneTask($id_task) {
        $this->model->doneTask($id_task);
        $this->onShowTasks();
    }

    function onShowCreateTask() {
        $this->view->showCreateTaskView();
    }

    function verifyAndCreateTask($data) {
        if ($this->model->addNewTask($data))
            $this->onShowTasks();
        else
            $this->onShowCreateTask();
    }

    function onLogin($data) {
        $this->model->verifyLoginUser($data);
        $this->onShowTasks();
    }

    function onRegister() {
        $this->view->showNewTaskView();
    }

    function verifyAndCreateUser($data) {
        if ($this->model->createNewUser($data))
            $this->onShowTasks();
        else
            $this->onRegister();
    }

    function onExitUser() {
        $this->model->exitUser();
        $this->onShowTasks();
    }

    function onSortedTask() {

    }
}