<?php
$local=1; //0 para la nube

/* // Store a string into the variable which 
  // need to be Encrypted 
  $password = "mejordbSW12!"; 
    
  // Display the original string 
  echo "Original String: " . $simple_string; 
    
  // Store the cipher method 
  $ciphering = "AES-128-CTR"; 
    
  // Use OpenSSl Encryption method 
  $iv_length = openssl_cipher_iv_length($ciphering); 
  $options = 0; 
    
  // Non-NULL Initialization Vector for encryption 
  $encryption_iv = '1234567891011121'; 
    
  // Store the encryption key 
  $encryption_key = "ProyectoSW12"; 
    
  // Use openssl_encrypt() function to encrypt the data 
  $encrypted_password = openssl_encrypt($simple_string, $ciphering, 
              $encryption_key, $options, $encryption_iv); */


if ($local==1){
    $server="localhost";
    $user="root";
    $pass="";
    $basededatos="Quiz";
} else {
    $server="localhost";
    $user="id14922465_quizdbsw12";
    $pass=$encrypted_password;
    $basededatos="id14922465_quizdb";
}


?>
