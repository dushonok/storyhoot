<?php
require __DIR__ . '/../../../../master/vendor/autoload.php';

use Instagram\Api;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

$cachePool = new FilesystemAdapter('Instagram', 0, __DIR__ . '/../cache');

$api = new Api($cachePool);
$api->login('milawoofdogs', '8hKU3aIWk0NE6QbbwwWlMqjCXYYhrYTs'); // mandatory

$profile = $api->getProfile('tanya_liberman'); // we need instagram username
sleep(1);
$feedStories = $api->getStories($profile->getId());

$stories = $feedStories->getStories();

print_r($stories);

?>
