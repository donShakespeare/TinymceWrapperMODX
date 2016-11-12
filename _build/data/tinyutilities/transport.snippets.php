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
  'name' => 'TinymceWrapperGRF',
  'description' => 'TinymceWrapper Plugin uses GetResourceField to grab the url of your elFinder resource. Since I don\'t know if you have friendly url on or not, I had no choice. Please replace this in your Plugin property, enter the url of your elFinder resource.',
), '', true, true);
$snippets[1]->setContent(file_get_contents($sources['source_core'] . '/elements/snippets/tinymcewrappergrf.snippet.php'));


$properties = include $sources['data'].'properties/properties.tinymcewrappergrf.snippet.php';
$snippets[1]->setProperties($properties);
unset($properties);

$snippets[2] = $modx->newObject('modSnippet');
$snippets[2]->fromArray(array (
  'id' => 2,
  'property_preprocess' => false,
  'name' => 'TinymceWrapperGetUrlParam',
  'description' => 'This extends your elFinder, gives you url parameter emperor status',
  'properties' => 
  array (
  ),
), '', true, true);
$snippets[2]->setContent(file_get_contents($sources['source_core'] . '/elements/snippets/tinymcewrappergeturlparam.snippet.php'));

$snippets[3] = $modx->newObject('modSnippet');
$snippets[3]->fromArray(array (
  'id' => 3,
  'property_preprocess' => false,
  'name' => 'TinymceWrapperMarkdown',
  'description' => 'Output modifier. It can also be used with other modifiers.
[[*content:TinymceWrapperMarkdown]] ... [[+placeholder:TinymceWrapperMarkdown]]
TinymceWrapperMarkdown = `markdownE` or `parsedown` default is parsedownE',
  'properties' => 
  array (
  ),
), '', true, true);
$snippets[3]->setContent(file_get_contents($sources['source_core'] . '/elements/snippets/tinymcewrappermarkdown.snippet.php'));

return $snippets;
