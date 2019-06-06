$(document).ready(function () {
$("span[id]").click(function () {
    //Récupération du contenu d'origine de la zone cliquée
    var valeur1 = $.trim($(this).text());

    //s'il fallait tester si on utilise edge :
    if (/Edge\/\d./i.test(navigator.userAgent)) {
        $(this).addClass("borderInput");
    }

    var ident = $(this).attr("id");
    var name = $(this).attr("name");

    $(this).blur(function () {
        $(this).removeClass("borderInput");
        //récupération de la nouveau contenu du champ qui vient de perdre le focus (blur)
        var valeur2 = $(this).text();
        valeur2 = $.trim(valeur2);

        if (valeur1 != valeur2) // Si on a fait un changement
        {
            //adjonction des paramètres qui accompagnent le nom du fichier appelé
            var parametre = 'champ=' + name + '&id=' + ident + '&nouveau=' + valeur2;
            var retour = $.ajax({
                type: 'GET',
                data: parametre,
                dataType: "text",
                url: "./lib/php/ajax/ajaxUpdateProduit.php",
                success: function (data) {
                    //rien de particulier à faire
                    console.log("success");
                }
            });
            retour.fail(function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            });
        }
        ;
    });
});
});


$(document).ready(function () {
    // Supprimer le bouton d'envoi
    
    $("#submit_choix_type").remove();
    //contourner le bouton retiré ci-dessus
    $('#choix_type').change(function () {
        // trouver le nom de l'attribut
        var parametre = $(this).attr('name');
        //récupérer la valeur du select 
        var val = $(this).val();
        //construire la chaîne d'url
        var refresh = 'index.php?' + parametre + '=' + val + '&submit_choix_type=1';
        //alert(refresh);
        window.location.href = refresh;
    });
});
