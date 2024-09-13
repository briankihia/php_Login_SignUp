<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

  <form action="process_signup.php" method="POST">
    Username: <input type="text" name="username"><br>
    E-mail: <input type="text" name="email"><br>
    Password: <input type="text" name="password"><br>
    Contact: <input type="text" name="contact"><br>
    <!-- Role:
    <select name="role" >
      <option value="user">User</option>
      <option value="admin">Admin</option>
    </select><br> -->

    <!-- here a user can only be registered as a user, for admins only a superuser or a developer with access to the database can set anyone as an admin -->
    <input type="submit" value="Sign up">
  </form>
  
</body>
</html>