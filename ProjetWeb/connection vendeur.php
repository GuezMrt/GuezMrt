<?php 
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Connexion</title>
</head>
<body>
   <p>
        <a href="Ajouter Item.php">Lien vers mapage.php</a><br />
    </p>
    	<div class="header">
	    </div>
	</body>
</html>
<?php
// récupère les données du formulaire

//Connexion à la Base de Données
 $database = "piscine";    
//connection Bdd
 $db_handle = mysqli_connect('localhost', 'root', '');  
 $db_found = mysqli_select_db($db_handle, $database); 

$Pseudo = isset($_POST["Pseudo"])? $_POST["Pseudo"] : "";  
$Email = isset($_POST["Email"])? $_POST["Email"] : "";  
$sql = "SELECT * FROM vendeur";   
        if ($Pseudo != "") 
        {     
  //on cherche si le vendeur existe
          $sql .= " WHERE Pseudo LIKE '%$Pseudo%'";     
          if ($Email != "") 
         {      
           $sql .= " AND Email LIKE '%$Email%'";   
         }    
       }    
      $result = mysqli_query($db_handle, $sql); 
      if (mysqli_num_rows($result) != 0) 
        {    
            while ($data = mysqli_fetch_assoc($result)) 
  {      
    //recupération des cariables de session
  $_SESSION['Pseudo']=$Pseudo;
  $_SESSION['Id_vendeur']=$data['Id_vendeur'];
  $_SESSION['Email']=$Email;
  echo "ID: " . $_SESSION['Id_vendeur'] . "<br>";
}
        }    
        else
        {
          echo "Mauvais identifiant " . "<br>";
        }
	
	
?>