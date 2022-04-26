<!-- Pied de page -->
<footer class="w3-container w3-padding-hor-32 w3-theme-d1 w3-center">
  <h4>Suivez-nous</h4>
  <a class="w3-btn-floating w3-green" href="https://www.facebook.com/olivier.fabre/" title="Facebook"><i class="fa fa-facebook"></i></a>
  <a class="w3-btn-floating w3-green" href="https://twitter.com/NimesPhoto" title="Twitter"><i class="fa fa-twitter"></i></a>
  <a class="w3-btn-floating w3-green" href="javascript:void(0)" title="Google +"><i class="fa fa-google-plus"></i></a>
  <a class="w3-btn-floating w3-green w3-hide-small" href="javascript:void(0)" title="Linkedin"><i class="fa fa-linkedin"></i></a>
  <p>Réalisé par <a href="default.asp.html" target="_blank">Olivier Fabre</a></p>


  <div style="position:relative;bottom:100px;z-index:1;" class="w3-tooltip w3-right">
    <span class="w3-text w3-padding w3-green w3-hide-small">Haut de page</span>   
    <a class="w3-btn w3-theme" href="index.php"><span class="w3-xlarge">
    <i class="fa fa-chevron-circle-up"></i></span></a>
  </div>				
</footer>

<?php
if (empty($_GET["type"]) || $_GET["action"]==10 || $_GET["action"]==11 || $_GET["action"]==13 || $_GET["action"]==14 ){

$pathTypeChambreReservationType1 = "./datas/reservations/1/";
$pathTypeChambreReservationType2 = "./datas/reservations/2/";
$pathTypeChambreReservationType3 = "./datas/reservations/3/";
$pathTypeChambreReservationType4 = "./datas/reservations/4/";
$pathTypeChambreReservationType5 = "./datas/reservations/5/";
$pathTypeChambreReservationType6 = "./datas/reservations/6/";

$pathTypeChambreNbrType1 = "./datas/chambres/1.txt";
$pathTypeChambreNbrType2 = "./datas/chambres/2.txt";
$pathTypeChambreNbrType3 = "./datas/chambres/3.txt";
$pathTypeChambreNbrType4 = "./datas/chambres/4.txt";
$pathTypeChambreNbrType5 = "./datas/chambres/5.txt";
$pathTypeChambreNbrType6 = "./datas/chambres/6.txt";

$compteurChambres = 0;
$compteurChambreReservations = 0;

// On va compter le nbr total de chambre que possède l'hôtel
 // On va lire ligne par ligne type 1
 $fichierChambreTypeSelection = fopen($pathTypeChambreNbrType1, "r");
 while(!feof($fichierChambreTypeSelection)){
  $lecture = fgets($fichierChambreTypeSelection);
  $compteurChambres++;
 }
// On ferme le fichier.
fclose($fichierChambreTypeSelection);

// On va lire ligne par ligne type 2
$fichierChambreTypeSelection = fopen($pathTypeChambreNbrType2, "r");
while(!feof($fichierChambreTypeSelection)){
 $lecture = fgets($fichierChambreTypeSelection);
 $compteurChambres++;
}
// On ferme le fichier.
fclose($fichierChambreTypeSelection);

// On va lire ligne par ligne type 3
$fichierChambreTypeSelection = fopen($pathTypeChambreNbrType3, "r");
while(!feof($fichierChambreTypeSelection)){
 $lecture = fgets($fichierChambreTypeSelection);
 $compteurChambres++;
}
// On ferme le fichier.
fclose($fichierChambreTypeSelection);

// On va lire ligne par ligne type 4
$fichierChambreTypeSelection = fopen($pathTypeChambreNbrType4, "r");
while(!feof($fichierChambreTypeSelection)){
 $lecture = fgets($fichierChambreTypeSelection);
 $compteurChambres++;
}
// On ferme le fichier.
fclose($fichierChambreTypeSelection);

// On va lire ligne par ligne type 5
$fichierChambreTypeSelection = fopen($pathTypeChambreNbrType5, "r");
while(!feof($fichierChambreTypeSelection)){
 $lecture = fgets($fichierChambreTypeSelection);
 $compteurChambres++;
}
// On ferme le fichier.
fclose($fichierChambreTypeSelection);

// On va lire ligne par ligne type 6
$fichierChambreTypeSelection = fopen($pathTypeChambreNbrType6, "r");
while(!feof($fichierChambreTypeSelection)){
 $lecture = fgets($fichierChambreTypeSelection);
 $compteurChambres++;
}
// On ferme le fichier.
fclose($fichierChambreTypeSelection);


// On va compter le nombre total de réservations
// Type 1 - nbr de résa pour les chambres simples
$reservationsType1=scandir($pathTypeChambreReservationType1,0);
foreach($reservationsType1 as $n)
{
    /* on test si le retour est un fichier pour éliminer les . et .. */
    if(!is_dir($n))
    {
      $compteurChambreReservations++;
    }
}
// Type 2 - nbr de résa pour les chambres doubles
$reservationsType2=scandir($pathTypeChambreReservationType2,0);
foreach($reservationsType2 as $n)
{
    /* on test si le retour est un fichier pour éliminer les . et .. */
    if(!is_dir($n))
    {
      $compteurChambreReservations++;
    }
}

// Type 3 - nbr de résa pour les chambres doubles sup.
$reservationsType3=scandir($pathTypeChambreReservationType3,0);
foreach($reservationsType3 as $n)
{
    /* on test si le retour est un fichier pour éliminer les . et .. */
    if(!is_dir($n))
    {
      $compteurChambreReservations++;
    }
}

// Type 4 - nbr de résa pour les chambres twin
$reservationsType4=scandir($pathTypeChambreReservationType4,0);
foreach($reservationsType4 as $n)
{
    /* on test si le retour est un fichier pour éliminer les . et .. */
    if(!is_dir($n))
    {
      $compteurChambreReservations++;
    }
}

// Type 5 - nbr de résa pour les chambres triple
$reservationsType5=scandir($pathTypeChambreReservationType5,0);
foreach($reservationsType5 as $n)
{
    /* on test si le retour est un fichier pour éliminer les . et .. */
    if(!is_dir($n))
    {
      $compteurChambreReservations++;
    }
}


// Type 6 - nbr de résa pour les chambres familiale
$reservationsType6=scandir($pathTypeChambreReservationType6,0);
foreach($reservationsType6 as $n)
{
    /* on test si le retour est un fichier pour éliminer les . et .. */
    if(!is_dir($n))
    {
      $compteurChambreReservations++;
    }
}

$taux_valeur = round((($compteurChambreReservations * 100) / $compteurChambres), 0, PHP_ROUND_HALF_ODD);

}



?>


<script>
// Taux de remplissage graduelle
function move() {
  var elem = document.getElementById("myBar");   
  var width = 0;
  var id = setInterval(frame, 35);
  // valeur taux dynamique 
  function frame() {
    if (width >= <?php echo $taux_valeur ?>) {
      clearInterval(id);
    } else {
      width++; 
      elem.style.width = width + '%'; 
      elem.innerHTML = width * 1  + '%';
    }
  }
}


// Ouverture des menus
function ouvreBoiteNavigation() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}

// Boite modal zoom image
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}

function VerifMail(email){
         
         var adresse = String(email);
         adresse=adresse.toLowerCase(adresse);
         /* Pour vérifier une adresse */
         var re = /\S+@\S+\.\S+/; 
           console.log(adresse);
          /* Pour vérifier une adresse Université Avignon (x.x@alumni.univ-avignon.fr)*/
          //var re = /\S+\.\S+@alumni.univ-avignon.fr/; 
          if (re.test(adresse)==false){
          alert("Alerte!\nVous devez saisir une adresse mail valide");
          return false;    
          }else{
              /* alert("Adresse mail correcte") */
              return true;
          }  
       } 



 
function nbrCara(cara,nbrcara) {
  var nombre = document.getElementById(cara).value.length;
  document.getElementById(nbrcara).innerHTML = nombre;
}


function MaxLengthTextarea(dataextarea,maxlength){
  if (objettextarea.value.length > maxlength) {
    objettextarea.value = objettextarea.value.substring(0, maxlength);
    alert('Votre texte ne doit pas dépasser '+maxlength+' caractères!');
   }
}
    



</script>
</body>
</html>