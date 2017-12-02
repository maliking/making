<?php
    if (isset($_FILES['image'])) {
        $errors = array();
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];

        if ($file_size > 1048576) {
            echo "<h3>File size must be under 1MB<h3>";
            $errors[] = '<pre>File size must be under 1MB</pre>';
        }

        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, "gallery/" . $file_name);
            echo "Success";
        }
        else {
            echo "<h4>Your file has not been uploaded. Please try again.</h4>";
            echo "<pre>";
            print_r($errors);
            echo "</pre>";
        }
    }
?>