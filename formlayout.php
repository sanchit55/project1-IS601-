<?php


class formlayout extends sheet
{
 
 public function get()
 {
 	
 	$view = '<form method="post" enctype="multipart/form-data">';
 	$view.= '<input type="file" name="filesToUpload" id="filesToUpload"><br>';
 	$view.= '<input type="submit" value="Upload File" name="submit">';
 	$view.= '</form>';
    
 	$this->html.= '<h1><center>Uploading a File</center></h1>';
 	$this->html.= $view;
 }

public function post()
 {
	$target_dir="uploads/";
	$target_file=$target_dir.basename($_FILES["filesToUpload"]["name"]);

	$imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);
	$imageFIleName=pathinfo($target_file,PATHINFO_EXTENSION);

	move_uploaded_file($_FILES["filesToUpload"]["tmp_name"],$target_file);
	header('Location:index.php?sheet=table&filename='.$target_file);
 }

}

