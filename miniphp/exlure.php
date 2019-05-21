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
    <form class="form" action="exlure.php" method="POST">
    <label  for="psw"><b>code apprenant</b></label>
<input type="text" placeholder="" name="code" required>
<p>
<button type="submit" class="registerbtn" name="exclure">exclure</button>
</form>
<?php
if(isset($_POST["exclure"])){
    $cde=$_POST["code"];
   $a="exclut";
   $kader = fopen("apprenants.txt","r");
   while(!feof($kader)){
       $ligne=fgets($kader);
       $col=explode(",",$ligne);
       if($col[1]==$cde){
           $col[7]=$a;
           $effacer=$col[0].",".$col[1].",".$col[2].",".$col[3].",".$col[4].",".$col[5].",".$col[6].",".$a."\n";
       }
       else {
           $effacer=$ligne;
       }
       $newligne=$newligne.$effacer;
   }
   fclose($kader);

       $prod=fopen("apprenants.txt", 'w' );
             
               fwrite($prod,$newligne);
               fclose($prod);
  
            }

    $modifier= fopen("apprenants.txt","r");
    echo "<table class='table5'>";
 echo "<tr>
 <th>code promo</th>
 <th>code</th>
 <th>nom</th>
 <th>prenom</th>
 <th>date de naissance</th>
 <th>telephone</th>
 <th>email</th>
 <th>statut</th>
 </tr> "; 
    while(!feof($modifier)) {
        $ligne=fgets($modifier);
        $col=explode(",",$ligne);
        if($col[1]!=$cde){
            echo "<tr><td>$col[0]</td><td>$col[1]</td><td>$col[2]</td><td>$col[3]</td><td>$col[4]</td><td>$col[5]</td><td>$col[6]</td><td>$col[7]</td></tr>";
        }
    }
    echo"</table>";
    fclose($modifier);

    


?>
</body>
</html>