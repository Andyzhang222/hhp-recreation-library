<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hhp_recreation_library";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$AdminCode = $_POST['id'];
		

if (!($AdminCode==""))
{

$sql="SELECT * FROM admin_code WHERE Id = '$_POST[id]' 	 ";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);


if($row["Id"]==$AdminCode )
   {
	header("location: home.html");
	}
else
    echo"Sorry, your credentials are not valid, Please try again.";

}

else 
{
	echo"Sorry, your credentials are not valid, Please try again.";
}	
?>