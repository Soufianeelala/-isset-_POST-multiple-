<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
if(isset($_POST['pseudo']) && isset($_POST['couleur']) ){

    $pseudo=$_POST['pseudo'] ;// Récupère la valeur 
    $couleur =$_POST['couleur'];// Récupère la valeur 

}

?>
<body style="background-color:<?php if (isset($_POST['couleur'])) { echo $_POST['couleur']; } ?>">
   


    <h1>Exercices PHP – Formulaires </h1>
    <h3>exo1-Requête GET via URL </h3>
    
 
    <?php
   if (isset($_GET['ville']) && isset($_GET['transport'])){
    echo "La ville choisie est " . ($_GET['ville']) . " et le voyage se fera en " . ($_GET['transport']) . "!";
    
}
    ?>
     <h3> 2.Requête GET via Formulaire  </h3><br>
     <form action="index.php" method = "POST">
        <label for="animal">Entrez un nombre :</label>
        <input id="animal" type="text" name="animal">
        <button>Teste</button>
    </form>
<?php
    if( isset($_POST['animal'])){
        $animal=$_POST['animal'];
        echo"« Votre animal choisi est :" . $animal . "» ";

    }
   
    ?>
  <h3>3.Requête POST  </h3>
  <form action="index.php" method="POST">
    <label for="pseudo" >Entrer votre Pseudo:</label>
    <input id ="pseudo" type="text" name="pseudo">
    <label for="couleur">Sélectionnez une couleur :</label>
    <select id="couleur" name="couleur">
        <option value="red">Rouge</option>
        <option value="blue">Bleu</option>
        <option value="green">Vert</option>
    </select>
    <button type="submit">Envoyer</button>
</form>

<h1>Le Pseudo<?php if (isset($_POST['pseudo'])) { echo $_POST['pseudo']; } ?> <p>La couleur choisie est : <strong><?php if (isset($_POST['couleur'])) { echo $_POST['couleur']; } ?></strong></p></h1>


<h3> 4.Dés numériques   </h3>
<form action="index.php" method="POST">
    <label for="multiple" >Entrer des multiples de 6 :</label>
    <input id ="multiple" type="text" name="multiple">
    <button type="submit">Envoyer</button>

    <?php
if (isset($_POST['multiple'])) {
            $multiple = $_POST['multiple'];    // Récupère la valeur 

    
    if ($multiple % 6 == 0) {
        $nombreAleatoire = rand(1, $multiple);
        echo "<p>« Votre multiple choisi est : $multiple »</p>";
        echo "<p>Nombre aléatoire généré : $nombreAleatoire</p>";    }
        else{
            header("Location:index.php?error=error");
            exit();
        }
       
 
    }
    if (isset($_GET["error"])) {
        echo "<p style='color: red' >Erreur :le nombre choisi n'est pas valide.  </p>";
        
    }
 
?>
<h3>  5.Authentification    </h3>
<form action="index.php" method="POST">
    <label for="username" >Username :</label>
    <input id ="username" type="text" name="multiple">
    <br><br>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>
        <br><br>
        <button type="submit">Se connecter</button>
        <?php
           
            if (isset($_POST['username']) && isset($_POST['password'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
        
                // Vérification des identifiants
                if ($username === "admin" && $password === "1234") {
                   header("Location:index.php?error=error");
                   
            exit();
               
            }
        }

        ?>
       



</body>
</html>