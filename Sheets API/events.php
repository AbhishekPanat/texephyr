<?php

require __DIR__ . '/vendor/autoload.php';
//
// require '../connection_inc.php';
$con = mysqli_connect('texephyr.c1ja2vvhj7xo.ap-south-1.rds.amazonaws.com','admin','Questionbetter2021','texephyr_db');

$client = new \Google_Client();
$client->setApplicationName('Texephyr Data');
$client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
$client->setAccessType('offline');
$client->setAuthConfig(__DIR__. '/credentials.json');
$service = new Google_Service_Sheets($client);
$spreadsheetId = "1xDoInUf6inE0TrP2K85DUDd2n4H8gNNJslkBil3roPc";

$range = "Event Participations!A2";
$values = [];

//$sql = "SELECT e.title, (SELECT COUNT(*) FROM
//(SELECT DISTINCT rp.receipts_id FROM receipts_participants rp WHERE rp.event_id = e.event_ID AND rp.rp_status = '1')
//AS T)
//AS NumberofParticipants
//FROM event e ORDER BY NumberofParticipants DESC;";

$sql = 'SELECT e.title, count(rep.event_id) as NumberOfParticipants
FROM receipts_event_participant rep
INNER JOIN receipts r
ON r.receipt_id = rep.receipt_id
INNER JOIN event e
ON e.event_ID = rep.event_id
WHERE r.receipt_status = "1"
GROUP BY rep.event_id
ORDER BY NumberOfParticipants ASC;';
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
