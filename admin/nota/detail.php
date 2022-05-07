<?php 
session_start();
require_once('../../src/utils/common.php');
require_once('../../src/utils/notaModel.php');
require_once('../../src/utils/userModel.php');
require_once('../../src/utils/bukuModel.php');
require_once('../../src/utils/ListTransaksiModel.php');
GetTotalHarga($_GET['id']);

if($_SESSION['isAuthenticated'] === false or !isset($_SESSION['isAuthenticated'])){
    Common::redirect('../../login.php');
}

if (isset($_GET['delete'])) {
    ListTransaksi::delete($_GET['delete']);
}

if (isset($_POST['tambahBuku'])) {
    $idNota = $_POST['id_nota'];
    $newTransaksi = [
        "id_nota" => $idNota,
        "id_buku" => $_POST['tambahBuku']
    ];
    ListTransaksi::create($newTransaksi);
    Common::redirect("/admin/nota/detail.php?id=$idNota");
}

function getTotalHarga(int $idNota){
    $list = ListTransaksi::getByIdNota($idNota);
    $totalHarga = 0;
    foreach ($list as $key => $value) {
        $buku = Buku::getById($value['id_buku']);
        $totalHarga += $buku['harga'];
    }
    $newNota = [
        "id" => $idNota,
        "total_harga" => $totalHarga    
    ];
    Nota::update($newNota);
    return $totalHarga;
}

$nota = Nota::getById($_GET['id']);
$transaksi = ListTransaksi::getByIdNota($nota['id']);
$allBuku = Buku::all();
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
                    <h1 class="text-primary">Detail Nota <?= $nota['id'] ?> - Rp <?= $nota['total_harga'] ?></h1>
                    <form action="" method="POST">
                        <input type="text" name="id_nota" hidden value="<?= $nota['id'] ?>">
                        <div class="row">
                            <div class="mb-1 col-5">
                            <label for="" class="form-label">Tambah transaksi</label>
                            <select class="form-control" name="tambahBuku" id="">
                                <?php  foreach ($allBuku as $key => $value) { ?>
                                    <option value="<?= $value['id'] ?>"><?= $value['judul']." - Rp".$value['harga'] ?></option>
                                <?php } ?>
                            </select>
                            </div>
                            <br>
                            <div class="col-12 mb-3">
                                <button class="btn btn-primary">Tambah</button>
                            </div>
                        </div>
                    </form> 
                    <table id="orderTable" class="table table-stripped">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <td>No</td>
                                    <td>Kasir</td>
                                    <td>Buku</td>
                                    <td>Harga</td>
                                    <td>Tanggal</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($transaksi as $key => $value) { ?>
                                    
                                    <tr>
                                        <td><?= $index ?></td>
                                        <td><?= User::getById($nota['kasir'])['username'] ?></td>
                                        <td><?= Buku::getById($value['id_buku'])['judul'] ?></td>
                                        <td>Rp <?=  Buku::getById($value['id_buku'])['harga'] ?></td>
                                        <td><?= $nota['created_at'] ?></td>
                                        <td>
                                            <a href="/admin/nota/detail.php?id=<?= $nota['id'] ?>&delete=<?= $value['id'] ?>" class="btn btn-sm btn-danger"> <i class="bi bi-trash-fill"></i></a>
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