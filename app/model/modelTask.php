<?php

class ModelTask extends ModelVerify {

    private function setGlobalBeforeLogin()
    {
        Registry::set('message_update_task', "");
        Registry::set('message_new_task', "");
    }

    function pagination($showPage, $count) {
        $count_id = BD::get_count_tasks();
        $maxPages = $count_id / $count;
        $leftLimitMax = Registry::get('leftLimitMax');
        $rightLimitMax = Registry::get('rightLimitMax');
        $array = [];
        $item = 0;
        if ($showPage > $leftLimitMax && $showPage < ($maxPages - $rightLimitMax)) {
            for ($i = $showPage - $leftLimitMax; $i <= $showPage + $rightLimitMax; $i++, $item++)
                $array[$item] = $i;
        } elseif ($showPage <= $leftLimitMax) {
            for ($i = 1; $i <= $showPage + $rightLimitMax; $i++, $item++)
                $array[$item] = $i;
        } else {
            for ($i = $showPage - $leftLimitMax; $i <= $maxPages; $i++, $item++)
                $array[$item] = $i;
        }
        Registry::set('pagination', $array);
    }

    function getDataTasksBd($current_show_id) {
        $count = Registry::get('countOnPage');
        $showPage = (int)Registry::get('showPage');
        $this->pagination($showPage, $count);
        if ($current_show_id === null)
            $current_show_id = $showPage * $count;
        else $count = null;

        return BD::get_data($current_show_id, $count);
    }

    function updateDataTaskBd($data) {
        $this->setGlobalBeforeLogin();
        $this->defender_xss($data);
        switch ($this->verifyDataTask($data, 'update')) {
            case 1:
                return true;
                break;
            case 0:
                Registry::set('message_update_task', "Не верный формат поля email");
                break;
            case -1:
                Registry::set('message_update_task', "Необходимо заполнить все поля");
                break;
            default:
                break;
        }
        return false;
    }

    function createDataTaskBd($data) {
        $this->setGlobalBeforeLogin();
        $this->defender_xss($data);
        switch ($this->verifyDataTask($data, 'insert')) {
            case 1:
                return true;
                break;
            case 0:
                Registry::set('message_new_task', "Не верный формат поля email");
                break;
            case -1:
                Registry::set('message_new_task', "Необходимо заполнить все поля");
                break;
            default:
                break;
        }
        return false;
    }
}