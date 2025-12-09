<?php

$key = '5QMQAKaMVTydq5IZuyl9DXBUJ6hs8wK3Xp0RKLvF';
$url = 'https://api.nasa.gov/planetary/apod?api_key='.$key;

$response = file_get_contents($url);
$response = json_decode($response, true);

/*
echo '<pre>';
print_r($response);
echo '</pre>';
*/

// echo '<h1>'.$response['title'].'</h1>';
// echo '<img src="'.$response['url'].'" width="800">';
// echo '<p>'.$response['explanation'].'</p>';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NASA APOD</title>
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
        max-width: 800px;
        box-sizing: border-box;
        text-align: left;
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

        <h1><?=$response['title']?></h1>
        <img src="<?=$response['url']?>" style="width:100%; max-width: 800px;">
        <p style="text-align: left;"><?=$response['explanation']?></p>
        <small style="text-align: left; color: #ccc;">
            Image retrieved from the 
            <a href="https://api.nasa.gov/">NASA APOD API</a>
        </small>

    </main>
</body>
</html>