<?php
/**
 * Properties file for TinyMagicPublisher snippet
 *
 * Copyright 2016 by donShakespeare donShakespeare@gmail.com
 * Created on 05-02-2016
 *
 * @package tinymcewrapper
 * @subpackage build
 */




$properties = array (
  'npPureMagicNonTraditional' => 
  array (
    'name' => 'npPureMagicNonTraditional',
    'desc' => 'Set to YES to use the full features of this Extra with ultra modern contenteditable sweetness. Set to NO to use your old boring existing setup with TinymceWrapper chunks in the frontend.',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => 'Yes',
    'lexicon' => NULL,
    'area' => '00 Activate',
  ),
  'npTraditionalTinyChunk' => 
  array (
    'name' => 'npTraditionalTinyChunk',
    'desc' => '&npPureMagicNonTraditional must be turned off for this to work. Specify the name of chunk you wish to use to house all your frontend TinyMCE code. For backup &chunkSuffix will not affect this, just put in any name you want - of an existing chunk.',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'TinymceWrapperNPtraditional',
    'lexicon' => NULL,
    'area' => '00 Activate',
  ),
  'elFinderBrowserRTEtitle' => 
  array (
    'name' => 'elFinderBrowserRTEtitle',
    'desc' => '',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'elFinder Awesome Browser',
    'lexicon' => NULL,
    'area' => '00 Browsers',
  ),
  'elFinderBrowserRTEurl' => 
  array (
    'name' => 'elFinderBrowserRTEurl',
    'desc' => 'Supply valid url in [[!TinyMagicPublisher? ...]] or custom property set',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => NULL,
    'area' => '00 Browsers',
  ),
  'responsivefilemanagerBrowserRTEtitle' => 
  array (
    'name' => 'responsivefilemanagerBrowserRTEtitle',
    'desc' => '',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'Responsive FileManager',
    'lexicon' => NULL,
    'area' => '00 Browsers',
  ),
  'responsivefilemanagerBrowserRTEurl' => 
  array (
    'name' => 'responsivefilemanagerBrowserRTEurl',
    'desc' => 'Supply valid url in [[!TinyMagicPublisher? ...]] or custom property set',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => NULL,
    'area' => '00 Browsers',
  ),
  'roxyFilemanBrowserRTEtitle' => 
  array (
    'name' => 'roxyFilemanBrowserRTEtitle',
    'desc' => '',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'Roxy Fileman',
    'lexicon' => NULL,
    'area' => '00 Browsers',
  ),
  'roxyFilemanBrowserRTEurl' => 
  array (
    'name' => 'roxyFilemanBrowserRTEurl',
    'desc' => 'Supply valid url in [[!TinyMagicPublisher? ...]] or custom property set',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => NULL,
    'area' => '00 Browsers',
  ),
  'TinyJSONGalleryJS' => 
  array (
    'name' => 'TinyJSONGalleryJS',
    'desc' => 'The url to TinyJSONGallery.js',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => NULL,
    'area' => '00 main',
  ),
  'autoFileBrowser' => 
  array (
    'name' => 'autoFileBrowser',
    'desc' => 'Which custom file browser to use in the frontend? MODx manager file browser is not supported for safe reasons',
    'type' => 'list',
    'options' => 
    array (
      0 => 
      array (
        'text' => 'elFinderBrowser',
        'value' => 'elFinderBrowser',
        'name' => 'elFinderBrowser',
      ),
      1 => 
      array (
        'text' => 'responsivefilemanagerBrowser',
        'value' => 'responsivefilemanagerBrowser',
        'name' => 'responsivefilemanagerBrowser',
      ),
      2 => 
      array (
        'text' => 'roxyFilemanBrowser',
        'value' => 'roxyFilemanBrowser',
        'name' => 'roxyFilemanBrowser',
      ),
    ),
    'value' => 'elFinderBrowser',
    'lexicon' => NULL,
    'area' => '00 main',
  ),
  'cancelCreateButton' => 
  array (
    'name' => 'cancelCreateButton',
    'desc' => '',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'Cancel Create',
    'lexicon' => NULL,
    'area' => '00 main',
  ),
  'cancelEditButton' => 
  array (
    'name' => 'cancelEditButton',
    'desc' => '',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'Cancel',
    'lexicon' => NULL,
    'area' => '00 main',
  ),
  'chunkSuffix' => 
  array (
    'name' => 'chunkSuffix',
    'desc' => '',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => NULL,
    'area' => '00 main',
  ),
  'createNewButton' => 
  array (
    'name' => 'createNewButton',
    'desc' => '',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'New Resource',
    'lexicon' => NULL,
    'area' => '00 main',
  ),
  'editInManagerButton' => 
  array (
    'name' => 'editInManagerButton',
    'desc' => 'Show a button to edit this resource not in the frontend but rather in the MODX Manager backend. Requires the user to have mgr permission',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'Edit in Manager',
    'lexicon' => NULL,
    'area' => '00 main',
  ),
  'editThisButton' => 
  array (
    'name' => 'editThisButton',
    'desc' => '',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'Edit This Page',
    'lexicon' => NULL,
    'area' => '00 main',
  ),
  'editorAdminGroups' => 
  array (
    'name' => 'editorAdminGroups',
    'desc' => 'Comma-separated list of admin groups that can edit any resource.......By default, the NP edit button/TinyMCE will show if the user browsing is also the one who created the resource. But sometimes you want an Admin group(s) to be able to edit other content.',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'Administrator',
    'lexicon' => NULL,
    'area' => '00 main',
  ),
  'galleryBackUpRTEskin' => 
  array (
    'name' => 'galleryBackUpRTEskin',
    'desc' => 'If you don\'t have a skin already loaded on the page, this link will prevent troubles ... make sure it is uniform with the RTEs on your page',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => NULL,
    'area' => '00 main',
  ),
  'jQueryCDN' => 
  array (
    'name' => 'jQueryCDN',
    'desc' => 'Leave empty if you have jQuery loaded already',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'https://code.jquery.com/jquery-2.1.3.min.js',
    'lexicon' => NULL,
    'area' => '00 main',
  ),
  'jsTopBarButtonsTpl' => 
  array (
    'name' => 'jsTopBarButtonsTpl',
    'desc' => 'TinyMCE API code for top bar buttons. Supply chunk name',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'TinymceWrapperNPpublishButtonsTpl',
    'lexicon' => NULL,
    'area' => '00 main',
  ),
  'mainCSS' => 
  array (
    'name' => 'mainCSS',
    'desc' => '',
    'type' => 'textarea',
    'options' => 
    array (
    ),
    'value' => '<style>
.np_button_form {
display: none !important;
}

.mce-tinymce-inline {
border-width: 0 !important;
}

[data-tiny] {
border: 2px dotted #C1ABAB !important;
outline: 0 !important;
border-radius: 10px;
}

[data-tiny].mce-edit-focus {
box-shadow: 0px 2px 20px 1px #C31717;
outline: 0 !important;
border: 0 !important;
}

#twNpContainer {
display: none;
}

.errorMessagesNpTw {
position: fixed;
bottom: 0px;
margin: auto;
width: auto;
left: 0px;
right: 0px;
padding: 20px;
color: #FFF;
text-align: center;
z-index: 99;
font-weight: bold;
display: none;
background: #F00;
}

.publishButtons {
padding: 0;
display: block;
position: fixed;
top: 0px;
right: 0;
left: 0;
margin: auto;
font-weight: bold;
width: 100%;
text-align: center;
z-index: 9999;
font-size: 12px;
}

.publishButtons a {
float: right;
text-transform: uppercase;
display: inline-block;
padding: 15px 20px;
background: rgba(151, 151, 151, 0.99);
color: #fff;
margin: 3px;
box-shadow: 0px 0px 4px 1px #fff;
}

.bubbleNP {
max-width: 100%;
height: 37px;
}

.bubbleNP .mce-btn button {
padding: 4px 10px !important;
}

#tinymceWrapperBubbleNP {
transition: top 75ms ease-out, left 75ms ease-out;
animation: pop-upwards 180ms forwards linear;
position: absolute;
padding: 0;
display: block;
z-index: 9999;
-webkit-border-radius: 6px;
-moz-border-radius: 6px;
-ms-border-radius: 6px;
-o-border-radius: 6px;
border-radius: 6px;
-webkit-box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.75);
-moz-box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.75);
box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.75);
/*  background: -moz-linear-gradient(top, #2ca6f8 0%, #2b8ae2 100%);
background: -webkit-linear-gradient(top, #2ca6f8 0%, #2b8ae2 100%);
background: -o-linear-gradient(top, #2ca6f8 0%, #2b8ae2 100%);
background: -ms-linear-gradient(top, #2ca6f8 0%, #2b8ae2 100%);*/
filter: progid: DXImageTransform.Microsoft.gradient(startColorstr=\'#2ca6f8\', endColorstr=\'#2b8ae2\', GradientType=0);
/*background: linear-gradient(to bottom, #2ca6f8 0%, #2b8ae2 100%);*/
opacity: 0.95;
/*display: none;*/
margin: 0;
list-style: none;
/*padding: 0px 2px;*/
font-family: Arial, Helvetica, "Hiragino Sans GB", sans-serif;
text-rendering: optimizeLegibility;
white-space: nowrap;
}

#tinymceWrapperBubbleNP .mce-toolbar:nth-child(2) {
/*display:none;*/
}

#tinymceWrapperBubbleNP button {
padding: 4px 10px !important;
}

.mce-widget.mce-tooltip {
display: nonwe !important;
}

#tinymceWrapperBubbleNP .mce-panel {
background: none;
}

#tinymceWrapperBubbleNP * {
color: #000 !important;
}

.fixedToolBar {
position: static !important;
margin: 0 auto !important;
display: block !important;
width: 390px;
opacity: 1 !important;
box-shadow: none !important;
}

.fixedToolBar .mce-tinymce-inline{
margin-left: auto !important;
margin-right: auto !important;
}

.mce-popNPfields *{white-space: normal !important;}

</style>',
    'lexicon' => NULL,
    'area' => '00 main',
  ),
  'mainCSSfile' => 
  array (
    'name' => 'mainCSSfile',
    'desc' => 'Use this to load own CSS file, to replace the inline mainCSS ...enter full url to the file',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => NULL,
    'area' => '00 main',
  ),
  'modxGalleryAssetsUrl' => 
  array (
    'name' => 'modxGalleryAssetsUrl',
    'desc' => 'The absolute link to the Assets Folder + traling slash ... site.com/assets/',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => NULL,
    'area' => '00 main',
  ),
  'npCancelCreateId' => 
  array (
    'name' => 'npCancelCreateId',
    'desc' => 'The target resource when Cancel Create link is hit.',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '1',
    'lexicon' => NULL,
    'area' => '00 main',
  ),
  'npCreateOuterTpl' => 
  array (
    'name' => 'npCreateOuterTpl',
    'desc' => 'NewsPublisher outertpl. For creating resources.',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'twCREATEnpOuterTpl',
    'lexicon' => NULL,
    'area' => '00 main',
  ),
  'npCreateResource' => 
  array (
    'name' => 'npCreateResource',
    'desc' => 'You can also create a brand new resource using this snippet. Create a resource and it will be used as the sample, specify the id of this resource here',
    'type' => 'numberfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => NULL,
    'area' => '00 main',
  ),
  'npDebug' => 
  array (
    'name' => 'npDebug',
    'desc' => 'find out what"s happening with NewsPublisher',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => false,
    'lexicon' => NULL,
    'area' => '00 main',
  ),
  'npEditOuterTpl' => 
  array (
    'name' => 'npEditOuterTpl',
    'desc' => 'NewsPublisher outertpl. For editing resources',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'twEDITnpOuterTpl',
    'lexicon' => NULL,
    'area' => '00 main',
  ),
  'npErrorMessages' => 
  array (
    'name' => 'npErrorMessages',
    'desc' => 'It is necessary to have the container class as errorMessagesNpTw',
    'type' => 'textarea',
    'options' => 
    array (
    ),
    'value' => '<div class="errorMessagesNpTw"></div>',
    'lexicon' => NULL,
    'area' => '00 main',
  ),
  'npNoShow' => 
  array (
    'name' => 'npNoShow',
    'desc' => 'Comma-separated list ids - of resources you wish to be uneditable',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => NULL,
    'area' => '00 main',
  ),
  'npNoShowChildOfParents' => 
  array (
    'name' => 'npNoShowChildOfParents',
    'desc' => 'Comma-separated list of parent whose children are to be exempt from displaying "edit" and "create" buttons.',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => NULL,
    'area' => '00 main',
  ),
  'publishButtonCSS' => 
  array (
    'name' => 'publishButtonCSS',
    'desc' => '',
    'type' => 'textarea',
    'options' => 
    array (
    ),
    'value' => '<style>
.np_button_form {
display: none !important;
}
.publishButtons {
padding: 0;
display: block;
border-radius: 50%;
position: fixed;
top: 0px;
right: 0;
left: 0;
margin: auto;
font-weight: bold;
width: 100%;
text-align: center;
z-index: 29999;
font-size: 12px;
}
.publishButtons a {
text-transform: uppercase;
display: inline-block;
padding: 5px;
background: #C31717;
color: #fff;
border-radius: 5px;
margin: 5px;
box-shadow: 0px 0px 4px 1px #fff;
}
</style>',
    'lexicon' => NULL,
    'area' => '00 main',
  ),
  'tinymceCDN' => 
  array (
    'name' => 'tinymceCDN',
    'desc' => '',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '//cdn.tinymce.com/4/tinymce.min.js',
    'lexicon' => NULL,
    'area' => '00 main',
  ),
  'twExistingTagsChunk' => 
  array (
    'name' => 'twExistingTagsChunk',
    'desc' => 'Supply the name of the chunk that contains your site-wide tags setup. E.g use getResources and tagLister to build a list. Follow the demo chunk provided.',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'twExistingTags',
    'lexicon' => NULL,
    'area' => '00 main',
  ),
  'twTagsTV' => 
  array (
    'name' => 'twTagsTV',
    'desc' => 'Supply the exact name of the TV (e.g articlestags) that contains your tags. Preferably, your tags should be comma delimetered.
Make sure you supply this same name in your TinyMagicPublisher call, e.g, &show=`pagetitle,content,articlestags`',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'TinymceWrapperTags',
    'lexicon' => NULL,
    'area' => '00 main',
  ),
  'activetab' => 
  array (
    'name' => 'activetab',
    'desc' => 'np_activetab_desc',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => 'newspublisher:properties',
    'area' => '05 NP - NewsPublisher Control Settings',
  ),
  'allowedtags' => 
  array (
    'name' => 'allowedtags',
    'desc' => 'np_allowedtags_desc',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '<p><br><a><i><em><b><strong><pre><table><th><td><tr><img><span><div><h1><h2><h3><h4><h5><font><ul><ol><li><dl><dt><dd><object><blockquote><code>',
    'lexicon' => 'newspublisher:properties',
    'area' => '05 NP - NewsPublisher Control Settings',
  ),
  'badwords' => 
  array (
    'name' => 'badwords',
    'desc' => 'np_badwords_desc',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => 'newspublisher:properties',
    'area' => '05 NP - NewsPublisher Control Settings',
  ),
  'cancelid' => 
  array (
    'name' => 'cancelid',
    'desc' => 'np_cancelid_desc',
    'type' => 'numberfield',
    'options' => 
    array (
    ),
    'value' => '1',
    'lexicon' => 'newspublisher:properties',
    'area' => '05 NP - NewsPublisher Control Settings',
  ),
  'captions' => 
  array (
    'name' => 'captions',
    'desc' => 'np_captions_desc',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => 'newspublisher:properties',
    'area' => '05 NP - NewsPublisher Control Settings',
  ),
  'clearcache' => 
  array (
    'name' => 'clearcache',
    'desc' => 'np_clearcache_desc',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => true,
    'lexicon' => 'newspublisher:properties',
    'area' => '05 NP - NewsPublisher Control Settings',
  ),
  'contentcols' => 
  array (
    'name' => 'contentcols',
    'desc' => 'np_contentcols_desc',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '60',
    'lexicon' => 'newspublisher:properties',
    'area' => '05 NP - NewsPublisher Control Settings',
  ),
  'contentrows' => 
  array (
    'name' => 'contentrows',
    'desc' => 'np_contentrows_desc',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '10',
    'lexicon' => 'newspublisher:properties',
    'area' => '05 NP - NewsPublisher Control Settings',
  ),
  'cssfile' => 
  array (
    'name' => 'cssfile',
    'desc' => 'np_cssfile_desc',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '0',
    'lexicon' => 'newspublisher:properties',
    'area' => '05 NP - NewsPublisher Control Settings',
  ),
  'groups' => 
  array (
    'name' => 'groups',
    'desc' => 'np_groups_desc',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => 'newspublisher:properties',
    'area' => '05 NP - NewsPublisher Control Settings',
  ),
  'hoverhelp' => 
  array (
    'name' => 'hoverhelp',
    'desc' => 'np_hoverhelp_desc',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => true,
    'lexicon' => 'newspublisher:properties',
    'area' => '05 NP - NewsPublisher Control Settings',
  ),
  'initdatepicker' => 
  array (
    'name' => 'initdatepicker',
    'desc' => 'np_initdatepicker_desc',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => false,
    'lexicon' => 'newspublisher:properties',
    'area' => '05 NP - NewsPublisher Control Settings',
  ),
  'initrte' => 
  array (
    'name' => 'initrte',
    'desc' => 'np_initrte_desc',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => true,
    'lexicon' => 'newspublisher:properties',
    'area' => '05 NP - NewsPublisher Control Settings',
  ),
  'intmaxlength' => 
  array (
    'name' => 'intmaxlength',
    'desc' => 'np_intmaxlength_desc',
    'type' => 'numberfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => 'newspublisher:properties',
    'area' => '05 NP - NewsPublisher Control Settings',
  ),
  'language' => 
  array (
    'name' => 'language',
    'desc' => 'np_language_desc',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => 'newspublisher:properties',
    'area' => '05 NP - NewsPublisher Control Settings',
  ),
  'listboxmax' => 
  array (
    'name' => 'listboxmax',
    'desc' => 'np_listboxmax_desc',
    'type' => 'numberfield',
    'options' => 
    array (
    ),
    'value' => '8',
    'lexicon' => 'newspublisher:properties',
    'area' => '05 NP - NewsPublisher Control Settings',
  ),
  'multiplelistboxmax' => 
  array (
    'name' => 'multiplelistboxmax',
    'desc' => 'np_multiplelistboxmax_desc',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '20',
    'lexicon' => 'newspublisher:properties',
    'area' => '05 NP - NewsPublisher Control Settings',
  ),
  'parents' => 
  array (
    'name' => 'parents',
    'desc' => 'np_parents_desc',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => 'newspublisher:properties',
    'area' => '05 NP - NewsPublisher Control Settings',
  ),
  'postid' => 
  array (
    'name' => 'postid',
    'desc' => 'np_postid_desc',
    'type' => 'numberfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => 'newspublisher:properties',
    'area' => '05 NP - NewsPublisher Control Settings',
  ),
  'prefix' => 
  array (
    'name' => 'prefix',
    'desc' => 'np_prefix_desc',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => 'newspublisher:properties',
    'area' => '05 NP - NewsPublisher Control Settings',
  ),
  'readonly' => 
  array (
    'name' => 'readonly',
    'desc' => 'np_readonly_desc',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => 'newspublisher:properties',
    'area' => '05 NP - NewsPublisher Control Settings',
  ),
  'required' => 
  array (
    'name' => 'required',
    'desc' => 'np_required_desc',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'pagetitle,content',
    'lexicon' => 'newspublisher:properties',
    'area' => '05 NP - NewsPublisher Control Settings',
  ),
  'rtcontent' => 
  array (
    'name' => 'rtcontent',
    'desc' => 'np_rtcontent_desc',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => 'newspublisher:properties',
    'area' => '05 NP - NewsPublisher Control Settings',
  ),
  'rtsummary' => 
  array (
    'name' => 'rtsummary',
    'desc' => 'np_rtsummary_desc',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => 'newspublisher:properties',
    'area' => '05 NP - NewsPublisher Control Settings',
  ),
  'show' => 
  array (
    'name' => 'show',
    'desc' => 'np_show_desc',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'pagetitle,longtitle,hidemenu,published,description,menutitle,pub_date,unpub_date,introtext,content',
    'lexicon' => 'newspublisher:properties',
    'area' => '05 NP - NewsPublisher Control Settings',
  ),
  'stopOnBadTv' => 
  array (
    'name' => 'stopOnBadTv',
    'desc' => 'np_stopOnBadTv_desc',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => true,
    'lexicon' => 'newspublisher:properties',
    'area' => '05 NP - NewsPublisher Control Settings',
  ),
  'summarycols' => 
  array (
    'name' => 'summarycols',
    'desc' => 'np_summarycols_desc',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '60',
    'lexicon' => 'newspublisher:properties',
    'area' => '05 NP - NewsPublisher Control Settings',
  ),
  'summaryrows' => 
  array (
    'name' => 'summaryrows',
    'desc' => 'np_summaryrows_desc',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '10',
    'lexicon' => 'newspublisher:properties',
    'area' => '05 NP - NewsPublisher Control Settings',
  ),
  'tabs' => 
  array (
    'name' => 'tabs',
    'desc' => 'np_tabs_desc',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => 'newspublisher:properties',
    'area' => '05 NP - NewsPublisher Control Settings',
  ),
  'templates' => 
  array (
    'name' => 'templates',
    'desc' => 'np_templates_desc',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => 'newspublisher:properties',
    'area' => '05 NP - NewsPublisher Control Settings',
  ),
  'textmaxlength' => 
  array (
    'name' => 'textmaxlength',
    'desc' => 'np_textmaxlength_desc',
    'type' => 'numberfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => 'newspublisher:properties',
    'area' => '05 NP - NewsPublisher Control Settings',
  ),
  'tinyheight' => 
  array (
    'name' => 'tinyheight',
    'desc' => 'np_tinyheight_desc',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => 'newspublisher:properties',
    'area' => '05 NP - NewsPublisher Control Settings',
  ),
  'tinywidth' => 
  array (
    'name' => 'tinywidth',
    'desc' => 'np_tinywidth_desc',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => 'newspublisher:properties',
    'area' => '05 NP - NewsPublisher Control Settings',
  ),
  'usetabs' => 
  array (
    'name' => 'usetabs',
    'desc' => 'np_usetabs_desc',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => 'newspublisher:properties',
    'area' => '05 NP - NewsPublisher Control Settings',
  ),
  'which_editor' => 
  array (
    'name' => 'which_editor',
    'desc' => 'np_which_editor_desc',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => 'newspublisher:properties',
    'area' => '05 NP - NewsPublisher Control Settings',
  ),
  'aliasdateformat' => 
  array (
    'name' => 'aliasdateformat',
    'desc' => 'np_aliasdateformat_desc',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => 'newspublisher:properties',
    'area' => '05 NP - Resource Field Settings',
  ),
  'aliasprefix' => 
  array (
    'name' => 'aliasprefix',
    'desc' => 'np_aliasprefix_desc',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => 'newspublisher:properties',
    'area' => '05 NP - Resource Field Settings',
  ),
  'aliastitle' => 
  array (
    'name' => 'aliastitle',
    'desc' => 'np_aliastitle_desc',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => true,
    'lexicon' => 'newspublisher:properties',
    'area' => '05 NP - Resource Field Settings',
  ),
  'cacheable' => 
  array (
    'name' => 'cacheable',
    'desc' => 'np_cacheable_desc',
    'type' => 'list',
    'options' => 
    array (
      0 => 
      array (
        'value' => 'System Default',
        'text' => 'System Default',
        'name' => 'System Default',
      ),
      1 => 
      array (
        'value' => 'Yes',
        'text' => 'Yes',
        'name' => 'Yes',
      ),
      2 => 
      array (
        'value' => 'No',
        'text' => 'No',
        'name' => 'No',
      ),
      3 => 
      array (
        'value' => 'Parent',
        'text' => 'Parent',
        'name' => 'Parent',
      ),
    ),
    'value' => 'System Default',
    'lexicon' => 'newspublisher:properties',
    'area' => '05 NP - Resource Field Settings',
  ),
  'classkey' => 
  array (
    'name' => 'classkey',
    'desc' => 'np_classkey_desc',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => 'newspublisher:properties',
    'area' => '05 NP - Resource Field Settings',
  ),
  'hidemenu' => 
  array (
    'name' => 'hidemenu',
    'desc' => 'np_hidemenu_desc',
    'type' => 'list',
    'options' => 
    array (
      0 => 
      array (
        'value' => 'System Default',
        'text' => 'System Default',
        'name' => 'System Default',
      ),
      1 => 
      array (
        'value' => 'Yes',
        'text' => 'Yes',
        'name' => 'Yes',
      ),
      2 => 
      array (
        'value' => 'No',
        'text' => 'No',
        'name' => 'No',
      ),
      3 => 
      array (
        'value' => 'Parent',
        'text' => 'Parent',
        'name' => 'Parent',
      ),
    ),
    'value' => 'System Default',
    'lexicon' => 'newspublisher:properties',
    'area' => '05 NP - Resource Field Settings',
  ),
  'parentid' => 
  array (
    'name' => 'parentid',
    'desc' => 'np_parentid_desc',
    'type' => 'numberfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => 'newspublisher:properties',
    'area' => '05 NP - Resource Field Settings',
  ),
  'published' => 
  array (
    'name' => 'published',
    'desc' => 'np_published_desc',
    'type' => 'list',
    'options' => 
    array (
      0 => 
      array (
        'value' => 'System Default',
        'text' => 'System Default',
        'name' => 'System Default',
      ),
      1 => 
      array (
        'value' => 'Yes',
        'text' => 'Yes',
        'name' => 'Yes',
      ),
      2 => 
      array (
        'value' => 'No',
        'text' => 'No',
        'name' => 'No',
      ),
      3 => 
      array (
        'value' => 'Parent',
        'text' => 'Parent',
        'name' => 'Parent',
      ),
    ),
    'value' => 'System Default',
    'lexicon' => 'newspublisher:properties',
    'area' => '05 NP - Resource Field Settings',
  ),
  'richtext' => 
  array (
    'name' => 'richtext',
    'desc' => 'np_richtext_desc',
    'type' => 'list',
    'options' => 
    array (
      0 => 
      array (
        'value' => 'System Default',
        'text' => 'System Default',
        'name' => 'System Default',
      ),
      1 => 
      array (
        'value' => 'Yes',
        'text' => 'Yes',
        'name' => 'Yes',
      ),
      2 => 
      array (
        'value' => 'No',
        'text' => 'No',
        'name' => 'No',
      ),
      3 => 
      array (
        'value' => 'Parent',
        'text' => 'Parent',
        'name' => 'Parent',
      ),
    ),
    'value' => 'System Default',
    'lexicon' => 'newspublisher:properties',
    'area' => '05 NP - Resource Field Settings',
  ),
  'searchable' => 
  array (
    'name' => 'searchable',
    'desc' => 'np_searchable_desc',
    'type' => 'list',
    'options' => 
    array (
      0 => 
      array (
        'value' => 'System Default',
        'text' => 'System Default',
        'name' => 'System Default',
      ),
      1 => 
      array (
        'value' => 'Yes',
        'text' => 'Yes',
        'name' => 'Yes',
      ),
      2 => 
      array (
        'value' => 'No',
        'text' => 'No',
        'name' => 'No',
      ),
      3 => 
      array (
        'value' => 'Parent',
        'text' => 'Parent',
        'name' => 'Parent',
      ),
    ),
    'value' => 'System Default',
    'lexicon' => 'newspublisher:properties',
    'area' => '05 NP - Resource Field Settings',
  ),
  'template' => 
  array (
    'name' => 'template',
    'desc' => 'np_template_desc',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => 'newspublisher:properties',
    'area' => '05 NP - Resource Field Settings',
  ),
  'booltpl' => 
  array (
    'name' => 'booltpl',
    'desc' => 'np_booltpl_desc',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => 'newspublisher:properties',
    'area' => '05 NP - Tpls',
  ),
  'datetpl' => 
  array (
    'name' => 'datetpl',
    'desc' => 'np_datetpl_desc',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => 'newspublisher:properties',
    'area' => '05 NP - Tpls',
  ),
  'errortpl' => 
  array (
    'name' => 'errortpl',
    'desc' => 'np_errortpl_desc',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => 'newspublisher:properties',
    'area' => '05 NP - Tpls',
  ),
  'fielderrortpl' => 
  array (
    'name' => 'fielderrortpl',
    'desc' => 'np_fielderrortpl_desc',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => 'newspublisher:properties',
    'area' => '05 NP - Tpls',
  ),
  'inttpl' => 
  array (
    'name' => 'inttpl',
    'desc' => 'np_inttpl_desc',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => 'newspublisher:properties',
    'area' => '05 NP - Tpls',
  ),
  'listoptiontpl' => 
  array (
    'name' => 'listoptiontpl',
    'desc' => 'np_listoptiontpl_desc',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => 'newspublisher:properties',
    'area' => '05 NP - Tpls',
  ),
  'optionoutertpl' => 
  array (
    'name' => 'optionoutertpl',
    'desc' => 'np_optionoutertpl_desc',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => 'newspublisher:properties',
    'area' => '05 NP - Tpls',
  ),
  'optiontpl' => 
  array (
    'name' => 'optiontpl',
    'desc' => 'np_optiontpl_desc',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => 'newspublisher:properties',
    'area' => '05 NP - Tpls',
  ),
  'outertpl' => 
  array (
    'name' => 'outertpl',
    'desc' => 'np_outertpl_desc',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => 'newspublisher:properties',
    'area' => '05 NP - Tpls',
  ),
  'texttpl' => 
  array (
    'name' => 'texttpl',
    'desc' => 'np_texttpl_desc',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => 'newspublisher:properties',
    'area' => '05 NP - Tpls',
  ),
);

return $properties;

