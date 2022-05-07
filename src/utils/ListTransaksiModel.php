<?php 
require_once('conn.php');

class ListTransaksi {


    static function all()
    {
        $db = new Conn();
        return $db->assoc("SELECT * FROM list_transaksi")->fetchAll();
    }

    static function getById($id)
    {
        $db = new Conn();
        return $db->assoc("SELECT * FROM list_transaksi WHERE `id`=$id")->fetch();
    }

    static function getByIdNota($id)
    {
        $db = new Conn();
        return $db->assoc("SELECT * FROM list_transaksi WHERE `id_nota`=$id")->fetchAll();
    }

    static function create($data)
    {
        $db = new Conn();
        $id_nota = $data['id_nota'];
        $id_buku = $data['id_buku'];
        
        $sql = "INSERT INTO `list_transaksi`(`id`, `id_nota`, `id_buku`) VALUES (Null,'$id_nota','$id_buku')";
        return $db->assoc($sql);
    }

    static function update($data)
    {
        $db = new Conn();
        $id = $data['id'];
        $data['id'] = null;
        $sql = "UPDATE `list_transaksi` SET ";
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
        $sql = "DELETE FROM `list_transaksi` WHERE `list_transaksi`.`id` = $id ";
        $db->assoc($sql);
    }

}


?>