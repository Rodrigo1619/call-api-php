<?php
const API_URL = "https://www.whenisthenextmcufilm.com/api";

/* Iniciar una nueva sesion de cURL */
$ch = curl_init(API_URL);
 /* Indicar que queremos recibir el resultado de la peticion sin mostrarla en pantalla */
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

/* Ejecutar la peticion */
$result = curl_exec($ch);

//decodificar la respuesta en json y que sea en un array asociativo
$data = json_decode($result, true);

/* cerrar la sesion de curl */
curl_close($ch);

/* var_dump($data); */


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La proxima pelicula de Marvel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css">
</head>
<body>
    <main>
        <!-- <pre style="font-size: 10px; overflow: scroll;">
            <?php var_dump($data); ?>
        </pre> -->
        <section>
            <img src="<?= $data["poster_url"]; ?>" width="300" alt="Poster de <?= $data["title"]; ?>"
            style="border-radius: 16px;"
            >
        </section>

        <hgroup>
            <h3><?= $data["title"] ?> Se estrenara en: <?=$data["days_until"] ?> dias </h3>
            <p>Fecha de estreno: <?= $data["release_date"] ?></p>
            <p>La siguiente pelicula es: <?= $data["following_production"]["title"] ?> </p>
        </hgroup>
    </main>
</body>
</html>

<style>
    :root{
        color-scheme: light dark;
    }
    body{
        display: grid;
        place-content: center;
    }
    section{
        display: flex;
        justify-content: center;
        text-align: center;
    }
    hgroup{
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }
</style>