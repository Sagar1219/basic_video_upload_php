<?php

class FileUtility {
    
    const FILE_UPLOAD_FOLDER = __DIR__.'/../uploads/';
    const DEFAULT_CATEGORY = 'general';
    public function __construct() {
        ;
    }
    
    /**
     * Function to upload file in the folder.
     * @param type $tmp_name tmp path of the uploaded file.
     * @return array file path (complete and relative) at the destination
     */
    public function upload($tmp_name) {
        $name = self::DEFAULT_CATEGORY."_".time();
        $destination_file_name = self::FILE_UPLOAD_FOLDER.$name;
        $uploadResult = move_uploaded_file($tmp_name, $destination_file_name);
        if($uploadResult){
            return array("complete_path" => $destination_file_name, "file_name" => $name);
        }
        return array();
    }
}

?>
