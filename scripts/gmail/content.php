<?php

//these are the variables that you need in order to 
//access your gmail account
//in this example, we were using gmail impa hostname 

$hostname = '{imap.gmail.com:993/imap/ssl}INBOX';
$username = 'durden1704@gmail.com';  // please change this into your correct gmail address. 
$password = 'mastermind1991'; // gmail password


//connect to your gmail... die and show error if can't connect 
$inbox = imap_open($hostname,$username,$password,OP_READONLY) or die('Cannot connect to Gmail: ' . imap_last_error());

//search messages on your gmail inbox. You can set other parameter
//in imap_search function and you can also further filter 
//this search function
//@ FROM "emailaddress@gmail.com" - you can change this to 
//the email address you want to retrieve the message 
$emails = imap_search($inbox,'FROM "junoforever1991@gmail.com"');

//check if there are results on imap_search.... 
if($emails){

 //declare limit variable... this will limit the # of email to show. 
 $limit = 0; 
 
 //loop each email retrieve.
 foreach($emails as $email_number){
  
  //fetch the email over view... if you want to see the overview of the email.(OPTIONAL)
  $overview = imap_fetch_overview($inbox,$email_number,0);
  
  //fetch the email content body... This will show only the email content. 
  $message = imap_fetchbody($inbox, $email_number,"1");
  //set the message format to UTF-8
  $message = imap_utf8($message);
  
  //strip existing HTML tags to display text content only.(JUST COMMENT IT IF YOU WANT TO DISPLAY IT IN AN HTML FORMAT)
  $message = strip_tags($message);
  
  //add break in each line of the image. 
  $message = nl2br($message);
  
  //Now, you can either echo the image or USE for for other functions like saving in database. 
  echo $message;
  
  // increment limit 
  $limit++;
  
  //if limit is true. Break the loop and exit. 
  if($limit === 1)
   break;
  }
 
}
 
//close the imap connection
imap_close($inbox);


?>