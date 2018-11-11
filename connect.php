<?php
session_start();


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quizdb";
$errors = array(); 



try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	//var_dump($conn);//on successfull -object(PDO)#1 (0) { }
	
	// REGISTER USER
{
if (isset($_POST['reg_user'])) 
{
  // receive all input values from the form
  
  $email_1 = $_POST['email_1'];
  $password_1 = $_POST['password_1'];

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($email_1)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }

  

  // first check the database to make sure 
  // a user does not already exist with the same  email
  $query_1= " select * from users  where email = ? ;" ;
     // Prepare statement
$stmnt_1= $conn->prepare($query_1);

$stmnt_1->execute([$email_1]);
$nRows=$stmnt_1->rowCount();
  if($nRows!=0)
  {
	  array_push($errors,"User already exist");
  }
else if (count($errors) == 0) 
{  // Finally, register user if there are no errors in the form

$status=0;
$query_3= "INSERT INTO `users` (`email`, `password`, `status`) VALUES (?, ?, ?);";
     // Prepare statement
$stmnt_3= $conn->prepare($query_3);

$stmnt_3->execute([$email_1, $password_1, $status]);
 array_push($errors,"User successfully registerd");
}
}
 
}

// LOGIN USER

{
if (isset($_POST['login_user'])) 
{
    // set the PDO error mode to exception

 $email_2=  $_POST['email_2'];
  $password_2 = $_POST['password_2'];

  if (empty($email_2)) {
  	array_push($errors, "Email is required");
  }
  if (empty($password_2)) {
  	array_push($errors, "Password is required");
  }

if (count($errors) == 0)
{
$query_2= " select * from users  where email = ?  ;";
     // Prepare statement
$stmnt_2= $conn->prepare($query_2);

$stmnt_2 ->execute([$email_2]);
$row=$stmnt_2->fetch(PDO::FETCH_ASSOC);
    
    if($row['email']===$email_2 && $row['password']===$password_2)
    {	$_SESSION['email'] = $email_2;

		if($row['status']==0)
		{
          	$_SESSION['success'] = "You are now logged in";

			header('location:instructions.php');
		}
        else
        {
            array_push($errors, "Already taken exam");
			$query_9="select * from `scoretable` where email= ? ;";
			$stmt_9=$conn->prepare($query_9);
			$stmt_9->execute([$email_2]);
			$rows=$stmt_9->fetch(PDO::FETCH_ASSOC);
			array_push($errors, "Score is: ".$rows['scor']."/10");
            
        }
    }
     else
	{
  		array_push($errors, "Wrong username/password combination");
  	}

}
   else
	{
  		array_push($errors, "Wrong username/password combination");
  	}

}

}


}
catch(Exception $e){
	echo $e->getMessage();
}
?>