<!DOCTYPE html>

<?php
require './admin/lib/php/admin_liste_include.php';
$cnx = Connexion::getInstance($dsn, $user, $pass);
?>

<html>
    <head>
        <meta charset="UTF-8">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="admin/lib/css/newStyle2.css"/>
        <title></title>
    </head>
    <body>
        <div class="container">
            <?php       
            if (file_exists('./lib/php/p_menu.php')) {
                require './lib/php/p_menu.php';
            }
            if (!isset($_SESSION['page'])) { 
                $_SESSION['page'] = "accueil"; 
            }
            if (isset($_GET['page'])) {

                $_SESSION['page'] = $_GET['page'];
            }
            $path = "./pages/" . $_SESSION['page'] . '.php';
            if (file_exists($path)) {
                include ($path);
            } else {
                include('./pages/introuvable.php'); 
            }
            ?>
        </div>
        <div class="container text-center " id="footer">
                <?php
                require './pages/footer.php'
                ?>
            </div>

    </body>
</html>
