<?php
/*
TinyJSON Gallery Connector for TinymceWrapper (TinyJSON Gallery Scanner Snippet)
http://www.leofec.com/modx-revolution/
-donshakespeare in the MODx forum
Copyright 2015
*/
require_once dirname(dirname(dirname(dirname(dirname(dirname(__FILE__))))))."/config.core.php";
require_once MODX_CORE_PATH.'model/modx/modx.class.php';
$modx = new modX();
$modx->initialize('web'); //or mgr or any content you like
$modx->getService('error','error.modError', '', '');
if (!$modx->hasPermission('edit_chunk') || !$modx->hasPermission('file_upload')) {
  die("no permission");
}
if (isset($_GET['path']) && !empty($_GET['path'])) {
  $path = filter_var($_GET['path'], FILTER_SANITIZE_STRING);
  $path = rawurldecode($path);
  $autoCreateThumb = 0;
  $justJSON = 1;
  $options = 0;
  if (isset($_GET['autoCreateThumb'], $_GET['justJSON']) && $_GET['autoCreateThumb'] == 1) {
    $autoCreateThumb = filter_var($_GET['autoCreateThumb'], FILTER_SANITIZE_STRING);
    $justJSON = filter_var($_GET['justJSON'], FILTER_SANITIZE_STRING);
    if (isset($_GET['options']) && !empty($_GET['options'])) {
      $options = filter_var($_GET['options'], FILTER_SANITIZE_STRING);
    }
  }

$gallery = $modx->runSnippet("TinyJSONGalleryScanner",array(
  "inputedPath"=>$path,
  "autoCreateThumb"=>$autoCreateThumb,
  "justJSON"=>$justJSON,
  "options"=>$options
  )
);
echo $gallery;
}
else{
  die("Invalid ununderstandable non-human error");
}