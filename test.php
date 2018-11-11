<?php include('connect.php');

      if(!isset($_SESSION['email']))
      {
          header('location:login.php');
      }


		try 
		{

        $query_4="select * from html_questions";
        
       // Prepare statement
    $stmt_4 = $conn->prepare($query_4);

    // execute the query
    $stmt_4->execute();

    // echo a message to say the UPDATE succeeded
    $questions= $stmt_4->fetchALL();
	$nques=$stmt_4->rowCount();
   
    $query_5=" select * from html_options";
            
                 // Prepare statement
    $stmt_5 = $conn->prepare($query_5);

    // execute the query
    $stmt_5->execute();

            $qno=1;
            $n=0;
    $options= $stmt_5->fetchALL();
            
            $noptions=$stmt_5->rowCount();  
  

		$op_n=1;
		
?>
 <!DOCTYPE html>
    <html>
    <head>
        <title>Instructions</title>
	
        			<link rel="stylesheet" type="text/css" href="style.css">

        
        <script>
        
if(localStorage.getItem("total_seconds")){
    var total_seconds = localStorage.getItem("total_seconds");
} else {
    var total_seconds = 60*10;
}
var minutes = parseInt(total_seconds/60);
var seconds = parseInt(total_seconds%60);
function countDownTimer(){
    if(seconds < 10){
        seconds= "0"+ seconds ;
    }if(minutes < 10){
        minutes= "0"+ minutes ;
    }
    
    document.getElementById("quiz-time-left").innerHTML = "Time Left :"+minutes+"minutes"+seconds+"seconds";
    if(total_seconds <= 0){
         document.getElementById("myForm").submit();
    } else {
        total_seconds = total_seconds -1 ;
        minutes = parseInt(total_seconds/60);
        seconds = parseInt(total_seconds%60);
        localStorage.setItem("total_seconds",total_seconds)
        setTimeout("countDownTimer()",1000);
    }
}
setTimeout("countDownTimer()",1000);


function myFunction() {
    document.getElementById("myForm").submit();
}

        </script>

         </head>
        
    <body>
          <div class="header">
	<h1 align='center' >Welcome <?php echo($_SESSION['email']); ?>
        </h1>
		</div>

<div class="mcq">

<div id="quiz-time-left"> </div>

  <form action="score.php" name="form1" id="myForm" method="post">
  
            
            <?php
    
            
    foreach( $questions as $que)
	{
				echo "<br>";

		echo htmlentities($que[0]).". ".htmlentities($que[1])."<br>";
		$op_n=1;
		foreach($options as $op)
		{
			if($que[0]==$op[2])
			{?>
		<label>
		<input type="radio" name="optradio[<?php echo $op['qid']; ?>]"
				value=<?php echo $op['oid']; ?>
				> <?php echo $op_n.". ".htmlentities($op['options'])."<br>" ?>
				</label>
				<?php
				//echo $op_n.". ".htmlentities($op[1])."<br>";
				$op_n=$op_n+1;
				
			}
			
		}
		
	}
    echo "<br>";
	
	
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
		
	?>
    <input type="button" class="btn" onclick="myFunction()" value="Submit">
</form>
        </div>
        </body>
</html>


        


