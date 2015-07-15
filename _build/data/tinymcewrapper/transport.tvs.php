<?php
/**
 * templateVars transport file for TinymceWrapper extra
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
  'default_text' => 'Collaboratively syndicate optimal materials before best-of-breed e-tailers. Synergistically foster out-of-the-box web services without accurate communities. Collaboratively extend principle-centered niche markets for vertical niches. Quickly recaptiualize holistic e-services without leading-edge action items. Appropriately procrastinate worldwide niche markets through mission-critical scenarios.

Collaboratively extend functional total linkage through orthogonal opportunities. Competently supply equity invested processes before clicks-and-mortar results. Continually generate strategic synergy after dynamic leadership skills. Authoritatively.',
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
  'rank' => 0,
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
  'rank' => 0,
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
  'rank' => 0,
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
  'rank' => 0,
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
  'rank' => 0,
  'display' => 'default',
  'default_text' => 'Enthusiastically plagiarize premier web-readiness vis-a-vis an expanded array of quality vectors.',
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
  'rank' => 0,
  'display' => 'default',
  'default_text' => 'Assertively repurpose exceptional quality vectors via 24/7 ideas. Proactively actualize fully tested models',
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
