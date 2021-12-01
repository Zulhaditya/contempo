<?php 

require_once("auth.php");
$dbhost = 'localhost';
        $db_host = "localhost";
        $db_user = "root";
        $db_pass = "";
        $db_name = "db_fp";
        $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
         if($mysqli→connect_errno ) {
            printf("Connect failed: %s<br />", $mysqli→connect_error);
            exit();
         }
        $sql = "SELECT * FROM upload_lagu";
        $result = $mysqli->query($sql);
        $data_lagu = $result->fetch_assoc();


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
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <!-- Sidebar CSS -->
    <link rel="stylesheet" href="css/sidebar.css" />

    <!-- Content CSS -->
    <link rel="stylesheet" href="css/project-user.css" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

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
                <a href="#">
                    <i class="bx bx-grid-alt"></i>
                    <span class="links_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>

            <li>
                <a href="#">
                    <i class="bx bx-user"></i>
                    <span class="links_name">User</span>
                </a>
                <span class="tooltip">User</span>
            </li>

            <li class="profile">
                <div class="profile-details">
                    <img src="img/profile.jpg" alt="profileImg" />
                    <div class="name_job">
                        <div class="name"><?php echo  $_SESSION["user"]["name"] ?></div>
                    </div>
                </div>
                <a href="index.php"><i class="bx bx-log-out" id="log_out"></i></a>
            </li>
        </ul>
    </div>

    <div class="home-section">
        <div class="row">
            <div class="content col-md-auto" id="contentUtama">
                <div class="main">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Accordion Item #1
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>Lirik dan Progresi Chord : <?php echo $data_lagu['judul_lagu'] ?>
                                    </strong>
                                    <?php echo "<p>".$data_lagu['desc_lagu']."</p>"?>
                                    

                                    <strong>Catatan :</strong>
                                    <p>

                                        It is shown by default,
                                        until the collapse plugin adds the appropriate classes that we use to style each
                                        element. These classes control the overall appearance, as well as the showing
                                        and
                                        hiding via CSS transitions. You can modify any of this with custom CSS or
                                        overriding
                                        our default variables. It's also worth noting that just about any HTML can go
                                        within
                                        the <code>.accordion-body</code>, though the transition does limit overflow.
                                        <strong>This is the first item's accordion body.</strong> It is shown by
                                        default,
                                        until the collapse plugin adds the appropriate classes that we use to style each
                                        element. These classes control the overall appearance, as well as the showing
                                        and
                                        hiding via CSS transitions. You can modify any of this with custom CSS or
                                        overriding
                                        our default variables. It's also worth noting that just about any HTML can go
                                        within
                                        the <code>.accordion-body</code>, though the transition does limit overflow.
                                        <strong>This is the first item's accordion body.</strong> It is shown by
                                        default,
                                        until the collapse plugin adds the appropriate classes that we use to style each
                                        element. These classes control the overall appearance, as well as the showing
                                        and
                                        hiding via CSS transitions. You can modify any of this with custom CSS or
                                        overriding
                                        our default variables. It's also worth noting that just about any HTML can go
                                        within
                                        the <code>.accordion-body</code>, though the transition does limit overflow.


                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Accordion Item #2
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>This is the second item's accordion body.</strong> It is hidden by default,
                                    until the collapse plugin adds the appropriate classes that we use to style each
                                    element. These classes control the overall appearance, as well as the showing and
                                    hiding via CSS transitions. You can modify any of this with custom CSS or overriding
                                    our default variables. It's also worth noting that just about any HTML can go within
                                    the <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Accordion Item #3
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>This is the third item's accordion body.</strong> It is hidden by default,
                                    until the collapse plugin adds the appropriate classes that we use to style each
                                    element. These classes control the overall appearance, as well as the showing and
                                    hiding via CSS transitions. You can modify any of this with custom CSS or overriding
                                    our default variables. It's also worth noting that just about any HTML can go within
                                    the <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="sideContent col">
                <div class="title text-center">
                    <h1>Contempo</h1>
                </div>

                <div class="dflex flex-column">
                    <div class="profile">
                        <a href="timeline.php">
                            <img src="img/profile.png" alt="bg" width="228px" height="150px" class="mx-auto d-block" />
                        </a>

                        <div class="title-profile text-center">
                            <a href="timeline.php">
                                <h4>Profile</h4>
                            </a>
                        </div>
                    </div>
                    <div class="workspace">
                        <a href="workspace.html">
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
                        <a href="upload.html">
                            <img src="img/upload.png" alt="bg" width="228px" height="150px" class="mx-auto d-block" />
                        </a>

                        <div class="title-profile text-center">
                            <a href="upload.html">
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