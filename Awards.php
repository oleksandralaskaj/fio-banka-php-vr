<?php

class Awards
{
    private $actors_with_oscar = [];
    private $actresses_with_oscar = [];
    private $oscars_by_year = [];
    private $movies_with_both_oscars = [];

    public function __construct($actors_file, $actress_file)
    {
        $this->actors_with_oscar = $this->csvToFormattedArray($actors_file);
        $this->actresses_with_oscar = $this->csvToFormattedArray($actress_file);

        $this->setOscarsByYear();
        $this->setMoviesWithBothOscars();
    }

    private function csvToFormattedArray($csv)
    {
        //transforming csv into array of arrays
        $initial_array = array_map('str_getcsv', file($csv, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES));

        //removing [0] element (table head)
        array_shift($initial_array);

        //head to map onto
        $head = ['year', 'age', 'name', 'movie'];

        $final_array = [];

        foreach ($initial_array as $key => $subarray) {
            //removing 'index' key-value pair
            array_shift($subarray);

            //removing white spaces
            $trimmed_subarray = array_map(function ($value) {
                return trim($value);
            }, $subarray);

            //renaming numbered keys to names of columns
            $final_array[$key] = array_combine($head, $trimmed_subarray);
        }

        return $final_array;
    }

    private function setOscarsByYear()
    {
        $data = [];

        foreach ($this->actors_with_oscar as $actor_data) {
            $data[$actor_data['year']]['actor'] = [
                'name' => $actor_data['name'],
                'age' => $actor_data['age'],
                'movie' => $actor_data['movie'],
            ];
        }

        foreach ($this->actresses_with_oscar as $actress_data) {
            $data[$actress_data['year']]['actress'] = [
                'name' => $actress_data['name'],
                'age' => $actress_data['age'],
                'movie' => $actress_data['movie'],
            ];
        }

        $this->oscars_by_year = $data;
    }

    private function setMoviesWithBothOscars()
    {
        foreach ($this->actors_with_oscar as $actor_data) {
            $movies_actors[$actor_data['movie']] = $actor_data['name'];
        }

        foreach ($this->actresses_with_oscar as $actress_data) {
            $movie_title = $actress_data['movie'];
            if (isset($movies_actors[$movie_title])) {
                $movies[$movie_title] = [
                    'year' => $actress_data['year'],
                    'actor' => $movies_actors[$movie_title],
                    'actress' => $actress_data['name']
                ];
            }
        }

        ksort($movies);

        $this->movies_with_both_oscars = $movies;
    }

    public function getOscarsByYearData()
    {
        return $this->oscars_by_year;
    }

    public function getMoviesWithBothOscarsData()
    {
        return $this->movies_with_both_oscars;
    }

    public function getActors()
    {
        return $this->actors_with_oscar;
    }

    public function getActresses()
    {
        return $this->actresses_with_oscar;
    }
}
