<?php
/**
 * Properties file for TinymceWrapper plugin
 *
 * Copyright 2016 by donShakespeare donShakespeare@gmail.com
 * Created on 05-02-2016
 *
 * @package tinymcewrapper
 * @subpackage build
 */




$properties = array (
  'activateTinyMCE' => 
  array (
    'name' => 'activateTinyMCE',
    'desc' => 'To use TinyMCE, this has to be set to Yes; this plugin will then disable whatever RTE you might have used before now.If set to false, with tvSuperAddict you can use the custom file browsers for your File/Image TVs, and also use TinyMCE(CDN) for RichTextareaTVs',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => true,
    'lexicon' => NULL,
    'area' => '00 Editor Settings',
  ),
  'addTinyMCEloadDelay' => 
  array (
    'name' => 'addTinyMCEloadDelay',
    'desc' => 'Default: 0. When using with an Extra that produces textareas on the fly, you might need a delay. 2100 works with Lingua. The longer the delay, the badder the user experience.',
    'type' => 'numberfield',
    'options' => 
    array (
    ),
    'value' => '0',
    'lexicon' => NULL,
    'area' => '00 Editor Settings',
  ),
  'chunkSuffix' => 
  array (
    'name' => 'chunkSuffix',
    'desc' => 'This plugin will create six chunks for you; it will not override them once created, but you were better off duplicating them.
PLEASE simply add a suffix (_test or -su) to your new name.
TinymceWrapperIntrotext becomes TinymceWrapperIntrotext-test or TinymceWrapperIntrotext-suffix',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => NULL,
    'area' => '00 Editor Settings',
  ),
  'disableEnableCheckbox' => 
  array (
    'name' => 'disableEnableCheckbox',
    'desc' => 'Do you want a checkbox to appear before every TinyMCE textarea, to quickly disable/enable a particular TinyMCE?',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => true,
    'lexicon' => NULL,
    'area' => '00 Editor Settings',
  ),
  'fileManagerTopNavLink' => 
  array (
    'name' => 'fileManagerTopNavLink',
    'desc' => 'Add custom File Manager link to Manager Top Nav > Media drop-down menu (Vanilla JS, no jQuery or TinyMCE loaded).
This will work whether you are using RTE or not, that is, even if activateTinyMCE is set to false; wherever you are in the Manager.',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => true,
    'lexicon' => NULL,
    'area' => '00 Editor Settings',
  ),
  'fileManagerTopNavModal' => 
  array (
    'name' => 'fileManagerTopNavModal',
    'desc' => 'If you want the custom file browser to pop into a modal',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => true,
    'lexicon' => NULL,
    'area' => '00 Editor Settings',
  ),
  'fileManagerTopNavModalSkin' => 
  array (
    'name' => 'fileManagerTopNavModalSkin',
    'desc' => 'Bear in mind, this skin can affect your RTEs, so make the skin calls the same',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'MODx.config.assets_url+"components/tinymcewrapper/tinymceskins/modxPericles"',
    'lexicon' => NULL,
    'area' => '00 Editor Settings',
  ),
  'jQuery' => 
  array (
    'name' => 'jQuery',
    'desc' => 'This plugin requires jQuery in the order that it is loaded. Leave blank if you already have it running in the Manager.',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'https://code.jquery.com/jquery-2.1.3.min.js',
    'lexicon' => NULL,
    'area' => '00 Editor Settings',
  ),
  'newResources' => 
  array (
    'name' => 'newResources',
    'desc' => 'If you set richtext_default in System Settings, new resources will have the RTE clicked automatically.
Do you want TinyMCE to load also, automatically, for the new resource?',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => true,
    'lexicon' => NULL,
    'area' => '00 Editor Settings',
  ),
  'tinySrc' => 
  array (
    'name' => 'tinySrc',
    'desc' => 'You may use either TinyMCE CDN or TinyMCE located on your own folder',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '//cdn.tinymce.com/4/tinymce.min.js',
    'lexicon' => NULL,
    'area' => '00 Editor Settings',
  ),
  'tvAddict' => 
  array (
    'name' => 'tvAddict',
    'desc' => 'Do you want your TVs (Rich/File/Image) to be wrapperjacked by this plugin even if you have RTE disabled for the particular resource? This will work even in the Articles Extra (hopefully!)',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => true,
    'lexicon' => NULL,
    'area' => '00 Editor Settings',
  ),
  'tvSuperAddict' => 
  array (
    'name' => 'tvSuperAddict',
    'desc' => 'Even though you have another RTE in use (that is, you have set activateTinyMCE to false), you can still use the custom filebrowsers for your File/Image TVs, and also use TinyMCE(CDN) for RichTextareaTVs',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => true,
    'lexicon' => NULL,
    'area' => '00 Editor Settings',
  ),
  'TinyJSONGalleryTV' => 
  array (
    'name' => 'TinyJSONGalleryTV',
    'desc' => 'TV to use to transform any Resource into a Gallery. Default is TinyJSONGalleryTV -- Type: Textarea',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'TinyJSONGalleryTV',
    'lexicon' => NULL,
    'area' => '00 Image Gallery',
  ),
  'enableImageGallery' => 
  array (
    'name' => 'enableImageGallery',
    'desc' => 'Presently incomapatible with Image+ and Gallery Extra. Hopefully, either party will resolve the issue before the millennium ends.',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => true,
    'lexicon' => NULL,
    'area' => '00 Image Gallery',
  ),
  'galleryChunkNameKey' => 
  array (
    'name' => 'galleryChunkNameKey',
    'desc' => 'Any Chunk name containing this keyword will be turned into a Gallery',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'myGallery',
    'lexicon' => NULL,
    'area' => '00 Image Gallery',
  ),
  'galleryJSfile' => 
  array (
    'name' => 'galleryJSfile',
    'desc' => 'absolute url to custom file that controls the gallery; if empty, default file will be used = /assets/components/tinymcewrapper/gallery/js/TinyJSONGallery.js',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => NULL,
    'area' => '00 Image Gallery',
  ),
  'imageGalleryIDs' => 
  array (
    'name' => 'imageGalleryIDs',
    'desc' => 'Comma-separated list of chunk id. Any Chunk whose id is here will be turned into a Gallery.',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '0,0,0',
    'lexicon' => NULL,
    'area' => '00 Image Gallery',
  ),
  'tinyJSONGalleryTABposition' => 
  array (
    'name' => 'tinyJSONGalleryTABposition',
    'desc' => 'By default, the Gallery tsb comes first. 0 = first.... 1 , 2 , 10',
    'type' => 'numberfield',
    'options' => 
    array (
    ),
    'value' => '0',
    'lexicon' => NULL,
    'area' => '00 Image Gallery',
  ),
  'tinyJSONGalleryTABtitle' => 
  array (
    'name' => 'tinyJSONGalleryTABtitle',
    'desc' => 'The title on the tab in your resource or chunk.',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'JSON Image Gallery',
    'lexicon' => NULL,
    'area' => '00 Image Gallery',
  ),
  'customJS' => 
  array (
    'name' => 'customJS',
    'desc' => 'For running custom JavaScript in your Manager. Use scenario: any and all other 3rd party MODx Extras within which you wish to use TinyMCE. Or just about any other textarea you find in the MODX Manager',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => NULL,
    'area' => '00 Textareas to transform - et al',
  ),
  'customJSchunks' => 
  array (
    'name' => 'customJSchunks',
    'desc' => 'Comma-separated list of any 3rd party MODX Extras you wish to be infused with TinyMCE. E.G: Gallery,ContentBlocks,ETC,ETC... Then create the corresponding chunk - TinymceWrapperContentBlocks. These chunks also are affected by the chunkSuffix setting. You can use with just about any other textarea you find in the MODX Manager.',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => NULL,
    'area' => '00 Textareas to transform - et al',
  ),
  'AceSrc' => 
  array (
    'name' => 'AceSrc',
    'desc' => 'Toss in latest Ace CDN or local url...never be outdated again! Hurray..!!!',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.4/',
    'lexicon' => NULL,
    'area' => '01 Ace-CodeMirror',
  ),
  'AceTHEME' => 
  array (
    'name' => 'AceTHEME',
    'desc' => '35 themes to work with (BRIGHT and DARK) knock yourself out!',
    'type' => 'list',
    'options' => 
    array (
      0 => 
      array (
        'text' => '(empty)',
        'value' => '',
        'name' => '(empty)',
      ),
      1 => 
      array (
        'text' => 'ambiance',
        'value' => 'ambiance',
        'name' => 'ambiance',
      ),
      2 => 
      array (
        'text' => 'chaos',
        'value' => 'chaos',
        'name' => 'chaos',
      ),
      3 => 
      array (
        'text' => 'chrome',
        'value' => 'chrome',
        'name' => 'chrome',
      ),
      4 => 
      array (
        'text' => 'clouds',
        'value' => 'clouds',
        'name' => 'clouds',
      ),
      5 => 
      array (
        'text' => 'clouds_midnight',
        'value' => 'clouds_midnight',
        'name' => 'clouds_midnight',
      ),
      6 => 
      array (
        'text' => 'cobalt',
        'value' => 'cobalt',
        'name' => 'cobalt',
      ),
      7 => 
      array (
        'text' => 'crimson_editor',
        'value' => 'crimson_editor',
        'name' => 'crimson_editor',
      ),
      8 => 
      array (
        'text' => 'dawn',
        'value' => 'dawn',
        'name' => 'dawn',
      ),
      9 => 
      array (
        'text' => 'dreamweaver',
        'value' => 'dreamweaver',
        'name' => 'dreamweaver',
      ),
      10 => 
      array (
        'text' => 'eclipse',
        'value' => 'eclipse',
        'name' => 'eclipse',
      ),
      11 => 
      array (
        'text' => 'github',
        'value' => 'github',
        'name' => 'github',
      ),
      12 => 
      array (
        'text' => 'gruvbox',
        'value' => 'gruvbox',
        'name' => 'gruvbox',
      ),
      13 => 
      array (
        'text' => 'idle_fingers',
        'value' => 'idle_fingers',
        'name' => 'idle_fingers',
      ),
      14 => 
      array (
        'text' => 'iplastic',
        'value' => 'iplastic',
        'name' => 'iplastic',
      ),
      15 => 
      array (
        'text' => 'katzenmilch',
        'value' => 'katzenmilch',
        'name' => 'katzenmilch',
      ),
      16 => 
      array (
        'text' => 'kr_theme',
        'value' => 'kr_theme',
        'name' => 'kr_theme',
      ),
      17 => 
      array (
        'text' => 'kuroir',
        'value' => 'kuroir',
        'name' => 'kuroir',
      ),
      18 => 
      array (
        'text' => 'merbivore',
        'value' => 'merbivore',
        'name' => 'merbivore',
      ),
      19 => 
      array (
        'text' => 'merbivore_soft',
        'value' => 'merbivore_soft',
        'name' => 'merbivore_soft',
      ),
      20 => 
      array (
        'text' => 'mono_industrial',
        'value' => 'mono_industrial',
        'name' => 'mono_industrial',
      ),
      21 => 
      array (
        'text' => 'monokai',
        'value' => 'monokai',
        'name' => 'monokai',
      ),
      22 => 
      array (
        'text' => 'pastel_on_dark',
        'value' => 'pastel_on_dark',
        'name' => 'pastel_on_dark',
      ),
      23 => 
      array (
        'text' => 'solarized_dark',
        'value' => 'solarized_dark',
        'name' => 'solarized_dark',
      ),
      24 => 
      array (
        'text' => 'solarized_light',
        'value' => 'solarized_light',
        'name' => 'solarized_light',
      ),
      25 => 
      array (
        'text' => 'sqlserver',
        'value' => 'sqlserver',
        'name' => 'sqlserver',
      ),
      26 => 
      array (
        'text' => 'terminal',
        'value' => 'terminal',
        'name' => 'terminal',
      ),
      27 => 
      array (
        'text' => 'textmate',
        'value' => 'textmate',
        'name' => 'textmate',
      ),
      28 => 
      array (
        'text' => 'tomorrow',
        'value' => 'tomorrow',
        'name' => 'tomorrow',
      ),
      29 => 
      array (
        'text' => 'tomorrow_night',
        'value' => 'tomorrow_night',
        'name' => 'tomorrow_night',
      ),
      30 => 
      array (
        'text' => 'tomorrow_night_blue',
        'value' => 'tomorrow_night_blue',
        'name' => 'tomorrow_night_blue',
      ),
      31 => 
      array (
        'text' => 'tomorrow_night_bright',
        'value' => 'tomorrow_night_bright',
        'name' => 'tomorrow_night_bright',
      ),
      32 => 
      array (
        'text' => 'tomorrow_night_eighties',
        'value' => 'tomorrow_night_eighties',
        'name' => 'tomorrow_night_eighties',
      ),
      33 => 
      array (
        'text' => 'twilight',
        'value' => 'twilight',
        'name' => 'twilight',
      ),
      34 => 
      array (
        'text' => 'vibrant_ink',
        'value' => 'vibrant_ink',
        'name' => 'vibrant_ink',
      ),
      35 => 
      array (
        'text' => 'xcode',
        'value' => 'xcode',
        'name' => 'xcode',
      ),
    ),
    'value' => 'chrome',
    'lexicon' => NULL,
    'area' => '01 Ace-CodeMirror',
  ),
  'CodeMirrorSrc' => 
  array (
    'name' => 'CodeMirrorSrc',
    'desc' => 'Toss in latest CodeMirror CDN or local url...never be outdated again! Hurray..!!!',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.17.0/',
    'lexicon' => NULL,
    'area' => '01 Ace-CodeMirror',
  ),
  'CodeMirrorTHEME' => 
  array (
    'name' => 'CodeMirrorTHEME',
    'desc' => '45 themes to work with, knock yourself out! Surely there is one you like?',
    'type' => 'list',
    'options' => 
    array (
      0 => 
      array (
        'text' => '(empty)',
        'value' => '',
        'name' => '(empty)',
      ),
      1 => 
      array (
        'text' => '3024-day',
        'value' => '3024-day',
        'name' => '3024-day',
      ),
      2 => 
      array (
        'text' => '3024-night',
        'value' => '3024-night',
        'name' => '3024-night',
      ),
      3 => 
      array (
        'text' => 'abcdef',
        'value' => 'abcdef',
        'name' => 'abcdef',
      ),
      4 => 
      array (
        'text' => 'ambiance-mobile',
        'value' => 'ambiance-mobile',
        'name' => 'ambiance-mobile',
      ),
      5 => 
      array (
        'text' => 'ambiance',
        'value' => 'ambiance',
        'name' => 'ambiance',
      ),
      6 => 
      array (
        'text' => 'base16-dark',
        'value' => 'base16-dark',
        'name' => 'base16-dark',
      ),
      7 => 
      array (
        'text' => 'base16-light',
        'value' => 'base16-light',
        'name' => 'base16-light',
      ),
      8 => 
      array (
        'text' => 'bespin',
        'value' => 'bespin',
        'name' => 'bespin',
      ),
      9 => 
      array (
        'text' => 'blackboard',
        'value' => 'blackboard',
        'name' => 'blackboard',
      ),
      10 => 
      array (
        'text' => 'cobalt',
        'value' => 'cobalt',
        'name' => 'cobalt',
      ),
      11 => 
      array (
        'text' => 'colorforth',
        'value' => 'colorforth',
        'name' => 'colorforth',
      ),
      12 => 
      array (
        'text' => 'dracula',
        'value' => 'dracula',
        'name' => 'dracula',
      ),
      13 => 
      array (
        'text' => 'eclipse',
        'value' => 'eclipse',
        'name' => 'eclipse',
      ),
      14 => 
      array (
        'text' => 'elegant',
        'value' => 'elegant',
        'name' => 'elegant',
      ),
      15 => 
      array (
        'text' => 'erlang-dark',
        'value' => 'erlang-dark',
        'name' => 'erlang-dark',
      ),
      16 => 
      array (
        'text' => 'hopscotch',
        'value' => 'hopscotch',
        'name' => 'hopscotch',
      ),
      17 => 
      array (
        'text' => 'icecoder',
        'value' => 'icecoder',
        'name' => 'icecoder',
      ),
      18 => 
      array (
        'text' => 'isotope',
        'value' => 'isotope',
        'name' => 'isotope',
      ),
      19 => 
      array (
        'text' => 'lesser-dark',
        'value' => 'lesser-dark',
        'name' => 'lesser-dark',
      ),
      20 => 
      array (
        'text' => 'liquibyte',
        'value' => 'liquibyte',
        'name' => 'liquibyte',
      ),
      21 => 
      array (
        'text' => 'material',
        'value' => 'material',
        'name' => 'material',
      ),
      22 => 
      array (
        'text' => 'mbo',
        'value' => 'mbo',
        'name' => 'mbo',
      ),
      23 => 
      array (
        'text' => 'mdn-like',
        'value' => 'mdn-like',
        'name' => 'mdn-like',
      ),
      24 => 
      array (
        'text' => 'midnight',
        'value' => 'midnight',
        'name' => 'midnight',
      ),
      25 => 
      array (
        'text' => 'monokai',
        'value' => 'monokai',
        'name' => 'monokai',
      ),
      26 => 
      array (
        'text' => 'neat',
        'value' => 'neat',
        'name' => 'neat',
      ),
      27 => 
      array (
        'text' => 'neo',
        'value' => 'neo',
        'name' => 'neo',
      ),
      28 => 
      array (
        'text' => 'night',
        'value' => 'night',
        'name' => 'night',
      ),
      29 => 
      array (
        'text' => 'paraiso-dark',
        'value' => 'paraiso-dark',
        'name' => 'paraiso-dark',
      ),
      30 => 
      array (
        'text' => 'paraiso-light',
        'value' => 'paraiso-light',
        'name' => 'paraiso-light',
      ),
      31 => 
      array (
        'text' => 'pastel-on-dark',
        'value' => 'pastel-on-dark',
        'name' => 'pastel-on-dark',
      ),
      32 => 
      array (
        'text' => 'railscasts',
        'value' => 'railscasts',
        'name' => 'railscasts',
      ),
      33 => 
      array (
        'text' => 'rubyblue',
        'value' => 'rubyblue',
        'name' => 'rubyblue',
      ),
      34 => 
      array (
        'text' => 'seti',
        'value' => 'seti',
        'name' => 'seti',
      ),
      35 => 
      array (
        'text' => 'solarized',
        'value' => 'solarized',
        'name' => 'solarized',
      ),
      36 => 
      array (
        'text' => 'the-matrix',
        'value' => 'the-matrix',
        'name' => 'the-matrix',
      ),
      37 => 
      array (
        'text' => 'tomorrow-night-bright',
        'value' => 'tomorrow-night-bright',
        'name' => 'tomorrow-night-bright',
      ),
      38 => 
      array (
        'text' => 'tomorrow-night-eighties',
        'value' => 'tomorrow-night-eighties',
        'name' => 'tomorrow-night-eighties',
      ),
      39 => 
      array (
        'text' => 'ttcn',
        'value' => 'ttcn',
        'name' => 'ttcn',
      ),
      40 => 
      array (
        'text' => 'twilight',
        'value' => 'twilight',
        'name' => 'twilight',
      ),
      41 => 
      array (
        'text' => 'vibrant-ink',
        'value' => 'vibrant-ink',
        'name' => 'vibrant-ink',
      ),
      42 => 
      array (
        'text' => 'xq-dark',
        'value' => 'xq-dark',
        'name' => 'xq-dark',
      ),
      43 => 
      array (
        'text' => 'xq-light',
        'value' => 'xq-light',
        'name' => 'xq-light',
      ),
      44 => 
      array (
        'text' => 'yeti',
        'value' => 'yeti',
        'name' => 'yeti',
      ),
      45 => 
      array (
        'text' => 'zenburn',
        'value' => 'zenburn',
        'name' => 'zenburn',
      ),
    ),
    'value' => 'elegant',
    'lexicon' => NULL,
    'area' => '01 Ace-CodeMirror',
  ),
  'activateAceOrCodeMirror' => 
  array (
    'name' => 'activateAceOrCodeMirror',
    'desc' => 'If not set to NONE, this plugin will set TinymceWrapper as default element code editor, and thus use Ace or CodeMirror for whatever file/element textareas (including quick update/create) that you specify in the TinymceWrapperCodeMirror chunk. This takes the chunkSuffix as well. Please set this well inorder not to conflict with TinyMCE RTE. And yes, you can use TinyMCE RTE and Ace or CodeMirror same time, one for content, the other for TVs or quick update...have fun! This is also compatible with twCodeMirror.js and twAce.js',
    'type' => 'list',
    'options' => 
    array (
      0 => 
      array (
        'text' => 'Ace',
        'value' => 'Ace',
        'name' => 'Ace',
      ),
      1 => 
      array (
        'text' => 'CodeMirror',
        'value' => 'CodeMirror',
        'name' => 'CodeMirror',
      ),
      2 => 
      array (
        'text' => 'none',
        'value' => '',
        'name' => 'none',
      ),
    ),
    'value' => 'Ace',
    'lexicon' => NULL,
    'area' => '01 Ace-CodeMirror',
  ),
  'activateAceOrCodeMirrorOnNewResource' => 
  array (
    'name' => 'activateAceOrCodeMirrorOnNewResource',
    'desc' => 'New Resources have the option of a code editor. Respects activateAceOrCodeMirrorOnRichText',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => true,
    'lexicon' => NULL,
    'area' => '01 Ace-CodeMirror',
  ),
  'activateAceOrCodeMirrorOnRichText' => 
  array (
    'name' => 'activateAceOrCodeMirrorOnRichText',
    'desc' => 'Prevent Ace or CodeMirror from ever firing when Rich Text is turned on for a particular resource. Respects activateAceOrCodeMirrorOnNewResource and system richtext_default',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => false,
    'lexicon' => NULL,
    'area' => '01 Ace-CodeMirror',
  ),
  'useAceOrCodeMirrorEveryWhere' => 
  array (
    'name' => 'useAceOrCodeMirrorEveryWhere',
    'desc' => 'Experimental - Fires at OnManagerPageInit. Works Manager-wide. No need to be editing a MODX resource or element to load Ace or CodeMirror. You can be at the Dashboard or CMP to use Code Editor- comes in handy when doing Quick Update/Create outside of Resource and elements/files. This option respects useAceOrCodeMirrorOnResources and useAceOrCodeMirrorOnElementsFiles',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => false,
    'lexicon' => NULL,
    'area' => '01 Ace-CodeMirror',
  ),
  'useAceOrCodeMirrorOnElementsFiles' => 
  array (
    'name' => 'useAceOrCodeMirrorOnElementsFiles',
    'desc' => 'Activate Manager pages of Chunks, Snippets, Plugins, Templates and Files',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => true,
    'lexicon' => NULL,
    'area' => '01 Ace-CodeMirror',
  ),
  'useAceOrCodeMirrorOnResources' => 
  array (
    'name' => 'useAceOrCodeMirrorOnResources',
    'desc' => 'You can turn this on or off for Resources',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => true,
    'lexicon' => NULL,
    'area' => '01 Ace-CodeMirror',
  ),
  'Content' => 
  array (
    'name' => 'Content',
    'desc' => 'Transform Resource Content textarea?',
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
    'area' => '01 Textareas to transform',
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
    'area' => '01 Textareas to transform',
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
    'area' => '01 Textareas to transform',
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
    'area' => '01 Textareas to transform',
  ),
  'fileImageTVs' => 
  array (
    'name' => 'fileImageTVs',
    'desc' => 'You will be able to use elFinder,  Responsive FileManager, or the other custom browsers to input data in your File and Image TVs, hurray!',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => true,
    'lexicon' => NULL,
    'area' => '01 Textareas to transform',
  ),
  'quickUpdateCreate' => 
  array (
    'name' => 'quickUpdateCreate',
    'desc' => 'Use TinyMCE to edit/create as many resources as you want at the same time, in the same browser window, thanks to MODX Quick Update/Create and TinyMCE flexibility.',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => true,
    'lexicon' => NULL,
    'area' => '01 Textareas to transform',
  ),
  'autoFileBrowser' => 
  array (
    'name' => 'autoFileBrowser',
    'desc' => 'Please select which awesome file browser to use.',
    'type' => 'list',
    'options' => 
    array (
      0 => 
      array (
        'text' => 'modxNativeBrowser',
        'value' => 'modxNativeBrowser',
        'name' => 'modxNativeBrowser',
      ),
      1 => 
      array (
        'text' => 'elFinderBrowser',
        'value' => 'elFinderBrowser',
        'name' => 'elFinderBrowser',
      ),
      2 => 
      array (
        'text' => 'responsivefilemanagerBrowser',
        'value' => 'responsivefilemanagerBrowser',
        'name' => 'responsivefilemanagerBrowser',
      ),
      3 => 
      array (
        'text' => 'roxyFilemanBrowser',
        'value' => 'roxyFilemanBrowser',
        'name' => 'roxyFilemanBrowser',
      ),
    ),
    'value' => 'elFinderBrowser',
    'lexicon' => NULL,
    'area' => '02 Browser Config',
  ),
  'browserTopNAVsubtext' => 
  array (
    'name' => 'browserTopNAVsubtext',
    'desc' => 'Slogan to appear in your Manager Top Nav dropdown menu.',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'Wonderfully Manage Media',
    'lexicon' => NULL,
    'area' => '02 Browser Config',
  ),
  'replaceDefaultFileImageTVbutton' => 
  array (
    'name' => 'replaceDefaultFileImageTVbutton',
    'desc' => 'When using a custom browser, you may suppress MODX native browser file/image TV button',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => true,
    'lexicon' => NULL,
    'area' => '02 Browser Config',
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
    'area' => '03 Browsers - elFinder',
  ),
  'elFinderBrowserRTEurl' => 
  array (
    'name' => 'elFinderBrowserRTEurl',
    'desc' => 'Something like elfinder.html?unlocked=1&amp;rememberLastDir=1&amp;defaultView=icons',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '[[~[[TinymceWrapperGRF? &amp;knownField=`pagetitle` &amp;kF=`pagetitle` &amp;kFv=`tw_elfinder_browser` &amp;gNuFv=`id`]]? &amp;scheme=`full` &amp;rememberLastDir=`1` &amp;defaultView=`icons` &amp;unlocked=`1` &amp;theme=`windows10`]]',
    'lexicon' => NULL,
    'area' => '03 Browsers - elFinder',
  ),
  'elFinderBrowserSHORTtitle' => 
  array (
    'name' => 'elFinderBrowserSHORTtitle',
    'desc' => '',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'elFinder',
    'lexicon' => NULL,
    'area' => '03 Browsers - elFinder',
  ),
  'elFinderBrowserTopNAVtitle' => 
  array (
    'name' => 'elFinderBrowserTopNAVtitle',
    'desc' => '',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'elFinder File Browser',
    'lexicon' => NULL,
    'area' => '03 Browsers - elFinder',
  ),
  'elFinderBrowserTopNAVurl' => 
  array (
    'name' => 'elFinderBrowserTopNAVurl',
    'desc' => '',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '[[~[[TinymceWrapperGRF? &amp;knownField=`pagetitle` &amp;kF=`pagetitle` &amp;kFv=`tw_elfinder_browser` &amp;gNuFv=`id`]]? &amp;scheme=`full` &amp;rememberLastDir=`1` &amp;defaultView=`icons` &amp;unlocked=`1` &amp;theme=`windows10`]]',
    'lexicon' => NULL,
    'area' => '03 Browsers - elFinder',
  ),
  'modxNativeBrowserQuirkMode' => 
  array (
    'name' => 'modxNativeBrowserQuirkMode',
    'desc' => 'Load MODX File Browser the native way - thanks to Denis from dyranov.ru',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => false,
    'lexicon' => NULL,
    'area' => '04 Browsers - MODx Browser',
  ),
  'modxNativeBrowserRTEtitle' => 
  array (
    'name' => 'modxNativeBrowserRTEtitle',
    'desc' => '',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'MODx Native File Browser',
    'lexicon' => NULL,
    'area' => '04 Browsers - MODx Browser',
  ),
  'modxNativeBrowserRTEurl' => 
  array (
    'name' => 'modxNativeBrowserRTEurl',
    'desc' => '',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'MODx.config["manager_url"] + "index.php?a=" + MODx.action["browser"] + "&amp;source=" + MODx.config["default_media_source"]',
    'lexicon' => NULL,
    'area' => '04 Browsers - MODx Browser',
  ),
  'modxNativeBrowserTopNAVpresent' => 
  array (
    'name' => 'modxNativeBrowserTopNAVpresent',
    'desc' => 'If YES, the MODX native browser link will always show in the Top Nav. If NO, it will only show if a custom browser is not in use.',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => false,
    'lexicon' => NULL,
    'area' => '04 Browsers - MODx Browser',
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
    'area' => '05 Browsers - Responsive FileManager',
  ),
  'responsivefilemanagerBrowserRTEurl' => 
  array (
    'name' => 'responsivefilemanagerBrowserRTEurl',
    'desc' => '',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'MODx.config.assets_url+"components/tinymcewrapper/responsivefilemanager/filemanager/dialog.php?xtype=1"',
    'lexicon' => NULL,
    'area' => '05 Browsers - Responsive FileManager',
  ),
  'responsivefilemanagerBrowserSHORTtitle' => 
  array (
    'name' => 'responsivefilemanagerBrowserSHORTtitle',
    'desc' => '',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'RFM',
    'lexicon' => NULL,
    'area' => '05 Browsers - Responsive FileManager',
  ),
  'responsivefilemanagerBrowserTopNAVtitle' => 
  array (
    'name' => 'responsivefilemanagerBrowserTopNAVtitle',
    'desc' => '',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'Responsive FileManager',
    'lexicon' => NULL,
    'area' => '05 Browsers - Responsive FileManager',
  ),
  'responsivefilemanagerBrowserTopNAVurl' => 
  array (
    'name' => 'responsivefilemanagerBrowserTopNAVurl',
    'desc' => 'Has no ?popup parameter',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'MODx.config.assets_url+\\\'components/tinymcewrapper/responsivefilemanager/filemanager/dialog.php?xtype=0\\\'',
    'lexicon' => NULL,
    'area' => '05 Browsers - Responsive FileManager',
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
    'area' => '06 Browsers - Roxy Fileman',
  ),
  'roxyFilemanBrowserRTEurl' => 
  array (
    'name' => 'roxyFilemanBrowserRTEurl',
    'desc' => '',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'MODx.config.assets_url+"components/tinymcewrapper/roxy/fileman/roxy.php"',
    'lexicon' => NULL,
    'area' => '06 Browsers - Roxy Fileman',
  ),
  'roxyFilemanBrowserSHORTtitle' => 
  array (
    'name' => 'roxyFilemanBrowserSHORTtitle',
    'desc' => '',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'Roxy',
    'lexicon' => NULL,
    'area' => '06 Browsers - Roxy Fileman',
  ),
  'roxyFilemanBrowserTopNAVtitle' => 
  array (
    'name' => 'roxyFilemanBrowserTopNAVtitle',
    'desc' => '',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'Roxy Fileman',
    'lexicon' => NULL,
    'area' => '06 Browsers - Roxy Fileman',
  ),
  'roxyFilemanBrowserTopNAVurl' => 
  array (
    'name' => 'roxyFilemanBrowserTopNAVurl',
    'desc' => '',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'MODx.config.assets_url+\\\'components/tinymcewrapper/roxy/fileman/roxy.php\\\'',
    'lexicon' => NULL,
    'area' => '06 Browsers - Roxy Fileman',
  ),
);

return $properties;

