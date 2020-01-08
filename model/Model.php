<?php

namespace model;

use Exception;

class Model
{
    /**
     * @param $db Connection database
     */
    public function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (Exception $e) {
            exit('Database connection could not be established.');
        }
    }

    public function addPage($path, $host, $title, $content, $date)
    {
        $sql = "INSERT IGNORE INTO pages (path, title, content, date) VALUES (\"" . mysqli_real_escape_string($this->db, $path) . "\",\"" . mysqli_real_escape_string($this->db, $host) . "\" , \"" . mysqli_real_escape_string($this->db, $title) . "\", \"" . mysqli_real_escape_string($this->db, $content) . "\",  \"" . mysqli_real_escape_string($this->db, $date) . "\")";

        if (!mysqli_query($this->db, $sql)) {
            die("<br>Error: Unable to perform Insert Query<br>");
        }
    }
}
