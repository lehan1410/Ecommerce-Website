<?php
    class upload extends database {
        private $target_dir = "../../../uploads/";
        private $maxfilesize = 800000;
        private $allowtypes = array('jpg', 'png', 'jpeg', 'gif');

        public function __construct() {
            parent::__construct();
        }
        public function uploadFile() {
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                echo "Phải Post dữ liệu";
                die;
            }

            if (!isset($_FILES["avatar"])) {
                echo "Dữ liệu không đúng cấu trúc";
                die;
            }

            if ($_FILES["avatar"]['error'] != 0) {
                echo "Dữ liệu upload bị lỗi";
                die;
            }

            $target_file = $this->target_dir . ($_FILES["avatar"]["name"]);
            $allowUpload = true;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["avatar"]["tmp_name"]);
                if($check !== false) {
                    $allowUpload = true;
                } else {
                    echo "Không phải file ảnh.";
                    $allowUpload = false;
                }
            }

            if (file_exists($target_file)) {
                echo "Tên file đã tồn tại trên server, không được ghi đè";
                $allowUpload = false;
            }

            if ($_FILES["avatar"]["size"] > $this->maxfilesize) {
                echo "Không được upload ảnh lớn hơn " . $this->maxfilesize . " (bytes).";
                $allowUpload = false;
            }

            if (!in_array($imageFileType, $this->allowtypes)) {
                echo "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
                $allowUpload = false;
            }

            if ($allowUpload) {
                if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
                    echo "File ". basename( $_FILES["avatar"]["name"]) . " Đã upload thành công.";
                    echo "File lưu tại " . $target_file;

                    $this->connect();

                    // TODO: thêm $target_file vào cột avatar_url của user.

                } else {
                    echo "Có lỗi xảy ra khi upload file.";
                }
            } else {
                echo "Không upload được file, có thể do file lớn, kiểu file không đúng ...";
            }
        }
    }
?>