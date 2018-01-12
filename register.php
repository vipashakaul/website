<html>
  <head>
    <title>My first PHP website</title>
  </head>
 
</script>
  <body>
    <h2>Registration Page</h2>
    <p>Give your details carefully</p>
    <p>do not press back button as only one chance is given</p>
    <a href="index.php">Click here to go back</a><br/><br/>
    <form action="register.php" method="post">
      Enter Username: <input type="text"  name="username" required="required"/> <br/>
      Enter date of birth: <input type="date"  name="date_of_birth" required="required"/> <br/>
      Enter PAN no: <input type="text"  name="PAN_NO" minlength="10" maxlength="10" required="required"/> <br/>
      Enter email id: <input type="email"  name="email_id" required="required"/> <br/>
      <input type="submit" value="Register"/>
    </form>
  </body>
</html>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $username = mysql_real_escape_string($_POST['username']);
  $password = mysql_real_escape_string($_POST['password']);
  $date_of_birth = mysql_real_escape_string($_POST['date_of_birth']);
  $PAN_NO = mysql_real_escape_string($_POST['PAN_NO']);
  $email_id = mysql_real_escape_string($_POST['email_id']);

    $bool = true;
  mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
  mysql_select_db("first_db") or die("Cannot connect to database"); //Connect to database
 
  $query = mysql_query("Select * from users"); //Query the users table
 
  while($row = mysql_fetch_array($query)) //display all rows from query
  {
    $table_users = $row['username']; // the first username row is passed on to $table_users, and so on until the query is finished
    if($username == $table_users) // checks if there are any matching fields
    {
      $bool = false; // sets bool to false
      Print '<script>alert("Username has been taken!");</script>'; //Prompts the user
      Print '<script>window.location.assign("register.php");</script>'; // redirects to register.php
    }
  }
  if($bool) // checks if bool is true
  {
    mysql_query("INSERT INTO users (username, password , date_of_birth, PAN_NO ,email_id) VALUES ('$username','$password','$date_of_birth','$PAN_NO',' $email_id')"); //Inserts the value to table users
   // Prompts the user
    Print '<script>window.location.assign("home.php");</script>'; // redirects to register.php
  }
}
?>