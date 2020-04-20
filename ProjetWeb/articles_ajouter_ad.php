<?php 
session_start();
 ?>
<!DOCTYPE html>
<html>
    <head>
        
        <title>EbayECE</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet"href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script type="text/javascript"></script>
        <link href="http://fr.allfont.net/allfont.css?fonts=futura-normal" rel="stylesheet" type="text/css"/>
        <style>
        body 
        {
          
            font-family: 'Futura-Normal', arial;
        
        }
        </style>
 
    </head>
    
    <body>
    <!-- Navbar -->
       <!-- Navbar -->
        <nav class="navbar navbar-expand-sm fixed-top">
     
            <div class="searchbar fixed-top">
            <input class="search_input" type="text" name="" placeholder="Rechercher...">
                <a href="#" class="search_icon"><i class="fa fa-search"></i></a>
            </div>
            <button style = "border: none; color: white; padding: 12px 1300px;font-size: 30px" class="btn fixed-top">
                <i class="fa fa-bars"></i>
            </button>
            <div class="container justify-content-center">
                <ul class="navbar-nav fixed-top justify-content-center">
                    <li class="navbar-brand" style = "font-size: 40px"  ><a href="accueil_admin.php" style = "text-decoration: none; color: white">ECE Ebay</a></li>
         
                </ul>
                <ul class="nav navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="articles_ajouter_ads.php">Ajouter un Item</a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link" href="creer_vendeur_ad.php">Ajouter un vendeur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="supprimer_vendeur.php">Supprimmer un vendeur</a>
                    </li>
                   
                </ul>
            </div>

        </nav>
        
 <header class="page-header header container-fluid" style = "padding-top: 90px; background-color :#B1B1B1 ">
            
            <div class="description">
                <h1>Ajouter un Article!</h1>
    
            </div>
        </header>

 
    
<div class="content" align="center">
	<form action="articles_ajouter.php" method="post">   
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
            <td>Photo:</td>
              <td>  
                <input type="file" id="myfile" name="photo"><br><br>
               </td>
            </tr>
			<tr>     
				<td colspan="2" align="center">                                
					<input type="submit" name="button2" value="Ajouter"></td>    
				</tr>   
			</table> 

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
$nom_cat = isset($_POST["nom_cat"])? $_POST["nom_cat"] : ""; 
$photo = isset($_POST["photo"])? $_POST["photo"] : ""; 
$Id_vendeur = $_SESSION['Id_vendeur'];
  //selection bdd
 $database = "piscine";    
//connection Bdd
 $db_handle = mysqli_connect('localhost', 'root', 'root');  
 $db_found = mysqli_select_db($db_handle, $database); 
 
 if ($_POST["button2"]) 
 {   
  if ($db_found) 
    {    
      $sql = "SELECT * FROM Item";   
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
       
           
            echo "ID: " . $Id_vendeur . "<br>";
            echo "ID: " . $Id_vendeur . "<br>";
            echo "item: " . $Id_item . "<br>";
            echo "Nom: " . $Nom . "<br>";
            echo "Prix: " . $Prix . "<br>";
            echo "description: " . $Description . "<br>";
            echo "video: " . $Video . "<br>";
            echo "1: " . $Typedevente1 . "<br>";
            echo "2: " . $Typedevente2 . "<br>";
            echo "cat: " . $nom_cat . "<br>";
          //ajout a la table
          $sql = "INSERT INTO Item(Id_item, Nom, Prix, Description, Video, type_vente1, type_vente2, Id_vendeur, nom_cat)VALUES('$Id_item', '$Nom', '$Prix', '$Description', '$Video','$Typedevente1', '$Typedevente2', '$Id_vendeur', '$nom_cat')";
            
          $result = mysqli_query($db_handle, $sql);
            
        $sql = "SELECT * FROM Item";   
        if ($Id_item != "") 
        {     
          //on cherche si l'Item existe deja
          $sql .= " WHERE Id_item LIKE '%$Id_item%'";     
       }    
        $result = mysqli_query($db_handle, $sql); 
        while ($data = mysqli_fetch_assoc($result) ) 
        {
                $Id_item = $data['Id_item'];


        }
               $sql = "INSERT INTO Photo(photo, Id_item)VALUES('$photo', '$Id_item')";
            
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

		</form>
  </div>

             <footer class="page-footer">
         <div class="container">
         <div class="row">
         <div class="col-lg-8 col-md-8 col-sm-12">
         <h6 class="text-uppercase font-weight-bold">Information additionnelle</h6>
         <p>
         Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque interdum quam odio, quis placerat ante luctus eu.
         Sed aliquet dolor id sapien rutrum, id vulputate quam iaculis.
             </p>
         <p>
         Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque interdum quam odio, quis placerat ante luctus eu.
         Sed aliquet dolor id sapien rutrum, id vulputate quam iaculis.
         </p>
         </div>
         <div class="col-lg-4 col-md-4 col-sm-12">
         <h6 class="text-uppercase font-weight-bold">Contact</h6>
         <p>
         37, quai de Grenelle, 75015 Paris, France <br>
         info@webDynamique.ece.fr <br>
         +33 01 02 03 04 05 <br>
         +33 01 03 02 05 04
         </p>
         </div>
         </div>
         <div class="footer-copyright text-center">&copy; 2019 Copyright | Droit d'auteur: webDynamique.ece.fr</div></div>
        </footer>
	</body> 
</html>