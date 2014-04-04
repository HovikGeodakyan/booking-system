<?php

$db_exists = file_exists("daypilot.sqlite");



$user="root";
$pass='';
$db = new PDO('mysql:host=localhost;dbname=widget', $user, $pass);

$result =  $db->prepare("SHOW TABLES LIKE 'events'");
$result->execute();
$result = $result->fetchAll();
if($result == NULL) {
        //create the database
    $db->exec("CREATE TABLE IF NOT EXISTS events (
                        id INTEGER PRIMARY KEY AUTO_INCREMENT, 
                        name TEXT, 
                        start DATETIME, 
                        end DATETIME,
                        resource VARCHAR(30))");

    $messages = array(
                    array('name' => 'Event 1',
                        'start' => '2013-05-09T00:00:00',
                        'end' => '2013-05-09T10:00:00',
                        'resource' => 'B')
                );

    $insert = "INSERT INTO events (name, start, end, resource) VALUES (:name, :start, :end, :resource)";
    $stmt = $db->prepare($insert);
 
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':start', $start);
    $stmt->bindParam(':end', $end);
    $stmt->bindParam(':resource', $resource);
 
    foreach ($messages as $m) {
      $name = $m['name'];
      $start = $m['start'];
      $end = $m['end'];
      $resource = $m['resource'];
      $stmt->execute();
    }
}
?>
