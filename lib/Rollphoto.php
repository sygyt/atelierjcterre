<?php
//this function take $dir is string oeuvre or artist (folder in image folder), id of $dir int, nb of picture (allwais 1 for artiste). 
//this function return an array with error msg and boolean for success of upload
function upload_file($dir,$id,$nb){
	$fileIndex = $dir."Photo".$nb; //non dans la methode post (files)
	//$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$fileExtension = strtolower(  substr(  strrchr($_FILES[$fileIndex]['name'],'.')  ,1)  );
	//$fileExtension = $_FILES[$fileIndex]['type'];
	$image_name = $dir.$id.$nb.".".$fileExtension ; //nom de l'image
	$target_file = File::build_path(array("resources", "img",$dir,$image_name)); //chemin de la racine a l'image
	$d_s = DIRECTORY_SEPARATOR; 
	$bdName = "resources".$d_s."img".$d_s.$dir.$d_s.$image_name; //nom du fichier dans la base de donne
	$msg = "";
	$res = true;
	$uploadOk = 1;
	// Check if image file is a actual image or fake image
	/*
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) {
			$uploadOk = 1;
		} else {
			$uploadOk = 0;
		}
	
	}*/
	// Check if file already exists
	if (file_exists($target_file)) {
		unlink ($target_file);//si il existe déja un fichier nomé pareil on le supprime
		//etant donnée que le nom de l'image comprend l'id de l'objet au quelle elle appartient
		//on n'es pas sensé se retrouver dans cette situation sauf en cas d'update

	}
	// a mettre a en fct de la taille definie dans les parametres php 
	// Check file size 
	if ($_FILES[$fileIndex]["size"] > 20000000) {
		$msg =  "Sorry, your file is too large.";
		$uploadOk = 0;
	}
	// Allow certain file formats
	if($fileExtension != "jpg" && $fileExtension != "png" && $fileExtension != "jpeg"
		&& $fileExtension != "gif" ) {
		$msg = $msg . "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		$res = false;
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES[$fileIndex]["tmp_name"], $target_file)) {
			$msg = $bdName;
		} else {
			$msg = $msg ."Sorry, there was an error uploading your file.";
			$res = false; 
		}
	}
	$res_tab = array(
				'success' => $res,
				'msg' => $msg);
	return $res_tab; 
}

//$params = array('level' => 6, 'window' => 15, 'memory' => 9);
        //$fp = fopen($target_file, 'w');
        //stream_filter_append($fp, 'zlib.deflate', STREAM_FILTER_WRITE, $params);
        //$image = file_get_contents($_FILES[$fileIndex]["tmp_name"]);
        //imagestring($image);
        //fwrite($fp, $image)
        //var_dump($image);
        //imagejpeg(fopen($_FILES[$fileIndex]["tmp_name"], 'r+'), $target_file,75)
//fclose($fp);
?>