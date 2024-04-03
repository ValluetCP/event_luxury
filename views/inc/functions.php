<?php

define("MAIN_ROOT", "http://localhost/event_luxury");

function debug($param)
{
    echo "<pre>";
    var_dump($param);
    echo "</pre>";
}
function debugDie($param)
{
    echo "<pre>";
    var_dump($param);
    echo "</pre>";
    die;
}
