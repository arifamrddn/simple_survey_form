<?php

require 'functions.php';

$feedback_user = new feedback_user;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $feedback = $_POST['feedback'];
    $comments = $_POST['comments'];
    $services = isset($_POST['service']) ? implode(", ", $_POST['service']) : '';

    // Handle file upload
    $document = null;
    if (isset($_FILES['document']) && $_FILES['document']['error'] == UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['document']['tmp_name'];
        $fileName = $_FILES['document']['name'];
        $fileSize = $_FILES['document']['size'];
        $fileType = $_FILES['document']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // Define allowed file extensions
        $allowedExtensions = array('pdf', 'doc', 'docx', 'jpg', 'png');

        if (in_array($fileExtension, $allowedExtensions)) {
            $uploadFileDir = './uploads/';
            $dest_path = $uploadFileDir . $fileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $document = $fileName;
            } else {
                echo 'Error moving the file';
                exit;
            }
        } else {
            echo 'Unsupported file type';
            exit;
        }
    }

    if ($feedback_user-> insert($name,$email,$age,$feedback,$services,$comments,$document)){

        echo 'Feedback submitted successfully';
    }else{
        echo 'Feedback failed to submit';

    };

}
?>
