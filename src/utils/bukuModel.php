<?php 
require_once('conn.php');

class Buku {


    static function all()
    {
        $db = new Conn();
        return $db->assoc("SELECT * FROM buku")->fetchAll();
    }

    static function getById($id)
    {
        $db = new Conn();
        return $db->assoc("SELECT * FROM buku WHERE `id`=$id")->fetch();
    }

    static function create($data)
    {
        $db = new Conn();
        $judul = $data['judul'];
        $sinopsis= $data['sinopsis'];
        $harga = $data['harga'];
        $sampul = $data['sampul'];
        
        $sql = "INSERT INTO `buku` (`id`, `judul`, `sinopsis`, `sampul`, `harga`, `is_avaible`) VALUES (NULL, '$judul', '$sinopsis', '$sampul', '$harga', '1');";
        return $db->assoc($sql);
    }

    static function update($data)
    {
        $db = new Conn();
        $id = $data['id'];
        $data['id'] = null;
        $sql = "UPDATE `buku` SET ";
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
        $sql = "DELETE FROM `buku` WHERE `buku`.`id` = $id ";
        $db->assoc($sql);
    }

    static function search($query)
    {
        $db = new Conn();
        $sql = "SELECT * FROM buku WHERE judul LIKE '%$query%'";
        return $db->assoc($sql)->fetchAll();
    }

}


?>