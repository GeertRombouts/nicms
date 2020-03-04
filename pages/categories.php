<?php
    include_once("../includes/autoload.inc.php");
    $object = new AutoLoad();
?>
<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta charset="UTF-8">
        <title>Digon | Admin | Categories</title>
        <!--//CDN to ckeditor 5-->
        <script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
        <!--//Link to jquery-->
        <script src="../scripts/jquery.js"></script>
         <!--//Link to functions.js-->
         <script src="../scripts/functions.js"></script>
        <script src="../scripts/script.js"></script>
        <!--Link To CSS-->
        <link rel="stylesheet" type="text/css" href="../styles/style.css">
         <!--Link to Font Awesome-->
         <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    </head>
    <body>

        <?php 
            //Header
            include_once "../includes/header.inc.php";
        ?>
        
        <!--Main-->
        <main class="general-main">
            
            <!-- Navigation bar -->  
            <nav class="container general-nav">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                     <a class="nav-link" href="write.php">Write</a>
                    </li>
                    <li class="nav-item">
                     <a class="nav-link" href="files.php">Files</a>
                    </li>
                    <li class="nav-item">
                     <a class="nav-link active" href="categories.php">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="calendar.php">Calendar</a>
                    </li>
                 </ul> 
            </nav>
            
            <!--Admin actions div-->
            <div class="admin categories-admin-div">
                <button class="btn btn-primary" onclick="Toggleoverlay('open',3)">Add Category</button>
            </div>
            
            <!--Alert messages-->
            <div class="categories-alert-messages"></div>
            
            <!--Container of the directory window-->
            <div class="categories-category-directory-container card card-body bg-light">
                <div class="categories-category-container d-flex flex-row">
                    <?php
                        $CatSubcatObj = new CategoryView();
                        $CatSubcatObj->showCatsAndSubcats();
                    ?>
                </div>
            </div>
            
        </main>

        <!--Overlay-->
        <div class="overlay-wrapper">
            <div class="overlay-box" id="overlayBody">
            </div>
        </div>
        
        <!--Bootstrap & Bootstrap related CDN's-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </body>
</html>


