# IsTempMail PHP script
PHP script to check disposable email address via IsTempMail API

## How to use
    include('istempmail.php')
    $isTempMail = new IsTempMail('YOUR_API_TOKEN');
    if($isTempMail->isDea('spammer@mailinator.com')) {
        echo 'Disposable email address detected.';
    } else {
        echo 'Okay.';
        // do your stuff.
    }

