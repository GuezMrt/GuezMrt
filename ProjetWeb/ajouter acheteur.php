<?php  
//recuperer les données venant de la page HTML  
$Nom = isset($_POST["Nom"])? $_POST["Nom"] : "";  
$Prenom = isset($_POST["Prenom"])? $_POST["Prenom"] : "";  
$Email = isset($_POST["Email"])? $_POST["Email"] : "";  
$Adresse = isset($_POST["Adresse"])? $_POST["Adresse"] : ""; 
 
 //identifier votre BDD  
 $database = "projet_web";    
 //connectez-vous dans votre BDD  
 //Rappel: votre serveur = localhost | votre login = root |votre password = <rien>  
 $db_handle = mysqli_connect('localhost', 'root', '');  
 $db_found = mysqli_select_db($db_handle, $database); 
 
 if ($_POST["button2"]) 
 {   
  if ($db_found) 
 {    $sql = "SELECT * FROM acheteur";   
  if ($Nom != "") {     
  //on cherche si l'acheteur existe deja
  $sql .= " WHERE Nom LIKE '%$Nom%'";     
  if ($Prenom != "") 
  {      
  $sql .= " AND Prenom LIKE '%$Prenom%'";     
  }    }    
  $result = mysqli_query($db_handle, $sql);    
  //regarder s'il y a de résultat    
  if (mysqli_num_rows($result) != 0) 
  {    
  //l'acheteur existe deja
   echo "Acheteur existe deja";    
} 
else { 
$sql = "INSERT INTO acheteur(Prenom, Nom, Email, Adresse)            
 VALUES('$Nom', '$Prenom', '$Email', '$Adresse')";     
 $result = mysqli_query($db_handle, $sql);     
 echo "ajout réussi." . "<br>";                                   
 //on affiche l'acheteur ajouté     
 $sql = "SELECT * FROM acheteur";     
 if ($titre != "") {     
 //on cherche le livre avec les paramètres titre et auteur     
 	$sql .= " WHERE Nom LIKE '%$Nom%'";      
 	if ($Prenom != "") {       
 		$sql .= " AND Prenom LIKE '%$Prenom%'";      
 	}     
 }     
 $result = mysqli_query($db_handle, $sql); 
 
    while ($data = mysqli_fetch_assoc($result)) 
    	{      echo "Informations sur l'acheteur ajouté:" . "<br>";      
    echo "ID: " . $data['ID'] . "<br>";      
    echo "Nom: " . $data['Nom'] . "<br>";      
    echo "Prenom: " . $data['Prenom'] . "<br>";      
    echo "Email: " . $data['Email'] . "<br>";      
    echo "Adresse: " . $data['Adresse'] . "<br>";      
    echo "<br>";     
}    
} 
 
  } 
  else 
  	{    
  		echo "Database not found";   
  	}  
  }    
  //fermer la connexion  
  mysqli_close($db_handle);
  ?> 