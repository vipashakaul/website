<?php
session_start();

/**
 * Creates a token usable in a form
 * @return string
 */
function getToken(){
  $token = sha1(mt_rand());
  if(!isset($_SESSION['tokens'])){
    $_SESSION['tokens'] = array($token => 1);
  }
  else{
    $_SESSION['tokens'][$token] = 1;
  }
  return $token;
}



// Get a token for the form we're displaying
$token = getToken();
header("Cache-Control: no cache");
session_cache_limiter("private_no_expire");
?>

<html>
  <head>
    <title>My first PHP website</title>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>

<script>
    $(document).ready(function() {
        function disableBack() { window.history.forward() }

        window.onload = disableBack();
        window.onpageshow = function(evt) { if (evt.persisted) disableBack() }
    });


 

</script>

</script>

<SCRIPT LANGUAGE="javascript">
var $submit = $('#submit');
function submitToggle(){  

                        var $submit = $('#submit');
var count = 0;

$submit.click(function(){
    $('input[type=checkbox]').each(function(){
    if (this.checked === true) {
        count=count + 1;
    }
    console.log(count); //simply here to make sure it's working
    });
    if (count === 0) {
        $submit.prop('disabled', true);
        alert("Please make sure at least one box has been selected.");
    }
});
$submit.removeAttr('disabled');
</SCRIPT>



  </head>
  <?php
  
  if($_SESSION['user']){ //checks if user is logged in
  }
  else{
    header("location:index.php"); // redirects if user is not logged in
  }
  $user = $_SESSION['user']; //assigns user value
  ?>
  <body>



    <meta HTTP-EQUIV="Pragma" content="no-cache">
    <meta HTTP-EQUIV="Expires" content="-1" >
    <h2>Home Page</h2>
    <p>Hello <?php Print "$user"?>!</p> <!--Displays user's name-->
    <a href="logout.php">Click here to logout</a><br/><br/>

    
    which party you want to select?
  
    <form  name="form1" action="checkbox.php" method="post">
      <input type="hidden"  name="token" value="<?php echo $token;?>"/>
     
    A <input type="checkbox"  name="public[]" value="A"/><br/>
    B<input type="checkbox"  name="public[]" value="B"/><br/>
     C<input type="checkbox"   name="public[]" value="C"/><br/>
  
      <input type="submit" value="submit" name="submit">
    
       
  </body>
</html>
