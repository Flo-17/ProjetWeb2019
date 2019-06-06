<hgroup>
    <h3 class="aligner txtGras">Achat de maillot</h3>
</hgroup>

<?php
if (isset($_GET['commander'])) {
    extract($_GET, EXTR_OVERWRITE);

    if (empty($nom) || empty($prenom) || empty($cp) || empty($localite) || empty($rue) || empty($num) || empty($tel) || empty($email1) || empty($email2) || empty($password)) {
        $erreur = "<span class='txtRouge txtGras'>Veuillez remplir tous les champs.</span>";
        print $erreur;
    } else if(($email1) != ($email2)) {
        $erreur = "<span class='txtRouge txtGras'>Les emails ne correspondent pas. Veuillez vérifier.</span>";
        print $erreur;
    }
    else
    {
        $cl = new ClientDB($cnx);
        $retour = $cl->addClient($_GET);
        if ($retour == 1) {
            print "<br/>Client encodé !";
            print '<br/><br/>Achat correctement effectué, verifiez vos mails pour avoir une confirmation.<br/><br/>';
            $up = new StockDB($cnx);
            $update = $up->updateStock($id_commande);
        } else if ($retour == 2) {
            print "<br/>Déjà encodé!";
        }
    }
}

$ok = 0;

if (!isset($_GET['idproduit'])) {
    print "<p><br/><span class='txtGras'>Pour commander un article, choisissez <a href='index.php?page=boutiqueItalie'>ici</a> ou <a href='index.php?page=boutiqueNationales'>ici</a> votre article</span></p>";
} else {
    print "<br/>Détail du produit commandé <br/><br/>";

    $vue = new Vue_maillot_italieDB($cnx);
    $vue2 = new Vue_maillot_nationalesDB($cnx);
    $x = $vue->getAllMaillotI();
    $x2 = $vue2->getAllMaillotN();
    if ($_GET['idproduit'] < 200) {
        $nb = $x[$_GET['idproduit'] - 1]; // l'élément 1 de la table étant à l'emplacement 0
        $img = $nb['image'];
    } else if ($_GET['idproduit'] > 200) {
        $nb = $x2[$_GET['idproduit'] - 201]; // pour retourner l'élément de la vue, étant donné que les maillots des nationales commencent à l'id 201
        $img = $nb['image'];
    }
    $infos = "Maillot de l'équipe : " . $nb['equipe'] . ". Taille : " . $nb['taille'] . ". Matière : " . $nb['desc_type'] . ". Le prix à payer, HTVA, est de " . $nb['phtva'] . ".";
    $x = ($_GET['idproduit']);
    ?>

    <div class="col-xs-8 pull-left">
        <br/><span class="txtStyle">Votre commande : </span><br/><br/><span class ="txtGreen"><?php print $infos ?><br/><span class="txtRouge"></span></span><br/>
    </div>   
    <div>
        <div class="col-xs-4 col-sm-2">
            <img src="admin/images/<?php print $img; ?>" alt="Votre commande"/>
        </div>

    </div>
    <br/>
    <span class="txtGras">Veuillez entrer vos coordonnées :</span> <br/><br/>

    <div class="container">

        <?php
        if (isset($erreur))
            print $erreur;
        ?>

        <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get" id="form_commande">
            <br/>
            <br/>
            <label for="nom">Nom </label>                
            <input type="text" name="nom" id="nom" />
            <br/>
            <label for="prenom">Prénom </label>
            <input type="text" name="prenom" id="prenom" />
            <br/>
            <label for="cp">CP </label>
            <input type="text" name="cp" id="cp" />
            <br/>
            <label for="localite">Localité </label>
            <input type="text" name="localite" id="localite" />
            <br/>
            <label for="rue">Rue </label>
            <input type="text" name="rue" id="rue" />
            <br/>
            <label for="num">Numéro </label>
            <input type="text" name="num" id="num" />
            <br/>
            <label for="tel">Tel </label>
            <input type="text" name="tel" id="tel" placeholder="xxx/xx.xx.xx"/>           
            <br/>
            <label for="email1">Email</label>                
            <input type="email" id="email" name="email1" placeholder="aaa@aaa.aa"/>
            <br/>          
            <label for="email2">Confirmez votre email</label>
            <input type="email" id="email2" name="email2" placeholder="aaa@aaa.aa"/>
            <br/>
            <label for="password">Mot de passe</label>                
            <input type="password" name="password" id="password" />
            <br/>
            <input type="hidden" name="id_commande" value="<?php print $_GET['idproduit']; ?>"/>
            <input type="submit" name="commander" id="commander" value="Finaliser ma commande" class="pull-right"/>&nbsp;           
            <input type="reset" id="reset" value="Annuler" class="pull-left"/>
        </form>
    </div>
    <?php
}
?>

