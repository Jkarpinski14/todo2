<?php
    require_once(__DIR__ . "/../model/config.php");

    $title    = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
    $post     = filter_input(INPUT_POST, "post", FILTER_SANITIZE_STRING);
    $date = new DateTime("today");
    $time = new DateTime("America/Los_Angeles");

    $query = $_SESSION["connection"]->query("INSERT INTO posts SET title = '$title', post = '$post'");

    if($query){

        echo "<p>Successfully inserting post: $title</p>";
        echo "Posted on: " . $date->format('M/D/Y') . " at " . $time->format('g:i');
    }
    else {
        echo "<p>" . $_SESSION["connection"]->error . "</p>";
   }
?>