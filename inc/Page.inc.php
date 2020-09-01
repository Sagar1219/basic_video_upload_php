<?php
if(isset($result["file_name"])){
    $path = 'uploads/'.$result["file_name"];
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Video Upload and Playback</title>
</head>
<body>
    <?php if(!empty($result)) {  ?>
        <h2 style="margin-left: 34%; margin-top: 1.5%;"> =======   Uploaded Video:  ========
            <br><br> Duration: <?php echo $fileSize ?></h2><br><br>
            <!-- <video> tag supports only mp4 &webm file types  -->
        <video width="700" height="500" style="margin-left: 25%; margin-top: 3%;" controls>
            <source src="<?php echo $path ?>" type="<?php echo $type?>">
	</video> 
          
    <?php } else { echo "<pre>";
        echo $error; ?>
	<form method="POST" enctype="multipart/form-data">
		Select Video: <br/>
		<input type="file" name="file" />
		<input type="submit" name="submit" value="Upload" />      
        </form>
    <?php } ?>
</body>
</html>