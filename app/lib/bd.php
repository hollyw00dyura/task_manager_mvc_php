<?php

class Bd {
    /**
     * @param array $data
     */
    public static function insert($data) {
        $sql_value = "";
        $sql_name = "";
        foreach ($data as $key=>$value) {
            if ($sql_name !== "") $sql_name .= ", ";
            if ($sql_value !== "") $sql_value .= ", ";
            $sql_name .= $key;
            $sql_value .= "'".$value."'";
        }
        $sql = "INSERT INTO tasks (".$sql_name.") VALUES (".$sql_value.")";
        Registry::get('bd')->query($sql);
    }

    /**
     * @param array $data
     */
    public static function update($data) {
        $sql_update = "";
        $id = $data["id"];
        foreach ($data as $key=>$value) {
            if ($sql_update !== "") $sql_update .= ", ";
            $sql_update .= $key." = '".$value."'";
        }
        $sql = "UPDATE tasks SET ".$sql_update." WHERE id = ".$id;
        Registry::get('bd')->query($sql);
    }

    /**
     * @param int $id
     * @param mixed count
     * @return array
     */
    public static function get_data($id, $count) {
        if ($count === null)
            $sql = "SELECT * FROM tasks WHERE id = '".$id."'";
        else
            $sql = "SELECT * FROM tasks ORDER BY id LIMIT ".$id.", ".$count;
        $resp = Registry::get('bd')->query($sql);
        $array_bd = [];
        if ($resp->num_rows > 0) {
            $i = 0;
            while ($row = $resp->fetch_assoc())
                $array_bd[$i++] = $row;
        }

        return $array_bd;
    }

    public static function get_count_tasks() {
        $sql = "SELECT COUNT(id) AS count_id FROM tasks";
        $resp = Registry::get('bd')->query($sql);
        if ($resp->num_rows == 0) return 0;
        else return $resp->fetch_assoc()['count_id'];
    }

    /**
     * @param array $data
     *
     * @return bool
     */
    public static function add_login($data) {
        $sql = "SELECT * FROM tasks WHERE login = '".$data['login']."'";
        $resp = Registry::get('bd')->query($sql);
        if ($resp->num_rows == 0) return false;
        self::insert($data);

        return true;
    }

    /**
     * @param array $data
     *
     * @return bool
     */
    public static function get_login($data) {
        $sql = "SELECT * FROM tasks WHERE login = '".$data['login']."' and pass = '".$data['pass']."'";
        $resp = Registry::get('bd')->query($sql);
        if ($resp->num_rows == 0) return false;
        while ($row = $resp->fetch_assoc())
            Registry::set('admin', $row['admin']);

        return true;
    }
}