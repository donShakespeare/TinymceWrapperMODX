<?php
/**
 * resources transport file for TinymceWrapper extra
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
/* @var xPDOObject[] $resources */


$resources = array();

$resources[1] = $modx->newObject('modResource');
$resources[1]->fromArray(array (
  'id' => 1,
  'type' => 'document',
  'contentType' => 'text/html',
  'pagetitle' => 'TinymceWrapper',
  'longtitle' => '',
  'description' => '<ol>
<li><strong>Esse <em>jowl veniam<br /></em></strong></li>
<li><strong>Short ribs deserunt</strong></li>
<li><strong>Velit bal</strong></li>
</ol>',
  'alias' => 'tinymcewrapper',
  'link_attributes' => '',
  'published' => false,
  'isfolder' => false,
  'introtext' => '<strong>Ut chicken ribeye</strong> do duis corned beef proident. Pariatur meatball brisket reprehenderit andouille beef. Do dolore ut brisket aute nulla voluptate exercitation et ullamco.',
  'richtext' => true,
  'template' => 'TinymceWrapper',
  'menuindex' => 20,
  'searchable' => true,
  'cacheable' => true,
  'createdby' => 1,
  'editedby' => 1,
  'deleted' => false,
  'deletedon' => 0,
  'deletedby' => 0,
  'menutitle' => '',
  'donthit' => false,
  'privateweb' => false,
  'privatemgr' => false,
  'content_dispo' => 0,
  'hidemenu' => false,
  'class_key' => 'modDocument',
  'context_key' => 'web',
  'content_type' => 1,
  'hide_children_in_tree' => 0,
  'show_in_tree' => 1,
  'properties' => NULL,
), '', true, true);
$resources[1]->setContent(file_get_contents($sources['data'].'resources/tinymcewrapper.content.html'));

return $resources;
