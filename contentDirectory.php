<?php
function contentDirectory($folder, $space)
{
    if (php_sapi_name() == 'cli') {
        $newLine = "\r\n";
        $tab = '  ';
    } else {
        $newLine = '<br />';
        $tab = '&nbsp;&nbsp;';
    }
    $files = scandir($folder);
    foreach ($files as $file) {
        if (($file == '.') || ($file == '..')) continue;
        $thisFile = $folder . '/' . $file;
        if (is_dir($thisFile)) {
            echo $space . $file . $newLine;
            contentDirectory($thisFile, $space . $tab);
        } else echo $space . $file . $newLine;
    }
}
contentDirectory('./', '');