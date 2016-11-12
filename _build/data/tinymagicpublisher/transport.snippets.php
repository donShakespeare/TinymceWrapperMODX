<?php
/**
 * snippets transport file for TinymceWrapper extra
 *
 * Copyright 2016 by donShakespeare donShakespeare@gmail.com
 * Created on 05-02-2016
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
/* @var xPDOObject[] $snippets */


$snippets = array();

$snippets[1] = $modx->newObject('modSnippet');
$snippets[1]->fromArray(array (
  'id' => 1,
  'property_preprocess' => false,
  'name' => 'TinyMagicPublisher',
  'description' => 'Better to customize by doing [[!TinyMagicPublisher? &thisProperty=`myCustomValue`]] or [[!TinyMagicPublisher@customPropertySet]]. If you leave this snippet alone, you will have no need to back it up, or need to create custom PropertySet.',
), '', true, true);
$snippets[1]->setContent(file_get_contents($sources['source_core'] . '/elements/snippets/tinymagicpublisher.snippet.php'));


$properties = include $sources['data'].'properties/properties.tinymagicpublisher.snippet.php';
$snippets[1]->setProperties($properties);
unset($properties);

$snippets[2] = $modx->newObject('modSnippet');
$snippets[2]->fromArray(array (
  'id' => 2,
  'property_preprocess' => false,
  'name' => 'TinyMagicPublisherModifier ',
  'description' => 'Get/Preserve exact content (esp. during error postback) that include MODX tags HTML entities.[[*pagetitle:TinyMagicPublisherModifier]]
"pagetitle","alias","menutitle","longtitle","introtext","description","content" ... anytextareas',
  'properties' => 
  array (
  ),
), '', true, true);
$snippets[2]->setContent(file_get_contents($sources['source_core'] . '/elements/snippets/tinymagicpublishermodifier_.snippet.php'));

return $snippets;
