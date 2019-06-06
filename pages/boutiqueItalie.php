 <h1 class="titre_boutiqueItalie">Boutique des clubs italiens</h2>
 <br>
 <br>

<?php
//récupération des types pour la liste déroulante
$typ = new TypeDB($cnx);
$types = $typ->getType();
$nbr_type = count($types);

//récupération des produits
$vue = new Vue_maillot_italieDB($cnx);

$liste = array();
$liste = null;
$liste = $vue->getAllMaillotI();
?>

<?php
if ($liste != null) {
    $nbr = count($liste);
    ?>
    <div class="container ecartTop3pc">
        <?php
        for ($i = 0; $i < $nbr; $i++) {
            ?>
            <div class="row">
                <div class="col-sm-3 offset-1 demiContour text-center">
                    <img src="admin/images/<?php print $liste[$i]['image']; ?>" alt="Photo"/><br/><br/>
                </div>
                <div class="col-sm-5 text-center borderBottom">
                    <?php
                    print "<br/>" . $liste[$i]['equipe'] . "<br/><br/>";
                    print "Taille : " . $liste[$i]['taille'] . "<br/><br/>";
                    print $liste[$i]['phtva'] . " €<br/><br/>";
                    if ($liste[$i]['stock'] > 0) {
                        print "Il reste " . $liste[$i]['stock'] . " exemplaire";
                        if ($liste[$i]['stock'] > 1) {
                            print "s";
                        }
                        print " en stock<br/> ";
                    }
                    ?>
                    <p>
                        <br/>
                        <?php
                        if ($liste[$i]['stock'] > 0) {
                        ?>
                        <a href="index.php?page=client&idproduit=<?php print $liste[$i]['idproduit']; ?> " > 
                            ACHETER
                        </a>
                        <?php
                        }
                        else
                        {
                            print 'Objet en rupture de stock...';
                        }
                        ?>
                    </p>
                    -------------------------------------
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <?php
}//fin if $nbr >0
else {
    ?>
    <div class="container">
        <p>( contenu signifiant un problème ... )</p>
    </div>
    <?php
}
