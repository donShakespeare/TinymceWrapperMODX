<?php
//if you wish to encrypt this name and/or use another userfield, do it here
$myPersonal= $modx->user->get('username');
/////////////////////////////////////////////

//$path is supplied by the calling connector, elFinder or responsivefilemanager
if (!file_exists($path.$myPersonal.'/')) {
    mkdir($path.$myPersonal.'/', 0755, true);
}
//at this time, you may create as many subfolders as you want under $myPersonal
if (!file_exists($path.$myPersonal.'/media/')) {
    mkdir($path.$myPersonal.'/media/', 0755, true);
}

$copyPath = $path.$myPersonal.'/';
$targetFile = $copyPath.'config.php';
$userSpecificConfigTemplate = $modx->getChunk('responsivePersonalConfig');

//copy user-specific config.php to each folder
if ($copyConfig == 1 && $userSpecificConfigTemplate) {
 //  if (!file_exists($targetFile)) { //kill this line if you want to create this config file each time RFM fires.
     $myfile = fopen($targetFile, "w") or die("Unable to open file!");
     fwrite($myfile, $userSpecificConfigTemplate);
     fclose($myfile);
     //} //kill this line if you want to create this config file each time RFM fires.

}

return $myPersonal;