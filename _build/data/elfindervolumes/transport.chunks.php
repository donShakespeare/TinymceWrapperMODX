<?php
/**
 * chunks transport file for TinymceWrapper extra
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
/* @var xPDOObject[] $chunks */


$chunks = array();

$chunks[1] = $modx->newObject('modChunk');
$chunks[1]->fromArray(array (
  'id' => 1,
  'property_preprocess' => false,
  'name' => 'elfinderLocalFileSystem1',
  'description' => 'Template for volume1. Pure JSON format, no comments allowed. You may add other features from https://github.com/Studio-42/elFinder/wiki/Connector-configuration-options-2.1',
  'properties' => 
  array (
  ),
), '', true, true);
$chunks[1]->setContent(file_get_contents($sources['source_core'] . '/elements/chunks/elfinderlocalfilesystem1.chunk.html'));

$chunks[2] = $modx->newObject('modChunk');
$chunks[2]->fromArray(array (
  'id' => 2,
  'property_preprocess' => false,
  'name' => 'elfinderLocalFileSystem2',
  'description' => 'Template for volume2. Pure JSON format, no comments allowed. You may add other features from https://github.com/Studio-42/elFinder/wiki/Connector-configuration-options-2.1',
  'properties' => 
  array (
  ),
), '', true, true);
$chunks[2]->setContent(file_get_contents($sources['source_core'] . '/elements/chunks/elfinderlocalfilesystem2.chunk.html'));

$chunks[3] = $modx->newObject('modChunk');
$chunks[3]->fromArray(array (
  'id' => 3,
  'property_preprocess' => false,
  'name' => 'elfinderLocalFileSystem3',
  'description' => 'Template for volume3. Pure JSON format, no comments allowed. You may add other features from https://github.com/Studio-42/elFinder/wiki/Connector-configuration-options-2.1',
  'properties' => 
  array (
  ),
), '', true, true);
$chunks[3]->setContent(file_get_contents($sources['source_core'] . '/elements/chunks/elfinderlocalfilesystem3.chunk.html'));

$chunks[4] = $modx->newObject('modChunk');
$chunks[4]->fromArray(array (
  'id' => 4,
  'property_preprocess' => false,
  'name' => 'elfinderLocalFileSystem4',
  'description' => 'Template for volume4. Pure JSON format, no comments allowed. You may add other features from https://github.com/Studio-42/elFinder/wiki/Connector-configuration-options-2.1',
  'properties' => 
  array (
  ),
), '', true, true);
$chunks[4]->setContent(file_get_contents($sources['source_core'] . '/elements/chunks/elfinderlocalfilesystem4.chunk.html'));

$chunks[5] = $modx->newObject('modChunk');
$chunks[5]->fromArray(array (
  'id' => 5,
  'property_preprocess' => false,
  'name' => 'elfinderLocalFileSystemPersonal',
  'description' => 'Template for Personal Folder. Pure JSON format, no comments allowed. You may add other features from https://github.com/Studio-42/elFinder/wiki/Connector-configuration-options-2.1',
  'properties' => 
  array (
  ),
), '', true, true);
$chunks[5]->setContent(file_get_contents($sources['source_core'] . '/elements/chunks/elfinderlocalfilesystempersonal.chunk.html'));

$chunks[6] = $modx->newObject('modChunk');
$chunks[6]->fromArray(array (
  'id' => 6,
  'property_preprocess' => false,
  'name' => 'elfinderLocalFileSystem5',
  'description' => 'Template for volume5. Pure JSON format, no comments allowed. You may add other features from https://github.com/Studio-42/elFinder/wiki/Connector-configuration-options-2.1',
  'properties' => 
  array (
  ),
), '', true, true);
$chunks[6]->setContent(file_get_contents($sources['source_core'] . '/elements/chunks/elfinderlocalfilesystem5.chunk.html'));

return $chunks;
