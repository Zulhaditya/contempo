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

    <script>
    window.addEventListener("play", function(evt) {
        if (window.$_currentlyPlaying && window.$_currentlyPlaying != evt.target) {
            window.$_currentlyPlaying.pause();
        }
        window.$_currentlyPlaying = evt.target;
    }, true);
    </script>


</head>

<body>

    <br>
    <br>
    <table class="table table-dark table-hover align-middle caption-top">
        <caption>Workspace</caption>
        <thead>
            <tr style="text-align: center;">
                <th scope="col">No.</th>
                <th scope="col" class="w-50">Lirik dan Progresi Chord</th>
                <th scope="col" class="w-25">Catatan</th>
                <th scope="col" class="w-25">File Lagu</th>
                <th scope="col">Edit</th>
                <th scope="col">Hapus</th>
            </tr>
        </thead>
        <tbody>
            <?php

        include "koneksi.php";
        include "auth.php";
        include "auth-workspace.php";
        
        $id = $_SESSION['workspace']['id'];
        $no = 1;
        $user = $_SESSION['user']['name'];
        $query = mysqli_query($koneksi, "SELECT * FROM upload_workspace WHERE username='$user'") or die(mysqli_error($koneksi));
        
        while ($result=mysqli_fetch_array($query)) {
    ?>

            <tr>
                <td style="text-align: center;">
                    <?php echo $no++; ?>
                </td>
                <td style="text-align: center;">
                    <!-- <th scope="row">1</th> -->
                    <?php echo $result['workspace']; ?>
                </td>
                <td style="text-align: center;">
                    <!-- <th scope="row">1</th> -->
                    <?php echo $result['note']; ?>
                </td>
                <td>
                    <audio id="music" preload="true" controls>
                        <source src="<?php echo $result['file_lagu'] ?>" type="audio/mp3">
                    </audio>
                </td>

                <td>
                    <button id="EditButton" type="button" class="btn btn-primary"><a href="update.php?updateid=<?php echo $result['id']; ?>" class="text-light" style="text-decoration: none;">Edit</a></button>
                </td>
                <td>
                    <button id="DeleteButton" type="button" class="btn btn-danger" class="text-light"><a href="delete.php?deleteid=<?php echo $result['id']; ?>" class="text-light" style="text-decoration: none;">Delete</a></button>
                </td>
            </tr>
            <?php
   }
  ?>
        </tbody>
    </table>

</body>

</html>