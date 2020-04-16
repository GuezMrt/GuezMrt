<?php  
//recupération des info de pages php
$Nom = isset($_POST["Nom"])? $_POST["Nom"] : "";  
$Prenom = isset($_POST["Prenom"])? $_POST["Prenom"] : "";  
$Email = isset($_POST["Email"])? $_POST["Email"] : "";  
$Adresse = isset($_POST["Adresse"])? $_POST["Adresse"] : ""; 
 
  //selection bdd
 $database = "piscine";    
//connection Bdd
 $db_handle = mysqli_connect('localhost', 'root', '');  
 $db_found = mysqli_select_db($db_handle, $database); 
 
 if ($_POST["button2"]) 
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