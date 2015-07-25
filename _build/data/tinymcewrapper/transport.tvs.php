<?php
/**
 * templateVars transport file for TinymceWrapper extra
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
/* @var xPDOObject[] $templateVars */


$templateVars = array();

$templateVars[1] = $modx->newObject('modTemplateVar');
$templateVars[1]->fromArray(array (
  'id' => 1,
  'property_preprocess' => false,
  'type' => 'richtext',
  'name' => 'TinymceWrapperTV1',
  'caption' => 'TinymceWrapper Rich Tv #1',
  'description' => '',
  'elements' => '',
  'rank' => 0,
  'display' => 'default',
  'default_text' => '<p>I am a wealthy textarea: You can reset me to default with TinyMCE on or off</p>',
  'properties' => 
  array (
  ),
  'input_properties' => 
  array (
    'allowBlank' => 'true',
    'maxLength' => '',
    'minLength' => '',
  ),
  'output_properties' => 
  array (
  ),
), '', true, true);
$templateVars[2] = $modx->newObject('modTemplateVar');
$templateVars[2]->fromArray(array (
  'id' => 2,
  'property_preprocess' => false,
  'type' => 'file',
  'name' => 'fileRichTv',
  'caption' => 'fileRichTv',
  'description' => '',
  'elements' => '',
  'rank' => 1,
  'display' => 'default',
  'default_text' => '',
  'properties' => 
  array (
  ),
  'input_properties' => 
  array (
  ),
  'output_properties' => 
  array (
  ),
), '', true, true);
$templateVars[3] = $modx->newObject('modTemplateVar');
$templateVars[3]->fromArray(array (
  'id' => 3,
  'property_preprocess' => false,
  'type' => 'image',
  'name' => 'imageRichTv',
  'caption' => 'imageRichTv',
  'description' => '',
  'elements' => '',
  'rank' => 3,
  'display' => 'default',
  'default_text' => '',
  'properties' => 
  array (
  ),
  'input_properties' => 
  array (
  ),
  'output_properties' => 
  array (
  ),
), '', true, true);
$templateVars[4] = $modx->newObject('modTemplateVar');
$templateVars[4]->fromArray(array (
  'id' => 4,
  'property_preprocess' => false,
  'type' => 'image',
  'name' => 'imageRichTv2',
  'caption' => 'imageRichTv2',
  'description' => '',
  'elements' => '',
  'rank' => 4,
  'display' => 'default',
  'default_text' => '',
  'properties' => 
  array (
  ),
  'input_properties' => 
  array (
  ),
  'output_properties' => 
  array (
  ),
), '', true, true);
$templateVars[5] = $modx->newObject('modTemplateVar');
$templateVars[5]->fromArray(array (
  'id' => 5,
  'property_preprocess' => false,
  'type' => 'file',
  'name' => 'fileRichTv2',
  'caption' => 'fileRichTv2',
  'description' => '',
  'elements' => '',
  'rank' => 2,
  'display' => 'default',
  'default_text' => '',
  'properties' => 
  array (
  ),
  'input_properties' => 
  array (
  ),
  'output_properties' => 
  array (
  ),
), '', true, true);
$templateVars[6] = $modx->newObject('modTemplateVar');
$templateVars[6]->fromArray(array (
  'id' => 6,
  'property_preprocess' => false,
  'type' => 'textarea',
  'name' => 'TinymceWrapperTV3',
  'caption' => 'TinymceWrapper non-Rich Tv #3',
  'description' => '',
  'elements' => '',
  'rank' => 6,
  'display' => 'default',
  'default_text' => '<p>I am a poor textarea</p>',
  'properties' => 
  array (
  ),
  'input_properties' => 
  array (
    'allowBlank' => 'true',
  ),
  'output_properties' => 
  array (
  ),
), '', true, true);
$templateVars[7] = $modx->newObject('modTemplateVar');
$templateVars[7]->fromArray(array (
  'id' => 7,
  'property_preprocess' => false,
  'type' => 'richtext',
  'name' => 'TinymceWrapperTV2',
  'caption' => 'TinymceWrapper Rich Tv #2',
  'description' => '',
  'elements' => '',
  'rank' => 5,
  'display' => 'default',
  'default_text' => '<p>I am a wealthy textarea</p>',
  'properties' => 
  array (
  ),
  'input_properties' => 
  array (
    'allowBlank' => 'true',
    'maxLength' => '',
    'minLength' => '',
  ),
  'output_properties' => 
  array (
  ),
), '', true, true);
return $templateVars;
