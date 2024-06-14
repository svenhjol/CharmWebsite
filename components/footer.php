<?php defined('ENTRYPOINT') || die('no'); ?>
<footer>
<?php

$pd = new Parsedown();
$pd->setUrlsLinked(true);

$footerText = file_get_contents(CONTENT_DIR.'/footer.md');
$footerText = replaceFeatureText($footerText);
echo $pd->text($footerText);

?>
</footer>