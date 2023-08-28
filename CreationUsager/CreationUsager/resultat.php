<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Usager Créer</title>
    </head>

    <body>
        <?php
            $nom = "";
            $mdp = "";
            $confMdp = "";
            $courriel = "";
            $image = "";
            $date = "";

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $nom = trojan($_POST['nom']);
                $mdp = trojan($_POST['mdp']);
                $confMdp = trojan($_POST['confMdp']);
                $courriel = trojan($_POST['courriel']);
                $image = trojan($_POST['image']);
                $sexe = trojan($_POST['genre']);
                $transport = trojan($_POST['transport']);
                $date = trojan($_POST['dates']);
        ?>

        <h2>Nom : <?php echo $nom; ?></h2><br>
        <h2>mot de passe : <?php echo $mdp; ?></h2><br>
        <h2>confirme de mdp : <?php echo $confMdp; ?></h2><br>
        <h2>courriel : <?php echo $courriel; ?></h2><br>
        <img src="<?php echo $image; ?>" height="500px" width="500px">
        <h2>Sexe :
            <?php 
                if($sexe == "H"){
                    echo "Homme";
                } elseif ($sexe == "F") {
                    echo "Femme";
                } else {
                    echo "Non-genré";
                }
            ?>
        </h2>

        <h2>Transport : 
            <?php 
                if($transport == "A"){
                    echo "Auto";
                } elseif ($transport == "B") {
                    echo "Autobus";
                } elseif ($transport == "M") {
                    echo "Marche";
                } else {
                    echo "Vélo";
                }
            ?>
        </h2>

        <h2>Date : <?php echo $date; ?></h2>

        <?php
            } else {
                echo "Pas le droit";
            }

            function trojan($data){
                $data = trim($data); //Enleve les caractères invisibles
                $data = addslashes($data); //Mets des backslashs devant les ' et les  "
                $data = htmlspecialchars($data); // Remplace les caractères spéciaux par leurs symboles comme ­< devient &lt;
                
                return $data;
            }

            function deTrojan($data){
                $data = removeslashes($data); //Mets des backslashs devant les ' et les  "
                $data = htmlspecialchars($data); // Remplace les caractères spéciaux par leurs symboles comme ­< devient &lt;
                
                return $data;
            }
        ?>


    </body>
</html>