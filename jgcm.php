<?php

function GCMNotification($registatoin_ids, $message) {
		
		$apiKey = "";
	
		// Set POST variables
		$url = 'https://android.googleapis.com/gcm/send';
	
		$fields = array(
				'registration_ids' => $registatoin_ids,
				'data' => $message,
		);
	
		$headers = array(
				'Authorization: key=' . $apiKey,
				'Content-Type: application/json'
		);
		// Open connection
		$ch = curl_init();
	
		// Set the url, number of POST vars, POST data
		curl_setopt($ch, CURLOPT_URL, $url);
	
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	
		// Disabling SSL Certificate support temporarly
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
	
		// Execute post
		$result = curl_exec($ch);
		if ($result === FALSE) {
			print_r('GCM Curl failed: ' . curl_error($ch));
		}
	
		// Close connection
		curl_close($ch);
		print_r($result);
		return $result;
	}

function sendGCM()
{
$rId = "";
$message = "test gcm";
$data = array('message'=>$message,'title'=>$title,'type'=>$type);
GCMNotification($rId,$data);
}
