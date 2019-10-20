<?php if(!session_id()) {
    session_start();
}?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>




    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>


    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>


    <!-- boostrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">







</head>
<body style="margin-left: 100px;margin-top: 70px;">

</br>
</br>

<?php
    if(isset($_SESSION["email"])){
        ?>
        <?php include 'header.php'?>

        <form method="post" action="index.php" enctype="multipart/form-data">
            <div class="form-row" style="margin-left: 80px">
                <div class="form-group col-md-4">
                    <label for="inputPassword4">Categorie</label>
                    <select class="form-control search-slt" id="exampleFormControlSelect1" name="itemCcategorie" required>
                        <option value="SelectUneCategorie" selected disabled>Select une categorie</option>
                        <optgroup label="DAKAR">

                            <option value="dakar">Dakar</option>
                            <option value="pikine">Pikine</option>
                            <option value="guediawaye">Guédiawaye</option>
                            <option value="rufisque">Rufisque</option>
                        </optgroup>

                        <optgroup label="DIOURBEL">


                            <option value="diourbel">Diourbel</option>
                            <option value="bambey">Bambey</option>
                            <option value="mbacke">Mbacké</option>
                        </optgroup>


                        <optgroup label="FATICK">

                            <option value="fatick">Fatick</option>
                            <option value="gossas">Gossas</option>
                            <option value="foundiougne">Foundiougne</option>
                        </optgroup>

                        <optgroup label="KAFFRINE">


                            <option value="kaffrine">Kaffrine</option>
                            <option value="mbouki">Mbouki</option>
                            <option value="koungheul">Koungheul</option>
                            <option value="hoddar">Hoddar</option>
                        </optgroup>

                        <optgroup label="KAOLACK">


                            <option value="kaolack">Kaolack</option>
                            <option value="nioroDuRip">Nioro du Rip</option>
                            <option value="mbadakhoune">Mbadakhoune</option>
                            <option value="guinguineo">Guinguinéo</option>
                        </optgroup>
                        <optgroup label="KEDOUGOU">


                            <option value="kedougou">Kédougou</option>
                            <option value="salemata">Salémata</option>
                            <option value="saraya">Saraya</option>
                        </optgroup>
                        <optgroup label="KOLDA">


                            <option value="kolda">Kolda</option>
                            <option value="medinaYoroFoulah">Médina Yoro Foulah</option>
                            <option value="Velingara">Vélingara</option>
                        </optgroup>
                        <optgroup label="LOUGA">


                            <option value="louga">Louga</option>
                            <option value="kebemer">Kébémer</option>
                            <option value="linguere">Linguère</option>
                        </optgroup>

                        <optgroup label="MATAM">


                            <option value="matam">Matam</option>
                            <option value="kanel">Kanel</option>
                            <option value="ranerouFerlo">Ranérou-Ferlo</option>
                        </optgroup>
                        <optgroup label="SAINT-LOUIS">


                            <option value="saintLouis">Saint Louis</option>
                            <option value="podor">Podor</option>
                        </optgroup>
                        <optgroup label="SEDHIOU">


                            <option value="sedhiou">Sédhiou</option>
                            <option value="goudoump">Goudoump</option>
                        </optgroup>
                        <optgroup label="TAMBACOUNDA">


                            <option value="tambacounda">Tambacounda</option>
                            <option value="bakel">Bakel</option>
                            <option value="goudiry">Goudiry</option>
                        </optgroup>
                        <optgroup label="THIES">


                            <option value="thies">Thiés</option>
                            <option value="tivaouane">Tivaouane</option>
                            <option value="mbour">Mbour</option>
                        </optgroup>
                        <optgroup label="ZIGUINCHOR">


                            <option value="ziguinchor">Ziguinchor</option>
                            <option value="bignona">Bignona</option>
                        </optgroup>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputPassword4">Localisation</label>
                    <select name="itemLocalisation" class="form-control search-slt" id="exampleFormControlSelect1">
                        <option selected disabled>Select une Localisation</option>
                        <optgroup label="Vehicule">


                            <option value="voitures">Voitures</option>
                            <option value="motos">Motos</option>
                            <option value="caravaning">Caravaning</option>
                            <option value="utilitaires">Utilitaires</option>
                            <option value="nautisme">Nautisme</option>
                            <option value="equipementAuto">Équipement auto</option>
                            <option value="equipementMoto">Équipement moto</option>
                            <option value="equipementCaravaning">Équipement caravaning</option>
                            <option value="equipementNautisme">Équipement nautisme</option>

                        </optgroup>


                        <optgroup label="Immobilier">

                            <option value="ventesImmobilieres">Ventes immobilières</option>
                            <option value="locations">Locations</option>
                            <option value="colocations">Colocations</option>
                            <option value="bureauxCommerces">Bureaux & Commerces</option>
                        </optgroup>

                        <optgroup label="Vacances">


                            <option value="locationsGîtes">Locations & Gîtes</option>
                            <option value="chambresDhotes">Chambres d'hôtes</option>
                            <option value="campings">Campings</option>
                            <option value="hebergementsInsolites">Hébergements insolites</option>
                        </optgroup>

                        <optgroup label="Multimédia">


                            <option value="informatique">Informatique</option>
                            <option value="consolesJeuxVidéo">Consoles & Jeux vidéo</option>
                            <option value="imageSon">Image & Son</option>
                            <option value="telephonie">Téléphonie</option>
                        </optgroup>

                        <optgroup label="Maison">


                            <option value="ameublement">Ameublement</option>
                            <option value="electromenager">Électroménager</option>
                            <option value="artsDeLaTable">Arts de la table</option>
                            <option value="decoration">Décoration</option>
                            <option value="lingeDeMaison">Linge de maison</option>
                            <option value="bricolage">Bricolage</option>
                            <option value="jardinage">Jardinage</option>
                        </optgroup>

                        <optgroup label="Mode">


                            <option value="vetements">Vêtements</option>
                            <option value="chaussures">Chaussures</option>
                            <option value="accessoiresEtBagagerie">Accessoires & Bagagerie</option>
                            <option value="montresBijoux">Montres & Bijoux</option>
                            <option value="equipementBebe">Équipement bébé</option>
                            <option value="vetementsBebe">Vêtements bébé</option>
                        </optgroup>

                        <optgroup label="Loisirs">


                            <option value="DVDFilms">DVD - Films</option>
                            <option value="CDMusique">CD - Musique</option>
                            <option value="livres">Livres</option>
                            <option value="animaux">Animaux</option>
                            <option value="velos">Vélos</option>
                            <option value="sportsHobbies">Sports & Hobbies</option>
                            <option value="instrumentsDeMusique">Instruments de musique</option>
                            <option value="collection">Collection</option>
                            <option value="jeuxJouets">Jeux & Jouets</option>
                            <option value="vinsEtGastronomie">Vins & Gastronomie</option>
                        </optgroup>

                        <optgroup label="Matériel professionnel">


                            <option value="materielAgricole">Matériel agricole</option>
                            <option value="transportManutention">Transport - Manutention</option>
                            <option value="BTPChantierGrosOeuvre">BTP - Chantier gros-oeuvre</option>
                            <option value="outillageMatériaux2ndoeuvre">Outillage - Matériaux 2nd-oeuvre</option>
                            <option value="equipementsIndustriels">Équipements industriels</option>
                            <option value="restaurationHotellerie">Restauration - Hôtellerie</option>
                            <option value="fournituresDeBureau">Fournitures de bureau</option>
                            <option value="commercesEtMarches">Commerces & Marchés</option>
                            <option value="materielMedical">Matériel médical</option>
                        </optgroup>

                        <optgroup label="Services">


                            <option value="prestationsDeServices">Prestations de services</option>
                            <option value="billetterie">Billetterie</option>
                            <option value="evenements">Évènements</option>
                            <option value="coursParticuliers">Cours particuliers</option>
                            <option value="covoiturage">Covoiturage</option>
                        </optgroup>

                        <optgroup label="Divers">


                            <option value="autres">Autres</option>
                        </optgroup>

                    </select>
                </div>
            </div>
            <div class="form-group col-md-4" style="margin-left: 70px">
                <label for="inputAddress">Titre</label>
                <input name="itemTitre" type="text" class="form-control" id="inputAddress" placeholder="table a manger en bon etats" required>
            </div>
            <div class="form-group col-md-4" style="margin-left: 70px">
                <label for="exampleFormControlTextarea1" >Example textarea</label>
                <textarea name="itemMessage" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
            </div>

            <div class="form-group col-md-4" style="margin-left: 80px">

                <label for="inputZip">Prix</label>

                <input name="itemPrix" type="number" step="0.5" class="form-control" id="inputZip" required>
            </div>
            </br>
            </br>
            <p style="margin-left: 90px ;"><strong>Photos : Une annonce avec photo est 7 fois plus consultée qu'une annonce sans photo </br></strong></p>


            </br>
            </br>

            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-xs-1" >
                        <img id="photoPrincipale" src="src/images/photoPrincipale.PNG",alt="photo principal" style="cursor:pointer">
                        <input name="fileToUpload" type="file"  id="fileToUpload" accept=".gif,.jpg,.jpeg,.png" style="display:none" onchange="uploadImage(this)"/>
                        <span id="supprimerPhotoPrincipale" style="cursor: pointer;display: none;color:red ;">Supprimer</span>

                    </div>
                    <div class="col-md-2 col-xs-1" >
                        <img id="photo2" src="src/images/photo.PNG",alt="photo" style="cursor:pointer">
                        <input name="file2ToUpload" type="file" id="file2ToUpload" accept=".gif,.jpg,.jpeg,.png" style="display:none" onchange="uploadImage2(this)"/>
                        <span id="supprimerPhoto2" style="cursor: pointer;display: none ;color:red ;">Supprimer</span>



                    </div>
                    <div class="col-md-2 col-xs-1" >
                        <img  id="photo3" src="src/images/photo.PNG",alt="photo" style="cursor:pointer">
                        <input name="file3ToUpload" type="file" id="file3ToUpload" accept=".gif,.jpg,.jpeg,.png" style="display:none" onchange="uploadImage3(this)"/>
                        <span id="supprimerPhoto3" style="cursor: pointer;display: none ;color:red ;">Supprimer</span>



                    </div>
                    <div class="col-md-2 col-xs-1" >
                        <img  id="photo4" src="src/images/photo.PNG",alt="photo" style="cursor:pointer">
                        <input name="file4ToUpload" type="file" id="file4ToUpload"  accept=".gif,.jpg,.jpeg,.png" style="display:none" onchange="uploadImage4(this)"/>
                        <span id="supprimerPhoto4" style="cursor: pointer;display: none ;color:red ;">Supprimer</span>



                    </div>
                    <div class="col-md-2 col-xs-1" >
                        <img  id="photo5" src="src/images/photo.PNG",alt="photo" style="cursor:pointer">
                        <input name="file5ToUpload" type="file" id="file5ToUpload" accept=".gif,.jpg,.jpeg,.png" style="display:none" onchange="uploadImage5(this)"/>
                        <span id="supprimerPhoto5" style="cursor: pointer;display: none">Supprimer</span>



                    </div>
                    </br>
                    <span id='messageIfSameImages' class="col-lg-12"></span>
                </div>

                </br>
                </br>
                <button name="submitAnnonce" type="submit" id="submitAnnonce" class="btn btn-primary col-lg-3" style="margin-left: 4px">Valider</button>


            </div>

        </form>
        </br>
        </br>
        </br>

        <?php

    }else{
        ?>
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Deposer une annonce</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Vous ne pouvais pas deposer une annonce sans etre connecter!!!
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" onclick="window.location.href='inscription.php'" class="btn btn-primary">S'inscrire</button>
                        <button type="button" onclick="window.location.href='logIn.php'" class="btn btn-success">Se connecter</button>
                    </div>
                </div>
            </div>
        </div>
        <script>

            $('#exampleModalCenter').modal('show');




        </script>
        <?php
        include 'index.php';
    }

?>

<script>
    var names=["0","1","2","3","4"];


    $("#photoPrincipale").click(function () {
        $("#fileToUpload").trigger('click');
    });
    $("#photo2").click(function () {
        $("#file2ToUpload").trigger('click');
    });
    $("#photo3").click(function () {
        $("#file3ToUpload").trigger('click');
    });
    $("#photo4").click(function () {
        $("#file4ToUpload").trigger('click');
    });
    $("#photo5").click(function () {
        $("#file5ToUpload").trigger('click');
    });

    function checkIfNamesIsTheSame() {
        if(names.length>1){

            for(var i=0;i<names.length;i++){
                for(var j=i+1; j<names.length;j++){
                    if(names[i]==names[j]){
                        document.getElementById('messageIfSameImages').style.color = 'red';
                        document.getElementById('messageIfSameImages').innerHTML = 'l\'images '.concat(names[i]).concat(' et present plusieurs fois!!');
                        document.getElementById("submitAnnonce").disabled=true;

                        return true;
                    }
                }
            }

        }
        document.getElementById('messageIfSameImages').innerHTML ="";
        document.getElementById("submitAnnonce").disabled=false;

        return false;
    }



    function displaySupprimer() {
        for(var k=0;k<names.length;k++){
            if(names[k]!=="0"
                && names[k]!=="1"&& names[k]!=="2"
            && names[k]!=="3" && names[k]!=="4"){
                if(k===0){
                    document.getElementById("supprimerPhotoPrincipale").style.display='block';
                }else
                {
                    document.getElementById("supprimerPhoto".concat((k+1).toString())).style.display='block';
                }
            }
        }

    }

    $(document).ready(function() {
        $('#supprimerPhotoPrincipale').click(function() {
            $('#fileToUpload').val('');
            document.getElementById("photoPrincipale").src="src/images/photoPrincipale.PNG";
            document.getElementById("supprimerPhotoPrincipale").style.display='none';
            names[0]="0";
            checkIfNamesIsTheSame();


        });

        $('#supprimerPhoto2').click(function() {
            $('#file2ToUpload').val('');

            document.getElementById("photo2").src="src/images/photo.PNG";
            document.getElementById("supprimerPhoto2").style.display='none';
            names[1]="1";
            checkIfNamesIsTheSame();


        });
        $('#supprimerPhoto3').click(function() {
            $('#file3ToUpload').val('');

            document.getElementById("photo3").src="src/images/photo.PNG";
            document.getElementById("supprimerPhoto3").style.display='none';
            names[2]="2";
            checkIfNamesIsTheSame();



        });

        $('#supprimerPhoto4').click(function() {
            $('#file4ToUpload').val('');

            document.getElementById("photo4").src="src/images/photo.PNG";
            document.getElementById("supprimerPhoto4").style.display='none';
            names[3]="3";
            checkIfNamesIsTheSame();


        });

        $('#supprimerPhoto5').click(function() {
            $('#file5ToUpload').val('');

            document.getElementById("photo5").src="src/images/photo.PNG";
            document.getElementById("supprimerPhoto5").style.display='none';
            names[4]="4";
            checkIfNamesIsTheSame();


        });
    });

    function uploadImage(input) {
        if (input.files && input.files[0]) {
            names[0]=document.getElementById("fileToUpload").value.split(/(\\|\/)/g).pop();
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#photoPrincipale')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(120);

            };


            reader.readAsDataURL(input.files[0]);

            displaySupprimer();
            checkIfNamesIsTheSame();
        }


    }


    function uploadImage2(input) {
        if (input.files && input.files[0]) {
            names[1]=document.getElementById("file2ToUpload").value.split(/(\\|\/)/g).pop();
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#photo2')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(120);

            };


            reader.readAsDataURL(input.files[0]);
            displaySupprimer();

            checkIfNamesIsTheSame();

        }


    }


    function uploadImage3(input) {
        if (input.files && input.files[0]) {
            names[2]=document.getElementById("file3ToUpload").value.split(/(\\|\/)/g).pop();

            var reader = new FileReader();

            reader.onload = function (e) {
                $('#photo3')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(120);

            };


            reader.readAsDataURL(input.files[0]);
            displaySupprimer();

            checkIfNamesIsTheSame();

        }


    }


    function uploadImage4(input) {
        if (input.files && input.files[0]) {
            names[3]=document.getElementById("file4ToUpload").value.split(/(\\|\/)/g).pop();


            var reader = new FileReader();

            reader.onload = function (e) {
                $('#photo4')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(120);

            };


            reader.readAsDataURL(input.files[0]);
            displaySupprimer();

            checkIfNamesIsTheSame();

        }


    }

    function uploadImage5(input) {
        if (input.files && input.files[0]) {
            names[4]=document.getElementById("file5ToUpload").value.split(/(\\|\/)/g).pop();

            var reader = new FileReader();

            reader.onload = function (e) {
                $('#photo5')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(120);

            };


            reader.readAsDataURL(input.files[0]);

            displaySupprimer();

            checkIfNamesIsTheSame();

        }


    }




</script>
</body>
</html>