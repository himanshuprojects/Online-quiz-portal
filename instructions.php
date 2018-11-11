<?php
      session_start();
      if(!isset($_SESSION['email']))
      {
          header('location:index.php');
      }
?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Instructions</title>
        	<link rel="stylesheet" type="text/css" href="style.css">

        </head>
    <body>
	
        <div class="header">
	<h1 align='center' >Welcome <?php echo($_SESSION['email']); ?>
        </h1>
</div>
    <div class="content">
        
        
        <h2>Online Test :: HTML Programming Test</h2>
Number of questions : 10 | Time : 10 minutes

        <h3>Instruction:</h3>
        <ul>
        <li>Total Number of Questions: 10</li>
        <li>Time alloted: 10 minutes</li>
        <li>Each question carry 1 mark each, no negative marking</li>
        </ul>
        <div style="border:#efefef 1px solid;margin-top:20px;">
							<div class="note11">NOTE:</div>
							<div style="padding:5px">
								<div style="font-size:20px;" id="note_id">Click the 'Submit Test' button given in the bottom of this page to Submit your answers.</div>
								<div style="font-size:20px;" id="note_id">Test will be submitted after time is Expired.</div>
								<div style="font-size:20px;" id="note_id">Do not refresh the Page.</div>
							</div>
						</div>
		
        <a href="test.php"  >START</a>
            	<a href="index.php?logout='1'" >logout</a> 
        </div>
        </body>
    </html>