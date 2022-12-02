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

$range = "Referals!A2";
$values = [];

$sql = "SELECT DISTINCT gr.ru_name, (SELECT COUNT(*) FROM get_referals_main gr2 WHERE gr.ru_name = gr2.ru_name)
AS NoOfParticipants
FROM get_referals gr ORDER BY NoOfParticipants DESC;";
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
