<?php include '_includes/config.inc.php';

//COLLECT VALUES FROM FORM
$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$textarea = $_POST["textarea"];


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
$sql = "INSERT INTO contacts(name, email, phone, message) VALUES (:name, :email,
:subject, :message)";

//PREPARE QUERY
$pdoQuery = $conn->prepare($sql);

//BIND THE VALUES OF THE USER TO THE APPROPRIATE FIELDS IN THE DATABASE
$pdoQuery->bindValue(":name",$name, PDO::PARAM_STR);
$pdoQuery->bindValue(":email",$email, PDO:: PARAM_STR);
$pdoQuery->bindValue(":subject", $subject, PDO:: PARAM_STR);
$pdoQuery->bindValue(":message", $textarea, PDO:: PARAM_STR);

//EXECUTE THE QUERY
$pdoQuery->execute();


//REDIRECT BROWSER TO HOMEPAGE
header("Location: index.php");


?>
