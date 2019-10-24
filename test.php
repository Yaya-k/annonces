<?php
if(!session_id()) {
    session_start();
}
include 'dbbConnexion.php';
$arr_rows = array();
$arr_rows_images=array();
$reponse = $bdd->query('SELECT prix,titre,description,localisation,categorie,id,id_user,date_ FROM annonces ORDER by id DESC ');


while ($resultat = $reponse->fetch()){
    $arr_rows[]=$resultat;
    // nous allons ranger les images associer au annonces
    $id_annonce=$resultat['id'];
    $request = $bdd->prepare('SELECT path FROM images WHERE id_annonce = :id_annonce');
    $request->execute(array(
        'id_annonce' => $id_annonce));
    $arr_rows_images[] = $request->fetch();
    }
$_SESSION['annoncesBrute']=$arr_rows;
$_SESSION['nombresAnnonces']=sizeof($arr_rows);
$_SESSION['imagesAnnoncesBrute']=$arr_rows_images;
$_SESSION['numeroPageActive']=1;
$_SESSION['numeroPage1']=1;
$_SESSION['numeroPage2']=2;
$_SESSION['numeroPage3']=3;
//foreach ($arr_rows_images as $nom){
//    if (is_array($nom))
//    foreach ($nom as $pth){
 //       echo $pth;
 //   }
//}

?>
<?php
if(isset($_GET['Ppage'])){
    if($_GET['Ppage']=='previous'){
        if($_SESSION['numeroPage1']>1){
            $_SESSION['numeroPage1']=$_SESSION['numeroPage1']-1;
            $_SESSION['numeroPage2']=$_SESSION['numeroPage2']-1;
            $_SESSION['numeroPage3']=$_SESSION['numeroPage3']-1;
        }
    }elseif ($_GET['Ppage']=='next'){
        if($_SESSION['nombresAnnonces']-$_SESSION['numeroPage3']*10>1){
            $_SESSION['numeroPage1']=$_SESSION['numeroPage1']+1;
            $_SESSION['numeroPage2']=$_SESSION['numeroPage2']+1;
            $_SESSION['numeroPage3']=$_SESSION['numeroPage3']+1;
        }
    }
}
if(isset($_GET['page'])){
    $_SESSION['numeroPageActive']=(int)$_GET['page'];
}
?>

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
                      $arr_rows_images=$_SESSION['imagesAnnoncesBrute'];
                      $arr_rows=$_SESSION['annoncesBrute'];
                      if($_SESSION['nombresAnnonces']-($_SESSION['numeroPageActive']-1)*10>10)
                      {
                          $nombre=$_SESSION['numeroPageActive']*10;
                      }else
                      {
                          $nombre=$_SESSION['nombresAnnonces'];
                      }

                      for ($i = $_SESSION['numeroPageActive']*10-10; $i <$nombre; $i++){
                          if (is_array($arr_rows_images[$i])){
                              $path=str_replace(' ','',$arr_rows_images[$i][0]);

                          }else{
                              $path="src/images/photoPrincipale.PNG";
                          }
                              ?>
                    <div class="row">
                        <div class="yaya col-12" style="cursor: pointer" onclick="me();">
                                <div class="row">
                                    <div class=" col-3"><img src=<?php echo $path?> ></div>
                                    <div class=" col-9" style="margin-top: 20px;line-height: 20px"><p><strong><?php echo $arr_rows[$i]['titre'] ?> </strong></p>
                                        <p><?php echo $arr_rows[$i]['description'] ?> </p>
                                        <span style="margin-right: 20px"><?php echo $arr_rows[$i]['prix'].' CFA'?></span> <span><?php echo $arr_rows[$i]['date_'] ;?></span>
                                    </div>
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
</br>

</br>
<div class="container" style="margin-left: 70px">
    <div class="row">
        <div class="col-sx-2 " >
            <nav aria-label="Page navigation example">
                <ul class="pagination">

                    <li class="page-item">
                        <a class="page-link" href="index.php?Ppage=previous" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>

                    <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $_SESSION['numeroPage1'];?>"><?php echo $_SESSION['numeroPage1'];?></a></li>
                    <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $_SESSION['numeroPage2'];?>"><?php echo $_SESSION['numeroPage2'];?></a></li>
                    <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $_SESSION['numeroPage3'];?>"><?php echo $_SESSION['numeroPage3'];?></a></li>

                    <li class="page-item"  >
                        <a class="page-link" href="index.php?Ppage=next" onclick="me();" aria-label="Next"  >
                            <span aria-hidden="true" >&raquo;</span>
                            <span class="sr-only" >Next</span>
                        </a>
                    </li>

                </ul>
            </nav>


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