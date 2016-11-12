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
  'type' => 'richtext',
  'name' => 'TinymceWrapperMiscTV1',
  'caption' => 'TinymceWrapperMiscTV1',
  'description' => '',
  'elements' => '',
  'rank' => 1,
  'display' => 'default',
  'default_text' => '<h2>Free Download at Start Bootstrap!</h2>
<a href="#" class="btn btn-default btn-xl wow tada">Download Now!</a>',
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
  'type' => 'richtext',
  'name' => 'TinymceWrapperMiscTV2',
  'caption' => 'TinymceWrapperMiscTV2',
  'description' => '',
  'elements' => '',
  'rank' => 1,
  'display' => 'default',
  'default_text' => '<h2 class="section-heading">Let\'s Get In Touch!</h2>
<hr class="primary">
<p>Ready to start your next project with us? That\'s great! Give us a call or send us an email and we will get back to you as soon as possible!</p>',
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
$templateVars[3] = $modx->newObject('modTemplateVar');
$templateVars[3]->fromArray(array (
  'id' => 3,
  'property_preprocess' => false,
  'type' => 'richtext',
  'name' => 'TinymceWrapperServiceTV1',
  'caption' => 'TinymceWrapperServiceTV1',
  'description' => '',
  'elements' => '',
  'rank' => 0,
  'display' => 'default',
  'default_text' => '<h3>Sturdy Templates</h3>
<p class="text-muted">Our templates are updated regularly so they don\'t break.</p>',
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
$templateVars[4] = $modx->newObject('modTemplateVar');
$templateVars[4]->fromArray(array (
  'id' => 4,
  'property_preprocess' => false,
  'type' => 'richtext',
  'name' => 'TinymceWrapperServiceTV2',
  'caption' => 'TinymceWrapperServiceTV2',
  'description' => '',
  'elements' => '',
  'rank' => 0,
  'display' => 'default',
  'default_text' => '<h3>Ready to Ship</h3>
<p class="text-muted">You can use this theme as is, or you can make changes!</p>',
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
$templateVars[5] = $modx->newObject('modTemplateVar');
$templateVars[5]->fromArray(array (
  'id' => 5,
  'property_preprocess' => false,
  'type' => 'richtext',
  'name' => 'TinymceWrapperServiceTV3',
  'caption' => 'TinymceWrapperServiceTV3',
  'description' => '',
  'elements' => '',
  'rank' => 0,
  'display' => 'default',
  'default_text' => '<h3>Up to Date</h3>
<p class="text-muted">We update dependencies to keep things fresh.</p>',
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
$templateVars[6] = $modx->newObject('modTemplateVar');
$templateVars[6]->fromArray(array (
  'id' => 6,
  'property_preprocess' => false,
  'type' => 'richtext',
  'name' => 'TinymceWrapperServiceTV4',
  'caption' => 'TinymceWrapperServiceTV4',
  'description' => '',
  'elements' => '',
  'rank' => 0,
  'display' => 'default',
  'default_text' => '<h3>Made with Love</h3>
<p class="text-muted">You have to make your websites with love these days!</p>',
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
$templateVars[7] = $modx->newObject('modTemplateVar');
$templateVars[7]->fromArray(array (
  'id' => 7,
  'property_preprocess' => false,
  'type' => 'richtext',
  'name' => 'TinymceWrapperCategoryTV1',
  'caption' => 'TinymceWrapperCategoryTV1',
  'description' => '',
  'elements' => '',
  'rank' => 0,
  'display' => 'default',
  'default_text' => '<p>Hey, you hovered huh! now click to see my toolbar</p>',
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
$templateVars[8] = $modx->newObject('modTemplateVar');
$templateVars[8]->fromArray(array (
  'id' => 8,
  'property_preprocess' => false,
  'type' => 'richtext',
  'name' => 'TinymceWrapperCategoryTV2',
  'caption' => 'TinymceWrapperCategoryTV2',
  'description' => '',
  'elements' => '',
  'rank' => 0,
  'display' => 'default',
  'default_text' => '<p>You can change my background image, cool huh!?</p>',
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
$templateVars[9] = $modx->newObject('modTemplateVar');
$templateVars[9]->fromArray(array (
  'id' => 9,
  'property_preprocess' => false,
  'type' => 'richtext',
  'name' => 'TinymceWrapperCategoryTV3',
  'caption' => 'TinymceWrapperCategoryTV3',
  'description' => '',
  'elements' => '',
  'rank' => 0,
  'display' => 'default',
  'default_text' => '<p>Ace & CodeMirror work just fine</p>',
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
$templateVars[10] = $modx->newObject('modTemplateVar');
$templateVars[10]->fromArray(array (
  'id' => 10,
  'property_preprocess' => false,
  'type' => 'richtext',
  'name' => 'TinymceWrapperCategoryTV4',
  'caption' => 'TinymceWrapperCategoryTV4',
  'description' => '',
  'elements' => '',
  'rank' => 0,
  'display' => 'default',
  'default_text' => '<p>Project Name</p>',
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
$templateVars[11] = $modx->newObject('modTemplateVar');
$templateVars[11]->fromArray(array (
  'id' => 11,
  'property_preprocess' => false,
  'type' => 'richtext',
  'name' => 'TinymceWrapperCategoryTV5',
  'caption' => 'TinymceWrapperCategoryTV5',
  'description' => '',
  'elements' => '',
  'rank' => 0,
  'display' => 'default',
  'default_text' => '<p>Project Name</p>',
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
$templateVars[12] = $modx->newObject('modTemplateVar');
$templateVars[12]->fromArray(array (
  'id' => 12,
  'property_preprocess' => false,
  'type' => 'richtext',
  'name' => 'TinymceWrapperCategoryTV6',
  'caption' => 'TinymceWrapperCategoryTV6',
  'description' => '',
  'elements' => '',
  'rank' => 0,
  'display' => 'default',
  'default_text' => '<p>Project Name</p>',
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
$templateVars[13] = $modx->newObject('modTemplateVar');
$templateVars[13]->fromArray(array (
  'id' => 13,
  'property_preprocess' => false,
  'type' => 'image',
  'name' => 'TinymceWrapperImageTV1',
  'caption' => 'TinymceWrapperImageTV1',
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
    'allowBlank' => 'true',
    'maxLength' => '',
    'minLength' => '',
  ),
  'output_properties' => 
  array (
  ),
), '', true, true);
$templateVars[14] = $modx->newObject('modTemplateVar');
$templateVars[14]->fromArray(array (
  'id' => 14,
  'property_preprocess' => false,
  'type' => 'image',
  'name' => 'TinymceWrapperImageTV2',
  'caption' => 'TinymceWrapperImageTV2',
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
    'allowBlank' => 'true',
    'maxLength' => '',
    'minLength' => '',
  ),
  'output_properties' => 
  array (
  ),
), '', true, true);
$templateVars[15] = $modx->newObject('modTemplateVar');
$templateVars[15]->fromArray(array (
  'id' => 15,
  'property_preprocess' => false,
  'type' => 'image',
  'name' => 'TinymceWrapperImageTV3',
  'caption' => 'TinymceWrapperImageTV3',
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
    'allowBlank' => 'true',
    'maxLength' => '',
    'minLength' => '',
  ),
  'output_properties' => 
  array (
  ),
), '', true, true);
$templateVars[16] = $modx->newObject('modTemplateVar');
$templateVars[16]->fromArray(array (
  'id' => 16,
  'property_preprocess' => false,
  'type' => 'image',
  'name' => 'TinymceWrapperImageTV4',
  'caption' => 'TinymceWrapperImageTV4',
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
    'allowBlank' => 'true',
    'maxLength' => '',
    'minLength' => '',
  ),
  'output_properties' => 
  array (
  ),
), '', true, true);
$templateVars[17] = $modx->newObject('modTemplateVar');
$templateVars[17]->fromArray(array (
  'id' => 17,
  'property_preprocess' => false,
  'type' => 'image',
  'name' => 'TinymceWrapperImageTV5',
  'caption' => 'TinymceWrapperImageTV5',
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
    'allowBlank' => 'true',
    'maxLength' => '',
    'minLength' => '',
  ),
  'output_properties' => 
  array (
  ),
), '', true, true);
$templateVars[18] = $modx->newObject('modTemplateVar');
$templateVars[18]->fromArray(array (
  'id' => 18,
  'property_preprocess' => false,
  'type' => 'image',
  'name' => 'TinymceWrapperImageTV6',
  'caption' => 'TinymceWrapperImageTV6',
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
    'allowBlank' => 'true',
    'maxLength' => '',
    'minLength' => '',
  ),
  'output_properties' => 
  array (
  ),
), '', true, true);
$templateVars[19] = $modx->newObject('modTemplateVar');
$templateVars[19]->fromArray(array (
  'id' => 19,
  'property_preprocess' => false,
  'type' => 'text',
  'name' => 'TinymceWrapperTags',
  'caption' => 'TinymceWrapperTags',
  'description' => 'Supply the name of this TV in TnyMagicPublisher &show and &twTagsTV. Comma-delimetered list of spaceless tags is best',
  'elements' => '',
  'rank' => 0,
  'display' => 'default',
  'default_text' => '',
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
return $templateVars;
