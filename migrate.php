<?php

@ini_set('max_execution_time',0); 

$message = null;

if(isset($_POST['source'])&&isset($_POST['destination'])){
	
	$transfer = true;
	$source = $_POST['source'];
	$destination = $_POST['destination'];
	
    $source_ext = pathinfo($source, PATHINFO_EXTENSION);
    $source_ext = pathinfo($source, PATHINFO_EXTENSION);
    $destination_ext = pathinfo($destination, PATHINFO_EXTENSION);
	
		
		if (!filter_var($source, FILTER_VALIDATE_URL)) {
			
			$transfer = false;
			$message = '<div class="alert alert-danger text-center">Your source is not a valid URL</div>';
			
		}	


		else
		if ($source_ext!='zip') {
			
			$transfer = false;
			$message = '<div class="alert alert-danger text-center">Your source is not a ZIP File</div>';
			
		}	
		else
		if ($destination_ext!='zip') {
			
			$transfer = false;
			$message = '<div class="alert alert-danger text-center">Your destination filename is not a ZIP Format</div>';
			
		}
		
		if($transfer){
			
			if(copy($source,$destination)){
				
			$message = '<div class="alert alert-success text-center">Your requested file has been transfered.</div>';
			}
			
		}
	
	
}




?>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Server File Transfer By phpans.com</title>
	<link rel="shortcut icon" href="https://phpans.com/public/icon/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="header text-center">
       <img src="https://phpans.com/public/images/logo.png" alt="PHPAns" title="PHPAns">
    </div>
    <div class="container content">
	
        <h1 class="h3 bg-primary text-center" style="padding: 5px;">Easy Server File Transfer By phpans.com</h1>
	<?php echo $message; ?>
        <div class="text-center">
       
<form method="post">

  <div class="form-group">
    <label for="source">ZIP File Link</label>
    <input type="text" name="source" class="form-control" placeholder="http://example.com/file.zip" required="required">
  </div>
  <div class="form-group">
    <label for="destination">Destination</label>
    <input type="text" name="destination" class="form-control" placeholder="newfile.zip or directory/newfile.zip" required="required">
  </div>

  <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-transfer"></i> Transfer</button>
</form>
	   
            <br/>
            <h3><a target="_blank" href="https://phpans.com/easy-server-file-transfer-using-php/">Read <b>Easy Server File Transfer</b> Tutorial</a></h3></div>
    </div>
    <div class="footer text-center">&copy; 2015-<?php echo date('Y'); ?> <a target="_blank" href="https://phpans.com">phpans.com</a></div>
</body>

</html>
