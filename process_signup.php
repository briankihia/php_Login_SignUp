<!-- database connection -->

<?php
// database connection
  //  $servername="localhost"; //usually "localhost" for xampp
  //  $username ="root"; // default MySQL user for XAMPP
  //   $password = "";  //DEFAULT PASSWORD IS EMPTY FOR XAMPP
  //   $dbname = "signup"; //replace with your databse name

  //   // create connection
  //   $conn = new mysqli($servername, $username, $password,$dbname);

  //   // check connection
  //   if($conn->connect_error)
  //   {
  //     die("connection failed:" . $conn->connect_error);
  //   }

    // below is to include the access details of our mysql database
  include 'db_connection.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
      // Capture the form data
      $username = $_POST['username'];
      $email = $_POST["email"];
      $password = $_POST['password'];
      $contact = $_POST['contact'];
      // $role = $_POST['role'];

      $role = 'user';   // by default a user role is set to user, admin role is only assigned by developer/ superuser in database


      // hashing the password so that password entered by the user will be stored differently in the database for security

      $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    

    // sql quesry to insert the data into mysql table
    $sql = "INSERT INTO user_info (username, email, password, contact, role) VALUES ('$username', '$email','$hashed_password', '$contact', '$role')";

    if($conn->query($sql) === TRUE)
    {
      echo "New record created successfully";
    }  else {
      echo "Error:" . $sql . "<br>" . $conn->error;
    }
  }

  $conn->close();

?>