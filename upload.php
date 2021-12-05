<?php
require_once("auth.php");

$judul_lagu = $_POST['judulLagu'];
$genre_lagu = $_POST['genreLagu'];
$desc_lagu = $_POST['descLagu'];

if (isset($_POST['save_audio']) && $_POST['save_audio']=="Upload Audio") {
    $dir='lagu/';
    $audio_path=$dir.basename($_FILES['audioFile']['name']);
    $username = $_SESSION["user"]["name"];
    if (move_uploaded_file($_FILES['audioFile']['tmp_name'],$audio_path)) {
        
        saveAudio($username,$judul_lagu,$genre_lagu,$desc_lagu,$audio_path);
    }
}

function saveAudio($username, $judul_lagu, $genre_lagu, $desc_lagu, $file_lagu){
    $koneksi = mysqli_connect("localhost","root","","db_fp") or die(mysqli_connect_errno());
    if (!$koneksi) {
        die('Server tidak terkoneksi');
    }
    $query = "INSERT INTO upload_lagu(username,judul_lagu,genre_lagu,desc_lagu,file_lagu)
    values('{$username}','{$judul_lagu}','{$genre_lagu}','{$desc_lagu}','{$file_lagu}')";

    mysqli_query($koneksi, $query);

    if (mysqli_affected_rows($koneksi)>0) {
        echo '<script type="text/javascript">
        window.onload = function () { alert("Berhasil upload!"); }</script>';
    }
    mysqli_close($koneksi);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Boxicons CDN Link -->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <!-- Sidebar CSS -->
    <link rel="stylesheet" href="css/sidebar.css" />

    <!-- Content CSS -->
    <link rel="stylesheet" href="css/clone-upload.css" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <title>Upload</title>
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <i class="bx bxl-c-plus-plus icon"></i>
            <div class="logo_name">Contempo</div>
            <i class="bx bx-menu" id="btn"></i>
        </div>

        <ul class="nav list">
            <li>
                <a href="project-user.php">
                    <i class="bx bx-grid-alt"></i>
                    <span class="links_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>

            <li>
                <a href="project-user.php">
                    <i class="bx bx-user"></i>
                    <span class="links_name">User</span>
                </a>
                <span class="tooltip">User</span>
            </li>

            <li class="profile">
                <div class="profile-details">
                    <img src="img/profile.jpg" alt="profileImg" />
                    <div class="name_job">
                        <div class="name">Zulhaditya</div>
                    </div>
                </div>
                <i class="bx bx-log-out" id="log_out"></i>
            </li>
        </ul>
    </div>

    <div class="home-section">
        <div class="row">
            <div class="content col-md-auto" id="contentUtama">
                <div class="main">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <!-- input judul lagu -->
                        <div class="judul form-group">
                            <label for="judulLagu">Judul Lagu</label>
                            <input type="text" class="form-control" id="judulLagu" name="judulLagu" />
                        </div>

                        <!-- input genre -->
                        <div class="genre form-group">
                            <label for="genreLagu">Pilih Genre lagu</label>
                            <input type="text" class="form-control" id="genreLagu" name="genreLagu" />

                        </div>

                        <!-- story lagu -->
                        <div class="descLagu form-group">
                            <label for="descLagu">Deskripsi Lagu</label>
                            <textarea class="form-control" id="descLagu" rows="7" name="descLagu"></textarea>
                        </div>


                        <!-- upload lagu -->
                        <div class="uploadFile">
                            <div class="upload input-group mb-3">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile02"
                                        name="audioFile" />
                                    <label class="custom-file-label" for="inputGroupFile02">Choose
                                        file</label>
                                </div>

                                <input class="btn btn-outline-secondary btnUpload" type="submit" id="uploadLagu"
                                    name="save_audio" value="Upload Audio">

                                </input>
                            </div>


                        </div>



                    </form>




                </div>
            </div>

            <div class="sideContent col">
                <div class="title text-center">
                    <h1>Contempo</h1>
                </div>

                <div class="dflex flex-column">
                    <div class="profile">
                        <a href="project-user.php">
                            <img src="img/profile.png" alt="bg" width="228px" height="150px" class="mx-auto d-block" />
                        </a>

                        <div class="title-profile text-center">
                            <a href="timeline.php">
                                <h4>Profile</h4>
                            </a>
                        </div>
                    </div>
                    <div class="workspace">
                        <a href="workspace.php">
                            <img src="img/workspace.png" alt="bg" width="228px" height="150px"
                                class="mx-auto d-block" />
                        </a>

                        <div class="title-profile text-center">
                            <a href="workspace.html">
                                <h4>Workspace</h4>
                            </a>
                        </div>
                    </div>
                    <div class="upload">
                        <a href="upload.php">
                            <img src="img/upload.png" alt="bg" width="228px" height="150px" class="mx-auto d-block" />
                        </a>

                        <div class="title-profile text-center">
                            <a href="upload.php">
                                <h4>Upload</h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-center text-white">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
            © 2021 Copyright
        </div>
        <!-- Copyright -->
    </footer>

    <script src="js/workspace.js"></script>
    <script src="js/sidebar.js"></script>
</body>

</html>