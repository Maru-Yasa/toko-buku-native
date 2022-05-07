<?php 
require_once('conn.php');

class Nota {


    static function all()
    {
        $db = new Conn();
        return $db->assoc("SELECT * FROM nota")->fetchAll();
    }

    static function getById($id)
    {
        $db = new Conn();
        return $db->assoc("SELECT * FROM nota WHERE `id`=$id")->fetch();
    }

    static function create($data)
    {
        $db = new Conn();
        $kasir = $data['kasir'];
        $total_harga = $data['total_harga'];
        
        $sql = "INSERT INTO `nota`(`id`, `kasir`, `total_harga`, `created_at`) VALUES (NULL,'$kasir','$total_harga',current_timestamp())";
        $db->assoc($sql);
        return $db->lastInsertId();
    }

    static function update($data)
    {
        $db = new Conn();
        $id = $data['id'];
        $data['id'] = null;
        $sql = "UPDATE `nota` SET ";
        foreach ($data as $key => $value) {
            if($value !== null){
                $sql .= "`$key` = '$value',";
            }
        }
        $sql = rtrim($sql, ",");
        $sql .= " WHERE `id`='$id'";
        $db->assoc($sql);   
    }

    static function delete($id)
    {
        $db = new Conn();
        $sql = "DELETE FROM `nota` WHERE `nota`.`id` = $id ";
        $db->assoc($sql);
    }

}


?>