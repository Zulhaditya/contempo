<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Upload</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


</head>

<body>
<br>
<br>
<table class="table table-dark table-hover">
    <thead>
        <tr style="text-align: center;">
            <th scope="col">No.</th>
            <th scope="col" class="w-25">Judul Lagu</th>
            <th scope="col" class="w-25">Genre lagu</th>
            <th scope="col" class="w-25">Creator</th>
            <th scope="col" class="w-25">Mainkan</th>
        </tr>
    </thead>
    <tbody>
        <?php

        include "koneksi.php";
        include "auth.php";
        $no = 1;
        $query = mysqli_query($koneksi, "SELECT * FROM upload_lagu") or die(mysqli_error($koneksi));

        while ($result=mysqli_fetch_array($query)) {
    ?>

            <tr>
                <td style="text-align: center;">
                    <?php echo $no++; ?>
                </td>
                <td style="text-align: center;">
                    <!-- <th scope="row">1</th> -->
                    <?php echo $result['judul_lagu']; ?>
                </td>
                <td style="text-align: center;">
                    <!-- <th scope="row">1</th> -->
                    <?php echo $result['genre_lagu']; ?>
                </td>
                <td style="text-align: center;">
                    <!-- <th scope="row">1</th> -->
                    <?php echo $result['username']; ?>
                </td>
                <td style="text-align: center;">
                    <button id="EditButton" value="<?php echo $result['IdMhsw']; ?>">Play</button>
                </td>
            </tr>
            <?php
   }
  ?>
    </tbody>
</table>

</body>

</html>