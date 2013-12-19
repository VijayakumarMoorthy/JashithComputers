<?php

function GCMNotification($regIds, $message) {
		
		$apiKey = "";
	
		// Set POST variables
		$url = 'https://android.googleapis.com/gcm/send';
	
		$fields = array(
				'registration_ids' => $regIds,
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
	$rId = array();
	$rId[] = "";
	$message = "Welcome to Jashith Computers";
	$title = "Welcom message";
	$type = "message";
	$data = array('message'=>$message,
			'DS_GSM_MSG_TITLE'=>$title
			,'DS_GSM_MSG_TYPE'=>$type
			,'phno'=>""
	);
	GCMNotification($rId,$data);
}
