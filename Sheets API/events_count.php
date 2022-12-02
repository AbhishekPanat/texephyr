<?php

require __DIR__ . '/vendor/autoload.php';
//
// require '../connection_inc.php';
//$con = mysqli_connect('texephyr.c1ja2vvhj7xo.ap-south-1.rds.amazonaws.com','admin','Questionbetter2021','texephyr_db');
$con = new mysqli("localhost","u570306383_texephyr22","MitTex@22","u570306383_texephyr");
$client = new \Google_Client();
$client->setApplicationName('Texephyr Data');
$client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
$client->setAccessType('offline');
$client->setAuthConfig(__DIR__. '/credentials.json');
$service = new Google_Service_Sheets($client);
$spreadsheetId = "1xDoInUf6inE0TrP2K85DUDd2n4H8gNNJslkBil3roPc";

$range = "Event Participations!A4";
$values = [];

$sql = 'SELECT e.title, count(rep.event_id) as NumberOfParticipants
FROM receipts_event_participant rep
INNER JOIN receipts r
ON r.receipt_id = rep.receipt_id
INNER JOIN event e
ON e.event_ID = rep.event_id
WHERE r.receipt_status = "1" and e.event_ID != "1" and e.event_ID != "2"
GROUP BY rep.event_id
ORDER BY NumberOfParticipants DESC;';

$sql2 = "SELECT e.title, count(rep.event_id) as NumberOfParticipants
FROM receipts_event_participant rep
INNER JOIN receipts r
ON r.receipt_id = rep.receipt_id
INNER JOIN event e
ON e.event_ID = rep.event_id
WHERE r.receipt_status = '1'
GROUP BY rep.event_id
ORDER BY NumberOfParticipants DESC;";
$res= mysqli_query($con,$sql);
while($row=mysqli_fetch_assoc($res))
{
  $temp = [];
  foreach($row as $key => $value)
  {
    array_push($temp, $value);
  }
  array_push($values, $temp);
}


// for($i=0;$i<4;$i++){
//   array_push($values, ['Hi', 'Abhi']);
// }

$body = new Google_Service_Sheets_ValueRange([
  'values' => $values
]);
$params = [
  'valueInputOption' => 'RAW'
];
$insert = [
  "insertDataOption" => "INSERT_ROWS"
];

$result = $service->spreadsheets_values->update(
  $spreadsheetId,
  $range,
  $body,
  $params,
  $insert
);
