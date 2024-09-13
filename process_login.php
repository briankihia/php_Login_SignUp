<?php

  session_start();
  // below is to include the access details of our mysql database
  include 'db_connection.php';


//   $servername = "localhost";
//   $username = "root";
//   $password = "";
//   $dbname = "signup";

//   // create connection 
//  $conn = new mysqli($servername, $username, $password, $dbname);

// //  check connection
// if ($conn-> connect_error) {
//   die("Connection failed:" . $conn-> connect_error);
// }

  // get the submitted data
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // prepare and bind

    // This line prepares an SQL statement for execution. The ? is a placeholder for a parameter, which helps protect against SQL injection by separating the SQL logic from the data input.
    $stmt = $conn->prepare("SELECT password, role FROM user_info WHERE username = ?");
    // This line binds the parameter to the prepared statement. The "s" indicates that the parameter is a string. $username is the variable that will replace the ? in the SQL query.
    $stmt->bind_param("s", $username);
    // This line executes the prepared statement with the bound parameter. At this point, the query is sent to the database.
    $stmt-> execute();
    // This line stores the result set from the executed query in memory, which allows for efficient retrieval and manipulation of the results.
    $stmt->store_result();

    // In summary, this code prepares and executes a SQL query to select the password field from the users table where the username matches a given value. The use of prepared statements and parameter binding helps to prevent SQL injection attacks.


    // This checks if the result set contains any rows. $stmt is likely a mysqli_stmt object that represents a prepared statement.
    // num_rows is a property of the mysqli_stmt object that tells you how many rows were returned by the query. If num_rows is greater than 0, it means the query found matching rows.
    if ($stmt->num_rows > 0) {

      // This binds a variable ($hashed_password) to a column in the result set.
      // bind_result is used to associate the columns in the result set with variables in PHP. In this case, the result of the query (presumably a password hash) will be stored in the $hashed_password variable.

      // The below means every data in the database it's password must have been hashed before since the below reverses that password to normal .
      $stmt->bind_result($hashed_password, $user_role);

      // This fetches the next row from the result set and populates the bound variables (in this case, $hashed_password) with the data from that row.
      // fetch retrieves the actual data from the result set, making it available for use in your script.
      $stmt->fetch();
      // In summary, the code checks if any rows are returned by a query, then binds a result column to a PHP variable, and finally fetches the data into that variable. This is a common pattern for processing query results in PHP using MySQLi.



      // verify password
      if (password_verify($password, $hashed_password))
       {
        // password is correct
        $_SESSION['username'] = $username;

        // based on user role, you can redirect accordingly
        // first we make sure the user is trying to login with the correct role thus we compare role he/she chose with the one in database
        if ($role === $user_role) {
         
        if($role == "admin") {
          header("Location: admin_dashboard.php");   //redirect to admin dashboard
        }  else {
          header("Location:home.php");  // redirect to user homepage
        }
        // header("Location: home.php");  //redirect to homepage
        exit();
      }  else  {
        // password is incorrect
        echo "Invalid username , password or Role.";
      }

     } else 
     {
      // username does not exist
      echo "Invalid username, password or role";
     }

    $stmt ->close();
    
  }
  $conn->close();

  } 

?>