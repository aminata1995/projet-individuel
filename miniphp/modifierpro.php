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
<center><h1>modifier une promo</h1></center>
<form class="form" action="modifierpro.php" method="POST">

<p>    
    <label  for="psw"><b>code promo</b>
    <?php
    echo "<select name='select'>";
    echo "<option></option>";
    $promo=fopen("promo.txt",'r');
    while(!feof($promo)){
        $ligne=fgets($promo);
        $ajout=explode(",",$ligne);
        echo "<option>".$ajout[0]."</option>";
    }
    fclose($promo);
    echo"</select>";
    ?>
      
 <label for="email"><b>code</b></label>
 <input type="text" placeholder="code" name="code" required>
<P>
 <label for="psw"><b>Nom</b></label>
 <input type="text" placeholder="mettez le nom de la promo" name="nom" required>
<p>
 <label for="psw"><b>mois</b></label>
 <input type="text" placeholder="mois" name="mois" required>
 
 <p>
 <label for="psw"><b>annee</b></label>
 <input type="number" placeholder="annee" name="annee" required>
 <p>
<button type="submit" class="registerbtn" name="modifier">MODIFIER</button>
</div>
<?php
if(isset($_POST["modifier"])){
    $select=$_POST['select'];
    $code=$_POST["code"];
    $nm=$_POST["nom"];
    $mois=$_POST["mois"];
    $annee=$_POST["annee"];
    $prod=fopen("promo.txt",'r');
    while(!feof($prod)){
        $ligne=fgets($prod);
        $col=explode(",", $ligne);
        if($code==$col[0]){
            $col[1]=$select;
            $col[1]=$nm;
            $col[2]=$mois;
            $col[3]=$annee;
          $effacer=$col[0].",".$col[1].",".$col[2].",".$col[3].",".$col[4].",".$col[5]."\n";
}
        else {
            $effacer=$ligne;
        }
        $newligne=$newligne.$effacer;
    }
    fclose($prod);
    $prod=fopen("promo.txt", 'w+' );
          
            fwrite($prod,$newligne);
            fclose($prod);
$tab=fopen("promo.txt","r");

echo "<table class='table5'>";
echo "<tr>
<th>code promo</th>
<th>nom</th>
<th>mois</th>
<th>annee</th>
</tr> ";
while(!feof($tab)){
$text=fgets($tab);
$col=explode(",",$text);
echo "<tr><td>$col[0]</td><td>$col[1]</td><td>$col[2]</td><td>$col[3]</td><td>$col[4]</td><td>$col[4]</td></tr>";
}
}

echo"</table>";
fclose($tab); 


  




?>
    
</body>
</html>