<?php
function listArray($list){
  $list = preg_replace('/\s+/', '', $list);
  // $list = preg_replace("/[^a-z0-9,-_]+/i", ' ', $list);
  $list = preg_replace("/[^a-zA-Z0-9,.]+/", " ", html_entity_decode($list));
  $list = explode(',', $list);
  return $list;
}
if ($modx->user->isMember(listArray($rfmUserGroups))) {
} 
else {
  die($noAccessMessage);
}
if ($activatePersonalFolders == 1 && $autoCreateFoldersTWrfmSnippet) {
 $myPersonalFolderName = $modx->runSnippet($autoCreateFoldersTWrfmSnippet, array('path'=>$absolutePATHtoUploadFolder_modx, 'copyConfig' =>$copyConfig, 'responsivePersonalConfig' => $responsivePersonalConfig));
 $absoluteURLtoUploadFolder_modx.= $myPersonalFolderName.'/';
 $relativePathToUploadFolder_modx.= $myPersonalFolderName.'/';
}
mb_internal_encoding('UTF-8');
date_default_timezone_set('Europe/Rome');
define('USE_ACCESS_KEYS', $USE_ACCESS_KEYS_modx);
define('DEBUG_ERROR_MESSAGE', true); //new
$config = array(
  'base_url' => ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']), array(
    'off',
    'no'
  ))) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'],
  'upload_dir' => $absoluteURLtoUploadFolder_modx,
  'current_path' => $relativePathToUploadFolder_modx,
  'thumbs_base_path' => $relativePathToUploadFolderThumbs_modx,
  'access_keys' => listArray($access_keys_modx),
  'MaxSizeTotal' => $MaxSizeTotal_modx, //new
  'MaxSizeUpload' => $MaxSizeUpload_modx,
  'default_language' => $default_language_modx,
  'icon_theme' => $icon_theme_modx,
  'folder_message' => $folder_message_modx,
  'show_total_size' => $show_total_size_modx, //new
  'show_folder_size' => $show_folder_size_modx,
  'show_sorting_bar' => $show_sorting_bar_modx,
  'show_filter_buttons' => $show_filter_buttons_modx, //new
  'show_language_selection' => $show_language_selection_modx, //new
  'transliteration' => $transliteration_modx,
  'convert_spaces' => $convert_spaces_modx,
  'replace_with' => $replace_with_modx,
  'lower_case' => $lower_case_modx, //new
  'lazy_loading_file_number_threshold' => $lazy_loading_file_number_threshold_modx,
  'image_max_width' => $image_max_width_modx,
  'image_max_height' => $image_max_height_modx,
  'image_max_mode' => $image_max_mode_modx,
  'image_resizing' => $image_resizing_modx,
  'image_resizing_width' => $image_resizing_width_modx,
  'image_resizing_height' => $image_resizing_height_modx,
  'image_resizing_mode' => $image_resizing_mode_modx,
  'image_resizing_override' => $image_resizing_override_modx,
  'default_view' => $default_view_modx,
  'ellipsis_title_after_first_row' => $ellipsis_title_after_first_row_modx,
  'delete_files' => $delete_files_modx,
  'create_folders' => $create_folders_modx,
  'delete_folders' => $delete_folders_modx,
  'upload_files' => $upload_files_modx,
  'rename_files' => $rename_files_modx,
  'rename_folders' => $rename_folders_modx,
  'duplicate_files' => $duplicate_files_modx,
  'copy_cut_files' => $copy_cut_files_modx,
  'copy_cut_dirs' => $copy_cut_dirs_modx,
  'chmod_files' => $chmod_files_modx,
  'chmod_dirs' => $chmod_dirs_modx,
  'preview_text_files' => $preview_text_files_modx,
  'edit_text_files' => $edit_text_files_modx,
  'create_text_files' => $create_text_files_modx,
  'previewable_text_file_exts' => listArray($previewable_text_file_exts_modx),
  'previewable_text_file_exts_no_prettify' => listArray($previewable_text_file_exts_no_prettify_modx),
  'editable_text_file_exts' => listArray($editable_text_file_exts_modx),
  'googledoc_enabled' => $googledoc_enabled_modx,
  'googledoc_file_exts' => listArray($googledoc_file_exts_modx),
  'viewerjs_enabled' => $viewerjs_enabled_modx,
  'viewerjs_file_exts' => listArray($viewerjs_file_exts_modx),
  'copy_cut_max_size' => $copy_cut_max_size_modx,
  'copy_cut_max_count' => $copy_cut_max_count_modx,
  'ext_img' => listArray($ext_img_modx),
  'ext_file' => listArray($ext_file_modx),
  'ext_video' => listArray($ext_video_modx),
  'ext_music' => listArray($ext_music_modx),
  'ext_misc' => listArray($ext_misc_modx),
  'aviary_active' => $aviary_active_modx,
  'aviary_apiKey' => $aviary_apiKey_modx,
  'aviary_language' => $aviary_language_modx,
  'aviary_theme' => $aviary_theme_modx,
  'aviary_tools' => $aviary_tools_modx,
  'aviary_maxSize' => $aviary_maxSize_modx, //new
  'file_number_limit_js' => $file_number_limit_js_modx,
  'hidden_folders' => listArray($hidden_folders_modx),
  'hidden_files' => listArray($hidden_files_modx),
  'java_upload' => $java_upload_modx,
  'JAVAMaxSizeUpload' => $JAVAMaxSizeUpload_modx,
  'fixed_image_creation' => $fixed_image_creation_modx,
  'fixed_path_from_filemanager' => listArray($fixed_path_from_filemanager_modx),
  'fixed_image_creation_name_to_prepend' => listArray($fixed_image_creation_name_to_prepend_modx),
  'fixed_image_creation_to_append' => listArray($fixed_image_creation_to_append_modx),
  'fixed_image_creation_width' => listArray($fixed_image_creation_width_modx),
  'fixed_image_creation_height' => listArray($fixed_image_creation_height_modx),
  'fixed_image_creation_option' => listArray($fixed_image_creation_option_modx),
  'relative_image_creation' => $relative_image_creation_modx,
  'relative_path_from_current_pos' => listArray($relative_path_from_current_pos_modx),
  'relative_image_creation_name_to_prepend' => listArray($relative_image_creation_name_to_prepend_modx),
  'relative_image_creation_name_to_append' => listArray($relative_image_creation_name_to_append_modx),
  'relative_image_creation_width' => listArray($relative_image_creation_width_modx),
  'relative_image_creation_height' => listArray($relative_image_creation_height_modx),
  'relative_image_creation_option' => listArray($relative_image_creation_option_modx),
  'remember_text_filter' => $remember_text_filter_modx
);
return array_merge($config, array(
  'MaxSizeUpload' => ((int) (ini_get('post_max_size')) < $config['MaxSizeUpload']) ? (int) (ini_get('post_max_size')) : $config['MaxSizeUpload'],
  'ext' => array_merge($config['ext_img'], $config['ext_file'], $config['ext_misc'], $config['ext_video'], $config['ext_music']),
  'aviary_defaults_config' => array(
    'apiKey' => $config['aviary_apiKey'],
    'language' => $config['aviary_language'],
    'theme' => $config['aviary_theme'],
    'tools' => $config['aviary_tools'],
    'maxSize' => $config['aviary_maxSize'] //new
  )
));