<?php

function mailCount($host, $login, $passwd) {
    $mbox = imap_open($host, $login, $passwd);
    $mail = '';

    if($mail = imap_check($mbox)) {
        return $mail->Nmsgs;
    }
}

$hostname = '{imap.gmail.com:993/imap/ssl}INBOX';
$username = 'junoforever1991'; //GMail username
$password = 'mastermind1991'; //Password

$count = mailCount($hostname, $username, $password);

echo $count;

?>