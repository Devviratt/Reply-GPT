<?php
function getOpenAIResponse($userInput, $apiKey) {
    $url = 'https://api.openai.com/v1/completions';
    $data = array(
        'model' => 'text-davinci-002', // Model ka naam yaha par dena
        'prompt' => $userInput,
        'max_tokens' => 150
    );
    $dataString = json_encode($data);
    
    $headers = array(
        'Content-Type: application/json',
        'Authorization: Bearer ' . $apiKey
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    $response = curl_exec($ch);
    curl_close($ch);
    
    return $response;
}

// API key
$apiKey = 'YOUR_OPENAI_API_KEY';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userInput = $_POST['message'];
    $response = getOpenAIResponse($userInput, $apiKey);
    echo $response;
}
?>
