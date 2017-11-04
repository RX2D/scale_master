<?php

/*

    Mass text search-replace in files of directory (non recursive)

*/

$dir = 'svg';

chdir(dirname(__FILE__).'/..');
$files = scandir($dir);
if (!is_dir($dir.'.mod'))
    mkdir($dir.'.mod');

$replace = Array(
        'data-keep-angle="false"' => 'data-keep-angle=""',
        'data-keep-angle="true"' => 'data-keep-angle="absolute"',
        'data-keep-angle="1"' => 'data-keep-angle="absolute"',
    );

foreach ($files as $file)
    if ($file[0] !== '.') {
        $data = file_get_contents("$dir/$file");
//        $data = str_replace(array_keys($replace), array_values($replace), $data);
        $data = preg_replace('![\d\.]+e\-\d+!', '0', $data);
        file_put_contents("{$dir}.mod/$file", $data);
    }

