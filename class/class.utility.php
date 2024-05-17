<?php
session_start();
/*
 * raccolta di funzioni
 * @author npasa
 */


Class Utility
{


/*
metodo che dato in input una password ne calcola l'entropia
*/


public function calculatePasswordEntropy($password) {
    // Determine the character set used in the password
    $charset = 0;

    if (preg_match('/[a-z]/', $password)) {
        $charset += 26; // lowercase letters
    }

    if (preg_match('/[A-Z]/', $password)) {
        $charset += 26; // uppercase letters
    }

    if (preg_match('/[0-9]/', $password)) {
        $charset += 10; // digits
    }

    if (preg_match('/[!@#$%^&*()\-_=+{};:,<.>]/', $password)) {
        $charset += 32; // special characters (assuming a subset)
    }

    // Calculate entropy
    $passwordLength = strlen($password);
    $entropy = log($charset) / log(2) * $passwordLength;

    return $entropy;
}

public  function findPasswordAttempts($password, $filePath) {
    // Check if the file exists
    if (!file_exists($filePath)) {
        throw new Exception("File not found: $filePath");
    }

    // Open the file for reading
    $file = fopen($filePath, 'r');
    if (!$file) {
        throw new Exception("Could not open file: $filePath");
    }

    // Initialize attempt counter
    $attempts = 0;
    $startTime = microtime(true);
    // Read the file line by line
    while (($line = fgets($file)) !== false) {
        $attempts++;
        // Remove any trailing whitespace (including newline) from the line
        $line = trim($line);
        // Check if the current line matches the password
        if ($line === $password) {
            // Close the file and return the number of attempts
            $endTime = microtime(true);
            fclose($file);
                // Calculate the time taken in seconds
                $timeTaken = $endTime - $startTime;
                return ['attempts' => $attempts, 'timeTaken' => $timeTaken, 'found'=>true];
        }
    }

    // Close the file
    fclose($file);

    // If the password was not found, record end time and return -1 for attempts
    $endTime = microtime(true);
    $timeTaken = $endTime - $startTime;
    return ['attempts' => $attempts, 'timeTaken' => $timeTaken, 'found'=>false];
}


public function getTime($password){
	$charset = 0;

    if (preg_match('/[a-z]/', $password)) {
        $charset += 26; // lowercase letters
    }

    if (preg_match('/[A-Z]/', $password)) {
        $charset += 26; // uppercase letters
    }

    if (preg_match('/[0-9]/', $password)) {
        $charset += 10; // digits
    }

    if (preg_match('/[!@#$%^&*()\-_=+{};:,<.>]/', $password)) {
        $charset += 32; // special characters (assuming a subset)
    }
	$passwordLength = strlen($password);

	return pow($charset, $passwordLength)/pow(10, 9);
}


public function formatTime($seconds) {

    $year = 31536000; // 365 giorni
    $month = 2592000; // 30 giorni
    $day = 86400; // 24 ore
    $hour = 3600; // 1 ora
	$minute=60;
	$second=1;

    if ($seconds >= $year) {
        $years = floor($seconds / $year);
        return $years . ($years > 1 ? ' anni' : ' anno');
    } elseif ($seconds >= $month) {
        $months = floor($seconds / $month);
        return $months . ($months > 1 ? ' mesi' : ' mese');
    } elseif ($seconds >= $day) {
        $days = floor($seconds / $day);
        return $days . ($days > 1 ? ' giorni' : ' giorno');
    } else if($seconds >=$hour)  {
        $hours = floor($seconds / $hour);
        return $hours . ($hours > 1 ? ' ore' : ' ora');
    } else if($seconds >=$minute)  {
	    $minutes = floor($seconds / $minute);
	    return $minutes . ($minutes > 1 ? ' minuti' : ' minuto');
	} else  {
	    $seconds_ = floor($seconds / $second);
	    return $seconds_ . ($seconds_ > 1 ? ' secondi' : ' secondo');
    }
}

}
