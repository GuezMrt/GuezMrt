<?php  
//recupération des info de pages php
$Pseudo = isset($_POST["Pseudo"])? $_POST["Pseudo"] : "";  
$Email = isset($_POST["Email"])? $_POST["Email"] : "";  
$Nom = isset($_POST["Nom"])? $_POST["Nom"] : "";  
$Photo_p = isset($_POST["Photo_p"])? $_POST["Photo_p"] : "";
$Image_pref = isset($_POST["Image_pref"])? $_POST["Image_pref"] : ""; 
$Argent=0;
  //selection bdd
 $database = "piscine";    
//connection Bdd
 $db_handle = mysqli_connect('localhost', 'root', '');  
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
          if ($Nom != "") 
         {      
           $sql .= " AND Nom LIKE '%$Nom%'";     
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
            if ($Nom != "")
            {       
             $sql .= " AND Nom LIKE '%$Nom%'";      
            }     
        }     
 $result = mysqli_query($db_handle, $sql); 
 
  while ($data = mysqli_fetch_assoc($result)) 
  {      

    echo "Informations sur le vendeur ajouté:" . "<br>";      
    echo "ID: " . $data['Id_vendeur'] . "<br>";      
    echo "Pseudo: " . $data['Pseudo'] . "<br>";      
    echo "Email: " . $data['Email'] . "<br>";      
    echo "Nom: " . $data['Nom'] . "<br>";      
    echo "Photo_p: " . $data['Photo_p'] . "<br>";  
    echo "Image_pref: " . $data['Image_pref'] . "<br>" ;    
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