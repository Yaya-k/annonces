
<!-- don't try to undestund this code! you will lose your mind-->
<?php if(!session_id()) {
session_start();
}?>
<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">


</head>
<body >
    <nav class="navbar is-fixed-top is-light" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="index.php">
                <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
            </a>

            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item" href="index.php">
                    Home
                </a>
                <div class="navbar-item">
                    <div class="buttons">
                        <a class="button is-danger" href="annonce.php">
                            <strong>Déposer une annonce</strong>
                        </a>

                    </div>
                </div>

                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        More
                    </a>

                    <div class="navbar-dropdown">
                        <a class="navbar-item">
                            About
                        </a>
                        <a class="navbar-item">
                            Jobs
                        </a>
                        <a class="navbar-item">
                            Contact
                        </a>
                        <hr class="navbar-divider">
                        <a class="navbar-item">
                            Report an issue
                        </a>
                    </div>
                </div>
            </div>
            <?php
             if(htmlspecialchars(!isset($_SESSION["email"])))
             {
                  ?>

                 <div class="navbar-end">
                     <div class="navbar-item">
                         <div class="buttons">
                             <a class="button is-primary" href="inscription.php">
                                 <strong>Sign up</strong>
                             </a>
                             <a class="button is-light" href="logIn.php">
                                 Log in
                             </a>
                         </div>
                     </div>
                 </div>

         <?php    } else {

                 ?>
            <div class="navbar-end">
                <div class="navbar-item">
                    <div class="buttons">
                        <?php
                            if($_SESSION["email"]== "yaya.kamissokho@gmail.com"){
                                ?>
                                <a class="button is-warning" href="admin/index.php">
                                    <strong>administrer</strong>
                                </a>
                                <?php

                        }
                        ?>

                        <a class="button is-primary" href="profileUser.php?action=overview">
                            <strong>Profile</strong>
                        </a>
                        <a class="button is-light" href="index.php?action=deconnexion">
                            deconection
                        </a>
                    </div>
                </div>
            </div>
     <?php        }
            ?>

        </div>
    </nav>
<!-- recherche button-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</body>

</html>