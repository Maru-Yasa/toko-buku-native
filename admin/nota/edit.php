<?php 
session_start();
require_once('../../src/utils/common.php');
require_once('../../src/utils/notaModel.php');

if($_SESSION['isAuthenticated'] === false or !isset($_SESSION['isAuthenticated'])){
    Common::redirect('../../login.php');
}

$idNota = $_GET['id'];
Common::redirect("/admin/nota/detail.php?id=$idNota");
?>