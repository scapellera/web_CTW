<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

set_include_path('google-api-php-client/src'); //librería obtenida en el punto 1
require_once 'Google/Client.php';
require_once 'Google/Service/Calendar.php';

$ID_PROYECTO = "CTWproject"; //obtenido en punto 2.1
$ID_CLIENTE = "37062223889-m1f48thq8rrc74chg8e2i3lnh2oqmbvv.apps.googleusercontent.com"; //obtenido en punto 2.3, 2.4
$RUTA_FICHERO_P12 = "CTWproject-02392e3bef0a.p12"; //obtenido en punto 2.3
$EMAIL_DE_DEVELOPER = "ctw-308@ctwproject-157517.iam.gserviceaccount.com"; //punto 2.3 y 2.4
$CALENDAR_ID = "tutq89pua5n7fp1b596im3vq6s@group.calendar.google.com"; //obtenido en punto 3.2

try{

   $client = new Google_Client(array('use_objects' => true));

   $client->setApplicationName($ID_PROYECTO);
   $client->setClientId($ID_CLIENTE);
   $key = file_get_contents($RUTA_FICHERO_P12);

   $credentials = new Google_Auth_AssertionCredentials(
                $EMAIL_DE_DEVELOPER,
                array("https://www.googleapis.com/auth/calendar"),
                $key,
                "notasecret"
                );

   $client->setAssertionCredentials($credentials);

   $service = new Google_Service_Calendar($client);

   $event = new Google_Service_Calendar_Event;

   $event->setSummary('Event nuevo');
   $event->setLocation('en un sitio');

   $start = new Google_Service_Calendar_EventDateTime();
   $start->setDateTime('2014-10-02T19:00:00.000+01:00');
   $start->setTimeZone('Europe/Madrid');
   $event->setStart($start);

   $end = new Google_Service_Calendar_EventDateTime();
   $end->setDateTime('2014-10-02T19:25:00.000+01:00');
   $end->setTimeZone('Europe/Madrid');
   $event->setEnd($end);

   $new_event = null;
   $new_event_id = "";

   $new_event = $service->events->insert($CALENDAR_ID, $event);

   if($new_event!=null){

      $new_event_id= $new_event->getId();
      $event = $service->events->get($CALENDAR_ID, $new_event_id);

      if ($event != null) {
       echo "<br/>Inserted:";
       echo "<br/>EventID=".$event->getId();
       echo "<br/>Summary=".$event->getSummary();
       echo "<br/>Status=".$event->getStatus();
      }
        else{
           echo "No se ha podido obtener la información del evento";
            }              
    }else{
            echo "No se ha podido insertar el evento";
     }

   } 
   catch (Google_ClientException $e) {
        echo "Caught Google_ClientException:";
        print_r($e);
   }
   catch (Google_ServiceException $e) {
        echo "Caught Google_ServiceException:";
        echo "<pre>".print_r($e,true)."</pre>";
   }

?>