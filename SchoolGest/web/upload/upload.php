<?php
  $allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);

move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/" . $_FILES["file"]["name"]);

        $Path = $_FILES["file"]["name"];
        $named_array = array("Response" => array(array("Status" => "ok")));
        echo json_encode($named_array);
?>