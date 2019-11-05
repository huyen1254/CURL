<?php

class Vnexpress extends Controller
{
    public function getTitle()
    {
        preg_match("/<title>(.*?)<\/title>/", $this->html, $title);

        return $title[1];
    }
    public function getDate()
    {
        preg_match("/<span+\s+class=\"time\sleft\">(.*?)<\/span>/", $this->html, $date);
        return $date[1];
    }
    public function getContent()
    {
        preg_match_all("/<p class=\"Normal\">\n(.*?)<\/p>/", $this->html, $content, PREG_SET_ORDER, 0);
        $output = '';
        foreach ($content as $para) {
            $output = $output . $para[0];
        }
        return $output;
    }
  

    public function Show()
    {
        $url_host = $this->host;
        $url_path = $this->path;
        $title = $this->getTitle();
        $date = $this->getDate();
        $content = $this->getContent();

        echo '<h2> ' . $title . '</h2> ' . $date  . $content . ' ';

        // Insert/Update Page Data
        $query = "INSERT INTO pages (path, host, title, content, download_time)
        VALUES (\"" . mysqli_real_escape_string($this->connectDB, $url_path) . "\", \"$url_host \", \"$title\", \"$content\",  \"$date\")
        ON DUPLICATE KEY UPDATE host=\"$url_host \", title=\"$title\", content=\"$content\",  download_time=\"$date\"";
        if (!mysqli_query($this->connectDB, $query)) {
            die("<br>Error: Unable to perform Insert Query\n");
        }
    }
}