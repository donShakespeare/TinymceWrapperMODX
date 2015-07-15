<?php
/**
 * templates transport file for TinymceWrapper extra
 *
 * Copyright 2015 by donShakespeare donShakespeare@gmail.com
 * Created on 07-14-2015
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
  'templatename' => 'TinymceWrapper',
  'description' => '',
  'icon' => '',
  'template_type' => 0,
  'properties' => 
  array (
  ),
), '', true, true);
$templates[1]->setContent(file_get_contents($sources['source_core'] . '/elements/templates/tinymcewrapper.template.html'));

return $templates;
