<?php
/**
 * snippets transport file for TinymceWrapper extra
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
/* @var xPDOObject[] $snippets */


$snippets = array();

$snippets[1] = $modx->newObject('modSnippet');
$snippets[1]->fromArray(array (
  'id' => 1,
  'property_preprocess' => true,
  'name' => 'responsivefilemanagerConnector',
  'description' => 'This snippet is called by responsivefilemanager/filemanager/config/dialog.php
Observe the chunks and snippets created by TinymceWrapper.
Duplicate and backup to save you from swearing.',
), '', true, true);
$snippets[1]->setContent(file_get_contents($sources['source_core'] . '/elements/snippets/responsivefilemanagerconnector.snippet.php'));


$properties = include $sources['data'].'properties/properties.responsivefilemanagerconnector.snippet.php';
$snippets[1]->setProperties($properties);
unset($properties);

$snippets[2] = $modx->newObject('modSnippet');
$snippets[2]->fromArray(array (
  'id' => 2,
  'property_preprocess' => false,
  'name' => 'autoCreateFoldersTWrfm',
  'description' => 'This snippet auto creates folders for each user',
  'properties' => NULL,
), '', true, true);
$snippets[2]->setContent(file_get_contents($sources['source_core'] . '/elements/snippets/autocreatefolderstwrfm.snippet.php'));

return $snippets;
