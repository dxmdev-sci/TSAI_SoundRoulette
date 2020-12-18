<?php
$text = "";

function str_replace_first($from, $to, $content)
{
    $from = '/'.preg_quote($from, '/').'/';

    return preg_replace($from, $to, $content, 1);
}

foreach(preg_split("/((\r?\n)|(\r\n?))/", $text) as $line){
    echo str_replace_first(" ", ':"', $line).",<br>";
} 