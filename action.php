<?php

    $name = $_POST["name"];

    $ch = curl_init(); // Initialize cURL session

    $error = "/is not available/";
    $success = "/Congratulations/";

    curl_setopt($ch, CURLOPT_URL, "https://www.uniwide.co.uk/name-check/?name=".$name."&gle=namecheck"); // Set URL with parameter
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return response as a string

    $response = curl_exec($ch); // Execute the request

    // Check for errors
    if (curl_errno($ch)) {
        return 'cURL Error: ' . curl_error($ch); // Display error if any
    }

    curl_close($ch); // Close the cURL session

    $resultMessage = '';

    if (preg_match($error, $response)) {
        $resultMessage = $name." is not available for registration.";
    }
    else if (preg_match($success, $response)) {
        $resultMessage = "Congratulations, ".$name." is available for registration!";
    }

    echo $resultMessage;

    $resultData = [
        'name' => $name,
        'message' => $resultMessage,
        'timestamp' => date('Y-m-d H:i:s')
    ];

    $jsonFilePath = "result.json";

    if (file_exists($jsonFilePath)) {
        $currentData = file_get_contents($jsonFilePath);
        $currentResults = json_decode($currentData, true);
    } else {
        $currentResults = [];
    }

    $currentResults[] = $resultData;

    $jsonData = json_encode($currentResults, JSON_PRETTY_PRINT);

    if (file_put_contents($jsonFilePath, $jsonData)) {
        echo "\nResult saved to $jsonFilePath. ";
    }
    else {
        echo "\nFailed to save the result to $jsonFilePath. ";
    }
?>