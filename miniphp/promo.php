<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="stylepro.css">
    <?php
include("menu.php");
?>
</head>
<body>
     <div id="container">  
<form id="form" action="promo.php" method="POST" >
  <div class="container">
    <h1>Veillez enregistrer une promo</h1>
 
    <label for="email"><b>code</b></label>
    <input type="text" placeholder="code" name="code" required>
<P>
    <label for="psw"><b>Nom</b></label>
    <input type="text" placeholder="mettez le nom de la promo" name="nom" required>
<p>
    <label for="psw-repeat"><b>mois</b></label>
    <input type="text" placeholder="mois" name="mois" required>
    
    <p>
    <label for="psw-repeat"><b>annee</b></label>
    <input type="number" placeholder="annee" name="annee" required>
    <p>
<button type="submit" class="registerbtn" name="enregistrer">ENREGISTRER</button>
  </form>
  </div>
  <?php
  if(isset($_POST["enregistrer"])){
      $code=$_POST["code"];
      $nm=$_POST["nom"];
      $mois=$_POST["mois"];
      $annee=$_POST["annee"];

      if($ajout = fopen("promo.txt","a")){
        fwrite($ajout, "\n".$code.",".$nm.",".$mois.",".$annee."," );
    }
    fclose($ajout);
 
  $tab=fopen("promo.txt","r");
    echo "<table class='table5'>";
    echo "<tr>
    <th>code</>
    <th>nom</th>
    <th>mois</th>
    <th>annee</th>
  
    </tr> ";
     
    while(!feof($tab)){
      $text=fgets($tab);
      $col=explode(",",$text);
     echo "<tr><td>$col[0]</td><td>$col[1]</td><td>$col[2]</td><td>$col[3]</td></tr>";
      //echo$j;
    }
    echo"</table>";
       fclose($tab); 

      }
  

  
  
  ?>
</body>
</html>