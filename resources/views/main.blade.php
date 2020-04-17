<?php
$headers = array(
        'Content-Type: application/json',
        'Authorization: Basic DT5KEOMI7MCQNWHZBHJ4'
        );

curl_setopt($cURLConnection, CURLOPT_URL, 'https://www.eventbriteapi.com/v3/users/me/events/');
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, $headers);

$events = curl_exec($cURLConnection);
curl_close($cURLConnection);

$workable = json_decode($events, true);

//echo $workable->pagination->object_count;

echo $workable['pagination']['object_count'];
$workable = json_decode($events, true);

echo "Total Events:".$workable['pagination']['object_count']."<br/>";
$pages = $workable['pagination']['page_count'];
$more = $workable['pagination']['has_more_items'];
$continuation = $workable['pagination']['continuation'];

$evcnt=count($workable['events']);

//Setup date and time of today for comparing event dates to eliminate all past events
$today=date("Y-m-d");

$oevents=array_slice($workable,1);

print_r($workable['pagination']);

//print_r(array_slice($workable,1));

$oevents=array_slice($workable,1);

foreach($oevents as $row) {
        foreach($row as $k) {
                echo $k['id']."<br/>";
        }
}

//print_r($oevents[0]['id']);


/*
for ($i=0; $i<$evcnt; ++$i) {                                                              31,23-37      70%

//echo $workable->pagination->object_count;

echo $workable['pagination']['object_count'];

echo ("<br/>Events:".count($workable['events'])."<br/>");
$evcnt=count($workable['events']);

//Setup date and time of today for comparing event dates to eliminate all past events
$today=date("Y-m-d");

//print_r(array_slice($workable,1));

$oevents=array_slice($workable,1);

echo "event:event_id:event name:seats:seats_sold<br/>";
foreach($oevents as $row) {
        $cnt=0;
        foreach($row as $k) {
                $cnt++;
                echo $cnt.":".$k['id'].":".$k['name']['text'].":".$k['capacity'].":".$k['start']['local']."<br/>";
        }
}

//print_r($oevents[0]['id']);


/*
for ($i=0; $i<$evcnt; ++$i) {
        echo "<br/>".$workable['events']('id');
?>