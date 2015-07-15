<?php
/*
This file is included in the config/config.php, line 338
use freely, recode freely, report freely, enjoy freely
http://www.leofec.com/modx-revolution/
*/

/*
Before you use,
- define('MODX_CORE_PATH', '/path/to/your/site/core/');
- for extensive configurations, please see the readme.md in this folder
- always back this file up before you upgrade this Extra
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
-Make sure your upload media folder already exists
-Now calculate how to get to your folder from /assets/responsivefilemanager/filemanager/
-When using MODx' Media Sources and all, and not sure how your client does stuff, use PHP's realpath to auto calculate this relationship 
-At this time I am not certain RFM will work outside public_html. 
-------------------------------------------
------DON'T GET LOST, It's like taking a walk
+FROM:
root: /assets/(2<--)responsivefilemanager/(1<--)filemanager/ <--IamInHere.php
+TO:
root: /assets(-->1)/my_media_folder/ <--IwantToComeHere.php
=RESULT:
I need to get out of 2 folders to hit the assets (which is the only common denominator between TO and FROM)
So I need 2 ../ , and also need to enter ONE new folder
../../my_media_folder/IamNowHereHurray.php
-------------------------------------------
*/


/*
//TO USE OUTSIDE ASSETS FOLDER, CHANGE ACCORDINGLY
$absolutePathtoUploadFolder = '/assets/my_media_folder/'; //folder must exist; can also use MODX_BASE_URL . 'my_media_folder/';
$relativePathToUploadFolder = '../../my_media_folder/'; 
$relativePathToUploadFolderThumbs = '../../my_media_folderThumbs/'; //must be outside UploadFolder
*/

$absolutePathtoUploadFolder = '/source/';
$relativePathToUploadFolder = '../source/';
$relativePathToUploadFolderThumbs = '../thumbs/'; //must be outside UploadFolder
//message that appears in the RFM popup window
function dialogueBoxMessage($thisUserName, $uploadDir){$messageDialog = "Hello <strong>" . $thisUserName . "</strong>, this is your permanent folder <strong>(" . $uploadDir . ")</strong>. You may upload images and other files. Right-click items for more info..."; return $messageDialog;}

//Example of sweet stuff you can do
//auto create custom folders for each user; 
$autoCreateUserFolders = false; //switched off by default
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
  //$personalFolder = strtolower($personalFolder); //OPTIONAL CLEANEUP
  //$xters = array(" ", "_"); //OPTIONAL CLEANEUP
  //$personalFolder = str_replace($xters, "-", $personalFolder); //OPTIONAL CLEANEUP
  //$personalFolder = substr(md5($personalFolder), 0, 8); //OPTIONAL HASHING to hide/convert username to numbers - CHANGE 24 to 8 to make shorter (beware of collision though)

  /*
  -Each user/usergroup can have a config.php copied to their folder for further fine tuning of security
  -Here, we will copy a template .html over each time we find one lacking .php
  */
  $userSpecificConfigTemplate = 'config/config.personal.php';
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

//you'd better left this alone
$config['upload_dir'] = $absolutePathtoUploadFolder . $personalFolder;
$config['current_path'] = $relativePathToUploadFolder . $personalFolder;
$config['thumbs_base_path'] = $relativePathToUploadFolderThumbs;
$folder_message = dialogueBoxMessage($modx->user->get('username'), $config['upload_dir']);
?>
