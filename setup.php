<?php

if (!defined('ENTRYPOINT')) die('no');

require_once(__DIR__.'/vendor/autoload.php');

if (!file_exists(__DIR__.'/config.php')) {
    die('Missing config.php');
}

require_once(__DIR__.'/config.php');

const CHARM_FEATURES_DIR = __DIR__ . '/charm_features';
const CHARMONIUM_FEATURES_DIR = __DIR__ . '/charmonium_features';
const STRANGE_FEATURES_DIR = __DIR__ . '/strange_features';
const COMPONENTS_DIR = __DIR__ . '/components';
const CONTENT_DIR = __DIR__ . '/content';
const HEADER = COMPONENTS_DIR . '/header.php';
const FOOTER = COMPONENTS_DIR . '/footer.php';
const FEATURE = COMPONENTS_DIR . '/feature.php';
const START = COMPONENTS_DIR . '/start.php';
const END = COMPONENTS_DIR . '/end.php';

function replaceFeatureText(string $text): string {
    $text = preg_replace('/CHARM_FEATURES_URL/', CHARM_FEATURES_URL, $text);
    $text = preg_replace('/CHARMONIUM_FEATURES_URL/', CHARMONIUM_FEATURES_URL, $text);
    $text = preg_replace('/STRANGE_FEATURES_URL/', STRANGE_FEATURES_URL, $text);
    $text = preg_replace('/CHARM_VERSION/', CHARM_VERSION, $text);
    $text = preg_replace('/CHARMONIUM_VERSION/', CHARMONIUM_VERSION, $text);
    $text = preg_replace('/STRANGE_VERSION/', STRANGE_VERSION, $text);
    return $text;
}

function filterFeatureText(string $text, string $filter): string {
    if (!empty($filter)) {
        if (str_contains(strtolower($text), "$filter")) {
            $text = preg_replace("/ ($filter) /i", ' <mark>\\1</mark> ', $text);
        } else {
            return "";
        }
    }
    return $text;
}

function getSearchTerm(): string {
    $search = $_GET['search'];
    $search = trim(strtolower(preg_replace('/([^a-zA-Z0-9 ])/', '', substr($search, 0, 16))));
    if (strlen($search) < 3) {
        $search = "";
    }
    return $search;
}