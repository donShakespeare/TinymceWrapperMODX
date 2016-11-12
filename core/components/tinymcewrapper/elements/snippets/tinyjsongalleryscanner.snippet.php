<?php
/*
TinyJSON Gallery Scanner Snippet for TinymceWrapper
http://www.leofec.com/modx-revolution/
-donshakespeare in the MODx forum
Copyright 2015
*/
$autoCreateThumb = $modx->getOption("autoCreateThumb", $scriptProperties);
$justJSON = $modx->getOption("justJSON", $scriptProperties);
$options = $modx->getOption("options", $scriptProperties);
$partialOp = explode(',', $options);
$optionsArray = array();
array_walk($partialOp, function($val,$key) use(&$optionsArray){
  list($key, $value) = explode('=', $val);
  $optionsArray[$key] = $value;
});
$options = $optionsArray;
//get inputedPath plus base, whether user has autoCreateThumb on or not
$inputedFullPath = MODX_BASE_PATH . $modx->getOption("inputedPath", $scriptProperties);
//full url to full image
$largeUrl = MODX_BASE_URL . $modx->getOption("inputedPath", $scriptProperties);
//full path to thumb image if autoCreateThumb is on
$thumbPath = MODX_BASE_PATH . $modx->getOption("inputedPath", $scriptProperties) . "thumb/";
//full url to full image if autoCreateThumb is off, and user has own thumbs(must be child of parent folder :) )
$thumbParentUrl = dirname($largeUrl) . "/";
$thumbUrl = $thumbParentUrl . "thumb/";
$thumbInfo = '';
echo '<html><head><script>parent.loadingThrobber(0)</script></head><body style="word-break: break-all;font-size: 14px;">';
if ($autoCreateThumb == 1 && $options !== 0) {
  $thumbParentUrl = $largeUrl;
  $thumbUrl = $largeUrl . "thumb/";
  if ($justJSON == 0) {
    $thumbInfo = '<br><b>THUMBNAILS</b> <i>have been regenerated in thumb folder</i>';
  }
}

if (file_exists($inputedFullPath)) {
  if ($autoCreateThumb && $justJSON == 0) {
    if (!file_exists($thumbPath)) {
      mkdir($thumbPath, 0777, true);
    }
    $checkResizer = MODX_CORE_PATH . 'components/resizer/model/';
    if (file_exists($checkResizer)) {
      $modx->loadClass('Resizer', MODX_CORE_PATH . 'components/resizer/model/', true, true);
      $resizer = new Resizer($modx);
      $resizer->debug = true;
    }
    if(!$resizer){
      $thumbInfo = '<br><b><a href="https://modx.com/extras/package/resizer" target="_blank">MODX Resizer</a></b> <i> is needed to create thumbnails<br>&justJSON was set to 0 - but no thumbs was created, only JSON</i>';
    }
  }
  $images = glob($inputedFullPath . "*.{jpg,png,gif}", GLOB_BRACE);
  if ($images) {
    $comma = '';
    $output = "<b>SCANNING:  </b><i>" . $inputedFullPath . "</i><br><br><div spellcheck='false' contenteditable='true' style='border:2px dotted red; height: 200px !important;font-size: 12px; overflow: auto;overflow-x: hidden'>[";
    $output.= '<b>{"Location": "' . $modx->getOption("inputedPath", $scriptProperties) . '&autoCreateThumb='.$autoCreateThumb.'&justJSON='.$justJSON.'&options='.$modx->getOption("options", $scriptProperties).'"},</b>';
    $index = 0;
    foreach ($images as $image) {
      $index ++;
      $timeStamp = filemtime($image);
      $image = pathinfo($image);
      $file = $image["filename"];
      $ext = $image["extension"];
      $fileExt = $file . "." . $ext;
      $thumbSrc = $thumbUrl . $fileExt;
      $thumbParentUrlFname = $thumbParentUrl . $fileExt;
      if ($justJSON == 0 && $autoCreateThumb == 1 && $options !== 0) {
        if($resizer){
          $resizer->processImage($inputedFullPath . $fileExt, $thumbPath . $fileExt, $options);
        }
      }
      $cleanfile = preg_replace('/[^A-Za-z0-9\-]/', ' ', $file);
      $output.= $comma . '{"name":"' . $file.'.'.$ext . '","src":"' . $thumbSrc . '","url":"' . $thumbParentUrlFname . '","hidden":"0","desc":"' . $cleanfile . '","index":"' . $index . '","time":"' . $timeStamp . '","tag":"","lerror":"0"}';
      $comma = ',';
    }
    $output.= "]</div><br><b>COPY CODE ABOVE</b> <i>and paste over your current JSON, and then press the option 'Build from Current JSON'</i><br>".$thumbInfo."</body></html>";
    return $output;
  } 
  else {
    echo "<br><br><br>No valid files (jpg,png,gif) in <b>" . $modx->getOption("inputedPath", $scriptProperties) . "</b>";
  }
} 
else {
  echo "<br><br><br>The folder  <b>" . $modx->getOption("inputedPath", $scriptProperties) . "</b> does not exist";
}
echo '</body></html>';