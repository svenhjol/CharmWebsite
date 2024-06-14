<?php

define('ENTRYPOINT', true);

require_once(__DIR__.'/setup.php');
require_once(START);

$search = getSearchTerm();
$title = 'Strange Features';
$active = 'strange-features';
require_once(HEADER);

?>
<div class="searchform">
    <form action="/strange-features.php">
        <input type="text" name="search" value="<?php echo $search; ?>" placeholder="Search">
    </form>
</div>
<?php

$it = new DirectoryIterator(STRANGE_FEATURES_DIR);
$ordered = [];

foreach ($it as $file) {
    if ($file->isDot()) continue;

    $ext = $file->getExtension();
    if ($ext !== 'md') continue;

    $name = $file->getFilename();
    $text = file_get_contents(STRANGE_FEATURES_DIR."/".$name);
    $text = replaceFeatureText($text);
    $text = filterFeatureText($text, $search);
    
    if (empty($text)) continue;

    $ordered[$name] = $text;
}

ksort($ordered);

foreach ($ordered as $name => $text) {
    $pd = new Parsedown();
    $pd->setUrlsLinked(true);
    $featureName = str_replace('.md', '', $name);
    $featureBody = $pd->text($text);
    include(FEATURE);
}

require_once(END);
exit;
