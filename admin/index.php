<?php
session_start(); //ADMIN
?>

<!doctype html>
<?php
require './lib/php/admin_liste_include.php';
$cnx = Connexion::getInstance($dsn, $user, $pass);
?>

<html>
    <head>
        <meta charset="UTF-8">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <script type="text/javascript" src="lib/js/jsPerso.js"></script>
        <script type="text/javascript" src="lib/js/jsCours.js"></script>
        <link rel="stylesheet" type="text/css" href="lib/css/newStyle2.css"/>

        <title></title>
    </head>
    <body>
        <header>
            <div class="container">
                <?php
                if (file_exists('./lib/php/a_menu.php')) {
                    require './lib/php/a_menu.php';
                }
                ?>
                <div class="">
                    <a href="index.php?page=disconnect.php">Déconnexion</a>
                </div>
            </div>
        </header>
        <section id="main">
            <div class="container">
                <?php
                if (!isset($_SESSION['page'])) { //premiere ouverture du site
                    $_SESSION['page'] = "accueil.php"; //page par défaut
                }
                if (isset($_GET['page'])) {
                    //on a cliqué sur un lien de menu
                    $_SESSION['page'] = $_GET['page'];
                }
                $path = "./pages/" . $_SESSION['page'];
                if (file_exists($path)) {
                    include ($path);
                } else {
                    include ('./pages/introuvable.php');
                }
                ?>              
            </div>
        </section>
        <div class="container text-center " id="footer">
            <?php
            require '../pages/footer.php'
            ?>
        </div>


    </body>
</html>
