<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Compte Usager</title>
        <link rel="stylesheet" href="css/index.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>

    <body>

        <?php
            $nom = $mdp = $confMdp = $courriel = $image = $date = "";
            $nomErreur = $mdpErreur = $confMdpErreur = $courrielErreur = $imageErreur = $dateErreur = "";
            $erreur = false;


            if ($_SERVER['REQUEST_METHOD'] == "POST"){
                
                if(empty($_POST['nom'])){
                    $nomErreur = "Le nom ne peut pas être vide";
                    $erreur  = true;
                }
                else{
                    $nom = trojan($_POST['nom']);
                }



            }

            if ($_SERVER['REQUEST_METHOD'] != "POST" || $erreur == true){
        ?>

        <div class="container-fluid">
        <div class="row">
                <div class="col-md-4 offset-4 mb-3 text-center">
                    <h1>Création de l'usager</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 offset-4 mb-3">
                    <form action=<p style="color:red;"><?php echo $nomErreur; ?></p> method="post">
                        <input type="text" placeholder="Nom" class="form-control" name="nom" value="<?php echo $nom;?>"><br>
                        <p style="color:red;"><?php echo $nomErreur; ?></p>

                        <input type="password" placeholder="Mot de passe" class="form-control" name="mdp"><br>
                        <input type="password" placeholder="Confirmer le mot de passe" class="form-control" name="confMdp"><br>
                        <input type="text" placeholder="Adresse courriel" class="form-control" name="courriel"><br>
                        <input type="text" placeholder="Votre image (lien)" class="form-control" name="image"><br>
                        <input type="date" name="dates" class="form-control"><br>
                        
                        <select name="transport" class="form-control">
                            <option>Faite un choix</option>
                            <option value="A">Auto</option>
                            <option value="B">Autobus</option>
                            <option value="M">Marche</option>
                            <option value="V">Vélo</option>
                        </select><br>

                        <input type="radio" name="genre" value="H">
                        <label class="choix">Homme</label><br>
                        <input type="radio" name="genre" value="F">
                        <label class="choix">Femme</label><br>                    
                        <input type="radio" name="genre" value="N">
                        <label class="choix">Non genré</label><br><br>
                        <input type="submit" class="form-control">
                    </form>
                </div>
            </div>
        </div>

        <?php
        }
            function trojan($data){
                $data = trim($data); //Enleve les caractères invisibles
                $data = addslashes($data); //Mets des backslashs devant les ' et les  "
                $data = htmlspecialchars($data); // Remplace les caractères spéciaux par leurs symboles comme ­< devient &lt;
            
                return $data;
            }
        ?>

    </body>
</html>

