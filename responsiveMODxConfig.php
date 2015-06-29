<?php
// /assets/components/tinymce_wrapper/responsiveMODxConfig.php

/*
Before you use, go to
- /assets/components/tinymce_wrapper/responsivefilemanager/filemanager/config/config.php
- DELETE session_start(); (line 2)
- INSERT include '../../responsiveMODxConfig.php' BEFORE return array_merge() (line338);
- OR just rename config.php-modxReady to config.php
-in this file, define('MODX_CORE_PATH', '/path/to/your/site/core/');
*/
//initialize MODx stuff here
if (!defined('MODX_CORE_PATH')) {
  define('MODX_CORE_PATH', '/path/to/your/site/core/'); //path to your core folder
}
if (!defined('MODX_CONFIG_KEY')) {
  define('MODX_CONFIG_KEY', 'config');
}
require_once (MODX_CORE_PATH . 'model/modx/modx.class.php');
$modx = new modx();
$modx->initialize('web'); // or $modx->initialize('mgr');
//limit access to File Manager, by usergroup or any other criterion you like
if ($modx->user->isMember('Administrator')) {
} 
else {
  die('<div style="position: fixed; margin: auto;width: 400px;height:200px;text-align:center;top:0;bottom:0;left:0;right:0;"><h1>IT SEEMS YOU DO NOT HAVE PERMISSION TO USE THIS COOL MANAGER</h1></div>');
}
$autoCreateUserFolders = false;
// auto create custom folders for each user; Example of sweet stuff you can do
if ($autoCreateUserFolders == 1) {
  //if you ever find the MODx Media Source api, check permissions of each user/usergroup, then display Media Source path accordingly
  //grab id and username
  $modxId = $modx->user->get('id'); //you can use usergroup instead of userid
  $myUsername = $modx->user->get('username');
  //create special folder for certain admins
  if ($modxId == 1 || $modxId == 6) {
    $personalFolder = "admin";
  } 
  else {
    $personalFolder = $modx->user->get('username');
  }
  $personalFolder = strtolower($personalFolder);
  $xters = array(" ", "_");
  $personalFolder = str_replace($xters, "-", $personalFolder); //clean up the name
  //setup MODx folder variables
  //make sure your upload media folder exists
  $userSpecificConfigTemplate = '../../responsivePersonalConfig.tpl';
  $userSpecificConfig = '../../uploadMedia/' . $personalFolder . '/config.php';
  if (!file_exists('../../uploadMedia/' . $personalFolder)) {
    mkdir('../../uploadMedia/' . $personalFolder, 0755, true);
  }
  if (!file_exists('../../uploadMedia/' . $personalFolder . '/mp3')) {
    mkdir('../../uploadMedia/' . $personalFolder . '/mp3', 0755, true);
  }
  if (!file_exists('../../uploadMedia/' . $personalFolder . '/pictures')) {
    mkdir('../../uploadMedia/' . $personalFolder . '/pictures', 0755, true);
  }
  //the boss does not need this
  //for further restriction, copy a personal config.php to every user/usergroup's folder
  // if ($modxId !== 1)
  // {
  if (!file_exists('../../uploadMedia/' . $personalFolder . '/config.php')) {
    copy($userSpecificConfigTemplate, $userSpecificConfig);
    // }
  }
  //$config['upload_dir'] must have trailing slash
  if ($personalFolder) {
    $personalFolder = $personalFolder . '/';
  } 
  else {
    $personalFolder = '/';
  }
}
$config['upload_dir'] = MODX_ASSETS_URL . 'components/tinymce_wrapper/uploadMedia/' . $personalFolder;
//how do I get to tinymce_wrapper/uploadMedia/ from tinymce_wrapper/responsivefilemanager/filemanager/  you may use PHP realpath to auto calculate this relationship
$config['current_path'] = '../../uploadMedia/' . $personalFolder;
$config['thumbs_base_path'] = '../../uploadMediaThumbs/'; //must be outside uploadMedia folder
$folder_message = "Hello " . $myUsername . ", this is your folder (".MODX_ASSETS_URL."components/tinymce_wrapper/uploadMedia/" . $personalFolder . "). You may upload images. Right-click items for more info...";
?>
