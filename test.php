<!DOCTYPE html>
<html>
<head>
    <link href="src/css/grilleOrganisation.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

</head>
<body>
<div class="container">
    <div class="row">
        <div class="yaya col-lg-12"> yaya
            <div class="row">
                <!--- ici nous auront le contenue de la page en question--->
                <div class="yaya col-lg-8">contenue


                  <div class="row">


                      <!---- debut annonce---->
                      <?php
                        for ($i = 1; $i <= 10; $i++){

                            ?>
                            <div class="yaya col-lg-12"> annonce 1
                                <div class="row">
                                    <div class="yaya col-lg-2">4 colonnes</div>

                                    <div class="yaya col-lg-offset-2 col-lg-8">8 colonnes</div>
                                </div>
                            </div>

                            <?php
                        }
                       ?>

                      <!---- fin ---->




                  </div>


                </div>

                <!--- ici la partie pu--->
                <div class="yaya col-lg-4">pub</div>
            </div>

        </div>
    </div>
</div>
</body>
</html>