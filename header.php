
<!-- Navigation -->
<div class="w3-top">
 <ul class="w3-navbar w3-theme-d2 w3-left-align w3-large">
  <li class="w3-hide-medium w3-hide-large w3-opennav w3-right">
    <a class="w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="ouvreBoiteNavigation()">☰</i></a>
  </li>
  <li><a href="index.php" class="w3-green"><img  src="./images/olivier-fabre-perso.png"    alt="Sessions Admin Olivier Fabre" width="25px" height="25px">&nbsp;admin</a></li>
  <li class="w3-hide-small"><a href="index.php" class="w3-hover-green">Accueil</a></li>
  
  <li class="w3-hide-small w3-dropdown-hover">
    <a href="#" class="w3-hover-green" title="Disponibilités Chambres">Disponibilités <i class="fa fa-caret-down"></i></a>     
    <div class="w3-dropdown-content w3-white w3-card-4">
      <a class="w3-hover-green" href="index.php?page=chambres&type=1">Chambre simple</a>
      <a class="w3-hover-green" href="index.php?page=chambres&type=2">Chambre double</a>
      <a class="w3-hover-green" href="index.php?page=chambres&type=3">Chambre double supérieure</a>
      <a class="w3-hover-green" href="index.php?page=chambres&type=4">Chambre twin</a>
      <a class="w3-hover-green" href="index.php?page=chambres&type=5">Chambre triple</a>
      <a class="w3-hover-green" href="index.php?page=chambres&type=6">Chambre famille</a>
    </div>
  </li>
  
  <li class="w3-hide-small"><a href="index.php?page=affiche_reservations&action=11&type=1" class="w3-hover-green">Réservations</a></li>
  <li class="w3-hide-small"><a href="index.php?page=affiche_recap&action=14&type=1" class="w3-hover-green">Récapitulatif</a></li> 

  <li class="w3-hide-small w3-right"><a href="#" class="w3-hover-green" title="Deconnexion session administrateur"><i class="fa fa-sign-out" style="font-size:24px"></i></a></li>
 </ul>
</div>

<!-- Navigation sur mobile -->
<div id="navDemo" class="w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:43px;">
  <ul class="w3-navbar w3-left-align w3-large w3-theme">
    <li><a class="w3-hover-green" href="index.php">Accueil</a></li>
    
    <li><a class="w3-hover-green" href="#"  title="Disponibilités">Disponibilités <i class="fa fa-caret-down"></i></a> 
    <div class="w3-card-4">    
      <a class="w3-hover-green" href="index.php?page=chambres&type=1">&nbsp;&nbsp;&nbsp;Chambre simple</a>
      <a class="w3-hover-green" href="index.php?page=chambres&type=2">&nbsp;&nbsp;&nbsp;Chambre double</a>
      <a class="w3-hover-green" href="index.php?page=chambres&type=3">&nbsp;&nbsp;&nbsp;Chambre double sup.</a>
      <a class="w3-hover-green" href="index.php?page=chambres&type=4">&nbsp;&nbsp;&nbsp;Chambre twin</a>
      <a class="w3-hover-green" href="index.php?page=chambres&type=5">&nbsp;&nbsp;&nbsp;Chambre triple</a>
      <a class="w3-hover-green" href="index.php?page=chambres&type=6">&nbsp;&nbsp;&nbsp;Chambre famille</a>
    </div>
    
    <li><a class="w3-hover-green" href="index.php?page=affiche_reservations&action=11&type=1"  title="Réservations">Réservations</i></a> 
    <li><a class="w3-hover-green" href="index.php?page=affiche_recap&action=14&type=1"  title="Récapitulatif">Récapitulatif</i></a>
  
  </li>
    
  </ul>
</div>
<!-- bandeau et taux de remplissage selon le type de chambre sélectionné ou par defaut le taux de remplissage total -->
<?php
/* Type de chambre sémectionné */
    if (isset($_GET["type"])){
        if ($_GET["type"]==1){$titre_taux = "Taux de réservation<br>Chambre simple";}
        if ($_GET["type"]==2){$titre_taux = "Taux de réservation<br>Chambre double";}
        if ($_GET["type"]==3){$titre_taux = "Taux de réservation<br>Chambre double sup.";}
        if ($_GET["type"]==4){$titre_taux = "Taux de réservation<br>Chambre twin";}
        if ($_GET["type"]==5){$titre_taux = "Taux de réservation<br>Chambre triple";}
        if ($_GET["type"]==6){$titre_taux = "Taux de réservation<br>Chambre familiale";}
        if ($_GET["action"]==10 || $_GET["action"]==11 || $_GET["action"]==13  || $_GET["action"]==14 ){$titre_taux = "Taux remplissage hôtel";}
    }else{
      $titre_taux = "Taux remplissage hôtel"; 
    }
?>
<div class="w3-display-container w3-animate-opacity">
  <img class="testimg" src="./images/photo01.jpg" alt="boat" style="width:100%;min-height:350px;max-height:600px;">
  <div class="w3-container w3-display-bottomleft w3-margin-bottom">  
    <button onclick="document.getElementById('id01').style.display='block'" class="w3-btn w3-xlarge w3-theme w3-hover-green" title="Taux de remplissage en temps réel">
    <div class="w3-light-grey">
<div id="myBar" class="w3-container w3-green"  style="width:0%">0%</div>
</div><?php echo $titre_taux ?></button>
  </div>
</div>