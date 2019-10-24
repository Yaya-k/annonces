<?php
// On démarre la session AVANT d'écrire du code HTML

// je sais que c de la merde mais ne me juge pas j'avais sommeil
if(!session_id()) {
    session_start();
}
include "dbbConnexion.php";
include 'ChromePhp.php';



if(htmlspecialchars(isset($_GET["action"])) )
{
    if(isset($_GET["action"])=="deconnexion")
    {
        session_destroy();
        unset($_COOKIE["email"]);
        // empty value and expiration one hour before
        $res = setcookie("email", '', time() - 3600);
    }

}
if(htmlspecialchars(isset($_POST["rememberMe"])) )
{
    if(isset($_POST["email"]))
    setcookie('email', $_POST["email"], time() + 0.1*24*3600, null, null, false, true);

}
//if(htmlspecialchars(isset($_POST["email"])) and htmlspecialchars(isset($_POST["password"])))
//{
 //   $_SESSION["email"]=$_POST["email"];

//}
if(htmlspecialchars(isset($_COOKIE["email"]))){
    $_SESSION["email"]=$_COOKIE["email"];

}

?>

<!--<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>-->


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>


<!-- boostrap -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<?php


// ici je gere l'inscription des nouveau membres
if(htmlspecialchars(isset($_POST['registerButton'])))
{
// je me connecte a la base de donner



    $nom = $_POST['firstName'];
    $prenom = $_POST['lastName'];
    $email =$_POST['email'];
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $birthday = $_POST['birthDate'];
    $numero = $_POST['phoneNumber'];

    $sql = "INSERT   user (nom, prenom, email, password, birthday, numero) VALUES(?,?,?,?,?,?)";
    $stmtinsert = $bdd->prepare($sql);
    $result = $stmtinsert->execute([$nom, $prenom, $email, $password, $birthday, $numero]);
    if($result){
        ?>
        <div class="container">
            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> votre inscription nous a ete envoyer.
            </div>
        </div>

        <?php
        $_SESSION["email"]=$_POST["email"];
    }else{
        ?>
        <div class="container">
            <div class="alert alert-warning alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Warning!</strong> Nous avons rencontrer une eureur en interne les devolopeurs on etais notifier.
            </div>
        </div>
        <?php
    }



}

//$reponse = $bdd->query('SELECT * FROM user');

//while ($donnees = $reponse->fetch())
//{
//   echo $donnees['nom'] . '<br />';
//}

//$reponse->closeCursor();


?>

<?php

// ici la connection des membres

if(htmlspecialchars(isset($_POST["submitLogin"])))
{
    $email=$_POST["email"];
//  Récupération de l'utilisateur et de son pass hashé
    $req = $bdd->prepare('SELECT id, password FROM user WHERE email = :email');
    $req->execute(array(
        'email' => $email));

    $resultat = $req->fetch();

// Comparaison du pass envoyé via le formulaire avec la base
    $isPasswordCorrect = password_verify($_POST['password'], $resultat['password']);

    if (!$resultat)
    {
        $_SESSION["error"]="Mauvais identifiant mot de passe !";
        header("location:logIn.php");
        return;
    }
    else
    {
        if ($isPasswordCorrect) {
            $_SESSION['id'] = $resultat['id'];
            $_SESSION['email'] = $email;

            $_SESSION["error"]='';
        }
        else {
            $_SESSION["error"]="Mauvais identifiant mot de passe !";
            header("location:logIn.php");

            return;
        }
    }



}

?>

<?php


// ici je me connecte a la base annonce_en_cours


$imageNumber=0;

$imageNames=array('fileToUpload','file2ToUpload','file3ToUpload','file4ToUpload','file5ToUpload');
$everythingIsOk = true;
 $imagesPath=array();

// ici je vais mettre les fonctions don j'aurais besoin
// hummmmmmmm
function upload($inputName){
    try{

        // the place of the images  $_FILES[$inputName]["name"]
        $target_dir = "uploads/";
        $ext = pathinfo($_FILES[$inputName]["name"], PATHINFO_EXTENSION);

        $target_file = $target_dir . microtime().'.'.$ext;
        $target=str_replace(' ','',$target_file);

        move_uploaded_file($_FILES[$inputName]["tmp_name"], $target);
        return $target_file;

    }catch (Exception $e){
        die ('File did not upload: ' . $e->getMessage());
        return null;

    }

}

// verifier si il y a une image
function checkIfWeAreAImage($inputName){

    if(!empty($_FILES[$inputName]["tmp_name"]))
    {
        return true;
       // $check = getimagesize($_FILES[$inputName]["tmp_name"]);
       // if($check !== false) {
        //    return true;
       // } else {
        //    return false;
       // }
    }else{
        return false;
    }

}


// ici le  de mettre une annonce


if(isset($_POST["submitAnnonce"])){

    // ici nous allons recuperer les autres valleurs
    if(htmlspecialchars(!isset($_POST['itemCcategorie']))){

        $everythingIsOk=false;

    }
    if(htmlspecialchars(!isset($_POST['itemLocalisation']))){
        $everythingIsOk=false;
    }
    if(htmlspecialchars(!isset($_POST['itemTitre']))){
        $everythingIsOk=false;

    }
    if (htmlspecialchars(!isset($_POST['itemMessage']))){
        $everythingIsOk=false;

    }
    if (htmlspecialchars(!isset($_POST['itemPrix']))){
        $everythingIsOk=false;
    }

    // i check if tous vas bien
    if($everythingIsOk){

        // ici je vais ecrire dans la base

        // on commence par la table annonce
        $id_user=$_SESSION['id'];
        $categorie = $_POST['itemCcategorie'];
        $localisation = $_POST['itemLocalisation'];
        $titre =$_POST['itemTitre'];
        $description = $_POST['itemMessage'];
        $prix = $_POST['itemPrix'];

        $sql = "INSERT   annonces_en_cours (id_user, categorie, localisation, titre, description, prix) VALUES(?,?,?,?,?,?)";
        $stmtinsert = $bdd->prepare($sql);

        $result = $stmtinsert->execute([$id_user, $categorie, $localisation, $titre, $description, $prix]);

        $id_annonce=$bdd->lastInsertId();
        // je remplis la base d'image $imagesPath

        if($result){ // si j'arrive a ecrire sur le base je remplit la base d'image

            // je telecharge les images de l'utilisateur
            for($i=0;$i<sizeof($imageNames);$i++){
                ChromePhp::log(sizeof($imageNames));
                if(checkIfWeAreAImage($imageNames[$i])){
                    $path =upload($imageNames[$i]);
                    $sqlI = "INSERT   images (id_annonce	, path) VALUES(?,?)";
                    $stmtinsertI = $bdd->prepare($sqlI);
                    $resultI = $stmtinsertI->execute([$id_annonce, $path]);

                }
            }
                ?>
            <div class="container">
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong> votre annonce nous a ete envoyer.
                </div>
            </div>


            <?php

        }else{
            ?>
            <div class="container">
                <div class="alert alert-warning alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Warning!</strong> Nous avons rencontrer une eureur en interne les devolopeurs on etais notifier.
                </div>
            </div>

            <?php
        }


    }else{
        ?>
        <div class="container">
            <div class="alert alert-warning alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Warning!</strong> Nous avons rencontrer une eureur en interne les devolopeurs on etais notifier.
            </div>
        </div>
        <?php
    }


}

?>

<!-- don't try to undestund this code! you will lose your mind-->
<!DOCTYPE html>
<br lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">



    <?php include ("header.php");?>


</head>
<body style="margin-top: 70px">


<?php
if(htmlspecialchars(isset($_SESSION["email"])) or htmlspecialchars(!isset($_POST["submitLogin"]))
    or htmlspecialchars(!isset($_POST["registerButton"])) or htmlspecialchars(!isset($_POST["submitAnnonce"])))
include ("rechercheform.php");
$_SESSION["error"]='';


    ?>
<!-- nous allons recuperer les donner provenend de pages submitAnnonce-->
</br>
</br>
</br>
<?php include 'test.php'?>


    </br>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</body>

</html>