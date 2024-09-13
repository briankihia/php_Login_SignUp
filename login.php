<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

  <form action="process_login.php" method="POST">
    Username: <input type="text" name="username"><br>  
    Password: <input type="text" name="password"><br>
    Role:
    <select name="role" >
      <option value="user">User</option>
      <option value="admin">Admin</option>
    </select><br>
    <input type="submit">
  </form>
  
</body>
</html>