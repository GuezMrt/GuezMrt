<?php  
//recupération des info de pages php
$Nom = isset($_POST["Nom"])? $_POST["Nom"] : "";  
$Prenom = isset($_POST["Prenom"])? $_POST["Prenom"] : "";  
$Email = isset($_POST["Email"])? $_POST["Email"] : "";  
$Adresse = isset($_POST["Adresse"])? $_POST["Adresse"] : "";
$Num_tel = isset($_POST["Num_tel"])? $_POST["Num_tel"] : "";

$Numero_de_telephone = isset($_POST["Numero_de_telephone"])? $_POST["Numero_de_telephone"] : "";  
$Adresse1 = isset($_POST["Adresse1"])? $_POST["Adresse1"] : "";  
$Adresse2= isset($_POST["Adresse2"])? $_POST["Adresse2"] : "";  
$Ville = isset($_POST["Ville"])? $_POST["Ville"] : "";  
$Code_postale = isset($_POST["Code_postale"])? $_POST["Code_postale"] : "";
$Pays = isset($_POST["Pays"])? $_POST["Pays"] : "";

$Numero_carte = isset($_POST["Numero_carte"])? $_POST["Numero_carte"] : "";
$Code_securite = isset($_POST["Code_securite"])? $_POST["Code_securite"] : "";
$Nom_proprietaire = isset($_POST["Nom_proprietaire"])? $_POST["Nom_proprietaire"] : ""; 
$Prenom_proprietaire = isset($_POST["Prenom_proprietaire"])? $_POST["Prenom_proprietaire"] : ""; 
$Date_expiration = isset($_POST["Date_expiration"])? $_POST["Date_expiration"] : "";
$Type = isset($_POST["Type"])? $_POST["Type"] : ""; 
$Sold = isset($_POST["Sold"])? $_POST["Sold"] : "";
$Seuil = isset($_POST["Seuil"])? $_POST["Seuil"] : "";

 

 
  //selection bdd
 $database = "piscine";    
//connection Bdd
 $db_handle = mysqli_connect('localhost', 'root', 'root');  
 $db_found = mysqli_select_db($db_handle, $database); 
 
 if ($_POST["button"]) 
 {   
  if ($db_found) 
    {    
      $sql = "SELECT * FROM acheteur";   
        if ($Nom != "") 
        {     
  //on cherche si l'acheteur existe deja
          $sql .= " WHERE Nom LIKE '%$Nom%'";     
          if ($Prenom != "") 
         {      
           $sql .= " AND Prenom LIKE '%$Prenom%'";     
         }    
       }    
      $result = mysqli_query($db_handle, $sql);    
       //regarder s'il y a un résultat    
       if (mysqli_num_rows($result) != 0) 
        {    
          echo "Acheteur existe deja";    
        } 
        else 
        { 
          //ajout a la table
          $sql = "INSERT INTO acheteur(Nom, Prenom, Email, Adresse)VALUES('$Nom', '$Prenom', '$Email', '$Adresse')";

          $result = mysqli_query($db_handle, $sql);     
          echo "ajout réussi." . "<br>";                                   
          //on affiche l'acheteur ajouté     
          $sql = "SELECT * FROM acheteur";     
          if ($Nom != "") 
          {     
          //on cherche l'achteur ajouté    
 	          $sql .= " WHERE Nom LIKE '%$Nom%'";      
 	          if ($Prenom != "")
            {       
 		         $sql .= " AND Prenom LIKE '%$Prenom%'";
                  
 	          }     
        }     
    $result = mysqli_query($db_handle, $sql); 
    while ($data = mysqli_fetch_assoc($result) ) 
    {
            $Id_acheteur = $data['Id_acheteur']; 
    }

   
         $sql = "INSERT INTO livraison(Numero_de_telephone, Adresse1, Adresse2, Ville, Code_postale, Pays, Id_acheteur)
         VALUES('$Numero_de_telephone', '$Adresse1', '$Adresse2', '$Ville', '$Code_postale', '$Pays', '$Id_acheteur')";
   $result = mysqli_query($db_handle, $sql); 
            
                  //on affiche l'acheteur ajouté     
          $sql = "SELECT * FROM acheteur";     
          if ($Nom != "") 
          {     
          //on cherche l'achteur ajouté    
 	          $sql .= " WHERE Nom LIKE '%$Nom%'";      
 	          if ($Prenom != "")
            {       
 		         $sql .= " AND Prenom LIKE '%$Prenom%'";
                  
 	          }     
        }     
    $result = mysqli_query($db_handle, $sql); 
                while ($data = mysqli_fetch_assoc($result) ) 
    {
            $Id_acheteur = $data['Id_acheteur'];
                        echo "ID: " . $Id_acheteur . "<br>";
                    
    }
                echo "Informations sur l'acheteur ajouté:" . "<br>";      
    echo "ID: " . $Id_acheteur . "<br>";      
    echo "Numero carte: " . $Numero_carte . "<br>";      
    echo "code secu: " . $Code_securite . "<br>";      
    echo "nom propri: " . $Nom_proprietaire . "<br>";      
    echo "prenom: " . $Prenom_proprietaire . "<br>";
            echo "expi: " . $Date_expiration . "<br>";
            echo "typ: " . $Type . "<br>";
            echo "sold: " . $Sold . "<br>"; 
            echo "seuil: " . $Seuil . "<br>"; 
            
        $sql = "INSERT INTO carte(Numero_carte, Code_securite, Nom_proprietaire, Prenom_proprietaire, Date_expiration, Type, Sold, Seuil, Id_acheteur)
         VALUES('$Numero_carte', '$Code_securite', '$Nom_proprietaire', '$Prenom_proprietaire', '$Date_expiration', '$Type', '$Sold', '$Seuil', '$Id_acheteur')";
   $result = mysqli_query($db_handle, $sql); 
            
  while ($data = mysqli_fetch_assoc($result)) 
  {      

    echo "Informations sur l'acheteur ajouté:" . "<br>";      
    echo "ID: " . $data['Id_acheteur'] . "<br>";      
    echo "Nom: " . $data['Nom'] . "<br>";      
    echo "Prenom: " . $data['Prenom'] . "<br>";      
    echo "Email: " . $data['Email'] . "<br>";      
    echo "Adresse: " . $data['Adresse'] . "<br>";          
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
