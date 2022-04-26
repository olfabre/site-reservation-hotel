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


   // Type de chambre 1
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



 // Type de chambre 2
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
                $compteurChambreReservationType1++;
                list($reference_chambre, $idclient, $lastname, $email, $duree, $paiement, $data ) = explode ("|",$lecture_ligne_reservation);
                $valeurTotalSejour =  $valeurTotalSejour + (int)$duree;
                $valeurTotalSejourType2 = $valeurTotalSejourType2 + (int)$duree;
                    }
                    fclose($fichierChambreTypeResrevation);


                }
            }
 fclose($fichierChambreTypeSelection);


// Type de chambre 3
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



echo $compteurChambreReservationType1;
echo $compteurChambreReservationType2;
echo $compteurChambreReservationType3;
echo $valeurTotalSejour;
echo $valeurTotalSejourType1;
echo $valeurTotalSejourType2;
echo $valeurTotalSejourType3;




        ?>


<div class="w3-container w3-margin-bottom">
  <h2>Séjour moyen par type de chambre</h2>
  <p>Les données sont claculées automatiquement et en temps réel</p>

  <table class="w3-table-all">
    <thead>
      <tr class="w3-light-grey w3-hover-red">
        <th>Type de chambre</th>
        <th>Nbr de réservations</th>
        <th>moyenne séjour</th>
        <th>Chambre double supérieure</th>
        <th>Chambre twin</th>
        <th>Chambre famille</th>
      </tr>
    </thead>
    <tr class="w3-hover-red">
        <td>Chambre simple</td>
        <td><?php echo $compteurChambreReservationType1 ?></td>
        <td><?php echo $compteurChambreReservationType1 ?></td>
        <td><?php echo $compteurChambreReservationType1 ?></td>
        <td><?php echo $compteurChambreReservationType1 ?></td>
    </tr>
    <tr class="w3-hover-red">
    <td>Chambre double</td>
    <td><?php echo $compteurChambreReservationType1 ?></td>
   
        <td><?php echo $compteurChambreReservationType1 ?></td>
        <td><?php echo $compteurChambreReservationType1 ?></td>
        <td><?php echo $compteurChambreReservationType1 ?></td>
    </tr>
    <tr class="w3-hover-red">
    <td>Chambre double supérieure</td>
    <td><?php echo $compteurChambreReservationType1 ?></td>
        <td><?php echo $compteurChambreReservationType1 ?></td>
        <td><?php echo $compteurChambreReservationType1 ?></td>
        <td><?php echo $compteurChambreReservationType1 ?></td>
    </tr>
    <tr class="w3-hover-red">
    <td>Chambre twin</td>
    <td><?php echo $compteurChambreReservationType1 ?></td>
        <td><?php echo $compteurChambreReservationType1 ?></td>
        <td><?php echo $compteurChambreReservationType1 ?></td>
        <td><?php echo $compteurChambreReservationType1 ?></td>
    </tr>
    <tr class="w3-hover-red">
    <td>Chambre famille</td>
    <td><?php echo $compteurChambreReservationType1 ?></td>
        <td><?php echo $compteurChambreReservationType1 ?></td>
        <td><?php echo $compteurChambreReservationType1 ?></td>
        <td><?php echo $compteurChambreReservationType1 ?></td>
    </tr>



  </table>

</div>



</div> <!-- Fin du conteneur --> 

</div> <!-- Fin du contenu --> 