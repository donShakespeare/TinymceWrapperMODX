<?php
//TinyMagicPublisherModifier Snippet
//empty value gets default_text for both new and existing docs
if (isset($_GET['edit']) && $_GET['edit'] == 'true' || isset($_GET['create']) && $_GET['create'] == 'true' ) {
  if($input){
    if ($modx->resource->get('createdby') == $modx->user->get('id') ) {
      $legalOWNER = 1;
    }
    if (!$legalOWNER || !$modx->hasPermission('edit_document') && !$modx->hasPermission('new_document') ) {
      return;
    }
    $typesOfResourcesFields = array("pagetitle","alias","menutitle","longtitle","introtext","description","content");
    if(in_array($name, $typesOfResourcesFields)) {
      if($_POST[$name]){
        $name = $_POST[$name];
      }
      else{
        $name = $modx->resource->get($name);
      }
    }
    else{
      if($_POST[$name]){
        if($_POST[$name] == ''){
          $name = '';
        }
        $name = $_POST[$name];
      }
      else{
        $name = $modx->resource->getTVValue($name);
      }
    }
    $name = str_replace(array('[[',']]'),array('{{','}}'),$name);
    return $name;
  }
}