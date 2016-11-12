<?php
/**
 * templates transport file for TinymceWrapper extra
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
/* @var xPDOObject[] $templates */


$templates = array();

$templates[1] = $modx->newObject('modTemplate');
$templates[1]->fromArray(array (
  'id' => 1,
  'property_preprocess' => false,
  'templatename' => 'tw_ImogenTheme',
  'description' => 'Template for backend demo, and awesome frontend magic editing. Each [[!TinyMagicPublisher]] call has the data-tiny attribute to each tag .. data-tiny="np-pagetitle"  ... and then [[*pagetitle:TinyMagicPublisherModifier]]... to use Markdown [[*content:Tiny',
  'icon' => '',
  'template_type' => 0,
  'properties' => 
  array (
  ),
), '', true, true);
$templates[1]->setContent(file_get_contents(MODX_BASE_PATH . 'assets/components/tinymcewrapper/frontend/imogen_theme/index.html'));

$templates[2] = $modx->newObject('modTemplate');
$templates[2]->fromArray(array (
  'id' => 2,
  'property_preprocess' => false,
  'templatename' => 'tw_Empty',
  'description' => 'Empty template to solve the confusion of user\'s MODX setup changing the "empty" template of elFinder and tw_traditional_create_page resources',
  'icon' => '',
  'template_type' => 0,
  'properties' => 
  array (
  ),
), '', true, true);
$templates[2]->setContent(file_get_contents($sources['source_core'] . '/elements/templates/tw_empty.template.html'));

return $templates;
