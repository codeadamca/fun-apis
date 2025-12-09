<?php

/*
$url = 'https://api.github.com/users/codeadamca';
$response = file_get_contents($url);
$response = json_decode($response, true);
*/

$url = "https://api.github.com/users/codeadamca";
$agent = "Mozilla/5.0 (Windows NT 6.2; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0";


$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_USERAGENT, $agent);

$response = curl_exec($curl);
$response = json_decode($response, true);

curl_close($curl);

echo '<pre>';
print_r($response);
echo '</pre>';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GitHub User Profile</title>
    <style>

    @import url('https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap');

    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
        background-color: #000;
        color: #fff;
    }
    .container {
        font-family: "Space Grotesk";
        font-size: 120%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        min-height: 100vh;
        width: 100vw;
        max-width: 400px;
        box-sizing: border-box;
        text-align: center;
        margin: auto;
    }

    a:link,
    a:visited,
    a:hover,
    a:active {
        text-decoration: none;
        color: #f00;
    }

    </style>
</head>
<body>

    <main class="container">

        <h1>
            <i class="fa-brands fa-github"></i>
            <?=$response['login']?>
        </h1>
        <a href="<?=$response['html_url']?>">
            <img src="<?=$response['avatar_url']?>" style="width:100%; max-width: 400px;">
        </a>

        <div style="margin: 20px 0;">
            <i class="fa-solid fa-code-branch"></i>
            <?=$response['public_repos']?> | 
            <i class="fa-solid fa-note-sticky"></i>
            <?=$response['public_gists']?> | 
            <i class="fa-solid fa-person-walking-arrow-loop-left"></i>
            <?=$response['followers']?> | 
            <i class="fa-solid fa-person-walking-arrow-right"></i>
            <?=$response['following']?>
        </div>

    </main>

    <script src="https://kit.fontawesome.com/a74f41de6e.js" crossorigin="anonymous"></script>

</body>
</html>