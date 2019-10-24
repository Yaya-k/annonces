<?php if(!session_id()) {
    session_start();
}?>

<?php
if(isset($_SESSION["email"]))
    if($_SESSION["email"]== "yaya.kamissokho@gmail.com"){
        ?>
        <?php
        include('includes/header.php');
        include('includes/navbar.php');
        include ('bddConnextion.php');
        ?>


        <!-- Begin Page Content -->
        <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Registered Admin</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">

                                    <h4>Total Admin: *</h4>

                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (Annual)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50"
                                                 aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- regarder s-->
        <?php

        if(isset($_POST['edit_btn']))
        {
            $id=$_POST['edit_id'];
            $req = $bdd->prepare(' SELECT prix,titre,description,localisation,categorie,id,id_user FROM annonces_en_cours WHERE id = :id');
            $req->execute(array(
                'id' => $id));

            $resultat = $req->fetch();
            $id_user=$resultat['id_user'];
            $categorie = $resultat['categorie'];
            $localisation = $resultat['localisation'];
            $titre =$resultat['titre'];
            $description = $resultat['description'];
            $prix = $resultat['prix'];
            $id=$resultat['id'];

            $sql = "INSERT   annonces (id, id_user, categorie, localisation, titre, description, prix) VALUES(?,?,?,?,?,?,?)";
            $stmtinsert = $bdd->prepare($sql);
            $result = $stmtinsert->execute([$id,$id_user, $categorie, $localisation, $titre, $description, $prix]);

            $req = $bdd->prepare('DELETE FROM annonces_en_cours WHERE id = :id');
            $req->execute(array(
                'id' => $id));

        }
        if(isset($_POST['delete_btn'])){
            $id=$_POST['delete_id'];
            $req = $bdd->prepare(' SELECT prix,titre,description,localisation,categorie,id,id_user FROM annonces_en_cours WHERE id = :id');
            $req->execute(array(
                'id' => $id));

            $resultat = $req->fetch();
            $id_user=$resultat['id_user'];
            $categorie = $resultat['categorie'];
            $localisation = $resultat['localisation'];
            $titre =$resultat['titre'];
            $description = $resultat['description'];
            $prix = $resultat['prix'];
            $id=$resultat['id'];

            $sql = "INSERT   annonces_supprimer (id, id_user, categorie, localisation, titre, description, prix) VALUES(?,?,?,?,?,?,?)";
            $stmtinsert = $bdd->prepare($sql);
            $result = $stmtinsert->execute([$id,$id_user, $categorie, $localisation, $titre, $description, $prix]);
            $req = $bdd->prepare('DELETE FROM annonces_en_cours WHERE id = :id');
            $req->execute(array(
                'id' => $id));
        }
        ?>

        <!-- Content Row -->

        <?php
        include('includes/scripts.php');
        include 'annonce_en_cours.php';
        include('includes/footer.php');
    }else{
    }
?>