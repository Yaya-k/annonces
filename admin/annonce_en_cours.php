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
                                    <button  type="submit" name="edit_btn"
                                             onclick="location.href='index.php?prix=<?php echo $arr_rows[$l]['prix'];?>&amp;titre=<?php echo $arr_rows[$l]['titre'];?>&amp;description=<?php echo $arr_rows[$l]['description'];?>&amp;localisation=<?php echo $arr_rows[$l]['localisation'];?>&amp;categorie=<?php echo $arr_rows[$l]['categorie'];?>&amp;id_user=<?php echo $arr_rows[$l]['id_user'];?>&amp;id=<?php echo $arr_rows[$l]['id'];?>&amp;action=valider'" class="btn btn-success">
                                        VALIDER
                                </button>
                            </td>
                            <td>
                                    <button type="submit" name="delete_btn" class="btn btn-danger"
                                            onclick="location.href='index.php?prix=<?php echo $arr_rows[$l]['prix'];?>&amp;titre=<?php echo $arr_rows[$l]['titre'];?>&amp;description=<?php echo $arr_rows[$l]['description'];?>&amp;localisation=<?php echo $arr_rows[$l]['localisation'];?>&amp;categorie=<?php echo $arr_rows[$l]['categorie'];?>&amp;id_user=<?php echo $arr_rows[$l]['id_user'];?>&amp;id=<?php echo $arr_rows[$l]['id'];?>&amp;action=supprimer'">
                                        DELETE</button>
                            </td>
                        </tr>

                        <?php


                    }

                    ?>



                    </tbody>
                </table>

            </div>
        </div>
