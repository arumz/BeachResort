<?php include '../_includes/config.inc.php';
    include ABSOLUTE_PATH . '_includes/header.inc.php';
?>
<script>
function validateForm() {
  var valid = true;


    var fname = document.forms["registration_form"]["first_name"].value;
    if (fname == "") {
      document.getElementById("error_one").innerHTML = "Please enter your first name"
        valid = false;
    }
    var lname = document.forms["registration_form"]["last_name"].value;
    if (lname == "") {
      document.getElementById("error_two").innerHTML = "Please enter your last name"
        valid = false;
    }
    var eml = document.forms["registration_form"]["email"].value;
    if (eml == "") {
      document.getElementById("error_three").innerHTML = "Please enter your email"
        valid = false;
    }
    var user = document.forms["registration_form"]["username"].value;
    if (user == "") {
      document.getElementById("error_four").innerHTML = "Please enter your username"
        valid = false;
    }
    var pass = document.forms["registration_form"]["password"].value;
    if (pass == "") {
      document.getElementById("error_five").innerHTML = "Please enter your password"
        valid = false;
    }
    var passc = document.forms["registration_form"]["passwordc"].value;
    if (passc == "") {
      document.getElementById("error_six").innerHTML = "Please confirm your password"
        valid = false;
    }
    else {
      valid = true;
    }

      return valid;

}

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<?php
if (isset($_COOKIE['registrationError'])) {
echo $_COOKIE["registrationError"];
//DELETE COOKIE
setcookie("registrationError", " ", time()-3600, "/");
}
?>

<div class = "registration_form">
  <h3> Required fields are marked with * </h3>
  <form name = "registration_form" action = 'process_registration.php' class = "basic_grey" onsubmit = "return validateForm()" method = "post">
    <div class = "firstname_div">
      <label for = "first_name" id = "first_name_label"> *First name </label>
      <input type = "text" name = "first_name" id = "first_name" />
      <label id = "error_one" />
    </div>
    <div class = "last_name_div">
      <label for "last_name" id = "last_name_label"> *Last Name </label>
      <input type = "text" name = "last_name" id = "last_name">
      <label id = "error_two" />
    </div>
    <div class = "email_div">
      <label for = "email" id = "email_label"> *Email </label>
      <input type = "text" name = "email" id = "email" />
      <label id = "error_three" />
    </div>
    <div class = "username_div">
      <label for = "username" id = "username_label"> *Username </label>
      <input type = "text" name = "username" id = "username" />
      <label id = "error_four" />
    </div>
    <div class = "password_div">
      <label for = "password" id = "password_label"> *Password </label>
      <input type = "password" name = "password" id = "password" />
      <label id = "error_five" />
      <span id = "message"></span>
    </div>
    <div class = "passwordc_div">
      <label for = "passwordc" id = "passwordc_label"> *Password Confirmation </label>
      <input type = "password" name = "passwordc" id = "password" />
      <label id = "error_six" />
    </div>
    <div class = "submit_button_div">
      <input type = "submit" name = "submit_button" />
    </div>
  </form>
</div>

<script> $('#password, #passwordc').on('keyup', function () {
  if ($('#password').val() == $('#passwordc').val()) {
    $('#message').html('Matching').css('color', 'green');
  } else
    $('#message').html('Not Matching').css('color', 'red');
});
</script>


<?php include ABSOLUTE_PATH . "_includes/footer.inc.php"; ?>
