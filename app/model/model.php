<?php

class Model extends Verify {
    private $modelTask;
    private $modelUser;

    public function __construct()
    {
        $this->modelTask = new ModelTask();
        $this->modelUser = new ModelUser();
    }

    public function getDataTasks($sort, $current_show_id = null) {
        Registry::set('sort', $sort);
        return $this->modelTask->getDataTasksBd($current_show_id);
    }

    public function updateDataTask($array_new_data) {
        $array_new_data["changed"] = 1;
        return $this->modelTask->updateDataTaskBd($array_new_data);
    }

    public function doneTask($id_task) {
        $array = ["id" => $id_task, "flag_done" => 1];
        $this->modelTask->updateDataTaskBd($array);
    }

    public function verifyLoginUser($data) {
        return $this->modelUser->verifyLoginData($data);
    }

    public function createNewUser($data) {
        return $this->modelUser->verifyAndCreateUser($data);
    }

    public function addNewTask($data) {
        return $this->modelTask->createDataTaskBd($data);
    }

    public function exitUser() {
        $this->modelUser->initGlobalData();
    }
}