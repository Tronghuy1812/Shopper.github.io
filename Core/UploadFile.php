<?php
    trait UploadFile {

        protected $fileName;
        protected $fileTem;
        protected $folderUpload;

        public function setFileName($path)
        {
            $this->fileName =$path;
        }
        public function getFileName()
        {
            return $this->fileName;
        }

        public function setFileTem($value)
        {
            $this->fileTem = $value;
        }
        public function getFileTem()
        {
            return $this->fileTem;
        }

        public function setFolderUpload($value)
        {
            $this->folderUpload = $value;
        }
        public function getFolderUpload()
        {
            return $this->folderUpload;
        }
        
        public function upload()
        {
            move_uploaded_file(
                $this->getFileTem(),
                $this->getFolderUpload() .'/' . $this->getFileName()
            );

            return $this->getFileName();
            
        }
    }
?>