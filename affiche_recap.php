<?php
$reservation=true;
if (isset($_GET["action"]) && $_GET["action"] == 14){

   

    /* Type de chambre sémectionné */
        if (isset($_GET["type"])){
            $selection=true;
            if ($_GET["type"]==1){$type= 1;$titre = "Chambre Simple";$capacite = 1;$tarif=106;}
            if ($_GET["type"]==2){$type= 2;$titre = "Chambre Double";$capacite = 2;$tarif=117;}
            if ($_GET["type"]==3){$type= 3;$titre = "Chambre Double Sup.";$capacite = 2;$tarif=135;}
            if ($_GET["type"]==4){$type= 4;$titre = "Chambre Twins";$capacite = 2;$tarif=117;}
            if ($_GET["type"]==5){$type= 5;$titre = "Chambre Triple";$capacite = 3;$tarif=134;}
            if ($_GET["type"]==6){$type= 6;$titre = "Chambre Familiale";$capacite = 4;$tarif=172;}
        }else{$type= 1;$titre = "Chambre Simple";$capacite = 1;$tarif=106;}


} 
?>
<!-- Disponibilité chambre sélectionnée -->
<div class="w3-main" >
<div class="w3-container"  id="chambreSelection">

<!-- titre -->
<h1 class="w3-xxxlarge w3-text-red"><b>Récapitulatif.</b></h1>

<?php
// Affichage dynamique des données chambres réservées


    $pathTypeChambreReservationType1 = "./datas/reservations/1/";
    $pathTypeChambreReservationType2 = "./datas/reservations/2/";
    $pathTypeChambreReservationType3 = "./datas/reservations/3/";
    $pathTypeChambreReservationType4 = "./datas/reservations/4/";
    $pathTypeChambreReservationType5 = "./datas/reservations/5/";
    $pathTypeChambreReservationType6 = "./datas/reservations/6/";


    $pathTypeChambreDispoType1 = "./datas/chambres/1.txt";
    $pathTypeChambreDispoType2 = "./datas/chambres/2.txt";
    $pathTypeChambreDispoType3 = "./datas/chambres/3.txt";
    $pathTypeChambreDispoType4 = "./datas/chambres/4.txt";
    $pathTypeChambreDispoType5 = "./datas/chambres/5.txt";
    $pathTypeChambreDispoType6 = "./datas/chambres/6.txt";

    
    $valeurTotalSejour = 0;

    $valeurTotalSejourType1 = 0;
    $valeurTotalSejourType2 = 0;
    $valeurTotalSejourType3 = 0;
    $valeurTotalSejourType4 = 0;
    $valeurTotalSejourType5 = 0;
    $valeurTotalSejourType6 = 0;

    $compteurChambreReservationTotal = 0;

    $compteurChambreReservationType1 = 0;
    $compteurChambreReservationType2 = 0;
    $compteurChambreReservationType3 = 0;
    $compteurChambreReservationType4 = 0;
    $compteurChambreReservationType5 = 0;
    $compteurChambreReservationType6 = 0;


   // Type de chambre 1 - Chambre Simple
    /* Ouverture en lecture seule le fichier de la liste des chambres de même type */
    $fichierChambreTypeSelection = fopen($pathTypeChambreDispoType1, "r");
        // On va lire ligne par ligne
        while(!feof($fichierChambreTypeSelection)){
            $lecture_ligne = fgets($fichierChambreTypeSelection);
            
            $reference_chambre = trim(htmlspecialchars($lecture_ligne, ENT_QUOTES));
            $fichierChambreReservation = $reference_chambre . ".txt";
            


        /*  On vérifie que pour chaque chambre lue, il n'y a pas de réservation pour celle-ci en vérifiant dans le bon répertoire
            qu'un fichier de réservation est présent.
            Si c'est le cas, on l'affichera. 
        */
        $pathFichier = $pathTypeChambreReservationType1 . $fichierChambreReservation;
        if (file_exists($pathFichier)){

        //echo $pathFichier;
   
                /* Ouverture en lecture seule le fichier de la liste des chambres de même type en réservation */
                $fichierChambreTypeResrevation = fopen($pathFichier, "r");

                
                // On va lire ligne par ligne
                 while(!feof($fichierChambreTypeResrevation)){
                $lecture_ligne_reservation = fgets($fichierChambreTypeResrevation);
                $compteurChambreReservationType1++;
                list($reference_chambre, $idclient, $lastname, $email, $duree, $paiement, $data ) = explode ("|",$lecture_ligne_reservation);
                $valeurTotalSejour =  $valeurTotalSejour + (int)$duree;
                $valeurTotalSejourType1 = $valeurTotalSejourType1 + (int)$duree;
                
                    }
                    fclose($fichierChambreTypeResrevation);


                }
            }
 fclose($fichierChambreTypeSelection);



 // Type de chambre 2 - Chambre Double
    /* Ouverture en lecture seule le fichier de la liste des chambres de même type */
    $fichierChambreTypeSelection = fopen($pathTypeChambreDispoType2, "r");
        // On va lire ligne par ligne
        while(!feof($fichierChambreTypeSelection)){
            $lecture_ligne = fgets($fichierChambreTypeSelection);
            
            $reference_chambre = trim(htmlspecialchars($lecture_ligne, ENT_QUOTES));
            $fichierChambreReservation = $reference_chambre . ".txt";
            


        /*  On vérifie que pour chaque chambre lue, il n'y a pas de réservation pour celle-ci en vérifiant dans le bon répertoire
            qu'un fichier de réservation est présent.
            Si c'est le cas, on l'affichera. 
        */
        $pathFichier = $pathTypeChambreReservationType2 . $fichierChambreReservation;
        if (file_exists($pathFichier)){

        //echo $pathFichier;
   
                /* Ouverture en lecture seule le fichier de la liste des chambres de même type en réservation */
                $fichierChambreTypeResrevation = fopen($pathFichier, "r");

                
                // On va lire ligne par ligne
                 while(!feof($fichierChambreTypeResrevation)){
                $lecture_ligne_reservation = fgets($fichierChambreTypeResrevation);
                $compteurChambreReservationType2++;
                list($reference_chambre, $idclient, $lastname, $email, $duree, $paiement, $data ) = explode ("|",$lecture_ligne_reservation);
                $valeurTotalSejour =  $valeurTotalSejour + (int)$duree;
                $valeurTotalSejourType2 = $valeurTotalSejourType2 + (int)$duree;
                
                    }
                    fclose($fichierChambreTypeResrevation);


                }
            }
 fclose($fichierChambreTypeSelection);


// Type de chambre 3 - Chambre Double Supérieure
    /* Ouverture en lecture seule le fichier de la liste des chambres de même type */
    $fichierChambreTypeSelection = fopen($pathTypeChambreDispoType3, "r");
        // On va lire ligne par ligne
        while(!feof($fichierChambreTypeSelection)){
            $lecture_ligne = fgets($fichierChambreTypeSelection);
            
            $reference_chambre = trim(htmlspecialchars($lecture_ligne, ENT_QUOTES));
            $fichierChambreReservation = $reference_chambre . ".txt";
            


        /*  On vérifie que pour chaque chambre lue, il n'y a pas de réservation pour celle-ci en vérifiant dans le bon répertoire
            qu'un fichier de réservation est présent.
            Si c'est le cas, on l'affichera. 
        */
        $pathFichier = $pathTypeChambreReservationType3 . $fichierChambreReservation;
        if (file_exists($pathFichier)){

        //echo $pathFichier;
   
                /* Ouverture en lecture seule le fichier de la liste des chambres de même type en réservation */
                $fichierChambreTypeResrevation = fopen($pathFichier, "r");

                
                // On va lire ligne par ligne
                 while(!feof($fichierChambreTypeResrevation)){
                $lecture_ligne_reservation = fgets($fichierChambreTypeResrevation);
                $compteurChambreReservationType3++;
                list($reference_chambre, $idclient, $lastname, $email, $duree, $paiement, $data ) = explode ("|",$lecture_ligne_reservation);
                $valeurTotalSejour =  $valeurTotalSejour + (int)$duree;
                $valeurTotalSejourType3 = $valeurTotalSejourType3 + (int)$duree;
                    }
                    fclose($fichierChambreTypeResrevation);


                }
            }
 fclose($fichierChambreTypeSelection);



// Type de chambre 4 - Chambre Double Twin
    /* Ouverture en lecture seule le fichier de la liste des chambres de même type */
    $fichierChambreTypeSelection = fopen($pathTypeChambreDispoType4, "r");
        // On va lire ligne par ligne
        while(!feof($fichierChambreTypeSelection)){
            $lecture_ligne = fgets($fichierChambreTypeSelection);
            
            $reference_chambre = trim(htmlspecialchars($lecture_ligne, ENT_QUOTES));
            $fichierChambreReservation = $reference_chambre . ".txt";
            


        /*  On vérifie que pour chaque chambre lue, il n'y a pas de réservation pour celle-ci en vérifiant dans le bon répertoire
            qu'un fichier de réservation est présent.
            Si c'est le cas, on l'affichera. 
        */
        $pathFichier = $pathTypeChambreReservationType4 . $fichierChambreReservation;
        if (file_exists($pathFichier)){

        //echo $pathFichier;
   
                /* Ouverture en lecture seule le fichier de la liste des chambres de même type en réservation */
                $fichierChambreTypeResrevation = fopen($pathFichier, "r");

                
                // On va lire ligne par ligne
                 while(!feof($fichierChambreTypeResrevation)){
                $lecture_ligne_reservation = fgets($fichierChambreTypeResrevation);
                $compteurChambreReservationType4++;
                list($reference_chambre, $idclient, $lastname, $email, $duree, $paiement, $data ) = explode ("|",$lecture_ligne_reservation);
                $valeurTotalSejour =  $valeurTotalSejour + (int)$duree;
                $valeurTotalSejourType4 = $valeurTotalSejourType4 + (int)$duree;
                    }
                    fclose($fichierChambreTypeResrevation);


                }
            }
 fclose($fichierChambreTypeSelection);


// Type de chambre 5 - Chambre Double Twin
    /* Ouverture en lecture seule le fichier de la liste des chambres de même type */
    $fichierChambreTypeSelection = fopen($pathTypeChambreDispoType5, "r");
        // On va lire ligne par ligne
        while(!feof($fichierChambreTypeSelection)){
            $lecture_ligne = fgets($fichierChambreTypeSelection);
            
            $reference_chambre = trim(htmlspecialchars($lecture_ligne, ENT_QUOTES));
            $fichierChambreReservation = $reference_chambre . ".txt";
            


        /*  On vérifie que pour chaque chambre lue, il n'y a pas de réservation pour celle-ci en vérifiant dans le bon répertoire
            qu'un fichier de réservation est présent.
            Si c'est le cas, on l'affichera. 
        */
        $pathFichier = $pathTypeChambreReservationType5 . $fichierChambreReservation;
        if (file_exists($pathFichier)){

        //echo $pathFichier;
   
                /* Ouverture en lecture seule le fichier de la liste des chambres de même type en réservation */
                $fichierChambreTypeResrevation = fopen($pathFichier, "r");

                
                // On va lire ligne par ligne
                 while(!feof($fichierChambreTypeResrevation)){
                $lecture_ligne_reservation = fgets($fichierChambreTypeResrevation);
                $compteurChambreReservationType5++;
                list($reference_chambre, $idclient, $lastname, $email, $duree, $paiement, $data ) = explode ("|",$lecture_ligne_reservation);
                $valeurTotalSejour =  $valeurTotalSejour + (int)$duree;
                $valeurTotalSejourType5 = $valeurTotalSejourType5 + (int)$duree;
                    }
                    fclose($fichierChambreTypeResrevation);


                }
            }
 fclose($fichierChambreTypeSelection);



// Type de chambre 6 - Chambre Familiale
    /* Ouverture en lecture seule le fichier de la liste des chambres de même type */
    $fichierChambreTypeSelection = fopen($pathTypeChambreDispoType6, "r");
        // On va lire ligne par ligne
        while(!feof($fichierChambreTypeSelection)){
            $lecture_ligne = fgets($fichierChambreTypeSelection);
            
            $reference_chambre = trim(htmlspecialchars($lecture_ligne, ENT_QUOTES));
            $fichierChambreReservation = $reference_chambre . ".txt";
            


        /*  On vérifie que pour chaque chambre lue, il n'y a pas de réservation pour celle-ci en vérifiant dans le bon répertoire
            qu'un fichier de réservation est présent.
            Si c'est le cas, on l'affichera. 
        */
        $pathFichier = $pathTypeChambreReservationType6 . $fichierChambreReservation;
        if (file_exists($pathFichier)){

        //echo $pathFichier;
   
                /* Ouverture en lecture seule le fichier de la liste des chambres de même type en réservation */
                $fichierChambreTypeResrevation = fopen($pathFichier, "r");

                
                // On va lire ligne par ligne
                 while(!feof($fichierChambreTypeResrevation)){
                $lecture_ligne_reservation = fgets($fichierChambreTypeResrevation);
                $compteurChambreReservationType6++;
                list($reference_chambre, $idclient, $lastname, $email, $duree, $paiement, $data ) = explode ("|",$lecture_ligne_reservation);
                $valeurTotalSejour =  $valeurTotalSejour + (int)$duree;
                $valeurTotalSejourType6 = $valeurTotalSejourType6 + (int)$duree;
                    }
                    fclose($fichierChambreTypeResrevation);


                }
            }
 fclose($fichierChambreTypeSelection);


/*
echo $compteurChambreReservationType1;
echo $compteurChambreReservationType2;
echo $compteurChambreReservationType3;
echo $compteurChambreReservationType4;
echo $compteurChambreReservationType5;
echo $compteurChambreReservationType6;
echo $valeurTotalSejour;
echo $valeurTotalSejourType1;
echo $valeurTotalSejourType2;
echo $valeurTotalSejourType3;
echo $valeurTotalSejourType4;
echo $valeurTotalSejourType5;
echo $valeurTotalSejourType6;
*/

if($compteurChambreReservationType1!=0) {$moyenneDureeType1 = round(( $valeurTotalSejourType1 / $compteurChambreReservationType1), 0, PHP_ROUND_HALF_ODD);}else{$moyenneDureeType1 = 0;};
if($compteurChambreReservationType2!=0) {$moyenneDureeType2 = round(( $valeurTotalSejourType2 / $compteurChambreReservationType2), 0, PHP_ROUND_HALF_ODD);}else{$moyenneDureeType2 = 0;};
if($compteurChambreReservationType3!=0) {$moyenneDureeType3 = round(( $valeurTotalSejourType3 / $compteurChambreReservationType3), 0, PHP_ROUND_HALF_ODD);}else{$moyenneDureeType3 = 0;};
if($compteurChambreReservationType4!=0) {$moyenneDureeType4 = round(( $valeurTotalSejourType4 / $compteurChambreReservationType4), 0, PHP_ROUND_HALF_ODD);}else{$moyenneDureeType4 = 0;};
if($compteurChambreReservationType5!=0) {$moyenneDureeType5 = round(( $valeurTotalSejourType5 / $compteurChambreReservationType5), 0, PHP_ROUND_HALF_ODD);}else{$moyenneDureeType5 = 0;};
if($compteurChambreReservationType6!=0) {$moyenneDureeType6 = round(( $valeurTotalSejourType6 / $compteurChambreReservationType6), 0, PHP_ROUND_HALF_ODD);}else{$moyenneDureeType6 = 0;};
//$valeurTotalSejour=$valeurTotalSejourType1+$valeurTotalSejourType2+$valeurTotalSejourType3+$valeurTotalSejourType4+$valeurTotalSejourType5+$valeurTotalSejourType6;
$compteurChambreReservationTotal = $compteurChambreReservationType1 + $compteurChambreReservationType2 + $compteurChambreReservationType3 + $compteurChambreReservationType4 + $compteurChambreReservationType5 + $compteurChambreReservationType6; 

if($valeurTotalSejour!=0) {$moyenneDureeTypeTotal = round(( $compteurChambreReservationTotal / $valeurTotalSejour), 0, PHP_ROUND_HALF_ODD);}else{$moyenneDureeTypeTotal = 0;};




        ?>


<div class="w3-container w3-margin-bottom">
  <h2>Séjour moyen par type de chambre</h2>
  <p>Les données sont claculées automatiquement et en temps réel</p>
  <table class="w3-table  w3-bordered ">
    <thead>
      <tr class="w3-light-grey">
        <th class="w3-light-grey">Type Chambre</th>
        <th class="w3-center">Nbr Réservation</th>
        <th class="w3-center">Total Nuitée</th>
        <th class="w3-center">Durée Moyenne</th>
        <th class="w3-center">&nbsp;</th>
        
      </tr>
    </thead>

    <tr class="w3-hover-green">
        <td class="w3-light-grey">Simple</td>
        <td class="w3-center "><?php echo $compteurChambreReservationType1 ?></td>
        <td class="w3-center "><?php echo $valeurTotalSejourType1 ?></td>
        <td class="w3-center "><?php echo $moyenneDureeType1 ?></td>
        <td class="w3-center ">&nbsp;</td>
    </tr>

    <tr class="w3-hover-green">
    <td class="w3-light-grey">Double</td>
        <td class="w3-center "><?php echo $compteurChambreReservationType2 ?></td>
        <td class="w3-center "><?php echo $valeurTotalSejourType2 ?></td>
        <td class="w3-center "><?php echo $moyenneDureeType2 ?></td>
        <td class="w3-center ">&nbsp;</td>
    </tr>

    <tr class="w3-hover-green">
    <td class="w3-light-grey">Double Supérieure</td>
        <td class="w3-center"><?php echo $compteurChambreReservationType3 ?></td>
        <td class="w3-center"><?php echo $valeurTotalSejourType3 ?></td>
        <td class="w3-center"><?php echo $moyenneDureeType3 ?></td>
        <td class="w3-center">&nbsp;</td>
    </tr>
    <tr class="w3-hover-green">
    <td class="w3-light-grey">Twin</td>
        <td class="w3-center"><?php echo $compteurChambreReservationType4 ?></td>
        <td class="w3-center "><?php echo $valeurTotalSejourType4 ?></td>
        <td class="w3-center "><?php echo $moyenneDureeType4 ?></td>
        <td class="w3-center ">&nbsp;</td>
    </tr>
    <tr class="w3-hover-green">
    <td class="w3-light-grey">Triple</td>
        <td class="w3-center"><?php echo $compteurChambreReservationType5 ?></td>
        <td class="w3-center"><?php echo $valeurTotalSejourType5 ?></td>
        <td class="w3-center"><?php echo $moyenneDureeType5 ?></td>
        <td class="w3-center">&nbsp;</td>
    </tr>

    <tr class="w3-hover-green">
    <td class="w3-light-grey">Famille</td>
        <td class="w3-center"><?php echo $compteurChambreReservationType6 ?></td>
        <td class="w3-center"><?php echo $valeurTotalSejourType6 ?></td>
        <td class="w3-center"><?php echo $moyenneDureeType6 ?></td>
        <td class="w3-center">&nbsp;</td>
    </tr>

    <tr class="w3-hover-green">
    <th class="w3-green">Total</th>
        <td class="w3-center w3-green"><?php echo $compteurChambreReservationTotal ?></td>
        <td class="w3-center w3-green"><?php echo $valeurTotalSejour ?></td>
        <td class="w3-center w3-green"><?php echo $moyenneDureeType6 ?></td>
        <td class="w3-center w3-green">&nbsp;</td>
    </tr>

  </table>

</div>



</div> <!-- Fin du conteneur --> 

</div> <!-- Fin du contenu --> 