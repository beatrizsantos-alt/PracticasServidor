<?php

$pilotos = [16, 44];

foreach ($pilotos as $numero) {

    $url = "https://api.openf1.org/v1/drivers?driver_number=" . $numero . "&session_key=latest"; //datos d la sesion mas reciente

    $ch = curl_init();

    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true
    ]);

    $respuesta = curl_exec($ch);

    if (curl_errno($ch)) {
        echo "Error: " . curl_error($ch);
    } else {
        $datos = json_decode($respuesta, true);

        echo "<pre>";
        print_r($datos);
        echo "</pre>";
    }

    curl_close($ch);
}

?>