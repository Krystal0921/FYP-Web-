<?php
function callAPI($endpoint, $data)
{
  $url = 'http://3.212.61.233:3000/' . $endpoint;

  $options = [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => json_encode($data),
    CURLOPT_HTTPHEADER => [
      'Content-Type: application/json',
    ],
  ];

  $curl = curl_init();
  curl_setopt_array($curl, $options);
  $response = curl_exec($curl);

  if ($response === false) {
    echo '<script>alert("' . curl_error($curl) . '");</script>';
  } else {
    $responseData = json_decode($response, true);

    if ($responseData['success']) {
      return $responseData['data'];
    } else {
      $errorMsg = $responseData['msg'];
      $errorCode = $responseData['code'];
      echo '<script>alert("' . $errorMsg . '");</script>';
      return false;
    }
  }
  curl_close($curl);
}

?>