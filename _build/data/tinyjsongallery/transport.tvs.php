<?php
/**
 * templateVars transport file for TinymceWrapper extra
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
/* @var xPDOObject[] $templateVars */


$templateVars = array();

$templateVars[1] = $modx->newObject('modTemplateVar');
$templateVars[1]->fromArray(array (
  'id' => 1,
  'property_preprocess' => false,
  'type' => 'textarea',
  'name' => 'TinyJSONGalleryTV',
  'caption' => 'TinyJSONGalleryTV',
  'description' => 'Transform TV to dazzling gallery album. This TV must be plain textarea (input type). Go to TinymceWrapper Plugin to customize this Gallery addon.',
  'elements' => '',
  'rank' => 5,
  'display' => 'default',
  'default_text' => '[{"Location": "assets/components/tinymcewrapper/gallery/stockImages/nature/&autoCreateThumb=1&justJSON=1&options=w=178,h=117,zc=t"}]',
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
