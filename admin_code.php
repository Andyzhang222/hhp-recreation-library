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
$Admin_Code = $_POST['id'];
		

if (!($Admin_Code==""))
{

$sql="SELECT * FROM admin WHERE Id = '$_POST[id]' 	 ";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);


if($row["Id"]==$Admin_Code )
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
