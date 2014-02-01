<?php
/* connect to gmail */
$hostname = '{imap.gmail.com:993/imap/ssl}INBOX';
$username = 'durden1704@gmail.com';
$password = 'mastermind1991';

$inbox = imap_open($hostname,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());


$emails = imap_search($inbox,'UNSEEN');
if($emails) {
	
	rsort($emails);
	
	foreach($emails as $email_number) {
	 
/*	  $overview = imap_fetch_overview($inbox,$email_number,0);
	  print_r($overview);
	  echo $overview[0]->subject."\n";*/


      $message = imap_fetchbody($inbox,$email_number,1);


/*
      if (isset($overview[0]->subject))
{
   $message.= '<span class="subject">'.$overview[0]->subject.'</span> ';
}*/
		
	  echo $message;
	}

} 

/* close the connection */
imap_close($inbox);
?>
