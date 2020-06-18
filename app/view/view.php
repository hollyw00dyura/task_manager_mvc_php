<?php

class View {
    function updateViewTasks($data) {
        include 'viewTasks.php';
    }

    function showChangeTaskView($data) {
        include 'changeTask.php';
    }

    function showCreateTaskView() {
        include 'newTask.php';
    }

    function showNewTaskView() {

    }
}