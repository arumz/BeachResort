<?php
include '../_includes/config.inc.php';

//collect information from form
$username = $_POST["username"];
$password = $_POST["password"];
//encrypt password
$crypted_password = crypt($password,"21500");

//make connection to db
$dsn = "mysql:dbname=ajroembk_bluehouse_db";
$DBusername = "ajroembk";
$DBpassword = "Thispassphraseisreallylong814";

try {
  $conn = new PDO($dsn, $DBusername, $DBpassword);
}
catch(PDOException $e) {

}
 //build sql query
 $sql = "SELECT * FROM users WHERE username=:username AND password =:password LIMIT 1";

 //execute query and receive results
 $pdoQuery = $conn->prepare($sql);

 //bind vales of user to appropriate fields in database
 $pdoQuery->bindValue(":username", $username, PDO::PARAM_STR);
 $pdoQuery->bindValue(":password", $crypted_password, PDO::PARAM_STR);

 //actually execute the query
 $pdoQuery->execute();

 //fetch row from query
 $row = $pdoQuery->fetch(PDO::FETCH_ASSOC);

 //If return value is an array, (meaning we have user)
 if (is_array($row)) {
   //set cookie that contains user id
   setcookie("userID", $row["id"], 0, "/");

   //redirect browser to results.php
   header("Location: success.php");

 }
 //else, user was not found in the DB
 else {
   //set error cookie
   setcookie("loginError","Your username or password is invalid",0,"/");
   //redirect browser back to index.php
   header("Location: index.php");

 }

?>
