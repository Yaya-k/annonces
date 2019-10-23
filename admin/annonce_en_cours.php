    <!-- je me connecte a la base de donner -->
    <?php
    include 'bddConnextion.php';
  //  include '../../ChromePhp.php';
    $arr_rows = array();
    $reponse = $bdd->query('SELECT prix,titre,description,localisation,categorie,id,id_user FROM annonces_en_cours');


    while ($resultat = $reponse->fetch()){
        $arr_rows[]=$resultat;
    }
    $_SESSION['annoncesEnCours']=$arr_rows;


    ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th> Prix </th>
                        <th> Titre </th>
                        <th>Description</th>
                        <th>Localisation</th>
                        <th>VALIDER </th>
                        <th>DELETE </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $arr_rows=$_SESSION['annoncesEnCours'];
                    for($l=0;$l<sizeof($arr_rows);$l++){
                        ?>
                        <tr>
                            <td> <?php echo $arr_rows[$l]['prix']; ?> </td>
                            <td> <?php  echo $arr_rows[$l]['titre']; ?></td>
                            <td> <?php echo $arr_rows[$l]['description']; ?></td>
                            <td><?php echo $arr_rows[$l]['localisation']; ?></td>
                            <td>
                                <form action="index.php" method="post">
                                    <input type="hidden" name="edit_id" value=<?php echo $arr_rows[$l]['id']?>>
                                    <button  type="submit" name="edit_btn" class="btn btn-success"> VALIDER</button>
                                </form>

                            </td>
                            <td>
                                <form action="index.php" method="post">
                                    <input type="hidden" name="delete_id" value=<?php echo $arr_rows[$l]['id']?>>
                                    <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                                </form>
                            </td>
                        </tr>

                        <?php


                    }

                    ?>



                    </tbody>
                </table>

            </div>
        </div>
