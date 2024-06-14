<?php defined('ENTRYPOINT') || die('no'); ?>
<header>
    <h1><?php echo $title; ?></h1>

    <nav>
        <a href="/" class="<?php echo $active == 'home' ? 'current' : ''; ?>">Home</a>
        <a href="/charm-features.php" class="<?php echo $active == 'charm-features' ? 'current' : ''; ?>">Charm Features</a>
        <a href="/charmonium-features.php" class="<?php echo $active == 'charmonium-features' ? 'current' : ''; ?>">Charmonium Features</a>
        <a href="/strange-features.php" class="<?php echo $active == 'strange-features' ? 'current' : ''; ?>">Strange Features</a>
    </nav>
</header>