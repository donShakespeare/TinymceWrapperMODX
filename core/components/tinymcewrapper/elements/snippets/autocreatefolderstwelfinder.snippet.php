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

return $myPersonal;