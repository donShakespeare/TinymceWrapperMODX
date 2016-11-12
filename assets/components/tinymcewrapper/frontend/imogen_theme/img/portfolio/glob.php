<?php
echo "[";
$dir = "/home7/nwadibia/public_html/demo/assets/components/tinymcewrapper/frontend/twTemp2/img/portfolio/";
$thumbUrl = "/demo/assets/components/tinymcewrapper/frontend/twTemp2/img/portfolio/";
$thumbParent = dirname($thumbUrl) . PHP_EOL;
$images = glob($dir . "*.{jpg,png,gif}", GLOB_BRACE);
$delim = '';
foreach ($images as $image) {
  $image = pathinfo($image);
  $file = $image["filename"];
  $ext = $image["extension"];
  $fileExt = $file . "." . $ext;
  $thumbSrc = $thumbUrl . $fileExt;
  $thumbParentUrl = $thumbParent . $fileExt;
  echo $delim.'{"name":" '. $file . '","src":"' . $thumbSrc .' ","alt":"Not yet entered","url":"' . $thumbParentUrl . '"}';
  $delim = ',';
}
echo "]";
?>