<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <!-- Sidebar CSS -->
    <!-- <link rel="stylesheet" href="css/sidebar.css" /> -->

    <!-- Content CSS -->
    <!-- <link rel="stylesheet" href="css/project-user.css" /> -->
    <!-- Bootstrap CSS -->
    

    <script type="text/javascript">

        $(document).ready(function(){

            // Load Data Lagu
            loadData();

            function loadData() {
            $.ajax({
                url: 'data-lagu.php',
                type: 'get',
                success: function(data) {
                    $('#contentData').html(data);
                }
            });
        }

        });

        

    </script>

    <title>Upload</title>
</head>

<body>
    <div class="container">
        <h2 style="text-align: center;">Data Lagu</h2>
        <div id="contentData"></div>

    </div>
    

</body>

</html>