<?php 
session_start();
require_once('../../src/utils/common.php');
require_once('../../src/utils/notaModel.php');
require_once('../../src/utils/bukuModel.php');
require_once('../../src/utils/ListTransaksiModel.php');

if($_SESSION['isAuthenticated'] === false or !isset($_SESSION['isAuthenticated'])){
    Common::redirect('../../login.php');
}
$userID = $_SESSION['user']['id'];
$newNota = Nota::create([
    "kasir" => $userID,
    "total_harga" => 0,
]);

Common::redirect("/admin/nota/detail.php?id=$newNota");

?>  