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
  'name' => 'TinymceWrapperNPcontent',
  'description' => 'for NewsPublisher np-content',
  'properties' => 
  array (
  ),
), '', true, true);
$chunks[1]->setContent(file_get_contents($sources['source_core'] . '/elements/chunks/tinymcewrappernpcontent.chunk.html'));

$chunks[2] = $modx->newObject('modChunk');
$chunks[2]->fromArray(array (
  'id' => 2,
  'property_preprocess' => false,
  'name' => 'TinymceWrapperNPpagetitle',
  'description' => 'for NewsPublisher np-pagetitle',
  'properties' => 
  array (
  ),
), '', true, true);
$chunks[2]->setContent(file_get_contents($sources['source_core'] . '/elements/chunks/tinymcewrappernppagetitle.chunk.html'));

$chunks[3] = $modx->newObject('modChunk');
$chunks[3]->fromArray(array (
  'id' => 3,
  'property_preprocess' => false,
  'name' => 'TinymceWrapperNPfileRichTv',
  'description' => 'for NewsPublisher np-imageRichTv',
  'properties' => NULL,
), '', true, true);
$chunks[3]->setContent(file_get_contents($sources['source_core'] . '/elements/chunks/tinymcewrappernpfilerichtv.chunk.html'));

$chunks[4] = $modx->newObject('modChunk');
$chunks[4]->fromArray(array (
  'id' => 4,
  'property_preprocess' => false,
  'name' => 'TinymceWrapperNPintrotext',
  'description' => 'for NewsPublisher np-introtext',
  'properties' => 
  array (
  ),
), '', true, true);
$chunks[4]->setContent(file_get_contents($sources['source_core'] . '/elements/chunks/tinymcewrappernpintrotext.chunk.html'));

$chunks[5] = $modx->newObject('modChunk');
$chunks[5]->fromArray(array (
  'id' => 5,
  'property_preprocess' => false,
  'name' => 'TinymceWrapperNPTinymceWrapperServiceTV1',
  'description' => 'for NewsPublisher TVs starting with np-TinymceWrapperService...',
  'properties' => 
  array (
  ),
), '', true, true);
$chunks[5]->setContent(file_get_contents($sources['source_core'] . '/elements/chunks/tinymcewrappernptinymcewrapperservicetv1.chunk.html'));

$chunks[6] = $modx->newObject('modChunk');
$chunks[6]->fromArray(array (
  'id' => 6,
  'property_preprocess' => false,
  'name' => 'TinymceWrapperNPTinymceWrapperCategoryTV1',
  'description' => 'for NewsPublisher TVs starting with np-TinymceWrapperCategoryTV...',
  'properties' => 
  array (
  ),
), '', true, true);
$chunks[6]->setContent(file_get_contents($sources['source_core'] . '/elements/chunks/tinymcewrappernptinymcewrappercategorytv1.chunk.html'));

$chunks[7] = $modx->newObject('modChunk');
$chunks[7]->fromArray(array (
  'id' => 7,
  'property_preprocess' => false,
  'name' => 'TinymceWrapperNPTinymceWrapperMiscTV1',
  'description' => 'for NewsPublisher TVs starting with np-TinymceWrapperMiscTV...',
  'properties' => 
  array (
  ),
), '', true, true);
$chunks[7]->setContent(file_get_contents($sources['source_core'] . '/elements/chunks/tinymcewrappernptinymcewrappermisctv1.chunk.html'));

$chunks[8] = $modx->newObject('modChunk');
$chunks[8]->fromArray(array (
  'id' => 8,
  'property_preprocess' => false,
  'name' => 'TinymceWrapperNPtraditional',
  'description' => 'All TinyMCE init in one chunk - for the old school method of using RTE with NewsPublisher. Use this if the TinyMagicPublisher magic is too much. You can also place [[$chunks]] within this chunk for readability',
  'properties' => 
  array (
  ),
), '', true, true);
$chunks[8]->setContent(file_get_contents($sources['source_core'] . '/elements/chunks/tinymcewrappernptraditional.chunk.html'));

$chunks[9] = $modx->newObject('modChunk');
$chunks[9]->fromArray(array (
  'id' => 9,
  'property_preprocess' => false,
  'name' => 'TinymceWrapperNPCommonCode',
  'description' => 'for NewsPublisher TMP TinyMCE inits',
  'properties' => 
  array (
  ),
), '', true, true);
$chunks[9]->setContent(file_get_contents($sources['source_core'] . '/elements/chunks/tinymcewrappernpcommoncode.chunk.html'));

return $chunks;
