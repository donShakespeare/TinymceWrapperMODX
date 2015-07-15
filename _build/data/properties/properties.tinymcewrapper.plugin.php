<?php
/**
 * Properties file for TinymceWrapper plugin
 *
 * Copyright 2015 by donShakespeare donShakespeare@gmail.com
 * Created on 07-14-2015
 *
 * @package tinymcewrapper
 * @subpackage build
 */




$properties = array (
  'activateTinyMCE' => 
  array (
    'name' => 'activateTinyMCE',
    'desc' => 'To work, this has to be set to Yes; this plugin will then disable whatever RTE you might have used before now.If set to false, with tvSuperAddict you can use Responsive FileManager for your File/Image TVs, and also use TinyMCE(CDN) for RichTextareaTVs',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => true,
    'lexicon' => NULL,
    'area' => 'Editor Settings',
  ),
  'chunkSuffix' => 
  array (
    'name' => 'chunkSuffix',
    'desc' => 'This plugin will create four chunks for you; it will not override them once created, but you were better off duplicating them.
PLEASE simply add a suffix (_test or -su) to your new name.
TinymceWrapperIntrotext becomes TinymceWrapperIntrotext-test or TinymceWrapperIntrotext-suffix',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => NULL,
    'area' => 'Editor Settings',
  ),
  'disableEnableCheckbox' => 
  array (
    'name' => 'disableEnableCheckbox',
    'desc' => 'Do you want a checkbox to appear before every TinyMCE textarea, to quickly disable/enable a particular TinyMCE?
NOTE: Any changes you make while TinyMCE is disabled will not be saved, UNLESS you re-enable TinyMCE after the change is made, before saving.',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => true,
    'lexicon' => NULL,
    'area' => 'Editor Settings',
  ),
  'jQuery' => 
  array (
    'name' => 'jQuery',
    'desc' => 'This plugin requires jQuery in the order that it is loaded',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'https://code.jquery.com/jquery-2.1.3.min.js',
    'lexicon' => NULL,
    'area' => 'Editor Settings',
  ),
  'responsiveFileManagerPath' => 
  array (
    'name' => 'responsiveFileManagerPath',
    'desc' => 'This allows you to use your very own installation of RFM. Just enter the correct absolute path up to RFM\'s root folder; 
/assets/responsivefilemanager/
   OR  
"+MODx.config.assets_url+"responsivefilemanager/

+trailing dash',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '"+MODx.config.assets_url+"components/tinymcewrapper/responsivefilemanager/',
    'lexicon' => NULL,
    'area' => 'Editor Settings',
  ),
  'tinySrc' => 
  array (
    'name' => 'tinySrc',
    'desc' => 'You may use either TinyMCE"s CDN or TinyMCE located on your own folder
//tinymce.cachefly.net/4.2/tinymce.min.js
(other CDN versions 4, 4.0, 4.1, 4.2)
                      OR
[[++assets_url]]yourTinymce/js/tinymce/tinymce.min.js',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '//tinymce.cachefly.net/4.2/tinymce.min.js',
    'lexicon' => NULL,
    'area' => 'Editor Settings',
  ),
  'tvAddict' => 
  array (
    'name' => 'tvAddict',
    'desc' => 'Do you want your TVs (Rich/File/Image) to be modjacked by this plugin even if you have RTE disabled for the particular resource? This will work even in the Articles Extra (hopefully!)',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => true,
    'lexicon' => NULL,
    'area' => 'Editor Settings',
  ),
  'tvSuperAddict' => 
  array (
    'name' => 'tvSuperAddict',
    'desc' => 'Even though you have another RTE in use (that is, you have set activateTinyMCE to false), you can still use Responsive FileManager for your File/Image TVs, and also use TinyMCE(CDN) for RichTextareaTVs',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => true,
    'lexicon' => NULL,
    'area' => 'Editor Settings',
  ),
  'Content' => 
  array (
    'name' => 'Content',
    'desc' => 'Transform Reource Content textarea?',
    'type' => 'combo-boolean',
    'options' => 
    array (
      0 => 
      array (
        'text' => 'Yes',
        'value' => 'Yes',
        'name' => 'Yes',
      ),
      1 => 
      array (
        'text' => 'No',
        'value' => 'No',
        'name' => 'No',
      ),
    ),
    'value' => true,
    'lexicon' => NULL,
    'area' => 'Textareas to transform',
  ),
  'Description' => 
  array (
    'name' => 'Description',
    'desc' => 'Transform Description textarea?',
    'type' => 'combo-boolean',
    'options' => 
    array (
      0 => 
      array (
        'text' => 'Yes',
        'value' => 'Yes',
        'name' => 'Yes',
      ),
      1 => 
      array (
        'text' => 'No',
        'value' => 'No',
        'name' => 'No',
      ),
    ),
    'value' => true,
    'lexicon' => NULL,
    'area' => 'Textareas to transform',
  ),
  'Introtext' => 
  array (
    'name' => 'Introtext',
    'desc' => 'Transform Introtext textarea?',
    'type' => 'combo-boolean',
    'options' => 
    array (
      0 => 
      array (
        'text' => 'Yes',
        'value' => 'Yes',
        'name' => 'Yes',
      ),
      1 => 
      array (
        'text' => 'No',
        'value' => 'No',
        'name' => 'No',
      ),
    ),
    'value' => true,
    'lexicon' => NULL,
    'area' => 'Textareas to transform',
  ),
  'TVs' => 
  array (
    'name' => 'TVs',
    'desc' => 'Transform Rich TVs textarea?',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => true,
    'lexicon' => NULL,
    'area' => 'Textareas to transform',
  ),
  'fileImageTVs' => 
  array (
    'name' => 'fileImageTVs',
    'desc' => 'You will be able to use Responsive Filemanager to input data in your Fie and Image TVs, hurray! The native method will still be there; at least now you have awesome choices',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => true,
    'lexicon' => NULL,
    'area' => 'Textareas to transform',
  ),
);

return $properties;

