<?php
    require '../function.php';
    $mail = $_POST["username"];
    $nama = $_POST["name"];
    $telpon = $_POST["telp"];
    $instansi = $_POST["school"];
    $birth = $_POST["birth"];

    $filename = $_FILES["gambar"]["name"];
    $tempname = $_FILES["gambar"]["tmp_name"];
    $folder = "../img/" . $filename;
    // Now let's move the uploaded image into the folder: image
    move_uploaded_file($tempname, $folder);

    update_karya($folder, $_SESSION["id"]);

    
    $id_pendaftaran =insert_pendaftaran($nama, $instansi, $mail, 'Photography',$_SESSION["id"]);
    insert_anggota($nama, $mail, $telpon, $birth, $id_pendaftaran,$folder);

    header("Location: ../dashboard/lomba.php");
?>