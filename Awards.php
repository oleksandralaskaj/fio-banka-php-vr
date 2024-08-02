<?php

class Awards
{
    protected $actors_with_oscar = [];
    protected $actresses_with_oscar = [];
    protected $oscars_by_year = [];
    protected $movies_with_both_oscars = [];

    public function __constructor($actress_file, $actors_file)
    {
        $this->actors_with_oscar = $this->csvToFormattedArray($actors_file);
        $this->actresses_with_oscar = $this->csvToFormattedArray($actress_file);

        $this->setOscarsByYear();
        $this->setMoviesWithBothOscars();
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
            $movies_actors[trim($actor_data['movie'])] = [
                'name' => $actor_data['name'],
            ];
        }

        foreach ($this->actresses_with_oscar as $movie_name => $details_array) {
            if (isset($movies_actors[$movie_name])) {
                $movies[$movie_name] = [
                    'year' => $details_array['year'],
                    'actor' => $movies_actors[$movie_name]['name'],
                    'actress' => $details_array['name']
                ];
            }
        }

        $this->movies_with_both_oscars = ksort($movies);
    }

    private function csvToFormattedArray($csv)
    {
        //transforming csv into array of arrays
        $array = array_map('str_getcsv', file($csv, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES));

        //renaming keys of subarrays according to head
        array_walk($array, function (&$ary) use ($array) {
            $head = array_map('strtolower', $array[0]);
            $ary = array_combine($head, $ary);
        });

        //removing [0] element
        array_shift($array);
        return $array;
    }

    public function getOscarsByYearData()
    {
        return $this->oscars_by_year;
    }

    public function getMoviesWithBothOscarsData()
    {
        return $this->movies_with_both_oscars;
    }
}