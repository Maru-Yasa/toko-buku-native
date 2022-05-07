<?php 
session_start();
require_once('../../src/utils/common.php');
require_once('../../src/utils/bukuModel.php');

if($_SESSION['isAuthenticated'] === false or !isset($_SESSION['isAuthenticated'])){
    Common::redirect('../../login.php');
}
 
if (isset($_POST['judul'])) {
    $post = $_POST;
    if ($_FILES['img']['name'] == "") {
        $newBook = [
            "judul" => $post['judul'],
            "sinopsis" => $post['sinopsis'], 
            "harga" => $post['harga'], 
            "sampul" => "https://www.teralogistics.com/wp-content/uploads/2020/12/default.png"
        ];    
        Buku::create($newBook);
        Common::redirect('/admin/book');
    }
    $image=$_FILES['img']['name']; 
    $imageArr=explode('.',$image); //first index is file name and second index file type
    $rand=rand(10000,99999);
    $newImageName=$imageArr[0].$rand.'.'.$imageArr[1];
    $uploadPath="../../public/img/".$newImageName;
    $isUploaded=move_uploaded_file($_FILES["img"]["tmp_name"],$uploadPath);
    $newBook = [
        "judul" => $post['judul'],
        "sinopsis" => $post['sinopsis'], 
        "harga" => $post['harga'], 
        "sampul" => "/public/img/$newImageName",
    ];    
    Buku::create($newBook);
    Common::redirect('/admin/book');
}

?>

 <!DOCTYPE html>
 <html lang="en">
    <?php require_once('../../src/components/head.php'); ?>
 <body>
    <?php require_once('../../src/components/navbar.php'); ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-5 shadow p-3">
                <h3 class="text-primary">Create Buku</h3>
                <form class="form" action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Judul</label>
                        <input require name="judul" type="text" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="mb-3">
                      <label for="sinopsis" class="form-label">Sinopsis</label>
                      <textarea class="form-control" name="sinopsis" id="sinopsis" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                      <label for="" class="form-label">Harga</label>
                      <input type="number" class="form-control" name="harga" id="" aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Image</label>
                        <input name="img" type="file" class="form-control" id="exampleInputEmail1">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a class="btn btn-danger" href="/admin/book">Back</a>
                </form>
            </div>
        </div>
    </div>

 </body>
 </html>