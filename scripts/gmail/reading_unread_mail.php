<?php
function check_email($username, $password)
{
//Connect Gmail feed atom
$url = "https://mail.google.com/mail/feed/atom";
// Send Request to read email
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_USERPWD, $username . ":" . $password);
curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($curl, CURLOPT_ENCODING, "");
$curlData = curl_exec($curl);
curl_close($curl);
//returning retrieved feed
return $curlData;
}
$feed = check_email("junoforever1991@gmail.com", "mastermind1991");
$x = new SimpleXmlElement($feed);
echo "<ul>";
foreach($x->entry as $entry)
{
echo '<li><p><strong>'. $entry->title.'</strong><br>';
echo $entry->summary;
echo '</p></li>';
}
echo "</ul>"; 
?>