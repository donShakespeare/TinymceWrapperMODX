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
  'name' => 'TinymceWrapperTVs',
  'description' => 'TinyMCE for RichTextarea TVs attached to resource via template. File and Image TVs do not need a chunk.',
  'properties' => 
  array (
  ),
), '', true, true);
$chunks[1]->setContent(file_get_contents($sources['source_core'] . '/elements/chunks/tinymcewrappertvs.chunk.html'));

$chunks[2] = $modx->newObject('modChunk');
$chunks[2]->fromArray(array (
  'id' => 2,
  'property_preprocess' => false,
  'name' => 'TinymceWrapperContent',
  'description' => 'TinyMCE for Resource Content Textarea',
  'properties' => 
  array (
  ),
), '', true, true);
$chunks[2]->setContent(file_get_contents($sources['source_core'] . '/elements/chunks/tinymcewrappercontent.chunk.html'));

$chunks[3] = $modx->newObject('modChunk');
$chunks[3]->fromArray(array (
  'id' => 3,
  'property_preprocess' => false,
  'name' => 'TinymceWrapperIntrotext',
  'description' => 'TinyMCE for Resource Introtext Textarea',
  'properties' => 
  array (
  ),
), '', true, true);
$chunks[3]->setContent(file_get_contents($sources['source_core'] . '/elements/chunks/tinymcewrapperintrotext.chunk.html'));

$chunks[4] = $modx->newObject('modChunk');
$chunks[4]->fromArray(array (
  'id' => 4,
  'property_preprocess' => false,
  'name' => 'TinymceWrapperDescription',
  'description' => 'TinyMCE for Resource Description Textarea',
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
  'description' => 'So you want to select a MODx resource from within TInyMCE, but don\'t want to write your own PHP snippet huh? Okay here is a cheat....watch out for JSON trailing commas. To use this with modxMagicHoverlink plugin change value to value: \'\\[\\[~[[+id]]\\]\\]\' .',
  'properties' => 
  array (
  ),
), '', true, true);
$chunks[5]->setContent(file_get_contents($sources['source_core'] . '/elements/chunks/tinymcewrapperlinklist.chunk.html'));

$chunks[6] = $modx->newObject('modChunk');
$chunks[6]->fromArray(array (
  'id' => 6,
  'property_preprocess' => false,
  'name' => 'TinymceWrapperQuickUpdate',
  'description' => 'TinyMCE for Quick Create/Update resources from Resource tree',
  'properties' => 
  array (
  ),
), '', true, true);
$chunks[6]->setContent(file_get_contents($sources['source_core'] . '/elements/chunks/tinymcewrapperquickupdate.chunk.html'));

$chunks[7] = $modx->newObject('modChunk');
$chunks[7]->fromArray(array (
  'id' => 7,
  'property_preprocess' => false,
  'name' => 'TinymceWrapperCommonCode',
  'description' => 'To save you some brainwidth put TinyMCE code here that repeats in your chunks. Trust me, it is easy to go crazy in this world.',
  'properties' => 
  array (
  ),
), '', true, true);
$chunks[7]->setContent(file_get_contents($sources['source_core'] . '/elements/chunks/tinymcewrappercommoncode.chunk.html'));

$chunks[8] = $modx->newObject('modChunk');
$chunks[8]->fromArray(array (
  'id' => 8,
  'property_preprocess' => false,
  'name' => 'TinymceWrapperCodeMirror',
  'description' => 'A simple chunk to teach you how to totally dominate the usage of CodeMirror according to all the possible specs provided on the official website',
  'properties' => 
  array (
  ),
), '', true, true);
$chunks[8]->setContent(file_get_contents($sources['source_core'] . '/elements/chunks/tinymcewrappercodemirror.chunk.html'));

$chunks[9] = $modx->newObject('modChunk');
$chunks[9]->fromArray(array (
  'id' => 9,
  'property_preprocess' => false,
  'name' => 'TinymceWrapperAce',
  'description' => 'A simple chunk to teach you how to totally dominate the usage of Ace according to all the possible specs provided on the official website.',
  'properties' => 
  array (
  ),
), '', true, true);
$chunks[9]->setContent(file_get_contents($sources['source_core'] . '/elements/chunks/tinymcewrapperace.chunk.html'));

$chunks[10] = $modx->newObject('modChunk');
$chunks[10]->fromArray(array (
  'id' => 10,
  'property_preprocess' => false,
  'name' => 'sample.TinymceWrapperMarkdown',
  'description' => 'Transform any TinyMCE editor into a powerful and beautiful Markdown Editor. Works with twExoticMarkdownEditor.js, allows floating tinymceBubbleBar.js toolbar, contextmenu, modxMagicHoverLink, twPreCodeManager.js',
  'properties' => 
  array (
  ),
), '', true, true);
$chunks[10]->setContent(file_get_contents($sources['source_core'] . '/elements/chunks/sample.tinymcewrappermarkdown.chunk.html'));

return $chunks;
