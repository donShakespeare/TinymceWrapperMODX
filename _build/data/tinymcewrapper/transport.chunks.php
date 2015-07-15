<?php
/**
 * chunks transport file for TinymceWrapper extra
 *
 * Copyright 2015 by donShakespeare donShakespeare@gmail.com
 * Created on 07-15-2015
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
/* @var xPDOObject[] $chunks */


$chunks = array();

$chunks[1] = $modx->newObject('modChunk');
$chunks[1]->fromArray(array (
  'id' => 1,
  'property_preprocess' => false,
  'name' => 'TinymceWrapperTVs',
  'description' => 'Takes care of all RichTextarea TVs',
  'properties' => 
  array (
  ),
), '', true, true);
$chunks[1]->setContent(file_get_contents($sources['source_core'] . '/elements/chunks/tinymcewrappertvs.chunk.html'));

$chunks[2] = $modx->newObject('modChunk');
$chunks[2]->fromArray(array (
  'id' => 2,
  'property_preprocess' => false,
  'name' => 'TinymceWrapperIntrotext',
  'description' => '//E.g.
tinymce.init({selector : "#modx-resource-introtext"});',
  'properties' => 
  array (
  ),
), '', true, true);
$chunks[2]->setContent(file_get_contents($sources['source_core'] . '/elements/chunks/tinymcewrapperintrotext.chunk.html'));

$chunks[3] = $modx->newObject('modChunk');
$chunks[3]->fromArray(array (
  'id' => 3,
  'property_preprocess' => false,
  'name' => 'TinymceWrapperContent',
  'description' => '//E.g.
tinymce.init({selector : "#ta"});',
  'properties' => 
  array (
  ),
), '', true, true);
$chunks[3]->setContent(file_get_contents($sources['source_core'] . '/elements/chunks/tinymcewrappercontent.chunk.html'));

$chunks[4] = $modx->newObject('modChunk');
$chunks[4]->fromArray(array (
  'id' => 4,
  'property_preprocess' => false,
  'name' => 'TinymceWrapperDescription',
  'description' => '//E.g.
tinymce.init({selector : "#modx-resource-description"});',
  'properties' => 
  array (
  ),
), '', true, true);
$chunks[4]->setContent(file_get_contents($sources['source_core'] . '/elements/chunks/tinymcewrapperdescription.chunk.html'));

$chunks[5] = $modx->newObject('modChunk');
$chunks[5]->fromArray(array (
  'id' => 5,
  'property_preprocess' => false,
  'name' => 'TinymceWrapperLinkList',
  'description' => 'So you want to select a MODx resource from within TInyMCE, but don\'t want to write your own PHP snippet huh? Okay here is a cheat....watch out for JSON trailing commas',
  'properties' => 
  array (
  ),
), '', true, true);
$chunks[5]->setContent(file_get_contents($sources['source_core'] . '/elements/chunks/tinymcewrapperlinklist.chunk.html'));

return $chunks;
