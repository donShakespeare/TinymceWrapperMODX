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
  'name' => 'elfinderConnector',
  'description' => 'Web file manager Version: 2.1.6, protocol version: 2.0 jQuery/jQuery UI: 1.8.0/1.8.23
This snippet is called by assets/components/tinymcewrapper/browserConnectors/elfinder.php',
), '', true, true);
$snippets[1]->setContent(file_get_contents($sources['source_core'] . '/elements/snippets/elfinderconnector.snippet.php'));


$properties = include $sources['data'].'properties/properties.elfinderconnector.snippet.php';
$snippets[1]->setProperties($properties);
unset($properties);

$snippets[2] = $modx->newObject('modSnippet');
$snippets[2]->fromArray(array (
  'id' => 2,
  'property_preprocess' => false,
  'name' => 'autoCreateFoldersTWelfinder',
  'description' => 'This snippet auto creates folders for each user',
  'properties' => NULL,
), '', true, true);
$snippets[2]->setContent(file_get_contents($sources['source_core'] . '/elements/snippets/autocreatefolderstwelfinder.snippet.php'));

return $snippets;
