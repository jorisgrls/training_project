<?php 
  
// Récupérer le contenu de la page Web à partir de l'url.
$url = "https://api.geekdo.com/xmlapi2/search?query=concept"; 
  
// Initialisez une session CURL.
$ch = curl_init();  
  
// Récupérer le contenu de la page
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
  
//Saisir l'URL et la transmettre à la variable.
curl_setopt($ch, CURLOPT_URL, $url); 
//Désactiver la vérification du certificat puisque waytolearnx utilise HTTPS
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//Exécutez la requête 
$result = curl_exec($ch); 
//Afficher le résultat
echo $result;  
?>