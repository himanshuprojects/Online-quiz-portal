<?php include('connect.php');

      if(!isset($_SESSION['email']))
      {
          header('location:login.php');
      }


		try 
		{
        $query_6="SELECT * FROM html_questions";
        
       // Prepare statement
    $stmt_6 = $conn->prepare($query_6);

    // execute the query
    $stmt_6->execute();

    // 
    $questions= $stmt_6->fetchALL();
	//var_dump($questions);
	
		}
		
catch(Exception $e)
{
	echo $e->getMessage();
	
}
   ?> 

<!DOCTYPE html>

    <html>
    <head>
        <title>Score</title>
        	<link rel="stylesheet" type="text/css" href="style.css">

        </head>
        
    <body>
	

        <div class="header">
	<h1 align='center' >Welcome <?php echo($_SESSION['email']); ?>
        </h1>
</div>
        
    <div class="content">
  
    <h1>
     <?php
       try 
		{  
//var_dump($questions);
$r=0;
if(isset($_POST['optradio']))
        {
            
 while ( current($_POST['optradio']))
	 {
    if(current($_POST['optradio']))
	{
        $i= key($_POST['optradio']);
		//echo $i." ".$_POST['optradio'][$i]." ".$questions[$i-1]['aid']."<br>";
		if($_POST['optradio'][$i]== $questions[$i-1]['aid'])
		{
			$r=$r+1;
		}
    }
    next($_POST['optradio']);
	}
		}
		
		
	 	
       // Prepare statement
    $stmt_7 = $conn->prepare('UPDATE `users` SET `status`= :stat WHERE `email`= :em');
	
    // execute the query
    $stmt_7->execute(['stat' => strval(1), 'em' => $_SESSION['email']]);

	
	//lets execute in another way
	$stmt_8 = $conn->prepare('INSERT INTO `scoretable`(`email`, `scor`) VALUES ( :em , :scors )');
	$s=(string)$r;
    // execute the query
	$stmt_8->bindValue(':scors', $s , PDO::PARAM_STR);
	$stmt_8->bindValue(':em', $_SESSION['email'], PDO::PARAM_STR);
    //$stmt_8->execute(['scor' =>(string)$s, 'em' => $_SESSION['email']]);
$stmt_8->execute();
	 echo "Your result is: ".$r."/10";
	 
    
		}
				
catch(Exception $e)
{
	echo $e->getMessage();
	
}
 ?>
	</h1>
	            	<a href="index.php?logout='1'" >logout</a> 

        </div>

        </body>
</html>
   
   