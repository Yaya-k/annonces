<?php
if(!session_id()) {
    session_start();
}

include "dbbConnexion.php";
if(htmlspecialchars(isset($_SESSION["email"])));
{
    $email=$_SESSION["email"];
//  Récupération de l'utilisateur et de son pass hashé
    $req = $bdd->prepare('SELECT nom, prenom,numero FROM user WHERE email = :email');
    $req->execute(array(
        'email' => $email));

    $resultat = $req->fetch();
    $nom=$resultat["nom"];
    $prenom=$resultat["prenom"];
    $numero=$resultat["numero"];

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">


<link href="src/css/profile1.css" rel="stylesheet">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<!------ Include the above in your HEAD tag ---------->

<!--
User Profile Sidebar by @keenthemes
A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
Licensed under MIT
-->
</head>
<body style="margin-top: 70px">

<div class="container">
    <div class="row profile">
        <div class="col-md-3">
            <div class="profile-sidebar">
                <!-- SIDEBAR USERPIC -->
              <!--  <div class="profile-userpic">
                    <img src="http://keenthemes.com/preview/metronic/theme/assets/admin/pages/media/profile/profile_user.jpg" class="img-responsive" alt="">
                </div>-->
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <?php
                    echo "<div class=\"profile-usertitle-name\">
                        $nom
                    </div>" ?>
                    <div class="profile-usertitle-job">
                        User
                    </div>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR BUTTONS -->
                <div class="profile-userbuttons">
                    <button type="button" class="btn btn-success btn-sm" onclick="location.href='index.php?action=deconnexion'">Déconnexion</button>
                    <button type="button" class="btn btn-danger btn-sm" onclick="location.href='index.php'">Accueille</button>
                </div>
                <!-- END SIDEBAR BUTTONS -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">
                    <ul class="nav">
                        <li class="active">
                            <a href="profileUser.php?action=overview">
                                <i class="glyphicon glyphicon-home"></i>
                                Overview </a>
                        </li>
                        <li >
                            <a href="profileUser.php?action=accountSettings">
                                <i class="glyphicon glyphicon-user"></i>
                                Account Settings </a>
                        </li>
                        <li>
                            <a href="profileUser.php?action=tasks" > <!--- target="_blank" --->
                                <i class="glyphicon glyphicon-ok"></i>
                                Mes annonces </a>
                        </li>
                        <li>
                            <a href="profileUser.php?action=help">
                                <i class="glyphicon glyphicon-flag"></i>
                                Help </a>
                        </li>
                    </ul>
                </div>
                <!-- END MENU -->
            </div>
        </div>
        <div class="col-md-9">
            <div class="profile-content">
                <?php
                    if(htmlspecialchars(isset($_GET["action"])))
                    {
                        if($_GET["action"]=="accountSettings")
                        {
                            ?>
                            <H1>Account</H1>
                            <div class="field">
                                <label class="label">First Name</label>
                                <div class="control">
                                    <input class="input" type="text" id="firstName" placeholder="e.g Alex Smith" <?php echo "value= $nom";?> onkeyup="checkIfFistNameChange();">
                                </div>
                            </div>

                            <div class="field">
                                <label class="label">Last Name</label>
                                <div class="control">
                                    <input class="input" type="text" id="lastName" placeholder="e.g Alex Smith" <?php echo "value= $prenom";?> onkeyup="checkIfFistNameChange();">
                                </div>
                            </div>

                            <div class="field">
                                <label class="label">Email</label>
                                <div class="control">
                                    <input class="input" type="email" id="email" placeholder="e.g. alexsmith@gmail.com" <?php echo "value= $email";?> onkeyup="checkIfFistNameChange();">
                                </div>
                            </div>

                            <div class="field">
                                <label class="label">Numero</label>
                                <div class="control">
                                    <input class="input" type="text" id="numero" placeholder="77 404 98 92" <?php echo "value= $numero"?> onkeyup="checkIfFistNameChange();">
                                </div>
                            </div>
                            <br>
                            <div class="field is-grouped " >
                                <button type="button" class="btn btn-primary " id="submitButtonM" disabled>Update</button>

                            </div>

                            <?php
                        }else if ($_GET["action"]=="tasks")
                        {
                            ?>

                            <div class="list-group">
                                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">List group item heading</h5>
                                        <small>3 days ago</small>
                                    </div>
                                    <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                                    <small>Donec id elit non mi porta.</small>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">List group item heading</h5>
                                        <small class="text-muted">3 days ago</small>
                                    </div>
                                    <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                                    <small class="text-muted">Donec id elit non mi porta.</small>
                                </a>
                            </div>

                            <?php
                        }else if($_GET["action"]=="help")
                        {
                            // ici je vais faire du bulma l'entette et du bostrap
                            ?>


                            <!--Section heading-->
                            <h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>
                            <!--Section description-->
                            <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
                                a matter of hours to help you.</p>
                            </br>
                            <div class="field">
                                <label class="label">Subject</label>
                                <div class="control">
                                    <input class="input" type="text" placeholder="Text input">
                                </div>
                            </div>

                            <div class="field">
                                <label class="label">Message</label>
                                <div class="control">
                                    <textarea class="textarea" placeholder="Textarea"></textarea>
                                </div>
                            </div>

                            <div class="field is-grouped">
                                <div class="control">
                                    <button class="button is-link">Submit</button>
                                </div>
                                <div class="control">
                                    <button class="button is-text">Cancel</button>
                                </div>
                            </div>

                            <?php
                        } else if($_GET["action"]=="overview")
                        {
                            ?>
                            <p class="text-center w-responsive mx-auto mb-5">Hello!! you have X ad you have left ad to have more ad you can write to us

                                </p>
                            <?php

                        }
                    }
                ?>

            </div>



        </div>
    </div>
</div>


<script>
    function checkIfFistNameChange()
    {

        if (document.getElementById('firstName').value !=="<?php echo $nom ?>"
             || document.getElementById('lastName').value !=="<?php echo $prenom ?>"
        || document.getElementById('firstName').value !=="<?php echo $nom ?>"
        || document.getElementById('firstName').value !=="<?php echo $nom ?>")
        {
            console.log("je suis la ");
            document.getElementById("submitButtonM").disabled=false;

        }else
        {
            document.getElementById("submitButtonM").disabled=true;
        }

    }
</script>

</body>
</html>