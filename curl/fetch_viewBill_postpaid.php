<?php 

error_reporting(0);
ini_set('display_errors', 0);

include('../config.php');

$apiUrl = NIPPY_API_URL . 'retailerViewbill/Postpaid'; 

$data = json_decode(file_get_contents('php://input'), true);

$requestData = [
    "adParams" => (!empty($data['adParams']) && is_array($data['adParams'])) ? $data['adParams'] : new stdClass(),
    "cir" => $data['cir'] ?? "",
    "cn" => $data['cn'] ?? "",
    "op" => $data['op'] ?? "",
    "platform_type" => "WEB"
];



$headers = getallheaders();

if (isset($headers['Authorization'])) {
    $authHeader = $headers['Authorization'];
} elseif (isset($headers['authorization'])) {
    $authHeader = $headers['authorization'];
} else {
    
    $response = [
        'status' => false,
        'message' => 'BAD REQUEST: AUTHENTICATION MISSING',
        'logout' => true,
        'error_code' => 400
    ];
    // header('Content-Type: application/json');
    echo json_encode($response);
    exit;  // Exit after sending the error response
}


$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => $apiUrl,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($requestData),
  CURLOPT_HTTPHEADER => [
    "Authorization: Bearer eyJhbGciOiJIUzI1NiJ9.eyJtb2JpbGUiOiI5MDgwMTc3NDU3IiwidXNlcl9pZCI6IjE3MzAxMDI3NzgzODMiLCJpc3MiOiI1MiJ9.SBttAbWqBJQ-4YW9o6Buq2pFrs9BJ6QEU7CgaEnXgnU",
    "content-type: application/json"
  ],
]);

$response = curl_exec($curl);
// var_dump($response);
$response_main = json_decode($response,true);

$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

if (curl_errno($curl)) {
    http_response_code(500);
    // echo json_encode(['error' => 'Failed to fetch data: ' . curl_error($curl)]);
    $curlErrorMessage = curl_error($curl);
    // error_log("cURL Error: " . $curlErrorMessage);
    echo json_encode([
        'error' => 'Failed to fetch data: ',
        'data'=>$response_main,
        'mainData'=>$response,
        'http_code' => $httpCode,
    ]);
} else {
    if ($httpCode === 200) {
        $response = json_decode($response,true);
        $response['requestData']=$requestData;
        $response['requestLink']=$apiUrl;
        $response['requestHeader']=$authHeader;
        echo json_encode($response);
    } else {
        http_response_code($httpCode);
        $curlErrorMessage = curl_error($curl);
        echo json_encode([
            'error' => 'Failed to fetch data: ' . $curlErrorMessage,
            'data'=>$response_main,
        'mainData'=>$response,
            'http_code' => $httpCode,
        ]);
    }
}

curl_close($curl);

?>