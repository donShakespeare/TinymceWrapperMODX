<?php
/**
 * plugins transport file for TinymceWrapper extra
 *
 * Copyright 2015 by donShakespeare donShakespeare@gmail.com
 * Created on 07-24-2015
 *
 * @package tinymcewrapper
 * @subpackage build
 */

if (! function_exists('stripPhpTags')) {
    function stripPhpTags($filename) {
        $o = file_get_contents($filename);
        $o = str_replace('<' . '?' . 'php', '', $o);
        $o = str_replace('?>', '', $o);
        $o = trim($o);
        return $o;
    }
}
/* @var $modx modX */
/* @var $sources array */
/* @var xPDOObject[] $plugins */


$plugins = array();

$plugins[1] = $modx->newObject('modPlugin');
$plugins[1]->fromArray(array (
  'id' => 1,
  'property_preprocess' => false,
  'name' => 'TinymceWrapper',
  'description' => 'Survive upgrades! Duplicate the Chunks, retain their original names with an added SUFFIX. Create dedicated PropertySet properties. Default properties will be overridden.
Include no script tags in any of the chunks.
Please be awesome!',
  'disabled' => false,
), '', true, true);
$plugins[1]->setContent(file_get_contents($sources['source_core'] . '/elements/plugins/tinymcewrapper.plugin.php'));


$properties = include $sources['data'].'properties/properties.tinymcewrapper.plugin.php';
$plugins[1]->setProperties($properties);
unset($properties);

return $plugins;
