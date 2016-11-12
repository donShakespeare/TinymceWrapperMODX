<?php
//uncomment the below if you copy this snippet to RFM config.php
//initialize MODx stuff here - grab user's config file
require_once dirname(dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))))."/config.core.php";
require_once MODX_CORE_PATH.'model/modx/modx.class.php';
$modx = new modX();
$modx->initialize('web'); //or mgr or any content you like
$modx->getService('error','error.modError', '', '');
////////////////////////////////////////////////////////////////////////

//grab Custom Property Set from url parameter
$mySet = (isset($_SESSION['pset']) && !empty($_SESSION['pset'])) ? $_SESSION['pset'] : '';

//grab the properties or else this script will not work
$pSproperties = $modx->getObject('modSnippet',array('name'=>'responsivefilemanagerConnector'))->getProperties();
//get snippet with specified property set
return $modx->parser->getElement('modSnippet', 'responsivefilemanagerConnector@'.$mySet)->process();
//to use another propertyset dynamically go to
                      //----- dialog.php?pset=myCustomSet
//to use another propertyset as default, alter the above to
                      //----- $responsivefilemanager = $modx->parser->getElement('modSnippet', 'responsivefilemanagerConnector@myCustomSet')->process();
