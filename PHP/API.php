<?php
function get_goodsmover_fleet_tracking()
{
	$curl = curl_init();
	$api_key = XXXXXXXXXX;
   	$url = 'http://35.204.82.108:2399/api/getdata/'.$api_key; 
   
	curl_setopt_array($curl, array(
		CURLOPT_URL => $url,

		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_CUSTOMREQUEST => 'GET',
		CURLOPT_HTTPHEADER => array(
			'content-type: application/json'
		),
	));
	$response = curl_exec($curl);
	$response = json_decode($response);
   	
   	for($i=0;$i<count($response->vehicles);$i++){
   		$data=$response->vehicles;

   		$VehicleNo=$data[$i]->vehicle;
   		$Lat=$data[$i]->latitude;
   		$Long=$data[$i]->longitude;
   		$lat_longi=$Lat.",".$Long;
   		$odometer=$data[$i]->odometer;
   		$Location=$data[$i]->location;
   		$Date=$data[$i]->datetime;
   		$Speed=$data[$i]->speed;
   	}
}
