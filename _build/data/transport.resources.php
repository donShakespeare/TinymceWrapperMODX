<?php
/**
 * resources transport file for TinymceWrapper extra
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
/* @var xPDOObject[] $resources */


$resources = array();

$resources[1] = $modx->newObject('modResource');
$resources[1]->fromArray(array (
  'id' => 1,
  'type' => 'document',
  'contentType' => 'text/html',
  'pagetitle' => 'TinymceWrapper',
  'longtitle' => '',
  'description' => 'Ultra modern frontend (<strong>TinyMagicPublisher</strong> + <strong>Imogen</strong> Theme) and sanely beautiful <strong>backend</strong> editing. 4 <strong>awesome browsers. </strong>Powerful Gallery manager - <strong>TinyJSON Gallery</strong>',
  'alias' => 'tinymcewrapper',
  'link_attributes' => '',
  'published' => false,
  'isfolder' => true,
  'introtext' => 'Latest elFinder, and Responsive FileManager. You know the game changes when you use TinyJSON Gallery for your images and TinyMagicPublisher for your content',
  'richtext' => true,
  'template' => 'tw_ImogenTheme',
  'menuindex' => 3,
  'searchable' => true,
  'cacheable' => false,
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

$resources[2] = $modx->newObject('modResource');
$resources[2]->fromArray(array (
  'id' => 2,
  'type' => 'document',
  'contentType' => 'text/html',
  'pagetitle' => 'tw_elfinder_browser',
  'longtitle' => '',
  'description' => 'Possible url options: tw_elfinder_browser.html?rememberLastDir=0&useBrowserHistory=0 &folder=assets/etc/etc/&unlocked=1 &hide=234p&defaultView=icons&sort=name&sortDirect=desc &pset=customPSet &theme=windows10(or moono)',
  'alias' => 'elfinder',
  'link_attributes' => '',
  'published' => false,
  'isfolder' => false,
  'introtext' => '',
  'richtext' => false,
  'template' => 'tw_Empty',
  'menuindex' => 0,
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
$resources[2]->setContent(file_get_contents($sources['data'].'resources/tw_elfinder_browser.content.html'));

$resources[3] = $modx->newObject('modResource');
$resources[3]->fromArray(array (
  'id' => 3,
  'type' => 'document',
  'contentType' => 'text/html',
  'pagetitle' => 'tw_magic_create_page',
  'longtitle' => '',
  'description' => 'Use this to control TinyMCE in your NewsPublisher using TinyMagicPublisher. Pure magic!',
  'alias' => 'tw-magic-create-page',
  'link_attributes' => '',
  'published' => false,
  'isfolder' => false,
  'introtext' => 'Article Summary',
  'richtext' => true,
  'template' => 'tw_ImogenTheme',
  'menuindex' => 1,
  'searchable' => true,
  'cacheable' => false,
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
$resources[3]->setContent(file_get_contents($sources['data'].'resources/tw_magic_create_page.content.html'));

$resources[4] = $modx->newObject('modResource');
$resources[4]->fromArray(array (
  'id' => 4,
  'type' => 'document',
  'contentType' => 'text/html',
  'pagetitle' => 'tw_traditional_create_page',
  'longtitle' => '',
  'description' => 'Use this to control TinyMCE in your NewsPublisher, the traditional way. No contenteditables, no magic!',
  'alias' => 'tw-traditional-create-page',
  'link_attributes' => '',
  'published' => false,
  'isfolder' => true,
  'introtext' => 'Article Summary',
  'richtext' => false,
  'template' => 'tw_Empty',
  'menuindex' => 2,
  'searchable' => true,
  'cacheable' => false,
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
$resources[4]->setContent(file_get_contents($sources['data'].'resources/tw_traditional_create_page.content.html'));

return $resources;
