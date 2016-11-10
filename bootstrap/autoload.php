<?php

define("LARAVEL_START", microtime(true));

// register the Composer auto loader
require __DIR__."/../vendor/autoload.php";

// include the compiled Class file
$compiledPath = __DIR__."/cache/compiled.php";

if (file_exists($compiledPath)) {
    require $compiledPath;
}
