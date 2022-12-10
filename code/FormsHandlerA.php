<?php
if (array_key_exists('content1', $_POST))
{
    $text = $_POST['content1'];
    $matches = [];
    preg_match_all('/\w+/', $text, $matches);
    echo ('Слов: ' . count($matches[0]) . '. Символов: ' . strlen($text) . '.');
}