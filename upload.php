<?php
$actor_csv = $_FILES['actor-data']['tmp_name'];
$actress_csv = $_FILES['actress-data']['tmp_name'];

$awards = new Awards();
$oscars_by_year = $awards->getOscarsByYearData();
$movies_with_both_oscars = $awards->getMoviesWithBothOscarsData();

