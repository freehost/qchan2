<?php
if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    file_put_contents('/opt/host/ip.txt', $_SERVER['HTTP_X_FORWARDED_FOR'].PHP_EOL, FILE_APPEND);
}