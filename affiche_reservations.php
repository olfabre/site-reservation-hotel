<?php
$reservation=true;
if (isset($_GET["action"]) && $_GET["action"] == 11){

   

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
<h1 class="w3-xxxlarge w3-text-red"><b>Réservations.</b></h1>
<p>Je vous invite à sélectionner le type de réservation.</p>

<form action="verif_ajout.php" method="get" target="_self" class="w3-container w3-card-4 w3-light-grey" id="resa" name="resa">
<div class="w3-section">
      <label>Visualiser les réservations</label>    
   <SELECT id="type" name="type" size="1" class="w3-select w3-border" onChange="window.location.href='index.php?page=affiche_reservations&action=11&type='+document.getElementById('type').value">
       <OPTION value="1" <?php if ($type==1){echo "selected";}; ?> >Chambre Simple</OPTION>option>
       <OPTION value="2" <?php if ($type==2){echo "selected";}; ?> >Chambre Double</OPTION>
       <OPTION value="3" <?php if ($type==3){echo "selected";}; ?> >Chambre Double Sup.</OPTION>
       <OPTION value="4" <?php if ($type==4){echo "selected";}; ?> >Chambre Twins</OPTION>
       <OPTION value="5" <?php if ($type==5){echo "selected";}; ?> >Chambre Triple</OPTION>
       <OPTION value="6" <?php if ($type==6){echo "selected";}; ?> >Chambre Familiale</OPTION>
   </SELECT>
    </div>
</form>
<p id="info2"></p>
<?php
// Affichage dynamique des chambres disponibles sélectionnées


    $pathTypeChambreDispo = "./datas/chambres/".$type.".txt";  
    $pathTypeChambreReservation = "./datas/reservations/".$type."/";
    
    /* Ouverture en lecture seule le fichier de la liste des chambres de même type */
    $fichierChambreTypeSelection = fopen($pathTypeChambreDispo, "r");
    $compteurChambreReservation = 0;
        // On va lire ligne par ligne
        while(!feof($fichierChambreTypeSelection)){
            $lecture_ligne = fgets($fichierChambreTypeSelection);
            
            $reference_chambre = trim(htmlspecialchars($lecture_ligne, ENT_QUOTES));
            list($type_chambre, $etage, $numeroPorte) = explode ("-",$lecture_ligne);
            $fichierChambreReservation = $reference_chambre . ".txt";
            
?>  

<?php 

        /*  On vérifie que pour chaque chambre lue, il n'y a pas de réservation pour celle-ci en vérifiant dans le bon répertoire
            qu'un fichier de réservation est présent.
            Si c'est le cas, on l'affichera. 
        */
        $pathFichier = $pathTypeChambreReservation . $fichierChambreReservation;
        if (file_exists($pathFichier)){

        //echo $pathFichier;
   
                /* Ouverture en lecture seule le fichier de la liste des chambres de même type en réservation */
                $fichierChambreTypeResrevation = fopen($pathFichier, "r");

                
                // On va lire ligne par ligne
                 while(!feof($fichierChambreTypeResrevation)){
                $lecture_ligne_reservation = fgets($fichierChambreTypeResrevation);
                $compteurChambreReservation++;
                list($reference_chambre, $idclient, $lastname, $email, $duree, $paiement, $data ) = explode ("|",$lecture_ligne_reservation);
?><rtl class="fr"></rtl>

        <div class="w3-card w3-quarter w3-margin-bottom w3-margin-left">
            <ul class="w3-ul w3-border w3-center w3-hover-shadow ">
               <li class="w3-black w3-xlarge w3-padding-32"><?php echo $titre . "<br>" . $reference_chambre?></li>
               <li class="w3-padding-16 w3-red "><b>Réservée</b></li>
               <li class="w3-padding-16">Réf. Client:<br><?php echo $idclient ?></li>
               <li class="w3-padding-16"><b><?php echo ucfirst($lastname) ?></b></li>
             
               <li class="w3-padding-16"><?php echo $email ?></li>
               <li class="w3-padding-16"><?php echo "<b>". $duree . "</b> jour(s)" ?></li>
               <li class="w3-padding-16">
                <?php if($paiement){echo "<span class='w3-opacity'>Paiement effectué</span>";}else{echo "<span class='w3-opacity'>Paiement non effectué</span>";}?>    
               </li>
               <li class="w3-padding-16"><u>Note personnelle</u><br><?php echo $data ?></li>

               <li class="w3-light-grey w3-row">
                 <button onclick="window.location.href='index.php?page=modifier_reservations&reference=<?php echo trim($reference_chambre) ?>&type=<?php echo $type ?>&action=13&idclient=<?php echo $idclient ?>';" class="w3-button w3-green">Modifier</button> 
                 <button onclick="window.location.href='index.php?page=supprimer_reservations&reference=<?php echo trim($reference_chambre) ?>&type=<?php echo $type ?>&action=12&idclient=<?php echo $idclient ?>';" class="w3-button w3-red">Supprimer</button> 
 
                </li>
               </li>
             </ul>
       </div>    

  <?php          
            
            
            
            
            
                }

                 fclose($fichierChambreTypeResrevation);
       










        }else{

            // Pas de reservation. 
                // on change le texte par javascript pour indiquer qu'il n y a pas de réservations
           
   
           
        }



    } // Fin de listage des chambres de l'hotel

    // on ferme le fichier
       // On ferme le fichier.
       fclose($fichierChambreTypeSelection);
        ?>

</div> <!-- Fin du conteneur --> 

</div> <!-- Fin du contenu --> 