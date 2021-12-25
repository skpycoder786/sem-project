<?php

$message = exec("python stopDetect.py 2>&1");
print_r($message);
exit();


?>