<?php
/*TinymceWrapper elfinderConnector is called by assets/components/tinymcewrapper/browserConnectors/elfinder.php
To use a MODx resource instead of this external file,
simply create your own resource, with empty template and call [[!elfinderConnector@myPropertySet]],
insert the new resource's url in your elFinder.html init, thus replacing the old one.

-------------------Roadmap:
-Add dropbox and AWS
-Add Media Source for File/Image TVs
-Look for more ways to be awesome;
---------------------------

Use freely, recode freely, report freely, enjoy freely
Dedicated to those who have cried
---------------------------

http://www.leofec.com/modx-revolution/
-donshakespeare in the MODx forum
*/
error_reporting(0); // Set E_ALL for debuging

include_once MODX_ASSETS_PATH.'components/tinymcewrapper/elfinder/php/elFinderConnector.class.php';
include_once MODX_ASSETS_PATH.'components/tinymcewrapper/elfinder/php/elFinder.class.php';
include_once MODX_ASSETS_PATH.'components/tinymcewrapper/elfinder/php/elFinderVolumeDriver.class.php';
include_once MODX_ASSETS_PATH.'components/tinymcewrapper/elfinder/php/elFinderVolumeLocalFileSystem.class.php';
// Required for MySQL storage connector
// include_once MODX_ASSETS_PATH.'components/tinymcewrapper/elfinder/php/elFinderVolumeMySQL.class.php';
// Required for FTP connector support
include_once MODX_ASSETS_PATH.'components/tinymcewrapper/elfinder/php/elFinderVolumeFTP.class.php';


/**
 * Simple function to demonstrate how to control file access using "accessControl" callback.
 * This method will disable accessing files/folders starting from  '.' (dot)
 *
 * @param  string  $attr  attribute name (read|write|locked|hidden)
 * @param  string  $path  file path relative to volume root directory started with directory separator
 * @return bool|null
 **/

$sp = $scriptProperties;
$getParam = '';
$getLocation = getMyParams('hide');

$user = $modx->getObject('modUser', array('id' => $modx->user->get('id'))); // get present user infos

$suffix = $modx->getOption('chunkSuffix', $sp);
$enablePersonalFolder = $modx->getOption('enablePersonalFolder', $sp);
$sudoAdmin = $modx->getOption('sudoAdmin', $sp);
$sudoUserGroup = $modx->getOption('sudoUserGroup', $sp);

$sudoAdminIDs = listArray($modx->getOption('sudoAdminIDs', $sp, array()));

$twAutoCreatePersonalFolders = $modx->getOption('twAutoCreatePersonalFolders', $sp);

$uSGr1 = $modx->getOption('location1AccessUserGroup', $sp);
$uSGr2 = $modx->getOption('location2AccessUserGroup', $sp);
$uSGr3 = $modx->getOption('location3AccessUserGroup', $sp);
$uSGr4 = $modx->getOption('location4AccessUserGroup', $sp);
$uSGr5 = $modx->getOption('location5AccessUserGroup', $sp);
$uSGrPersonal = $modx->getOption('locationPersonalAccessUserGroup', $sp);

if(!$user->isMember(listArray($sudoUserGroup.','.$uSGr1.','.$uSGr2.','.$uSGr3.','.$uSGr4.','.$uSGrPersonal))) die;

$location1 = $modx->getOption('location1', $sp);
$location2 = $modx->getOption('location2', $sp);
$location3 = $modx->getOption('location3', $sp);
$location4 = $modx->getOption('location4', $sp);
$location5 = $modx->getOption('location5', $sp);
$locationPersonal = $modx->getOption('locationPersonal', $sp);

$location1Path = $modx->getOption('location1Path', $sp);
$location2Path = $modx->getOption('location2Path', $sp);
$location3Path = $modx->getOption('location3Path', $sp);
$location4Path = $modx->getOption('location4Path', $sp);
$location5Path = $modx->getOption('location5Path', $sp);
$locationPersonalPath = $modx->getOption('locationPersonalPath', $sp);

$location1Url = $modx->getOption('location1Url', $sp);
$location2Url = $modx->getOption('location2Url', $sp);
$location3Url = $modx->getOption('location3Url', $sp);
$location4Url = $modx->getOption('location4Url', $sp);
$location5Url = $modx->getOption('location5Url', $sp);
$locationPersonalUrl = $modx->getOption('locationPersonalUrl', $sp);

$location1tmbPath = $modx->getOption('location1tmbPath', $sp);
$location2tmbPath = $modx->getOption('location2tmbPath', $sp);
$location3tmbPath = $modx->getOption('location3tmbPath', $sp);
$location4tmbPath = $modx->getOption('location4tmbPath', $sp);
$location5tmbPath = $modx->getOption('location5tmbPath', $sp);
$locationPersonaltmbPath = $modx->getOption('locationPersonaltmbPath', $sp);

$location1Quarantine = $modx->getOption('location1Quarantine', $sp);
$location2Quarantine = $modx->getOption('location2Quarantine', $sp);
$location3Quarantine = $modx->getOption('location3Quarantine', $sp);
$location4Quarantine = $modx->getOption('location4Quarantine', $sp);
$location5Quarantine = $modx->getOption('location5Quarantine', $sp);
$locationPersonalQuarantine = $modx->getOption('locationPersonalQuarantine', $sp);

$location1Disabled = $modx->getOption('location1Disabled', $sp);
$location2Disabled = $modx->getOption('location2Disabled', $sp);
$location3Disabled = $modx->getOption('location3Disabled', $sp);
$location4Disabled = $modx->getOption('location4Disabled', $sp);
$location5Disabled = $modx->getOption('location5Disabled', $sp);
$locationPersonalDisabled = $modx->getOption('locationPersonalDisabled', $sp);

$usPer1 = $modx->getOption('location1AccessPermission', $sp);
$usPer2 = $modx->getOption('location2AccessPermission', $sp);
$usPer3 = $modx->getOption('location3AccessPermission', $sp);
$usPer4 = $modx->getOption('location4AccessPermission', $sp);
$usPer5 = $modx->getOption('location5AccessPermission', $sp);
$usPerPersonal = $modx->getOption('locationPersonalAccessPermission', $sp);

function getMyParams($name){
  if (isset($_GET[$name]) && !empty($_GET[$name])) {
    $getParam = filter_var($_GET[$name], FILTER_SANITIZE_STRING);
    $getParam = rawurldecode($getParam);
    return $getParam;
  }
 }

function forMembers($attr, $path, $data, $volume) {
    if (strpos(basename($path), '.') === 0){ //hide .tmb folders
      return (!($attr == 'read' || $attr == 'write'));
    }
    //example of what you can do
   /* if (strpos(basename($path), 'core') === 0 || strpos(basename($path), 'manager') === 0){
      return ($attr !== 'read' && $attr == 'locked');
    }*/
    // if($onlyAdministratorMembers == 1){
    //     if (strpos(dirname($path), '/') !== false){
    //       return !(($attr == 'read' || $attr == 'write'));
    //       // return ($attr == 'read' || $attr == 'locked' || $attr !== 'write');
    //     }
    // }
}

function lockedButVisible($attr, $path, $data, $volume) {
    if (strpos(basename($path), '.') === 0){ //hide .tmb folders
      return (!($attr == 'read' || $attr == 'write'));
    }
    if (strpos(dirname($path), '/') !== false){
         return ($attr == 'read' || $attr == 'locked');
    }
}

function forAdmin($attr, $path, $data, $volume) {
    if (strpos(basename($path), '.') === 0){ //hide all .tmb folders
      return (!($attr == 'read' || $attr == 'write'));
    }
}

function hideThis($attr, $path, $data, $volume) {
    if (strpos(dirname($path), '/') !== false){
         return (!($attr == 'read' || $attr == 'write'));
    }
}

function listArray($thisList){
    $thisList = preg_replace('/\s+/', '', $thisList);
    $thisList = preg_replace("/[^a-z0-9,-_]+/i", ' ', $thisList);
    $thisList = explode(',', $thisList);
    return $thisList;
}

function jDecode($item){
    $json = $item;
    $json = json_decode($json, true);
    return $json;
}

if($sudoAdmin && $user->isMember(listArray($sudoUserGroup))) {
    $usPer1 = $usPer2 = $usPer3 = $usPer4 = $usPerPersonal = '[]';
}

$loc1 = $loc2 = $loc3 = $loc4 = $loc5 = $locPersonal =  array();


// $myModxPermission = 'forMembers';
$myModxPermission = $modx->getOption('myModxPermission', $sp);

// if($user->isMember(listArray($sudoUserGroup)) && getMyParams('unlocked') == 1) {
if(in_array($modx->user->get('id'), $sudoAdminIDs) && getMyParams('unlocked') == 1) {
    $myModxPermission ='forAdmin';
}

$myModxPermission1 = $myModxPermission2 = $myModxPermission3 = $myModxPermission4 = $myModxPermission5 = $myModxPermissionP = $myModxPermission;

$startPath1 = $modx->getOption('location1Path', $sp).getMyParams('folder');
$startPath2 = $modx->getOption('location2Path', $sp).getMyParams('folder');
$startPath3 = $modx->getOption('location3Path', $sp).getMyParams('folder');
$startPath4 = $modx->getOption('location4Path', $sp).getMyParams('folder');
$startPath5 = $modx->getOption('location5Path', $sp).getMyParams('folder');
$startPathPersonal = $modx->getOption('locationPersonalPath', $sp).getMyParams('folder');

//add as many fldrs/locations as you like -- see docs for more wonderful options
//check if browsing user can indeed access this location
//check if this location has a name or it is disabled by being rendered nameless
if($user->isMember(listArray($uSGr1)) && $location1) {
    if (strpos($getLocation, '1') !== false){
        $myModxPermission1 = 'hideThis';
}
    $loc1Properties = array(
        'id'            =>'loc1',
        'driver'        => 'LocalFileSystem',
        'alias'         => $location1,
        'path'          => $location1Path,
        'url'           => $location1Url,
        'tmbPath'       => $location1tmbPath,
        'quarantine'    => $location1Quarantine,
        'disabled'      => $location1Disabled ?:'[]',
        'startPath'     => $startPath1,
        'accessControl' => $myModxPermission1,
        'attributes'    => $usPer1 ?: '[]'
      );
    $loc1 = $modx->getChunk('elfinderLocalFileSystem1'.$suffix , $loc1Properties);
    if($loc1){
        $loc1 = jDecode($loc1);
    }
}

if($user->isMember(listArray($uSGr2)) && $location2) {
    if (strpos($getLocation, '2') !== false){
        $myModxPermission2 = 'hideThis';
    }
    $loc2Properties = array(
        'id'            =>'loc2',
        'driver'        => 'LocalFileSystem',
        'alias'         => $location2,
        'path'          => $location2Path,
        'url'           => $location2Url,
        'tmbPath'       => $location2tmbPath,
        'quarantine'    => $location2Quarantine,
        'disabled'      => $location2Disabled ?:'[]',
        'startPath'     => $startPath2,
        'accessControl' => $myModxPermission2,
        'attributes'    => $usPer2 ?: '[]'
      );
    $loc2 = $modx->getChunk('elfinderLocalFileSystem2'.$suffix , $loc2Properties);
    if($loc2){
        $loc2 = jDecode($loc2);
    }
}

if($user->isMember(listArray($uSGr3)) && $location3) {
    if (strpos($getLocation, '3') !== false){
        $myModxPermission3 = 'hideThis';
    }
    $loc3Properties = array(
        'id'            =>'loc3',
        'driver'        => 'LocalFileSystem',
        'alias'         => $location3,
        'path'          => $location3Path,
        'url'           => $location3Url,
        'tmbPath'       => $location3tmbPath,
        'quarantine'    => $location3Quarantine,
        'disabled'      => $location3Disabled ?:'[]',
        'startPath'     => $startPath3,
        'accessControl' => $myModxPermission3,
        'attributes'    => $usPer3 ?: '[]'
      );
    $loc3 = $modx->getChunk('elfinderLocalFileSystem3'.$suffix , $loc3Properties);
    if($loc3){
        $loc3 = jDecode($loc3);
    }
}

if($user->isMember(listArray($uSGr4)) && $location4) {
    if (strpos($getLocation, '4') !== false){
        $myModxPermission4 = 'hideThis';
    }
    $loc4Properties = array(
        'id'            =>'loc4',
        'driver'        => 'LocalFileSystem',
        'alias'         => $location4,
        'path'          => $location4Path,
        'url'           => $location4Url,
        'tmbPath'       => $location4tmbPath,
        'quarantine'    => $location4Quarantine,
        'disabled'      => $location4Disabled ?:'[]',
        'startPath'     => $startPath4,
        'accessControl' => $myModxPermission4,
        'attributes'    => $usPer4 ?: '[]'
      );
    $loc4 = $modx->getChunk('elfinderLocalFileSystem4'.$suffix , $loc4Properties);
    if($loc4){
        $loc4 = jDecode($loc4);
    }
}

if($user->isMember(listArray($uSGr5)) && $location5) {
    if (strpos($getLocation, '5') !== false){
        $myModxPermission5 = 'hideThis';
    }
    $loc5Properties = array(
        'id'            =>'loc5',
        'driver'        => 'LocalFileSystem',
        'alias'         => $location5,
        'path'          => $location5Path,
        'url'           => $location5Url,
        'tmbPath'       => $location5tmbPath,
        'quarantine'    => $location5Quarantine,
        'disabled'      => $location5Disabled ?:'[]',
        'startPath'     => $startPath5,
        'accessControl' => $myModxPermission5,
        'attributes'    => $usPer5 ?: '[]'
      );
    $loc5 = $modx->getChunk('elfinderLocalFileSystem5'.$suffix , $loc5Properties);
    if($loc5){
        $loc5 = jDecode($loc5);
    }
}
if($user->isMember(listArray($uSGrPersonal)) && $enablePersonalFolder) {
    if (strpos($getLocation, 'p') !== false){
        $myModxPermissionP = 'hideThis';
    }

    $myPersonalFolderName = $modx->runSnippet($twAutoCreatePersonalFolders, array('path'=>$locationPersonalPath));

    $locPersonalProperties = array(
        'id'            => 'locP',
        'driver'        => 'LocalFileSystem',
        'alias'         => $locationPersonal,
        'path'          => $locationPersonalPath.$myPersonalFolderName.'/',
        'url'           => $locationPersonalUrl.$myPersonalFolderName.'/',
        'tmbPath'       => $locationPersonaltmbPath,
        'quarantine'    => $locationPersonalQuarantine,
        'disabled'      => $locationPersonalDisabled ?:'[]',
        'startPath'     => $startPathPersonal,
        'accessControl' => $myModxPermissionP,
        'attributes'    => $usPerPersonal ?: '[]'
      );
    $locPersonal = $modx->getChunk('elfinderLocalFileSystemPersonal'.$suffix , $locPersonalProperties);
    if($locPersonal){
        $locPersonal = jDecode($locPersonal);
    }
}

$opts = array('roots' => array($loc1,$loc2,$loc3,$loc4,$loc5,$locPersonal,$ftp1));
$connector = new elFinderConnector(new elFinder($opts));
$connector->run();