<?php

$codes = array(
    400, 401, 402, 403, 404, 405, 406, 407, 408, 409,
    410, 411, 412, 413, 414, 415, 416, 417, 418, 421,
    422, 423, 424, 425, 426, 428, 429, 431, 451, 500,
    501, 502, 503, 504, 505, 506, 507, 508, 510, 511,
);

foreach($codes as $code)
{

    $url = 'https://http.cat/'.$code;

    $headers = get_headers($url);

    /*
    echo '<pre>';
    print_r($headers);
    echo '</pre>';
    die();
    */

    if($headers[0] == 'HTTP/1.1 200 OK')
    {

        $response = file_get_contents($url);
        $image = base64_encode($response);

        echo '<img src="data:image/png;base64, '.$image.'" />
            <hr>';

    }

}
