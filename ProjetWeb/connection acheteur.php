<?php 
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Connection d'un acheteur</title>
	
</head>
<body>
<p>Bonjour</p>
<p>Bienvenue sur notre site.</p>
<div class="content">
    <form action="connection acheteur.php" method="post">
        <p>Veuillez entrer vos identifiants pour vous connecter:<p/>
        <div class="center">
            <table>    
			<tr>
				<td>Nom:</td>     
				<td><input type="text" name="Nom"></td>    
			</tr>    
			<tr>     
				<td>Prenom:</td>     
				<td><input type="text" name="Prenom"></td>    
			</tr>
			<tr>     
				<td>Email (password):</td>     
				<td><input type="password" name="Email"></td>    
			</tr>
			<tr>     
				<td colspan="2" align="center">                                
					<input type="submit" value="Connection"></td>    
				</tr>   
			</table>
		</div>
    </form>
</body>
</html>
<?php
// récupère les données du formulaire

//Connexion à la Base de Données
 $database = "piscine";    
//connection Bdd
 $db_handle = mysqli_connect('localhost', 'root', '');  
 $db_found = mysqli_select_db($db_handle, $database); 

$Prenom = isset($_POST["Prenom"])? $_POST["Prenom"] : "";
$Nom = isset($_POST["Nom"])? $_POST["Nom"] : "";
$Email = isset($_POST["Email"])? $_POST["Email"] : "";  
$sql = "SELECT * FROM acheteur";   
        if ($Prenom != "") 
        {     
  //on cherche si le vendeur existe
          $sql .= " WHERE Prenom LIKE '%$Prenom%'";     
          if ($Nom != "") 
         {      
           $sql .= " AND Nom LIKE '%$Nom%'";
           if ($Email != "") 
         {      
           $sql .= " AND Email LIKE '%$Email%'";   
         }       
         }    
          } 
      $result = mysqli_query($db_handle, $sql); 
      if (mysqli_num_rows($result) != 0) 
        {    
  while ($data = mysqli_fetch_assoc($result)) 
  {      
    //recupération des cariables de session
  $_SESSION['Prenom']=$Prenom;
  $_SESSION['Id_acheteur']=$data['Id_acheteur'];
  $_SESSION['Nom']=$Nom;
  $_SESSION['Email']=$Email;


}
 //header('Location: accueil acheteur.php');
}
           
        else
        {
          echo "Mauvais identifiant " . "<br>";
        }
	
	
?>
