<?php
/*File location: assets/components/tinymce_wrapper/responsiveMODxConfig.php
use freely, recode freely, report freely, enjoy freely

http://www.leofec.com/modx-revolution/
-donshakespeare in the MODx forum*/

/*
Before you use, go to this include file
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

/*  
-Make sure your upload media folder already exists; for this sample we will use one already in this plugin's folder (assets/components/tinymce_wrapper/uploadMedia/)
-Now calculate how to get to your folder from tinymce_wrapper/responsivefilemanager/filemanager/
-When using MODxs Media Sources and all, and not sure how your client does stuff, use PHP's realpath to auto calculate this relationship 

-To create a new location, follow the strict example below that is commented out
*/

$absolutePathtoUploadFolder = MODX_ASSETS_URL . 'components/tinymce_wrapper/uploadMedia/' . $personalFolder;
$relativePathToUploadFolder = '../../uploadMedia/';
$relativePathToUploadFolderThumbs = '../../uploadMediaThumbs/'; //must be outside uploadMedia folder
$folderMessUrl =  MODX_ASSETS_URL."components/tinymce_wrapper/uploadMedia/"; //appears in the dialogue box

//*****HOW TO CHANGE LOCATION
/*$absolutePathtoUploadFolder = MODX_ASSETS_URL . 'uploadNew/'; //to access /assets/uploadNew/
$relativePathToUploadFolder = '../../../../uploadNew/'; //to access /assets/uploadNew/
$relativePathToUploadFolderThumbs = '../../../../newThumbs/'; //to access /assets/newThumbs/
$folderMessUrl =  MODX_ASSETS_URL."uploadNew/";*/

// auto create custom folders for each user; Example of sweet stuff you can do
$autoCreateUserFolders = false;
if ($autoCreateUserFolders == 1) {
  //if you ever find the MODx Media Source api, check permissions of each user/usergroup, then display Media Source path accordingly
  //grab id and username
  $modxId = $modx->user->get('id'); //you can use usergroup instead of userid
  $myUsername = $modx->user->get('username');
  //create special folder for certain admins
  if ($modx->user->isMember('Administrator')) {
  // if ($modxId == 1 || $modxId == 6) {
    $personalFolder = "admin";
  } 
  else {
  //everyone else gets a unique folder; you can use a safer criterion other than username if you like; encode, shorten, anything you can think of
    $personalFolder = $modx->user->get('username');
  }
  $personalFolder = strtolower($personalFolder);
  $xters = array(" ", "_");
  $personalFolder = str_replace($xters, "-", $personalFolder); //clean up the name

  /*
  -Each user/usergroup can have a config.php copied to their folder for further fine tuning of security
  -Here, we will copy a template .tpl over each time we find one lacking .php
  */
  $userSpecificConfigTemplate = '../../responsivePersonalConfig.tpl';
  $userSpecificConfig = $relativePathToUploadFolder . $personalFolder . '/config.php';
  if (!file_exists($relativePathToUploadFolder . $personalFolder)) {
    mkdir($relativePathToUploadFolder . $personalFolder, 0755, true);
  }
  if (!file_exists($relativePathToUploadFolder . $personalFolder . '/mp3')) {
    mkdir($relativePathToUploadFolder . $personalFolder . '/mp3', 0755, true);
  }
  if (!file_exists($relativePathToUploadFolder . $personalFolder . '/pictures')) {
    mkdir($relativePathToUploadFolder . $personalFolder . '/pictures', 0755, true);
  }
  //the overall boss does not need this new config
  if ($modxId !== 1)
  // if ($modx->user->isMember('Administrator'))
  {
  if (!file_exists($relativePathToUploadFolder . $personalFolder . '/config.php')) {
    copy($userSpecificConfigTemplate, $userSpecificConfig);
    }
  }
  //$config['upload_dir'] must have trailing slash
  if ($personalFolder) {
    $personalFolder = $personalFolder . '/';
  } 
  else {
    $personalFolder = '/';
  }
}

$config['upload_dir'] = $absolutePathtoUploadFolder . $personalFolder;
$config['current_path'] = $relativePathToUploadFolder . $personalFolder;
$config['thumbs_base_path'] = $relativePathToUploadFolderThumbs;
$folder_message = "Hello " . $myUsername . ", this is your folder (" . $folderMessUrl . $personalFolder . "). You may upload images. Right-click items for more info...";
?>
