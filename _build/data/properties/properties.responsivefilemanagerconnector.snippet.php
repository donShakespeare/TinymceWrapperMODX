<?php
/**
 * Properties file for responsivefilemanagerConnector snippet
 *
 * Copyright 2016 by donShakespeare donShakespeare@gmail.com
 * Created on 05-02-2016
 *
 * @package tinymcewrapper
 * @subpackage build
 */




$properties = array (
  'activatePersonalFolders' => 
  array (
    'name' => 'activatePersonalFolders',
    'desc' => 'auto create any number of folders under users\' personal folder. E.g example.com/john/ will be created .... and example.com/john/images/ and example.com/john/mp3/. Please find RFM snippet to configure. Note...user will not be able to access any folder higher',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => false,
    'lexicon' => NULL,
    'area' => '00 main',
  ),
  'autoCreateFoldersTWrfmSnippet' => 
  array (
    'name' => 'autoCreateFoldersTWrfmSnippet',
    'desc' => 'If you have activatePersonalFolders and copyConfig set to true, and want to further customize each user\'s folder, this snippet runs all the code necessary. It will also use responsivePersonalConfig chunk template for further security.',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'autoCreateFoldersTWrfm',
    'lexicon' => NULL,
    'area' => '00 main',
  ),
  'copyConfig' => 
  array (
    'name' => 'copyConfig',
    'desc' => 'if you have activatePersonalFolders set to true, and want to further customize each user\'s folder, auto copy a small config.php file to each folder',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => true,
    'lexicon' => NULL,
    'area' => '00 main',
  ),
  'noAccessMessage' => 
  array (
    'name' => 'noAccessMessage',
    'desc' => '',
    'type' => 'textarea',
    'options' => 
    array (
    ),
    'value' => '<div style="position: fixed; margin: auto;width: 400px;height:200px;text-align:center;top:0;bottom:0;left:0;right:0;"><h1>IT SEEMS YOU DO NOT HAVE PERMISSION TO USE THIS COOL MANAGER</h1>BEG SOMEONE TO PROMOTE YOU.</div>',
    'lexicon' => NULL,
    'area' => '00 main',
  ),
  'responsivePersonalConfig' => 
  array (
    'name' => 'responsivePersonalConfig',
    'desc' => 'If you have activatePersonalFolders and copyConfig set to true, and want to further customize each user\'s folder, this chunk template will be transformed into a small config.php file for each user\'s folder. This chunk is dealt with by the autoCreateFoldersTWrfmSnippet option',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'responsivePersonalConfig',
    'lexicon' => NULL,
    'area' => '00 main',
  ),
  'rfmUserGroups' => 
  array (
    'name' => 'rfmUserGroups',
    'desc' => 'Comma-separated list of Who can access RFM',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'Administrator, BlogEditors',
    'lexicon' => NULL,
    'area' => '00 main',
  ),
  'DEBUG_ERROR_MESSAGE_modx' => 
  array (
    'name' => 'DEBUG_ERROR_MESSAGE_modx',
    'desc' => '',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => true,
    'lexicon' => NULL,
    'area' => '01 main',
  ),
  'USE_ACCESS_KEYS_modx' => 
  array (
    'name' => 'USE_ACCESS_KEYS_modx',
    'desc' => 'if set to true only those will access RF whose url contains the access key(akey) like:
input type="button" href="../filemanager/dialog.php?field_id=imgField&amp;lang=en_EN&amp;akey=myPrivateKey" value="Files"
| in tinymce a new parameter added: filemanager_access_key:"myPrivateKey" example tinymce config:   
tiny init ...
external_filemanager_path:"../filemanager/",
filemanager_title:"Filemanager" ,
filemanager_access_key:"myPrivateKey" ,',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => false,
    'lexicon' => NULL,
    'area' => '01 main',
  ),
  'absolutePATHtoUploadFolder_modx' => 
  array (
    'name' => 'absolutePATHtoUploadFolder_modx',
    'desc' => 'Please provide the corresponding /full/path/to/your/site/assets/upload/folder/ if you have personal folders activated.
In MODx, [[++base_path]] and [[++base_url]]',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '[[++assets_path]]',
    'lexicon' => NULL,
    'area' => '01 main',
  ),
  'absoluteURLtoUploadFolder_modx' => 
  array (
    'name' => 'absoluteURLtoUploadFolder_modx',
    'desc' => 'path from base_url to base of upload folder with start and final / e.g /path/to/your/site/assets',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '[[++assets_url]]',
    'lexicon' => NULL,
    'area' => '01 main',
  ),
  'access_keys_modx' => 
  array (
    'name' => 'access_keys_modx',
    'desc' => 'Comma-separated: add access keys eg: array("myPrivateKey", "someoneElseKey");
 keys should only containt (a-z A-Z 0-9 \\ . _ -) characters
 if you are integrating lets say to a cms for admins, i recommend making keys randomized something like this:
 $username = "Admin";
 $salt = "dsflFWR9u2xQa" (a hard coded string)
 $akey = md5($username.$salt);
 DO NOT use "key" as access key!
 Keys are CASE SENSITIVE!',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'hardPassword, toughGuy',
    'lexicon' => NULL,
    'area' => '01 main',
  ),
  'relativePathToUploadFolderThumbs_modx' => 
  array (
    'name' => 'relativePathToUploadFolderThumbs_modx',
    'desc' => 'DO NOT put inside upload folder',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '../../../../thumbs/',
    'lexicon' => NULL,
    'area' => '01 main',
  ),
  'relativePathToUploadFolder_modx' => 
  array (
    'name' => 'relativePathToUploadFolder_modx',
    'desc' => 'relative path from filemanager folder to upload folder with final / . Remember Responsive FileManager is FIVE folders away from your base/root folder. You need FIVE SLASHES to get there, and FOUR SLASHES to get to assets.',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '../../../../',
    'lexicon' => NULL,
    'area' => '01 main',
  ),
  'MaxSizeTotal_modx' => 
  array (
    'name' => 'MaxSizeTotal_modx',
    'desc' => 'Maximum size of all files in source folder (in Megabytes)',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => false,
    'lexicon' => NULL,
    'area' => '02 main',
  ),
  'MaxSizeUpload_modx' => 
  array (
    'name' => 'MaxSizeUpload_modx',
    'desc' => 'Maximum upload size - in Megabytes',
    'type' => 'numberfield',
    'options' => 
    array (
    ),
    'value' => '100',
    'lexicon' => NULL,
    'area' => '02 main',
  ),
  'convert_spaces_modx' => 
  array (
    'name' => 'convert_spaces_modx',
    'desc' => 'convert all spaces on files name and folders name with $replace_with variable',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => NULL,
    'area' => '02 main',
  ),
  'default_language_modx' => 
  array (
    'name' => 'default_language_modx',
    'desc' => '',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'en_EN',
    'lexicon' => NULL,
    'area' => '02 main',
  ),
  'folder_message_modx' => 
  array (
    'name' => 'folder_message_modx',
    'desc' => '',
    'type' => 'textarea',
    'options' => 
    array (
    ),
    'value' => 'Hi [[+modx.user.username]], welcome to the zone',
    'lexicon' => NULL,
    'area' => '02 main',
  ),
  'icon_theme_modx' => 
  array (
    'name' => 'icon_theme_modx',
    'desc' => 'Can be set to custom icon inside filemanager/img',
    'type' => 'list',
    'options' => 
    array (
      0 => 
      array (
        'text' => 'ico',
        'value' => 'ico',
        'name' => 'ico',
      ),
      1 => 
      array (
        'text' => 'ico_dark',
        'value' => 'ico_dark',
        'name' => 'ico_dark',
      ),
    ),
    'value' => 'ico',
    'lexicon' => NULL,
    'area' => '02 main',
  ),
  'lazy_loading_file_number_threshold_modx' => 
  array (
    'name' => 'lazy_loading_file_number_threshold_modx',
    'desc' => '-1: There is no lazy loading at all, 0: Always lazy-load images, 0+: The minimum number of the files in a directory
 when lazy loading should be turned on.',
    'type' => 'numberfield',
    'options' => 
    array (
    ),
    'value' => '0',
    'lexicon' => NULL,
    'area' => '02 main',
  ),
  'lower_case_modx' => 
  array (
    'name' => 'lower_case_modx',
    'desc' => 'convert to lowercase the files and folders name',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => false,
    'lexicon' => NULL,
    'area' => '02 main',
  ),
  'replace_with_modx' => 
  array (
    'name' => 'replace_with_modx',
    'desc' => 'convert all spaces on files name and folders name this value
',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '_',
    'lexicon' => NULL,
    'area' => '02 main',
  ),
  'show_filter_buttons_modx' => 
  array (
    'name' => 'show_filter_buttons_modx',
    'desc' => 'Show or not show filters button in filemanager',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => true,
    'lexicon' => NULL,
    'area' => '02 main',
  ),
  'show_folder_size_modx' => 
  array (
    'name' => 'show_folder_size_modx',
    'desc' => 'Show or not show folder size in list view feature in filemanager (is possible, if there is a large folder, to greatly increase the calculations)
',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => true,
    'lexicon' => NULL,
    'area' => '02 main',
  ),
  'show_language_selection_modx' => 
  array (
    'name' => 'show_language_selection_modx',
    'desc' => 'Show or not language selection feature in filemanager',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => 'false',
    'lexicon' => NULL,
    'area' => '02 main',
  ),
  'show_sorting_bar_modx' => 
  array (
    'name' => 'show_sorting_bar_modx',
    'desc' => 'Show or not show sorting feature in filemanager
',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => true,
    'lexicon' => NULL,
    'area' => '02 main',
  ),
  'show_total_size_modx' => 
  array (
    'name' => 'show_total_size_modx',
    'desc' => 'Show or not total size in filemanager (is possible to greatly increase the calculations)',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => false,
    'lexicon' => NULL,
    'area' => '02 main',
  ),
  'transliteration_modx' => 
  array (
    'name' => 'transliteration_modx',
    'desc' => 'active or deactive the transliteration (mean convert all strange characters in A..Za..z0..9 characters)
',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => NULL,
    'area' => '02 main',
  ),
  'image_max_height_modx' => 
  array (
    'name' => 'image_max_height_modx',
    'desc' => 'set maximum pixel width and/or maximum pixel height for all images. If you set a maximum width or height, oversized images are converted to those limits. Images smaller than the limit(s) are unaffected, if you don"t need a limit set both to 0',
    'type' => 'numberfield',
    'options' => 
    array (
    ),
    'value' => '0',
    'lexicon' => NULL,
    'area' => '03 image limit and resizing',
  ),
  'image_max_mode_modx' => 
  array (
    'name' => 'image_max_mode_modx',
    'desc' => 'exact = defined size;    
portrait = keep aspect set height;      
landscape = keep aspect set width;     
auto = auto;       
crop= resize and crop;',
    'type' => 'list',
    'options' => 
    array (
      0 => 
      array (
        'text' => 'auto',
        'value' => 'auto',
        'name' => 'auto',
      ),
      1 => 
      array (
        'text' => 'exact',
        'value' => 'exact',
        'name' => 'exact',
      ),
      2 => 
      array (
        'text' => 'portrait',
        'value' => 'portrait',
        'name' => 'portrait',
      ),
      3 => 
      array (
        'text' => 'landscape',
        'value' => 'landscape',
        'name' => 'landscape',
      ),
      4 => 
      array (
        'text' => 'crop',
        'value' => 'crop',
        'name' => 'crop',
      ),
    ),
    'value' => 'auto',
    'lexicon' => NULL,
    'area' => '03 image limit and resizing',
  ),
  'image_max_width_modx' => 
  array (
    'name' => 'image_max_width_modx',
    'desc' => 'set maximum pixel width and/or maximum pixel height for all images. If you set a maximum width or height, oversized images are converted to those limits. Images smaller than the limit(s) are unaffected, if you don"t need a limit set both to 0',
    'type' => 'numberfield',
    'options' => 
    array (
    ),
    'value' => '0',
    'lexicon' => NULL,
    'area' => '03 image limit and resizing',
  ),
  'image_resizing_height_modx' => 
  array (
    'name' => 'image_resizing_height_modx',
    'desc' => 'If you set image_resizing to TRUE the script converts all uploaded images exactly to image_resizing_width x image_resizing_height dimension.         
If you set width or height to 0 the script automatically calculates the other dimension         
Is possible that if you upload very big images the script not work to overcome this increase the php configuration of memory and time limit',
    'type' => 'numberfield',
    'options' => 
    array (
    ),
    'value' => '0',
    'lexicon' => NULL,
    'area' => '04 image automatic resizing',
  ),
  'image_resizing_mode_modx' => 
  array (
    'name' => 'image_resizing_mode_modx',
    'desc' => 'same as image_max_mode',
    'type' => 'list',
    'options' => 
    array (
      0 => 
      array (
        'text' => 'auto',
        'value' => 'auto',
        'name' => 'auto',
      ),
      1 => 
      array (
        'text' => 'exact',
        'value' => 'exact',
        'name' => 'exact',
      ),
      2 => 
      array (
        'text' => 'landscape',
        'value' => 'landscape',
        'name' => 'landscape',
      ),
      3 => 
      array (
        'text' => 'portrait',
        'value' => 'portrait',
        'name' => 'portrait',
      ),
      4 => 
      array (
        'text' => 'crop',
        'value' => 'crop',
        'name' => 'crop',
      ),
    ),
    'value' => '',
    'lexicon' => NULL,
    'area' => '04 image automatic resizing',
  ),
  'image_resizing_modx' => 
  array (
    'name' => 'image_resizing_modx',
    'desc' => 'If you set image_resizing to TRUE the script converts all uploaded images exactly to image_resizing_width x image_resizing_height dimension.         
If you set width or height to 0 the script automatically calculates the other dimension         
Is possible that if you upload very big images the script not work to overcome this increase the php configuration of memory and time limit',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => NULL,
    'area' => '04 image automatic resizing',
  ),
  'image_resizing_override_modx' => 
  array (
    'name' => 'image_resizing_override_modx',
    'desc' => 'If set to TRUE then you can specify bigger images than image_max_width &amp; height otherwise if image_resizing is
bigger than $image_max_width or height then it will be converted to those values',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => NULL,
    'area' => '04 image automatic resizing',
  ),
  'image_resizing_width_modx' => 
  array (
    'name' => 'image_resizing_width_modx',
    'desc' => 'If you set image_resizing to TRUE the script converts all uploaded images exactly to image_resizing_width x image_resizing_height dimension.         
If you set width or height to 0 the script automatically calculates the other dimension         
Is possible that if you upload very big images the script not work to overcome this increase the php configuration of memory and time limit',
    'type' => 'numberfield',
    'options' => 
    array (
    ),
    'value' => '0',
    'lexicon' => NULL,
    'area' => '04 image automatic resizing',
  ),
  'default_view_modx' => 
  array (
    'name' => 'default_view_modx',
    'desc' => '0 => boxes
1 => detailed list (1 column)
2 => columns list (multiple columns depending on the width of the page)
YOU CAN ALSO PASS THIS PARAMETERS USING SESSION VAR => $_SESSION["RF"]["VIEW"]=',
    'type' => 'numberfield',
    'options' => 
    array (
    ),
    'value' => 0,
    'lexicon' => NULL,
    'area' => '05 layout',
  ),
  'ellipsis_title_after_first_row_modx' => 
  array (
    'name' => 'ellipsis_title_after_first_row_modx',
    'desc' => 'set if the filename is truncated when overflow first row
',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => NULL,
    'area' => '05 layout',
  ),
  'chmod_dirs_modx' => 
  array (
    'name' => 'chmod_dirs_modx',
    'desc' => 'change folder permissions',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => NULL,
    'area' => '06 permissions config',
  ),
  'chmod_files_modx' => 
  array (
    'name' => 'chmod_files_modx',
    'desc' => 'change file permissions',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => NULL,
    'area' => '06 permissions config',
  ),
  'copy_cut_dirs_modx' => 
  array (
    'name' => 'copy_cut_dirs_modx',
    'desc' => '',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => true,
    'lexicon' => NULL,
    'area' => '06 permissions config',
  ),
  'copy_cut_files_modx' => 
  array (
    'name' => 'copy_cut_files_modx',
    'desc' => '',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => true,
    'lexicon' => NULL,
    'area' => '06 permissions config',
  ),
  'create_folders_modx' => 
  array (
    'name' => 'create_folders_modx',
    'desc' => '',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => true,
    'lexicon' => NULL,
    'area' => '06 permissions config',
  ),
  'create_text_files_modx' => 
  array (
    'name' => 'create_text_files_modx',
    'desc' => 'only create files with exts. defined in editable_text_file_exts',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => true,
    'lexicon' => NULL,
    'area' => '06 permissions config',
  ),
  'delete_files_modx' => 
  array (
    'name' => 'delete_files_modx',
    'desc' => '',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => true,
    'lexicon' => NULL,
    'area' => '06 permissions config',
  ),
  'delete_folders_modx' => 
  array (
    'name' => 'delete_folders_modx',
    'desc' => '',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => true,
    'lexicon' => NULL,
    'area' => '06 permissions config',
  ),
  'duplicate_files_modx' => 
  array (
    'name' => 'duplicate_files_modx',
    'desc' => '',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => true,
    'lexicon' => NULL,
    'area' => '06 permissions config',
  ),
  'edit_text_files_modx' => 
  array (
    'name' => 'edit_text_files_modx',
    'desc' => 'eg.: txt, log etc.',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => true,
    'lexicon' => NULL,
    'area' => '06 permissions config',
  ),
  'preview_text_files_modx' => 
  array (
    'name' => 'preview_text_files_modx',
    'desc' => 'eg.: txt, log etc.',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => true,
    'lexicon' => NULL,
    'area' => '06 permissions config',
  ),
  'rename_files_modx' => 
  array (
    'name' => 'rename_files_modx',
    'desc' => '',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => true,
    'lexicon' => NULL,
    'area' => '06 permissions config',
  ),
  'rename_folders_modx' => 
  array (
    'name' => 'rename_folders_modx',
    'desc' => '',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => true,
    'lexicon' => NULL,
    'area' => '06 permissions config',
  ),
  'upload_files_modx' => 
  array (
    'name' => 'upload_files_modx',
    'desc' => '',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => true,
    'lexicon' => NULL,
    'area' => '06 permissions config',
  ),
  'editable_text_file_exts_modx' => 
  array (
    'name' => 'editable_text_file_exts_modx',
    'desc' => 'you can edit these type of files if $edit_text_files is true (only text based files)    
you can create these type of files if $create_text_files is true (only text based files)    
if you want you can add html,css etc.   
but for security reasons it"s NOT RECOMMENDED!',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'txt, log, xml, html, css, htm, js',
    'lexicon' => NULL,
    'area' => '07 permission - previewables and editables',
  ),
  'googledoc_enabled_modx' => 
  array (
    'name' => 'googledoc_enabled_modx',
    'desc' => 'Preview with Google Documents',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => true,
    'lexicon' => NULL,
    'area' => '07 permission - previewables and editables',
  ),
  'googledoc_file_exts_modx' => 
  array (
    'name' => 'googledoc_file_exts_modx',
    'desc' => 'you can preview these type of files if preview_text_files is true',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'txt, log, xml, html, css, htm, js',
    'lexicon' => NULL,
    'area' => '07 permission - previewables and editables',
  ),
  'previewable_text_file_exts_modx' => 
  array (
    'name' => 'previewable_text_file_exts_modx',
    'desc' => 'you can preview these type of files if preview_text_files is true',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'txt, log, xml, html, css, htm, js',
    'lexicon' => NULL,
    'area' => '07 permission - previewables and editables',
  ),
  'previewable_text_file_exts_no_prettify_modx' => 
  array (
    'name' => 'previewable_text_file_exts_no_prettify_modx',
    'desc' => 'you can preview these type of files if preview_text_files is true',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'txt, log',
    'lexicon' => NULL,
    'area' => '07 permission - previewables and editables',
  ),
  'viewerjs_enabled_modx' => 
  array (
    'name' => 'viewerjs_enabled_modx',
    'desc' => 'Preview with Viewer.js',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => true,
    'lexicon' => NULL,
    'area' => '07 permission - previewables and editables',
  ),
  'viewerjs_file_exts_modx' => 
  array (
    'name' => 'viewerjs_file_exts_modx',
    'desc' => 'Preview with Viewer.js',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'pdf, odt, odp, ods',
    'lexicon' => NULL,
    'area' => '07 permission - previewables and editables',
  ),
  'copy_cut_max_count_modx' => 
  array (
    'name' => 'copy_cut_max_count_modx',
    'desc' => 'defines file count limit for paste / operation
set "FALSE" for no limit   
IF any of these limits reached, operation won"t start and generate warning',
    'type' => 'numberfield',
    'options' => 
    array (
    ),
    'value' => '200',
    'lexicon' => NULL,
    'area' => '08 permission - copy/cut/paste',
  ),
  'copy_cut_max_size_modx' => 
  array (
    'name' => 'copy_cut_max_size_modx',
    'desc' => 'defines size limit for paste in MB / operation   
set "FALSE" for no limit   
IF any of these limits reached, operation won"t start and generate warning',
    'type' => 'numberfield',
    'options' => 
    array (
    ),
    'value' => '100',
    'lexicon' => NULL,
    'area' => '08 permission - copy/cut/paste',
  ),
  'ext_file_modx' => 
  array (
    'name' => 'ext_file_modx',
    'desc' => '',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'doc, docx, rtf, pdf, xls, xlsx, txt, csv, html, xhtml, psd, sql, log, fla, xml, ade, adp, mdb, accdb, ppt, pptx, odt, ots, ott, odb, odg, otp, otg, odf, ods, odp, css, ai',
    'lexicon' => NULL,
    'area' => '09 permission - allowed extensions',
  ),
  'ext_img_modx' => 
  array (
    'name' => 'ext_img_modx',
    'desc' => '',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'jpg, jpeg, png, gif, bmp, tiff, svg',
    'lexicon' => NULL,
    'area' => '09 permission - allowed extensions',
  ),
  'ext_misc_modx' => 
  array (
    'name' => 'ext_misc_modx',
    'desc' => '',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'zip, rar, gz, tar, iso, dmg',
    'lexicon' => NULL,
    'area' => '09 permission - allowed extensions',
  ),
  'ext_music_modx' => 
  array (
    'name' => 'ext_music_modx',
    'desc' => '',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'mp3, m4a, ac3, aiff, mid, ogg, wav',
    'lexicon' => NULL,
    'area' => '09 permission - allowed extensions',
  ),
  'ext_video_modx' => 
  array (
    'name' => 'ext_video_modx',
    'desc' => '',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'mov, mpeg, m4v, mp4, avi, mpg, wma, flv, webm',
    'lexicon' => NULL,
    'area' => '09 permission - allowed extensions',
  ),
  'aviary_active_modx' => 
  array (
    'name' => 'aviary_active_modx',
    'desc' => '',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => true,
    'lexicon' => NULL,
    'area' => '10 Aviary photo editing tool',
  ),
  'aviary_apiKey_modx' => 
  array (
    'name' => 'aviary_apiKey_modx',
    'desc' => 'Use this API if you want 2444282ef4344e3dacdedc7a78f8877d',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '2444282ef4344e3dacdedc7a78f8877d',
    'lexicon' => NULL,
    'area' => '10 Aviary photo editing tool',
  ),
  'aviary_language_modx' => 
  array (
    'name' => 'aviary_language_modx',
    'desc' => '',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'en',
    'lexicon' => NULL,
    'area' => '10 Aviary photo editing tool',
  ),
  'aviary_maxSize_modx' => 
  array (
    'name' => 'aviary_maxSize_modx',
    'desc' => '',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '1400',
    'lexicon' => NULL,
    'area' => '10 Aviary photo editing tool',
  ),
  'aviary_theme_modx' => 
  array (
    'name' => 'aviary_theme_modx',
    'desc' => '',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'light',
    'lexicon' => NULL,
    'area' => '10 Aviary photo editing tool',
  ),
  'aviary_tools_modx' => 
  array (
    'name' => 'aviary_tools_modx',
    'desc' => '',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'all',
    'lexicon' => NULL,
    'area' => '10 Aviary photo editing tool',
  ),
  'file_number_limit_js_modx' => 
  array (
    'name' => 'file_number_limit_js_modx',
    'desc' => 'The filter and sorter are managed through both javascript and php scripts because if you have a lot of
file in a folder the javascript script can"t sort all or filter all, so the filemanager switch to php script.
The plugin automatic swich javascript to php when the current folder exceeds the below limit of files number',
    'type' => 'numberfield',
    'options' => 
    array (
    ),
    'value' => '500',
    'lexicon' => NULL,
    'area' => '11 PHP and JS upload limit',
  ),
  'hidden_files_modx' => 
  array (
    'name' => 'hidden_files_modx',
    'desc' => 'set the names of any files you want hidden. Remember these names will be hidden in all folders (eg "this_document.pdf", "that_image.jpg" )
',
    'type' => 'textarea',
    'options' => 
    array (
    ),
    'value' => 'config.php',
    'lexicon' => NULL,
    'area' => '12 permission - hidden folder and files',
  ),
  'hidden_folders_modx' => 
  array (
    'name' => 'hidden_folders_modx',
    'desc' => 'set the names of any folders you want hidden (eg "hidden_folder1", "hidden_folder2" ) Remember all folders with these names will be hidden (you can set any exceptions in config.php files on folders)',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '.tmb,thumbs,.quarantine',
    'lexicon' => NULL,
    'area' => '12 permission - hidden folder and files',
  ),
  'JAVAMaxSizeUpload_modx' => 
  array (
    'name' => 'JAVAMaxSizeUpload_modx',
    'desc' => 'in Gb',
    'type' => 'numberfield',
    'options' => 
    array (
    ),
    'value' => '200',
    'lexicon' => NULL,
    'area' => '13 JAVA upload',
  ),
  'java_upload_modx' => 
  array (
    'name' => 'java_upload_modx',
    'desc' => '',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => true,
    'lexicon' => NULL,
    'area' => '13 JAVA upload',
  ),
  'fixed_image_creation_height_modx' => 
  array (
    'name' => 'fixed_image_creation_height_modx',
    'desc' => 'height of image (you can leave empty if you set width)',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '200, ',
    'lexicon' => NULL,
    'area' => '14 auto thumbnail -fixed',
  ),
  'fixed_image_creation_modx' => 
  array (
    'name' => 'fixed_image_creation_modx',
    'desc' => 'New image resized creation with fixed path from filemanager folder after uploading (thumbnails in fixed mode)
If you want create images resized out of upload folder for use with external script you can choose this method,
You can create also more than one image at a time just simply add a value in the array
Remember that the image creation respect the folder hierarchy so if you are inside source/test/test1/ the new image will create at
path_from_filemanager/test/test1/
PS if there isn"t write permission in your destination folder you must set it',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => NULL,
    'area' => '14 auto thumbnail -fixed',
  ),
  'fixed_image_creation_name_to_prepend_modx' => 
  array (
    'name' => 'fixed_image_creation_name_to_prepend_modx',
    'desc' => 'name to prepend on filename',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => ', test_',
    'lexicon' => NULL,
    'area' => '14 auto thumbnail -fixed',
  ),
  'fixed_image_creation_option_modx' => 
  array (
    'name' => 'fixed_image_creation_option_modx',
    'desc' => 'set the type of the crop----
exact = defined size;
portrait = keep aspect set height;
landscape = keep aspect set width;
auto = auto;
crop= resize and crop;',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'crop, auto ',
    'lexicon' => NULL,
    'area' => '14 auto thumbnail -fixed',
  ),
  'fixed_image_creation_to_append_modx' => 
  array (
    'name' => 'fixed_image_creation_to_append_modx',
    'desc' => 'name to append on filename',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '_test, ',
    'lexicon' => NULL,
    'area' => '14 auto thumbnail -fixed',
  ),
  'fixed_image_creation_width_modx' => 
  array (
    'name' => 'fixed_image_creation_width_modx',
    'desc' => 'width of image (you can leave empty if you set height)',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '300, 400',
    'lexicon' => NULL,
    'area' => '14 auto thumbnail -fixed',
  ),
  'fixed_path_from_filemanager_modx' => 
  array (
    'name' => 'fixed_path_from_filemanager_modx',
    'desc' => 'fixed path of the image folder from the current position on upload folder',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '../test/, ../test1/',
    'lexicon' => NULL,
    'area' => '14 auto thumbnail -fixed',
  ),
  'relative_image_creation_height_modx' => 
  array (
    'name' => 'relative_image_creation_height_modx',
    'desc' => 'height of image (you can leave empty if you set width)',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '200, \'\'',
    'lexicon' => NULL,
    'area' => '15 auto thumbnail -relative',
  ),
  'relative_image_creation_modx' => 
  array (
    'name' => 'relative_image_creation_modx',
    'desc' => 'New image resized creation with relative path inside to upload folder after uploading (thumbnails in relative mode)
With Responsive filemanager you can create automatically resized image inside the upload folder, also more than one at a time
just simply add a value in the array
The image creation path is always relative so if i"m inside source/test/test1 and I upload an image, the path start from here',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => NULL,
    'area' => '15 auto thumbnail -relative',
  ),
  'relative_image_creation_name_to_append_modx' => 
  array (
    'name' => 'relative_image_creation_name_to_append_modx',
    'desc' => 'name to append on filename',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '_thumb, _thumb1',
    'lexicon' => NULL,
    'area' => '15 auto thumbnail -relative',
  ),
  'relative_image_creation_name_to_prepend_modx' => 
  array (
    'name' => 'relative_image_creation_name_to_prepend_modx',
    'desc' => 'name to prepend on filename',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => ',',
    'lexicon' => NULL,
    'area' => '15 auto thumbnail -relative',
  ),
  'relative_image_creation_option_modx' => 
  array (
    'name' => 'relative_image_creation_option_modx',
    'desc' => 'set the type of the crop  
exact = defined size;
portrait = keep aspect set height;
landscape = keep aspect set width;
auto = auto;
crop= resize and crop;',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'crop, crop ',
    'lexicon' => NULL,
    'area' => '15 auto thumbnail -relative',
  ),
  'relative_image_creation_width_modx' => 
  array (
    'name' => 'relative_image_creation_width_modx',
    'desc' => 'width of image (you can leave empty if you set height)',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '300, 400',
    'lexicon' => NULL,
    'area' => '15 auto thumbnail -relative',
  ),
  'relative_path_from_current_pos_modx' => 
  array (
    'name' => 'relative_path_from_current_pos_modx',
    'desc' => 'relative path of the image folder from the current position on upload folder',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => './, ./',
    'lexicon' => NULL,
    'area' => '15 auto thumbnail -relative',
  ),
  'remember_text_filter_modx' => 
  array (
    'name' => 'remember_text_filter_modx',
    'desc' => 'Remember text filter after close filemanager for future session
',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => NULL,
    'area' => '2 main',
  ),
);

return $properties;

