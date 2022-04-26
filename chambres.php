<?php

/* Type de chambre sémectionné */
    if (isset($_GET["type"])){
        $selection=true;
        if ($_GET["type"]==1){$titre = "Chambre Simple";$capacite = 1;$tarif=106;}
        if ($_GET["type"]==2){$titre = "Chambre Double";$capacite = 2;$tarif=117;}
        if ($_GET["type"]==3){$titre = "Chambre Double Sup.";$capacite = 2;$tarif=135;}
        if ($_GET["type"]==4){$titre = "Chambre Twins";$capacite = 2;$tarif=117;}
        if ($_GET["type"]==5){$titre = "Chambre Triple";$capacite = 3;$tarif=134;}
        if ($_GET["type"]==6){$titre = "Chambre Familiale";$capacite = 4;$tarif=172;}
?>

<!-- Disponibilité chambre sélectionnée -->
<div class="w3-main" >
<div class="w3-container"  id="chambreSelection">

<!-- titre -->
<h1 class="w3-jumbo"><b><?php echo $titre ?></b></h1>
<h1 class="w3-xxxlarge w3-text-green"><b>Disponibilités.</b></h1>
<hr style="width:50px;border:5px solid green" class="w3-round">
<p id="info1"></p>

<?php

            
        }
        else{
            // Affichage défaut
            $selection=false;
            ?>
<!-- Aucune chambre sélectionnée -->
<!-- titre -->
<div class="w3-main" >
<div class="w3-container"  id="chambreNonSelection">
<h1 class="w3-jumbo"><b>Aucune sélection de type de chambre</b></h1>
</div>
</div>
            <?php
        }
?>

<?php if ($selection){

// Affichage dynamique des chambres disponibles sélectionnées


    $pathTypeChambreDispo = "./datas/chambres/".$_GET["type"].".txt";  
    $pathTypeChambreReservation = "./datas/reservations/".$_GET["type"]."/";
    
    /* Ouverture en lecture seule le fichier de la liste des chambres de même type */
    $fichierChambreTypeSelection = fopen($pathTypeChambreDispo, "r");
    $compteurChambreSelection = 0;
    $compteurChambreReservation = 0;
        // On va lire ligne par ligne
        while(!feof($fichierChambreTypeSelection)){
            $lecture_ligne = fgets($fichierChambreTypeSelection);
            
            $reference_chambre = trim(htmlspecialchars($lecture_ligne, ENT_QUOTES));
            list($type_chambre, $etage, $numeroPorte) = explode ("-",$lecture_ligne);
            $fichierChambreReservation = $reference_chambre . ".txt";
            $compteurChambreSelection++;
?>           
<?php 

        /*  On vérifie que pour chaque chambre lue, il n'y a pas de réservation pour celle-ci en vérifiant dans le bon répertoire
            qu'un fichier de réservation n'est pas présent.
            Si c'est le cas, on l'affichera sinon, la chambre ne sera pas affichée. 
        */
        $pathFichier = $pathTypeChambreReservation . $fichierChambreReservation;
        if (!file_exists($pathFichier)){
    
            // cas: fichier de réservation n'existe pas alors on affiche cetet chambre car elle est disponible
        ?>
            







        <div class="w3-card w3-quarter w3-margin-bottom">
            <ul class="w3-ul w3-border w3-center w3-hover-shadow ">
               <li class="w3-black w3-xlarge w3-padding-32"><?php echo $titre ?></li>
               <li class="w3-padding-16 w3-green "><b>Disponible</b></li>
               <li class="w3-padding-16">Réf. :&nbsp;<b><?php echo  $reference_chambre ?></b></li>
               <li class="w3-padding-16"><b><?php echo $capacite ?></b> personnes max.</li>
             
               <li class="w3-padding-16">Etage <b><?php echo $etage ?></b></li>
               <li class="w3-padding-16">Porte N°<b><?php echo $numeroPorte ?></b></li>
               <li class="w3-padding-16">
                 <h2 class="w3-wide"><?php echo $tarif ." €"?></h2>
                 <span class="w3-opacity">par nuit</span>
               </li>
               <li class="w3-light-grey w3-padding-16 w3-section">
                 <!-- <button onclick="window.location.href='reservations.php?reference=<?php echo strval($reference_chambre) ?>&type=<?php echo $_GET["type"] ?>&action=2';" class="w3-button w3-white w3-padding-large w3-hover-teal">Je réserve</button> -->
                 
                 <?php
                 //Url de chaque carte (action=2 est l'action Ajouter)
                 $url2 = "index.php?page=ajout_reservations&type=" . $_GET['type'] . "&action=10&ref=" . trim($reference_chambre);
                 ?>
                 <button onclick="window.location.href='<?php echo $url2 ?>'" class="w3-button w3-white w3-padding-large w3-hover-green">Je réserve</button>
                 
                </li>
               </li>
             </ul>
       </div>    



<?php
        // non presence du fichier de reservation donc affiche de la carte chambre
        }else{

            $compteurChambreReservation++; 

        }; // presence du fichier de reservation donc on incrémente un compteur pour le taux d'occupation




        }; // Tête de lecture en fin du fichier

        // On ferme le fichier.
        fclose($fichierChambreTypeSelection);


        // On effectue un calcul pour le taux de remplissage par type de chambre 
        if ($compteurChambreSelection!=0){
        $taux_valeur = round((($compteurChambreReservation * 100) / $compteurChambreSelection), 0, PHP_ROUND_HALF_ODD);
        }else{
            $taux_valeur = 0;
        }

        // on change le texte par javascript pour indiquer le nombre de chambres disponible et de réservations
?> 
<script>
    const monTexte = document.getElementById("info1");
    monTexte.innerHTML = "L\'Hôtel Normandy vous propose  <?php echo "<b class='w3-text-green'>". ($compteurChambreSelection - $compteurChambreReservation) . "</b> chambre(s) disponible(s) de ce type." ?>";
    </script>













</div> <!-- Fin du conteneur --> 

</div> <!-- Fin du contenu --> 


<!-- Fin chambre sélectionnée -->
<?php }else{ ?>
<!-- Aucune chambre sélectionnée -->
<!-- titre -->
<div class="w3-main" >
<div class="w3-container"  id="chambreNonSelection">
<h1 class="w3-jumbo"><b>Aucune sélection de type de chambre</b></h1>
</div>
</div>


<?php } ?>    