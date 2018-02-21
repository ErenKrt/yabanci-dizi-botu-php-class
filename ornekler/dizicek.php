<?php
error_reporting(0);
require_once("../class.php");
$bot= new epbot();

$dizi= $bot->dizicek("the-fall-tum-bolumler-izle");
//print_r($dizi);
if(isset($_GET["t"])){
$t= $_GET["t"];
  if($t=="0"){
    ?>
    <!DOCTYPE html>
    <html lang="en" >

    <head>
      <meta charset="UTF-8">
      <title>Yabancı Dizi PHP Bot / Class</title>
      <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
      <link rel="stylesheet" href="css/style.css">

    </head>

    <body>
      <?php
    echo "<h3>".$dizi["isim"]."</h3><div class='col-md-6'><h4>".$dizi["aciklama"]."</h4></div><img  src='../resim.php?url=".$dizi["resim"]."'>'";
    ?>
    </body>
    </html>
    <?php
  }elseif($t=="1"){
    header("Content-Type: text/plain");
    print_r($dizi);
  }elseif($t=="2"){
    ?>
    <textarea style="width: 1062px;
    height: 166px; min-height:166px; max-height:166px; min-width: 1062px; max-width:1062px;border:0px;" ><?php echo "<?php"; ?>

error_reporting(0);
require_once("class.php");
$bot= new epbot();
$dizi= $bot->dizicek("the-fall-tum-bolumler-izle");
echo "<h3>".$dizi["isim"]."</h3><div class='col-md-6'><h4>".$dizi["aciklama"]."</h4></div><img  src='../resim.php?url=".$dizi["resim"]."'>'";
?></textarea>
    <?php
  }
}else{
?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Yabancı Dizi PHP Bot / Class</title>
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
  <link rel="stylesheet" href="css/style.css">

</head>

<body>
  <?php
echo "<h3>".$dizi["isim"]."</h3><div class='col-md-6'><h4>".$dizi["aciklama"]."</h4></div><img  src='../resim.php?url=".$dizi["resim"]."'>'";
?>
</body>
</html>
<?php
}
?>
