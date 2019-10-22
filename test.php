<!DOCTYPE html>
<html>
<head>
    <link href="src/css/grille.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    </head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <!--- ici nous auront le contenue de la page en question--->
                <div class="yaya col-md-9">
                      <!---- debut annonce---->
                      <?php
                        for ($i = 1; $i <= 10; $i++){
                            ?>
                    <div class="row">
                        <div class="yaya col-12" style="cursor: pointer" onclick="me();">
                                <div class="row">
                                    <div class=" col-3"><img src="src/images/photoPrincipale.PNG"></div>
                                    <div class=" col-9" style="margin-top: 20px"><p>imple est un s qui </p><p>peut être une variante  </p><?php echo $i ?></div>
                                </div>
                        </div>
                    </div>

                            <?php
                        }
                       ?>
                      <!---- fin ---->
                  </div>
                <!--- ici la partie pu--->
                <div class="yaya col-md-3">pub</div>
            </div>

        </div>
    </div>
</div>
<script>
    function me() {
        console.log("coucou");
    }
</script>
</body>
</html>