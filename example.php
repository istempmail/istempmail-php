<?php
include('istempmail.php');

$isTempMail = new IsTempMail('YOUR_API_TOKEN');

try {
    if($isTempMail->isDea('spammer@mailinator.com')) {
        echo 'Disposable email address detected.';
    }
} catch (Exception $exception) {
    echo $exception->getMessage();
}
