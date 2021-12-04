<?php

include 'koneksi.php';
if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    $sql="DELETE FROM upload_workspace WHERE id=$id";
    $result=mysqli_query($koneksi,$sql);
    if ($result) {
        header("Location: workspace-user.php");
    }else {
        die(mysqli_error($koneksi));
    }
}

?>