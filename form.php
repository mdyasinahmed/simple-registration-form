<?
    $fullName = $_POST['fullName'];
    $std_id = $_POST['std_id'];
    $department = $_POST['department'];
    $bloodGroup = $_POST['bloodGroup'];
    $email = $_POST['email'];
    $number = $_POST['number'];

    // DB 
	$conn = new mysqli('localhost','root','','student_registration');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into register(fullName, std_id, department, bloodGroup, email, number) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssss", $fullName, $std_id, $department, $bloodGroup, $email, $number);
		$number = $stmt->execute();
		echo $execval;
		echo "Registration Done Successfully!!";
		$stmt->close();
		$conn->close();
	}


?>