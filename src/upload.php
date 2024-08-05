<?php
include "Awards.php";

$actor_csv = $_FILES['actor-data']['tmp_name'];
$actress_csv = $_FILES['actress-data']['tmp_name'];

$awards = new Awards($actor_csv, $actress_csv);

session_start();

$_SESSION['data']['oscars_by_year'] = $awards->getOscarsByYearData();
$_SESSION['data']['movies_with_both_oscars'] = $awards->getMoviesWithBothOscarsData();

header('Location: display.php');