<?php

session_start();

$oscars_by_year = $_SESSION['data']['oscars_by_year'];
$movies_with_both_oscars = $_SESSION['data']['movies_with_both_oscars'];
?>

<!doctype html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Držitelé Oscarů</title>
</head>
<body>
<div class="container-xl my-5">
    <h1 class="mb-5 text-primary"><strong>Držitelé Oscaru</strong></h1>

    <h2 class="mb-5">Oscar za nejlepší ženský a mužský herecký výkon v hlavní roli podle roku</h2>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Rok</th>
            <th>Ženy</th>
            <th>Muži</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($oscars_by_year as $year => $winners): ?>
            <tr>
                <td><?= $year ?></td>
                <td><?= isset($winners['actress']) ? $winners['actress']['name'] . " (" . $winners['actress']['age'] . ")<br>" . $winners['actress']['movie'] : '' ?></td>
                <td><?= isset($winners['actor']) ? $winners['actor']['name'] . " (" . $winners['actor']['age'] . ")<br>" . $winners['actor']['movie'] : '' ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <h2 class="my-5">Filmy, které obdržely oscary za mužskou i ženskou hlavní roli</h2>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Název filmu</th>
            <th>Rok</th>
            <th>Herečka</th>
            <th>Herec</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($movies_with_both_oscars as $title => $details): ?>
            <tr>
                <td><?= $title ?></td>
                <td><?= $details['year'] ?></td>
                <td><?= $details['actress'] ?></td>
                <td><?= $details['actor'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>
