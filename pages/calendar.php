<?php
    include_once("../includes/autoload.inc.php");
    $object = new AutoLoad();

    if(!isset($_SESSION["userID"])) {
        header("Location: ../index.php");
    }
?>
<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Digon | Admin | Calendar</title>
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
                  
            <!--Alert messages-->
            <div class="calendar-alert-messages"></div>
            
            <div class="row">
                
                <!--Sidebar container-->
                <div class="col-md-3 col-lg-3">
                     <div class='list-group'>
                        <a class='list-group-item list-group-item-action active disabled list-group-items-header'>Filter & sort articles</a>
                        <a class='list-group-item list-group-item-action'>Search articles</a>
                        <a class='list-group-item list-group-item-action list-group-item-light'>
                              <input type="text" name="searchArticles" placeholder="Enter keyword..">
                        </a>
                        <a class='list-group-item list-group-item-action'>Show articles</a>
                        <a class='list-group-item list-group-item-action list-group-item-light'>
                            <select name="selectShowArticles" id="selectSortArticles">
                                <option value="all">All</option>
                                <option value="published">Published</option>
                                <option value="saved">Saved</option>
                            </select>
                        </a>
                        <a class='list-group-item list-group-item-action'>Sort articles</a>
                        <a class='list-group-item list-group-item-action list-group-item-light'>
                            <select name="selectSortArticles" id="selectSortArticles">
                                <option value="DATEDESC">DATE ASC</option>
                                <option value="DATEASC">DATE DESC</option>
                            </select>
                        </a>
                    </div>
                </div>

                <!--Articles container-->
                <div class="col-md-9 col-lg-9 articles-article-overview-container">
                    <?php 
                        $ArticleObj = new ArticleView();
                        $ArticleObj->showArticle(undefined,all,DATEASC);
                    ?>
                </div><!-- Articles container-->   
                
            </div><!--Row-->
            
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

