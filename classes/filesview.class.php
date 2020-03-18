<?php
    //FileView class.
    class FileView {

        public function showFilesFolders($admin,$aPath) {
            $FileFolderObj = new FileView();

            if ($aPath === null) 
                $dirPath = "../assets";
            else 
                $dirPath = "../" . join("/",$aPath);

            if (is_dir($dirPath)) {
                $aFiles = scandir($dirPath);
                for($i=0;$i<count($aFiles);$i++) {
                    
                    //File or Folder?
                    if (is_dir($dirPath . '/' . $aFiles[$i]))
                        $FileFolderObj->showFolder($admin, $aFiles[$i], $dirPath); 
                    else 
                        $FileFolderObj->showFile($admin, $aFiles[$i], $dirPath);

                }//For.
            }//if.
        }//showMediaChannels.

        public function showFolder($admin, string $file, string $dirPath) {
            //Remove the dots from current and parent directory.
            if ($file == "." || $file == "..") {}
            else {
                //See if admin == true/false.
                if ($admin == "true") 
                    $text = '<i class="fas fa-trash-alt files-hover-icons files-delete" onclick="AskDelete(\''.$dirPath.'\',\''.$file.'\',\'folder\')"></i>';
                else 
                    $text = '';
                echo '
                    <div class="files-file-container">
                        <i class="fas fa-folder text-warning dir-icon files-icon" onclick="DirClick(\''.addslashes($file).'\',\''.$admin.'\')"></i>
                        '.$text.'
                        <p class="files-folder-file-name">'.$file.'</p>
                    </div>
                ';
            }//Else.
        }//Method showFolder.

        public function ShowFile(string $admin, string $file, string $dirPath) {
            //Get filename and extension.
            $files = pathinfo($file);
            $extension = $files['extension'];
            $aExtensions = array("jpg","jpeg","png","pdf");

            //Check extension of the file.
            if(in_array(strtolower($extension), $aExtensions)) {
                //Look if file is image/pdf to change icon.
                if (strtolower($extension) == "pdf") 
                    $icon = '<i class="far fa-file-pdf pdf-icon files-icon text-danger"></i>';
                else 
                    $icon = '<i class="fas fa-image img-icon files-icon text-primary"></i>';

                //Look if admin function should be enabled.
                if ($admin == "true") {
                    $container = '<div class="files-file-container">';
                    $text = '<i class="fas fa-trash-alt files-hover-icons files-delete" onclick="AskDelete(\''.$dirPath.'\',\''.$file.'\',\'file\')"></i>';
                } else {
                    //Type is extension, images need to be inserted as an <img>, pdf files not.
                    $container = '
                        <div class="files-file-container">
                        <div class="files-file-actions-container">
                            <button class="files-file-actions-buttons btn btn-secondary btn-sm" onclick="copyFile(\''.$dirPath.'\',\''.$file.'\',\''.$extension.'\')">Copy</button>
                            <button class="files-file-actions-buttons btn btn-secondary btn-sm" onclick="InsertFile(\''.$dirPath.'\',\''.$file.'\',\''.$extension.'\')">Insert</button>
                        </div>
                    ';
                    $text = '';
                }//If $admin ==true.

                //Output on screen.
                echo $container, $icon, $text.'
                        <p class="files-folder-file-name">'.$file.'</p>
                    </div>
                ';
            }//if in_array
        }//Method showFile.

    }//Class FileView.

?>