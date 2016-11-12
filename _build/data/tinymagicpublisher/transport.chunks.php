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
  'name' => 'twEDITnpOuterTpl',
  'description' => 'Custom Outer Tpl chunk for entire NewsPublisher Edit Form',
  'properties' => 
  array (
  ),
), '', true, true);
$chunks[1]->setContent(file_get_contents($sources['source_core'] . '/elements/chunks/tweditnpoutertpl.chunk.html'));

$chunks[2] = $modx->newObject('modChunk');
$chunks[2]->fromArray(array (
  'id' => 2,
  'property_preprocess' => false,
  'name' => 'twBROWSERnpImageTpl',
  'description' => 'Custom Tpl chunk for NewsPublisher image TVs',
  'properties' => NULL,
), '', true, true);
$chunks[2]->setContent(file_get_contents($sources['source_core'] . '/elements/chunks/twbrowsernpimagetpl.chunk.html'));

$chunks[3] = $modx->newObject('modChunk');
$chunks[3]->fromArray(array (
  'id' => 3,
  'property_preprocess' => false,
  'name' => 'twCREATEnpOuterTpl',
  'description' => 'Custom Outer Tpl chunk for entire NewsPublisher Create Form',
  'properties' => 
  array (
  ),
), '', true, true);
$chunks[3]->setContent(file_get_contents($sources['source_core'] . '/elements/chunks/twcreatenpoutertpl.chunk.html'));

$chunks[4] = $modx->newObject('modChunk');
$chunks[4]->fromArray(array (
  'id' => 4,
  'property_preprocess' => false,
  'name' => 'TinymceWrapperNPpublishButtonsTpl',
  'description' => 'That fixed Publish Button - with resource Options, save buttons etc - all TinyMCE functions - lexicons',
  'properties' => 
  array (
  ),
), '', true, true);
$chunks[4]->setContent(file_get_contents($sources['source_core'] . '/elements/chunks/tinymcewrappernppublishbuttonstpl.chunk.html'));

$chunks[5] = $modx->newObject('modChunk');
$chunks[5]->fromArray(array (
  'id' => 5,
  'property_preprocess' => false,
  'name' => 'twBROWSERnpFileTpl',
  'description' => 'Custom Tpl chunk for NewsPublisher file TVs',
  'properties' => 
  array (
  ),
), '', true, true);
$chunks[5]->setContent(file_get_contents($sources['source_core'] . '/elements/chunks/twbrowsernpfiletpl.chunk.html'));

$chunks[6] = $modx->newObject('modChunk');
$chunks[6]->fromArray(array (
  'id' => 6,
  'property_preprocess' => false,
  'name' => 'twExistingTagsSelectTpl',
  'description' => 'The tagLister call called by getResources to build each OPTION of the optgroup 
This chunk calls twExistingTagsSelectOptionsTpl. 
This chunk is called by twExistingTags',
  'properties' => NULL,
), '', true, true);
$chunks[6]->setContent(file_get_contents($sources['source_core'] . '/elements/chunks/twexistingtagsselecttpl.chunk.html'));

$chunks[7] = $modx->newObject('modChunk');
$chunks[7]->fromArray(array (
  'id' => 7,
  'property_preprocess' => false,
  'name' => 'twExistingTagsSelectOptionsTpl',
  'description' => 'The tpl for each row of option called by tagLister (twExistingTagsSelectTpl)',
  'properties' => NULL,
), '', true, true);
$chunks[7]->setContent(file_get_contents($sources['source_core'] . '/elements/chunks/twexistingtagsselectoptionstpl.chunk.html'));

$chunks[8] = $modx->newObject('modChunk');
$chunks[8]->fromArray(array (
  'id' => 8,
  'property_preprocess' => false,
  'name' => 'twExistingTags',
  'description' => 'The main chunk (getResources) that builds the SELECT list of tags. This chunk calls twExistingTagsSelectTpl which in turn calls twExistingTagsSelectOptionsTpl
Do not remove the id="np-existingTags" !!!!!',
  'properties' => NULL,
), '', true, true);
$chunks[8]->setContent(file_get_contents($sources['source_core'] . '/elements/chunks/twexistingtags.chunk.html'));

return $chunks;
