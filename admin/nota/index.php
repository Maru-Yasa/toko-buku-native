<?php 
session_start();
require_once('../../src/utils/common.php');
require_once('../../src/utils/notaModel.php');
require_once('../../src/utils/bukuModel.php');
require_once('../../src/utils/ListTransaksiModel.php');

if($_SESSION['isAuthenticated'] === false or !isset($_SESSION['isAuthenticated'])){
    Common::redirect('../../login.php');
}

function getTotalHarga(int $idNota){
    $list = ListTransaksi::getByIdNota($idNota);
    $totalHarga = 0;
    foreach ($list as $key => $value) {
        $buku = Buku::getById($value['id_buku']);
        $totalHarga += $buku['harga'];
    }
    return $totalHarga;
}

$allNota = array_reverse(Nota::all());
$index = 1;
?>
 <!DOCTYPE html>
 <html lang="en">
    <?php require_once('../../src/components/head.php'); ?>
 <body>
     
    <div class="container-fluid">
        <div class="row">
            <?php require_once('../../src/components/sidebar.php'); ?>
            <div class="col-sm p-3 min-vh-100 row justify-content-center">
                <div class="col-10 mt-5">
                    <h1 class="text-primary">Nota</h1>
                    <a class="btn btn-sm btn-primary" href="/admin/nota/create.php">Create <i class="bi bi-plus"></i></a>
                    <table id="orderTable" class="table table-stripped">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <td>No</td>
                                    <td>Kasir</td>
                                    <td>Jumlah Barang</td>
                                    <td>Total Harga</td>
                                    <td>Tanggal</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($allNota as $key => $value) { ?>
                                    
                                    <tr>
                                        <td><?= $index ?></td>
                                        <td><?= $value['kasir'] ?></td>
                                        <td><?= count(ListTransaksi::getByIdNota($value['id'])) ?></td>
                                        <td>Rp <?= getTotalHarga($value['id']) ?></td>
                                        <td><?= $value['created_at'] ?></td>
                                        <td>
                                            <a href="/admin/nota/delete.php?id=<?= $value['id'] ?>" class="btn btn-sm btn-danger"> <i class="bi bi-trash-fill"></i></a>
                                            <a href="/admin/nota/edit.php?id=<?= $value['id']?>" class="btn btn-sm btn-primary"> <i class="bi bi-pencil-fill"></i></a>
                                            <a href="/admin/nota/detail.php?id=<?= $value['id']?>" class="btn btn-sm btn-primary"> <i class="bi bi-eye-fill"></i></a>
                                        </td>
                                    </tr>
                                    <?php $index++ ?>
                                <?php } ?>
                            </tbody>
                            <script>
                                $(document).ready(function() {
                                    $('#orderTable').DataTable();
                                } );
                            </script>
                    </table>
                </div>
            </div>
        </div>
    </div>


 </body>
 </html>