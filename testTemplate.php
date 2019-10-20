<!DOCTYPE html>
<html>
<header>
    <!-- jquery -->

    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>


    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>


    <!-- boostrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">








    <!-- polices pour les titres -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:700&display=swap" rel="stylesheet">
    <script defer src= "https://use.fontawesome.com/releases/v5.0.6/js/all.js "></script>


    <!-- bulma -->
    <!-- css file-->
    <link rel="stylesheet" href="src/css/main.css">
</header>
<body>

<!--Main Navigation-->

<form method="post" action="upload.php" >


    <div class="container">
        <div class="row">
            <div class="col-md-2 col-xs-1" >
                <input name="fileToUpload" type="file"  id="fileToUpload" accept=".gif,.jpg,.jpeg,.png" style="" />
                <span id="supprimerPhotoPrincipale" style="cursor: pointer;display: none;color:red ;">Supprimer</span>

            </div>

            </br>
            <span id='messageIfSameImages' class="col-lg-12"></span>
        </div>

        </br>
        </br>


    </div>
    <button name="submit" type="submit" id="submitAnnonce" class="btn btn-primary col-lg-3" style="margin-left: 4px">Valider</button>

</form>

<script>





</script>

</body>
</html>