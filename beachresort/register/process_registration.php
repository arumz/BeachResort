<?php include '../_includes/config.inc.php';

//COLLECT VALUES FROM FORM
$firstname = $_POST["first_name"];
$lastname = $_POST["last_name"];
$email = $_POST["email"];
$username = $_POST["username"];
$password = $_POST["password"];

//ENCRYPT PASSWORD (to store securely in database)
$crypted_password = crypt($password, "21500");

//MAKE CONNECTION TO DATABASE
$dsn = "mysql:dbname=ajroembk_bluehouse_db";
$DBusername = "ajroembk";
$DBpassword = "Thispassphraseisreallylong814";

try {
  $conn = new PDO($dsn, $DBusername, $DBpassword);
}

catch (PDOexception $e){

}

//BUILD SQL QUERY TO INSERT DATA
$sql = "INSERT INTO users(firstname, lastname, email, username, password) VALUES (:firstname, :lastname,
:email, :username, :password)";

//PREPARE QUERY
$pdoQuery = $conn->prepare($sql);

//BIND THE VALUES OF THE USER TO THE APPROPRIATE FIELDS IN THE DATABASE
$pdoQuery->bindValue(":firstname",$firstname, PDO::PARAM_STR);
$pdoQuery->bindValue(":lastname",$lastname, PDO:: PARAM_STR);
$pdoQuery->bindValue(":email", $email, PDO:: PARAM_STR);
$pdoQuery->bindValue(":username", $username, PDO:: PARAM_STR);
$pdoQuery->bindValue(":password", $crypted_password, PDO:: PARAM_STR);

//EXECUTE THE QUERY
$pdoQuery->execute();

//GET LAST INSERTED ID (this is the id of the new user)
$userID = $conn->lastInsertId();

//IF RETURNED ID IS > 0 (meaning we inserted a user record)
if ($userID > 0) {
  setcookie("userID", $userID, 0, "/");


//REDIRECT BROWSER TO success.php
header("Location: success.php");

}
// ELSE (an error occured while creating the record)
else {
  //SET ERROR COOKIE
  $registrationErrorMessage = "Your registration failed. Please try again.";
  setcookie("registrationError", $registrationErrorMessage, 0, "/");

  //REDIRECT BROWSER TO index.php
  header("Location: index.php");

}

?>
