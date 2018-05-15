# IsTempMail PHP
PHP library to check disposable email address using IsTempMail API

## How to use
To get a free API token, register at [IsTempMail](https://www.istempmail.com/sign-up) and copy your API token there.

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
