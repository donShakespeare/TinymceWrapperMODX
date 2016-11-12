<?php
$galleryChunkOrJson = json_decode($galleryChunkOrJson, true);
$output = '';
$tpl = $modx->getOption('tpl', $scriptProperties);
$i = 0;
$isFirst = true;
foreach ($galleryChunkOrJson as $gallery) {
  if ($isFirst) {
    $isFirst = false;
	continue;
  }
  if($gallery['hidden'] == 1){
  continue;
  }
  $gallery['rowCls'] = $rowCls;
  $gallery['linkCls'] = $linkCls;
  $gallery['imgCls'] = $imgCls;
  $gallery['idx'] = $i++;
  $output.= $modx->getChunk($tpl, $gallery);
}
return $output;