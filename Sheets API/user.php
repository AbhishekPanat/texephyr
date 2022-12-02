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

$range = "User!A2";
$values = [];

/*$sql = "SELECT r.receipt_id, e.title, u.fest_id, u.name, u.college, u.phone_no, u.email
FROM receipts_participants rp INNER JOIN users u
ON u.fest_id = rp.user_id
INNER JOIN receipts r
ON rp.receipts_id = r.order_id AND rp.rp_status = '1'
INNER JOIN event e
ON rp.event_id = e.event_ID ORDER BY r.receipt_id;";*/
$sql="SELECT r.receipt_id, w.title, u.fest_id, u.name, u.college_name, u.phone_no, u.email FROM receipts_participants rp INNER JOIN users u ON u.fest_id = rp.user_id INNER JOIN receipts r ON rp.receipts_id = r.receipt_id AND r.receipt_status = '1' INNER JOIN workshop w ON rp.event_id = w.work_id ORDER BY r.receipt_id";
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
