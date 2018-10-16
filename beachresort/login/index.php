<?php
include '../_includes/config.inc.php';
include ABSOLUTE_PATH . '_includes/header.inc.php';


//Display the contents of the error cookie if there is one
if (isset($_COOKIE["loginError"])) {
  echo $_COOKIE["loginError"];


  //Delete the cookie
  setcookie("loginError", "", time()-3600, "/");
}

?>

<script>
function validateForm() {
  var valid = true;


    var fname = document.forms["login_form"]["username"].value;
    if (fname == "") {
      document.getElementById("error_one").innerHTML = "Please enter a valid username"
        valid = false;
    }
    var lname = document.forms["login_form"]["password"].value;
    if (lname == "") {
      document.getElementById("error_two").innerHTML = "Please enter a valid password"
        valid = false;
    }

    else {
      valid = true;
    }

      return valid;

}
</script>

<div class = "login_form">
<form name = "login_form" action = "process_login.php" class ="basic_grey" onsubmit = "return validateForm()" method ="post">

<div class = "username_div">
  <label for = "username" id = "username_label">Username</label>
  <input type = "text" name = "username" id = "username" />
  <label id="error_one"></label>
</div>

<div class = "password_div">
  <label for "password" id = "password_label">Password</label>
  <input type = "password" name = "password" id = "password" />
  <label id = "error_two"></label>
</div>

<input type="submit" name="submitButton" />
</form>
</div>

<script>
$('#username').on('input', function() {
	var input=$(this);
	var is_name=input.val();
	if(is_name){input.removeClass("invalid").addClass("valid");}
	else{input.removeClass("valid").addClass("invalid");}
});

$('#password').on('input', function() {
	var input=$(this);
	var is_name=input.val();
	if(is_name){input.removeClass("invalid").addClass("valid");}
	else{input.removeClass("valid").addClass("invalid");}
});
</script>
<?php
include  ABSOLUTE_PATH . '_includes/footer.inc.php';
?>
