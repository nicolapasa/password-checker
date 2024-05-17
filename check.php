<?php
include_once('autoloader.php');

$utility=new Utility();

$numberAttempts=0;
$timeTotal=0;
$entropy=0;



$password=$_POST['password'];

$entropy = $utility->calculatePasswordEntropy($password);

$dictionary=$_POST['dictionary'];

$filePath='data/english.txt';

    $result = $utility->findPasswordAttempts($password, $filePath);

    $numberAttempts+=$result['attempts'];

    $timeTotal+=$result['timeTaken'];

    $found=$result['found'];

if(is_array($dictionary)){


if(in_array("italian", $dictionary) && !$found) {

    $filePath='data/italian.txt';
    
        $result = $utility->findPasswordAttempts($password, $filePath);
    
        $numberAttempts+=$result['attempts'];
    
        $timeTotal+=$result['timeTaken'];
    
        $found=$result['found'];
    }
    if(in_array("french", $dictionary) && !$found) {

        $filePath='data/french.txt';
        
            $result = $utility->findPasswordAttempts($password, $filePath);
        
            $numberAttempts+=$result['attempts'];
        
            $timeTotal+=$result['timeTaken'];
        
            $found=$result['found'];
        }
    }
//cerca in keyboard
    $filePath='data/keyboard.txt';

  if(!$found) {
    $result = $utility->findPasswordAttempts($password, $filePath);

    $numberAttempts+=$result['attempts'];

    $timeTotal+=$result['timeTaken'];
    
    $found=$result['found'];
  }
   
//cerca in sequences
$filePath='data/sequences.txt';
if(!$found) {
$result = $utility->findPasswordAttempts($password, $filePath);

$numberAttempts+=$result['attempts'];

$timeTotal+=$result['timeTaken'];
$found=$result['found'];
}
//cerca in passwordlist
$filePath='data/passwordlist.txt';
if(!$found) {
$result = $utility->findPasswordAttempts($password, $filePath);

$numberAttempts+=$result['attempts'];

$timeTotal+=$result['timeTaken'];
$found=$result['found'];
}
//cerca in locations
$filePath='data/locations.txt';
if(!$found) {
$result = $utility->findPasswordAttempts($password, $filePath);

$numberAttempts+=$result['attempts'];

$timeTotal+=$result['timeTaken'];
$found=$result['found'];
}

$time=(float)$utility->getTime($password);

$messaggio=$utility->formatTime($time);

header("location:   index.php?e=$entropy&a=$numberAttempts&t=$messaggio&f=$found&p=$password");
?>



