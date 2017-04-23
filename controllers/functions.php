<?php
    function uploadFile($file){
        $dir = "uploads/";
        //if any error occured
        if ($file['error'] !== UPLOAD_ERR_OK) {
            echo "<p>An error occurred.</p>";
            exit;
        }
        //to verify the size 
        if($file['size'] > (2048000)){ //can't be larger than 2 MB
			echo "<p>File's size is too large.</p>";
            exit;
		} 
        // echo var_dump($file);
        //to verify the file is a GIF, JPEG, or PNG
        $fileType = exif_imagetype($file['tmp_name']);
        $allowed = array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG);
        if (!in_array($fileType, $allowed)) {
            echo "<p>File extension is not allowed.</p>";
            exit;
        }
        //to ensure a safe filename
        $name = preg_replace("/[^A-Z0-9._-]/i", "_", $file['name']);

        //to avoid overwriting
        $i = 0;
        $parts = pathinfo($name);
        while (file_exists($dir . $name)) {
            $i++;
            $name = $parts['filename'] . "-" . $i . "." . $parts['extension'];
        }

        //to preserve file from temporary directory 
        $success = move_uploaded_file($file['tmp_name'], $dir . $name);
        if (!$success) { 
            echo "<p>Unable to save file.</p>";
            exit;
        }
        
        //set proper permissions on the new file
        chmod($dir . $name, 0644);
        return $name; //return the final filename 
    }
?>
