# IsTempMail PHP
PHP library to check disposable email address using IsTempMail API

## How to use
    <?php
    include('istempmail.php');
    
    // if you have an API token, add it like this
    // $isTempMail = new IsTempMail('YOUR_API_TOKEN');
    
    $isTempMail = new IsTempMail();
    try {
    
        if($isTempMail->isDea('spammer@mailinator.com')) {
            echo 'Disposable email address detected.';
            exit;
        }
    } catch (Exception $exception) {
        echo $exception->getMessage();
        exit;
    }
