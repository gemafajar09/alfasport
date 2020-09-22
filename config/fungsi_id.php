<?php 

// Random Username dan Password
function generateRandomUser($length, $jml) {
 
    $characters = '1234567890';
    $charactersLength = strlen($characters);

 $randomUser = '';
    $hasilString = '';
 
  // For Jumlah
  for ($j = 0; $j < $jml; $j++) {
  
   // For Random Username
   for ($i = 0; $i < $length; $i++) {
    $randomUser .= $characters[rand(0, $charactersLength - 1)];
   }
   
   
  $hasilString .= $randomUser;
  $randomUser = '';
  
  }
 
    return $hasilString;
}
// Membuat Username dan Password 5 Karakter sebanyak 20 Buah
// (ex:)echo generateRandomUser(5, 1);
?>