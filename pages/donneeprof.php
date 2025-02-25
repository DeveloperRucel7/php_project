<?php

    session_start();
    // On inclus le fichier de connection a la base de donnees.
    require_once('C:\xampp12\htdocs\ProjetGit\layout\connect.php');

    require_once('C:\xampp12\htdocs\ProjetGit\layout\headeradmin.php');
    //requetes pour les professeurs
    $requete3 = 'SELECT * FROM professeurs';
    //on prepare la requete
    $stm = $db->prepare($requete3);
    //on excecute la requete
    $stm->execute();
    //on stock les donnees les donnes dans une variable
    $result_prof = $stm->fetchAll(PDO::FETCH_ASSOC);

?>  
 <div class="col-12 container  mt-5 py-5">
     <div class="col-1py-2 ms-5 mt-1  fixed-top mt-5 py-5">
        <a  class="text-warning float-start bg-success btn " href="admin.php"><i class="bi bi-arrow-left-short icon-link-hover"></i></a>

     </div>
        <h1 class="text-center text-success">Table Professeurs</h1>
        <table class="table border">
             
        <thead>
                <th>ID_PROFESSEUR</th>
                <th>NUMERO_TEL</th>
                <th>NOM_PRENOMS</th>
                <th>INFORMATIONS</th>

            </thead>
            <tbody>
            <?php
            foreach($result_prof as $PROF){  
                $_SESSION['ID_PROFESSEUR']=$PROF['ID_PROFESSEUR'] ;
                $_SESSION['NOM_PRENOMS']=$PROF['NOM_PRENOMS'] ;
            ?>
                <tr>
                    <td><?= $PROF['ID_PROFESSEUR']?></td>
                    <td><?= $PROF['NUMERO_TEL']?></td>
                    <td><?= $PROF['NOM_PRENOMS']?></td>
                    <td>
                        <a href="detailsProf.php?ID_PROFESSEUR=<?= $PROF['ID_PROFESSEUR'] ?>" class="btn btn-light"><i class="bi bi-three-dots"></i></a>
                        <a href="modifierProf.php?ID_PROFESSEUR=<?= $PROF['ID_PROFESSEUR'] ?>" class="btn btn-success py-1 mt-1"><i class="bi bi-card-text"></i></a>
                        <a href="supprimerprof.php?ID_PROFESSEUR=<?= $PROF['ID_PROFESSEUR'] ?>" class="btn btn-danger py-1 mt-1"><i class="bi bi-trash3"></i></a>
                    </td>

                </tr>
            </tbody>
            <?php
            }
            ?>
        </table>
        <div class="row  justify-content-end align-items-end">
            <a href="inscriptionprof.php" class="btn btn-info w-25 float-end text-white text-uppercase text-center"><i class="bi bi-plus-lg"></i></a>
        </div>
    </div>
    
<?php
    require_once('C:\xampp12\htdocs\ProjetGit\layout\footer.php');
?>