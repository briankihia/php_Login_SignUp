<?php
  // variable= re-usable container that holds data(string, integer..)
  // below is how to define a variable
  $name = "bro <br>";
  $email = "brian123johnkiama@gmail.com";
  $age = 21;
  $price = 4.99;
  $tax_rate = 5.1;
  $employed = true;
  $online = false;


  // how to use the variable
  echo $name;
  // below is how to use  variable stated inside quotes
  echo "Hello $name <br>";
  echo "your email is {$email}<br>";
  echo "you are {$age} years old <br>";

  // if you want to define a dollar sign as output, you need an escape sequesnce eg \"
  echo "Your pizza is \${$price} <br>";
  // below shows after the {} you can put percent without needing to add \ before it
  echo "The sales tax rate is : {$tax_rate}%<br>";

?>