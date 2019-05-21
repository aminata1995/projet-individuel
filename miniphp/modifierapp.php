<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="stylepro.css">
 
</head>
<body>
<form class="form" action="modifierapp.php" method="POST">
<?php
include("menu.php");
?>
<label  for="psw"><b></b></label>
<input type="text" placeholder="nom promo" name="code" required>
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
</label>
    
<P>
    <label for="psw"><b></b></label>
    <input type="text" placeholder="nom" name="nom" required>
<p>
    <label for="psw-repeat"><b></b></label>
    <input type="text" placeholder="prenom" name="prenom" required>
    
    <p>
    <label for="psw-repeat"><b>date de naissance</b></label>
    <input type="date" placeholder="date de naiss" name="date" required>
    <p>
    <label for="psw-repeat"><b></b></label>
    <input type="number" placeholder="+2214569" name="num" required>
    <p>
    <label for="psw-repeat"><b></b></label>
    <input type="email" placeholder="email" name="mail" required>
    <p>
    <select class="statut" name="statut">

    <option type="" value="" name=""></option>
    <option type="text" value="exclu" name="exclu">exclu</option>
    <option type="text" value="abandon" name="abandon">abandon</option>
	<option type="text" value="present" name="abandon">présent</option>
    </select>
    <p>
<button type="submit" class="registerbtn" name="modifier">MODIFIER</button>
  
</form>
<?php
    
if(isset($_POST["modifier"])){
    $select=$_POST['select'];
    $code=$_POST["code"];
    $nm=$_POST["nom"];
    $pn=$_POST["prenom"];
    $date=$_POST["date"];
    $num=$_POST["num"];
    $mail=$_POST["mail"];
    $sta=$_POST["statut"];
    
    $prod=fopen("apprenants.txt",'r');
    while(!feof($prod)){
        $ligne=fgets($prod);
        $col=explode(',', $ligne);
        if($code==$col[1]){
            $col[0]=$select;
            $col[2]=$nm;
            $col[3]=$pn;
            $col[4]=$date;
            $col[5]=$num;
            $col[6]=$mail;
            $col[7]=$sta;

            $effacer=$col[0].",".$col[1].",".$col[2].",".$col[3].",".$col[4].",".$col[5].",".$col[6].",".$col[7]."\n";

        }
        else {
            $effacer=$ligne;
        }
        $newligne=$newligne.$effacer;
    }
    fclose($prod);
    $prod=fopen("apprenants.txt", 'w+' );
          
            fwrite($prod,$newligne);
            fclose($prod);
}
$tab=fopen("apprenants.txt","r");

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
while(!feof($tab)){
$text=fgets($tab);
$col=explode(",",$text);
echo "<tr><td>$col[0]</td><td>$col[1]</td><td>$col[2]</td><td>$col[3]</td><td>$col[4]</td><td>$col[5]</td><td>$col[6]</td><td>$col[7]</td></tr>";
}
echo"</table>";
fclose($tab); 


?>
</body>
</html>