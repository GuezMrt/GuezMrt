<!DOCTYPE html> 
<html> 
<head>  
	<title>création compte vendeur</title>  
	<meta charset="utf-8"> 
</head> 
<body>  
	<h2>Ajout d'un vendeur</h2>  
	<form action="creer_vendeur.php" method="post">   
		<table>    
			<tr>
				<td>Pseudo:</td>     
				<td><input type="text" name="Pseudo"></td>    
			</tr>    
			<tr>     
				<td>Email:</td>     
				<td><input type="text" name="Email"></td>    
			</tr>
			<tr>     
				<td>Nom:</td>     
				<td><input type="text" name="Nom"></td>    
			</tr>       
			<tr>     
				<td>Photo_p:</td>     
				<td><input type="text" name="Photo_p"></td>    
			</tr>
			<tr>     
				<td>Image_pref:</td>     
				<td><input type="text" name="Image_pref"></td>    
			</tr>       
			<tr>     
				<td colspan="2" align="center">                                
					<input type="submit" name="button2" value="Ajouter"></td>    
				</tr>   
			</table>  
        <?php  
//recupération des info de la page
$Pseudo = isset($_POST["Pseudo"])? $_POST["Pseudo"] : "";  
$Email = isset($_POST["Email"])? $_POST["Email"] : "";  
$Nom = isset($_POST["Nom"])? $_POST["Nom"] : "";  
$Photo_p = isset($_POST["Photo_p"])? $_POST["Photo_p"] : "";
$Image_pref = isset($_POST["Image_pref"])? $_POST["Image_pref"] : ""; 
$Argent=0;
  //selection bdd
 $database = "piscine";    
//connection Bdd
 $db_handle = mysqli_connect('localhost', 'root', 'root');  
 $db_found = mysqli_select_db($db_handle, $database); 
 
 if ($_POST["button2"]) 
 {   
  if ($db_found) 
    {    
      $sql = "SELECT * FROM vendeur";   
        if ($Pseudo != "") 
        {     
  //on cherche si l'acheteur existe deja
          $sql .= " WHERE Pseudo LIKE '%$Pseudo%'";     
          if ($Email != "") 
         {      
           $sql .= " AND Email LIKE '%$Email%'";     
         }    
       }    
      $result = mysqli_query($db_handle, $sql);    
       //regarder s'il y a un résultat    
       if (mysqli_num_rows($result) != 0) 
        {    
          echo "Vendeur existe deja";    
        } 
        else 
        { 
          //ajout a la table
          $sql = "INSERT INTO vendeur (Pseudo, Email, Nom, Argent, Photo_p, Image_pref)VALUES('$Pseudo', '$Email', '$Nom','$Argent', '$Photo_p','$Image_pref')"; 

          $result = mysqli_query($db_handle, $sql);     
          echo "ajout réussi." . "<br>";                                   
          //on affiche l'acheteur ajouté     
          $sql = "SELECT * FROM vendeur";     
          if ($Pseudo != "") 
          {     
          //on cherche l'achteur ajouté    
            $sql .= " WHERE Pseudo LIKE '%$Pseudo%'";      
            if ($Email != "")
            {       
             $sql .= " AND Email LIKE '%$Email%'";      
            }  
            header('Location: connection vend.php');
}    
        }     
 $result = mysqli_query($db_handle, $sql); 
 
 
} 
  else 
    {    
      echo "Database not found";   
    }  
}    


//fermer la connexion  
mysqli_close($db_handle);


  ?>  


		</form>

	</body> 
</html> 