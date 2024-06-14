<?php

define('ENTRYPOINT', true);

require_once(__DIR__.'/setup.php');

ob_start();

$title = "Welcome to Charmony!";
$active = 'home';

require_once(HEADER);

$pd = new Parsedown();
$pd->setUrlsLinked(true);

$homeText = file_get_contents(CONTENT_DIR.'/home.md');
$homeText = replaceFeatureText($homeText);

$downloadText = file_get_contents(CONTENT_DIR.'/download.md');
$downloadText = replaceFeatureText($downloadText);

echo $pd->text($homeText);
echo $pd->text($downloadText);

require_once(FOOTER);
require_once(OUT);

exit(0);