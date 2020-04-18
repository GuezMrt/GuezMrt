<?php 
session_start();
 ?>
<!DOCTYPE html> 
<html> 
<head>  
	<title>Ajout item</title>  
	<meta charset="utf-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head> 
<body>  
	<h2>Ajout d'un Item</h2>  
	<form action="Ajouter item.php" method="post">   
		<table>    
			<tr>
				<td>Id_item:</td>     
				<td><input type="text" name="Id_item"></td>    
			</tr>    
			<tr>     
				<td>Nom:</td>     
				<td><input type="text" name="Nom"></td>    
			</tr>
			<tr>     
				<td>Prix:</td>     
				<td><input type="text" name="Prix"></td>    
			</tr>       
			<tr>     
				<td>Description:</td>     
				<td><input type="text" name="Description"></td>    
			</tr>
			<tr>     
				<td>Video:</td>     
				<td><input type="text" name="Video"></td>    
			</tr>
      <tr>     
        <td>Type de vente 1:</td>     
        <td><select name="Typedevente1">
    <option value="Achat immédiat">Achat immédiat</option>
    <option value="Enchere">Enchère</option>
    <option value="Negociation">Negociation</option>
  </select></td>    
      </tr>    
      <tr>     
        <td>Type de vente 2:</td>     
        <td><select name="Typedevente2">
          <option value="Rien">Rien</option>
    <option value="Achat immédiat">Achat immédiat</option>
    <option value="Negociation">Negociation</option>
  </select></td>    
      </tr>    
      <tr>     
        <td>Nom catégorie:</td>  
        <td>    
    <select name="nom_cat">
    <option value="Ferraille ou trésor">Ferraille ou Trésor</option>
    <option value="Bon pour le musée">Bon pour le musée</option>
    <option value="Accessoires VIP">Accessoires VIP</option>
  </select>
</td>  
      </tr>          
			<tr>     
				<td colspan="2" align="center">                                
					<input type="submit" name="button2" value="Ajouter"></td>    
				</tr>   
			</table>  
		</form>
		<?php  
//recupération des info de pages php
$Id_item = isset($_POST["Id_item"])? $_POST["Id_item"] : "";  
$Nom = isset($_POST["Nom"])? $_POST["Nom"] : "";  
$Prix = isset($_POST["Prix"])? $_POST["Prix"] : "";  
$Description = isset($_POST["Description"])? $_POST["Description"] : "";
$Video = isset($_POST["Video"])? $_POST["Video"] : ""; 
$Typedevente1 = isset($_POST["Typedevente1"])? $_POST["Typedevente1"] : ""; 
$Typedevente2 = isset($_POST["Typedevente2"])? $_POST["Typedevente2"] : "";
if(($Typedevente1=="Enchere")||($Typedevente2==$Typedevente1))
{
  $Typedevente2="Rien";
}
$nom_cat = isset($_POST["nom_cat"])? $_POST["nom_cat"] : ""; 
$Id_vendeur=$_SESSION['Id_vendeur'];
echo $nom_cat;
echo "ID: " . $Id_vendeur . "<br>";
  //selection bdd
 $database = "piscine";    
//connection Bdd
 $db_handle = mysqli_connect('localhost', 'root', '');  
 $db_found = mysqli_select_db($db_handle, $database); 
 
 if ($_POST["button2"]) 
 {   
  if ($db_found) 
    {    
      $sql = "SELECT * FROM item";   
        if ($Id_item != "") 
        {     
  //on cherche si l'Item existe deja
          $sql .= " WHERE Id_item LIKE '%$Id_item%'";     
       }    
      $result = mysqli_query($db_handle, $sql);    
       //regarder s'il y a un résultat    
       if (mysqli_num_rows($result) != 0) 
        {    
          echo "Item existe deja";    
        } 
        else 
        { 
          //ajout a la table
          $sql = "INSERT INTO item(Id_item, Nom, Prix, Description, Video, type_vente1, type_vente2, Id_vendeur, nom_cat)VALUES('$Id_item', '$Nom', '$Prix','$Description', '$Video','$Typedevente1', '$Typedevente2', '$Id_vendeur', '$nom_cat')"; 

          $result = mysqli_query($db_handle, $sql);     
                            
  
          
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

	</body> 
</html> 