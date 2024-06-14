<?php defined('ENTRYPOINT') || die('no') ?>
<div>
    <a id="<?php echo $featureName; ?>"></a>
    <?php 
    
    $featureBody = preg_replace('/\<h2\>(.*)\<\/h2\>/', '<h2><a class="feature-link" href="#'.$featureName.'">#</a> \\1</h2>', $featureBody);
    echo $featureBody; 
    
    ?>
</div>