<?php

    $status = $_POST['start'];
    $message = exec("python detect.py 2>&1");
    print_r($message);
    exit();

?>