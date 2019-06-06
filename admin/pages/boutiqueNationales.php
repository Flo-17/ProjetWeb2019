<?php
include ('lib/php/verifier_connexion.php');
?>

<?php
$vue = new Vue_maillot_nationalesDB($cnx);
$liste = array();
$liste = null;
$liste = $vue->getAllMaillotN();
$nbr = count($liste);
?>


<br/>

<h2 id="titre">Catalogue des maillot : Nationales</h2>
<br/>
<div class="container table">
    <table class="table-responsive">
        <tr>
            <th class="ecart">ID</th>
            <th class="ecart">Type</th>
            <th class="ecart">Equipe</th>
            <th class="ecart">Taille</th>
            <th class="ecart">Prix HTVA</th>
            <th class="ecart">Stocks</th>
        </tr>
        <?php
        for ($i = 0; $i < $nbr; $i++) {
            ?>
            <tr>
                <td class="ecart"><?php print $liste[$i]['idproduit']; ?></td>
                <td class="ecart"><?php print $liste[$i]['desc_type']; ?></td>
                <td class="ecart"><?php print $liste[$i]['equipe']; ?></td>
                <td class="ecart"><?php print $liste[$i]['taille']; ?></td>
                <td><span contenteditable="true" name="phtva" class="ecart" id="<?php print $liste[$i]['idproduit']; ?>">
                        <?php print $liste[$i]['phtva']; ?></span>
                </td>
                <td><span contenteditable="true" name="stock" class="ecart" id="<?php print $liste[$i]['idproduit']; ?>">
                        <?php print $liste[$i]['stock']; ?></span>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>  
</div>

