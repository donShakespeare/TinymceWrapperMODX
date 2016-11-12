<?php
//initialise MODx
require_once dirname(dirname(dirname(dirname(dirname(__FILE__)))))."/config.core.php";
require_once MODX_CORE_PATH.'model/modx/modx.class.php';
$modx = new modX();
$modx->initialize('web'); //or mgr or any content you like
$modx->getService('error','error.modError', '', '');

//kill direct access to non members of your site
if($modx->user->get('id') == 0){
    die('<div style="position: fixed; margin: auto;width: 400px;height:200px;text-align:center;top:0;bottom:0;left:0;right:0;"><h1>IT SEEMS YOU DO NOT HAVE PERMISSION TO USE THIS COOL MANAGER</h1>BEG SOMEONE TO GRANT YOU PERMISSION</div>');
}

//get default properties of elfinder snippet
$pSproperties = $modx->getObject('modSnippet',array('name'=>'elfinderConnector'))->getProperties();

//get custom property set from url
$mySet = '';
if (isset($_GET["pset"]) && !empty($_GET["pset"])) {
  $getParam = filter_var($_GET["pset"], FILTER_SANITIZE_STRING);
  $mySet = $getParam;
}

//run nippet with specified property set
$modx->parser->getElement('modSnippet', 'elfinderConnector@'.$mySet)->process();