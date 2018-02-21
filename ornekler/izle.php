
<?php
error_reporting(0);
require_once("../class.php");
$bot= new epbot();
$isim="la-casa-de-papel-1-sezon-1-bolum";
$izle= $bot->izle($isim);
$player= $izle["Vidmoly"];
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
    <iframe width="560" height="320" src="<?php echo base64_decode($player); ?>" frameborder="0" allowfullscreen=""></iframe>
    </body>
    </html>
    <?php
  }elseif($t=="1"){
    header("Content-Type: text/plain");
    print_r($izle);
  }elseif($t=="2"){
    ?>
    <textarea style="width: 1062px;
    height: 166px; min-height:166px; max-height:166px; min-width: 1062px; max-width:1062px;border:0px;" ><?php
echo "<?php"; ?>

$bot= new epbot();
$izle= $bot->izle($_GET["isim"]);
$player= $izle["Openload"];
?>
<iframe width="560" height="320" src="<?php echo base64_decode($player); ?>" frameborder="0" allowfullscreen=""></iframe>
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
  <iframe width="560" height="320" src="<?php echo base64_decode($player); ?>" frameborder="0" allowfullscreen=""></iframe>
</body>
</html>
<?php
}
?>
