<?php
include_once("autoloader.php");
$utility=new Utility();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Checker</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mx-auto">
    <div class="row">

          
         <div class="col-4 mx-auto text-center p-5">
            <h1>Password Checker</h1>
         <form action="check.php" method="post" class="p-5">
    <input type="text" class="form-control" id="password"  name="password" value="<?php echo $_GET['p'];?>">
   <label for="">italian
    <input type="checkbox" name="dictionary[]" value="italian">
    </label>
    <label for="">french
    <input type="checkbox" name="dictionary[]" value="french">
    </label>
    <button class="btn btn-primary my-2" type="submit">Check Password</button>
    <a class="btn btn-light my-2" href="index.php">Reset</a>

</form>
<?php
if($_GET){


  

   ?>

<div class="alert alert-primary">
    L'entropia della password è: <?php echo round($_GET['e'], 2);?><br>
    <?php
   if($_GET['f']==''){
      $tentativi="non trovato";
   }
   else{
    $tentativi=$_GET['a'];
   }
    ?>
    Numero di tentativi: <?php echo $tentativi;?><br>
    Tempo stimato: <?php echo   $_GET['t'];?><br>
</div>

<?php
$passwordForza=0;
  if($_GET['e']<=20){

      $passwordForza=1; //very weak
  }
  if($_GET['e']>20 and $_GET['e']<40){
    $passwordForza=2; //weak
  }
  if($_GET['e']>40 and $_GET['e']<60){
    $passwordForza=3; //moderate
  }
  if($_GET['e']>60 and $_GET['e']<80){
    $passwordForza=4; //strong
  }
  if($_GET['e']>80 and $_GET['e']<100){
    $passwordForza=5; //very strong
  }
  if($_GET['e']>100){
    $passwordForza=6; //extremely strong
  }
}

switch ($passwordForza) {
    case 1:
        $testo_res="very weak";
        $level="alert-danger";
    break;
    case 2:
        $testo_res=" weak";
        $level="alert-danger";
    break;
    case 3:
        $testo_res="moderate";
        $level="alert-warning";
    break;
    case 4:
        $testo_res="strong";
        $level="alert-success";
    break;
    case 5:
        $testo_res="very strong";
        $level="alert-success";
    break;
    case 6:
        $testo_res="extremely strong";
        $level="alert-info";
    break;
}


?>
<div class="alert <?php echo $level;?>">
<?php echo $testo_res;?>
</div>
         </div>
    </div>

</div>

    


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="code.js"></script>
</body>
</html>