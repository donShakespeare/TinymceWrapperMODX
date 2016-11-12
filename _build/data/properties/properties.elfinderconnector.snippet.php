<?php
/**
 * Properties file for elfinderConnector snippet
 *
 * Copyright 2016 by donShakespeare donShakespeare@gmail.com
 * Created on 05-02-2016
 *
 * @package tinymcewrapper
 * @subpackage build
 */




$properties = array (
  'chunkSuffix' => 
  array (
    'name' => 'chunkSuffix',
    'desc' => 'This snippet calls its own chunks for you; it will not override them once created, but you were better off duplicating them.
PLEASE simply add a suffix (_test or -su) to your new name.
elfinderLocalFileSystem4 becomes elfinderLocalFileSystem4-test or elfinderLocalFileSystem4-suffix',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => NULL,
    'area' => '00 elFinder Security',
  ),
  'myModxPermission' => 
  array (
    'name' => 'myModxPermission',
    'desc' => 'Super folder control. Although each location can have own permission, this option here allows you to mass lock all.
Only an admin of user id that is listed in sudoAdminIDs can unlock all folders via URL parameter e.g elfinder.html?unlocked=1 ',
    'type' => 'list',
    'options' => 
    array (
      0 => 
      array (
        'text' => 'Lock up all folders (but still visible)',
        'value' => 'lockedButVisible',
        'name' => 'Lock up all folders (but still visible)',
      ),
      1 => 
      array (
        'text' => 'Default Setting (unlocked)',
        'value' => 'forMembers',
        'name' => 'Default Setting (unlocked)',
      ),
      2 => 
      array (
        'text' => 'Hide all folders',
        'value' => 'hideThis',
        'name' => 'Hide all folders',
      ),
    ),
    'value' => 'lockedButVisible',
    'lexicon' => NULL,
    'area' => '00 elFinder Security',
  ),
  'sudoAdmin' => 
  array (
    'name' => 'sudoAdmin',
    'desc' => 'Disable location?AccessPermission security settings for Administrator userGroup member whose userid that is found in sudoAdminIDs.',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => NULL,
    'area' => '00 elFinder Security',
  ),
  'sudoAdminIDs' => 
  array (
    'name' => 'sudoAdminIDs',
    'desc' => 'Comma-separated list of ultimate admin user ids with special elFinder unlock privileges',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '1',
    'lexicon' => NULL,
    'area' => '00 elFinder Security',
  ),
  'sudoUserGroup' => 
  array (
    'name' => 'sudoUserGroup',
    'desc' => 'Comma-separated list of ultimate admin user groups with special elFinder unlock privileges',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'Administrator',
    'lexicon' => NULL,
    'area' => '00 elFinder Security',
  ),
  'twCreateFolders' => 
  array (
    'name' => 'twCreateFolders',
    'desc' => 'Name of snippet to use in order to create personal folders for users. Default is autoCreateFoldersTWelfinder',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'autoCreateFoldersTWelfinder',
    'lexicon' => NULL,
    'area' => '00 elFinder Security',
  ),
  'location1' => 
  array (
    'name' => 'location1',
    'desc' => 'elFinder alias. Identify this location. To disable this location, leave empty. location1, being the first in array, will be the default volume.',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'FileSystem',
    'lexicon' => NULL,
    'area' => '01 location1',
  ),
  'location1AccessPermission' => 
  array (
    'name' => 'location1AccessPermission',
    'desc' => 'elFinder attributes. Use to protect folder and files. Use JSON format here are examples
[{"pattern":"\\/\\/","read":true,"write":false,"locked":true},{"pattern":"\\/core\\/","read":false,"write":false,"hidden":true},{"pattern":"\\/.tmb*\\/","hidden":true},{"pattern":"\\/*.php/$\\/","locked":false,"write":true,"read":true}]',
    'type' => 'textarea',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => NULL,
    'area' => '01 location1',
  ),
  'location1AccessUserGroup' => 
  array (
    'name' => 'location1AccessUserGroup',
    'desc' => 'Comma-separated list of user groups that can access this location.',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'Administrator',
    'lexicon' => NULL,
    'area' => '01 location1',
  ),
  'location1Disabled' => 
  array (
    'name' => 'location1Disabled',
    'desc' => 'elFinder disabled commands. JSON list of detailed activities to deny a user in this location: ["open", "reload", "home", "up", "back", "forward", "getfile", "quicklook", "download", "rm", "duplicate", "rename", "mkdir", "mkfile", "upload", "copy", "cut", "paste", "edit", "extract", "archive", "search", "info", "view", "help", "resize", "sort"]',
    'type' => 'textarea',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => NULL,
    'area' => '01 location1',
  ),
  'location1Path' => 
  array (
    'name' => 'location1Path',
    'desc' => 'elFinder path. Location to open/start from. Root upload folder.',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '[[++base_path]]',
    'lexicon' => NULL,
    'area' => '01 location1',
  ),
  'location1Quarantine' => 
  array (
    'name' => 'location1Quarantine',
    'desc' => 'elFinder quarantine (Example: .quarantine). Temporary directory for archive file extracting. We recommend to set a path outside the document root.',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => NULL,
    'area' => '01 location1',
  ),
  'location1Url' => 
  array (
    'name' => 'location1Url',
    'desc' => 'elFinder URL. This is used/needed to find file paths in say, TinyMCE. To hide the location of files, leave empty (not recommended).',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '[[++base_url]]',
    'lexicon' => NULL,
    'area' => '01 location1',
  ),
  'location1tmbPath' => 
  array (
    'name' => 'location1tmbPath',
    'desc' => 'elFinder tmbPath. This is will create .tmb folder in the root upload folder that is, location?Path. This folder is used to store elFinder thumbnails for images and the like. You may leave empty if this is too much trouble to you. If ever you use another file browser like Responsive FManager you may want to hide these folders (.tmb etc) which elFinder hides by default.',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '.tmb',
    'lexicon' => NULL,
    'area' => '01 location1',
  ),
  'location2' => 
  array (
    'name' => 'location2',
    'desc' => 'elFinder alias. Identify this location. To disable this location, leave empty.',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'Assets Folder',
    'lexicon' => NULL,
    'area' => '02 location2',
  ),
  'location2AccessPermission' => 
  array (
    'name' => 'location2AccessPermission',
    'desc' => 'elFinder attributes. Use to protect folder and files. Use JSON format here are examples
[{"pattern":"\\/\\/","read":true,"write":false,"locked":true},{"pattern":"\\/core\\/","read":false,"write":false,"hidden":true},{"pattern":"\\/.tmb*\\/","hidden":true},{"pattern":"\\/*.php/$\\/","locked":false,"write":true,"read":true}]',
    'type' => 'textarea',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => NULL,
    'area' => '02 location2',
  ),
  'location2AccessUserGroup' => 
  array (
    'name' => 'location2AccessUserGroup',
    'desc' => 'Comma-separated list of user groups that can access this location.',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'Administrator',
    'lexicon' => NULL,
    'area' => '02 location2',
  ),
  'location2Disabled' => 
  array (
    'name' => 'location2Disabled',
    'desc' => 'elFinder disabled commands. JSON list of detailed activities to deny a user in this location: ["open", "reload", "home", "up", "back", "forward", "getfile", "quicklook", "download", "rm", "duplicate", "rename", "mkdir", "mkfile", "upload", "copy", "cut", "paste", "edit", "extract", "archive", "search", "info", "view", "help", "resize", "sort"]',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => NULL,
    'area' => '02 location2',
  ),
  'location2Path' => 
  array (
    'name' => 'location2Path',
    'desc' => 'elFinder path. Location to open/start from. Root upload folder.',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '[[++assets_path]]',
    'lexicon' => NULL,
    'area' => '02 location2',
  ),
  'location2Quarantine' => 
  array (
    'name' => 'location2Quarantine',
    'desc' => 'elFinder quarantine (Example: .quarantine). Temporary directory for archive file extracting. We recommend to set a path outside the document root.',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => NULL,
    'area' => '02 location2',
  ),
  'location2Url' => 
  array (
    'name' => 'location2Url',
    'desc' => 'elFinder URL. This is used/needed to find file paths in say, TinyMCE. To hide the location of files, leave empty (not recommended).',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '[[++assets_url]]',
    'lexicon' => NULL,
    'area' => '02 location2',
  ),
  'location2tmbPath' => 
  array (
    'name' => 'location2tmbPath',
    'desc' => 'elFinder tmbPath. This is will create .tmb folder in the root upload folder that is, location?Path. This folder is used to store elFinder thumbnails for images and the like. You may leave empty if this is too much trouble to you. If ever you use another file browser like Responsive FManager you may want to hide these folders (.tmb etc) which elFinder hides by default.',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => NULL,
    'area' => '02 location2',
  ),
  'location3' => 
  array (
    'name' => 'location3',
    'desc' => 'elFinder alias. Identify this location. To disable this location, leave empty.',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'Core Folder',
    'lexicon' => NULL,
    'area' => '03 location3',
  ),
  'location3AccessPermission' => 
  array (
    'name' => 'location3AccessPermission',
    'desc' => 'elFinder attributes. Use to protect folder and files. Use JSON format here are examples
[{"pattern":"\\/\\/","read":true,"write":false,"locked":true},{"pattern":"\\/core\\/","read":false,"write":false,"hidden":true},{"pattern":"\\/.tmb*\\/","hidden":true},{"pattern":"\\/*.php/$\\/","locked":false,"write":true,"read":true}]',
    'type' => 'textarea',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => NULL,
    'area' => '03 location3',
  ),
  'location3AccessUserGroup' => 
  array (
    'name' => 'location3AccessUserGroup',
    'desc' => 'Comma-separated list of user groups that can access this location.',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'Administrator',
    'lexicon' => NULL,
    'area' => '03 location3',
  ),
  'location3Disabled' => 
  array (
    'name' => 'location3Disabled',
    'desc' => 'elFinder disabled commands. JSON list of detailed activities to deny a user in this location: ["open", "reload", "home", "up", "back", "forward", "getfile", "quicklook", "download", "rm", "duplicate", "rename", "mkdir", "mkfile", "upload", "copy", "cut", "paste", "edit", "extract", "archive", "search", "info", "view", "help", "resize", "sort"]',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => NULL,
    'area' => '03 location3',
  ),
  'location3Path' => 
  array (
    'name' => 'location3Path',
    'desc' => 'elFinder path. Location to open/start from. Root upload folder.',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '[[++core_path]]',
    'lexicon' => NULL,
    'area' => '03 location3',
  ),
  'location3Quarantine' => 
  array (
    'name' => 'location3Quarantine',
    'desc' => 'elFinder quarantine (Example: .quarantine). Temporary directory for archive file extracting. We recommend to set a path outside the document root.',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => NULL,
    'area' => '03 location3',
  ),
  'location3Url' => 
  array (
    'name' => 'location3Url',
    'desc' => 'elFinder URL. This is used/needed to find file paths in say, TinyMCE. To hide the location of files, leave empty (not recommended).',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => NULL,
    'area' => '03 location3',
  ),
  'location3tmbPath' => 
  array (
    'name' => 'location3tmbPath',
    'desc' => 'elFinder tmbPath. This is will create .tmb folder in the root upload folder that is, location?Path. This folder is used to store elFinder thumbnails for images and the like. You may leave empty if this is too much trouble to you. If ever you use another file browser like Responsive FManager you may want to hide these folders (.tmb etc) which elFinder hides by default.',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => NULL,
    'area' => '03 location3',
  ),
  'location4' => 
  array (
    'name' => 'location4',
    'desc' => 'elFinder alias. Identify this location. To disable this location, leave empty.',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'Cache Folder',
    'lexicon' => NULL,
    'area' => '04 location4',
  ),
  'location4AccessPermission' => 
  array (
    'name' => 'location4AccessPermission',
    'desc' => 'elFinder attributes. Use to protect folder and files. Use JSON format here are examples
[{"pattern":"\\/\\/","read":true,"write":false,"locked":true},{"pattern":"\\/core\\/","read":false,"write":false,"hidden":true},{"pattern":"\\/.tmb*\\/","hidden":true},{"pattern":"\\/*.php/$\\/","locked":false,"write":true,"read":true}]',
    'type' => 'textarea',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => NULL,
    'area' => '04 location4',
  ),
  'location4AccessUserGroup' => 
  array (
    'name' => 'location4AccessUserGroup',
    'desc' => 'Comma-separated list of user groups that can access this location.',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'Administrator',
    'lexicon' => NULL,
    'area' => '04 location4',
  ),
  'location4Disabled' => 
  array (
    'name' => 'location4Disabled',
    'desc' => 'elFinder disabled commands. JSON list of detailed activities to deny a user in this location: ["open", "reload", "home", "up", "back", "forward", "getfile", "quicklook", "download", "rm", "duplicate", "rename", "mkdir", "mkfile", "upload", "copy", "cut", "paste", "edit", "extract", "archive", "search", "info", "view", "help", "resize", "sort"]',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => NULL,
    'area' => '04 location4',
  ),
  'location4Path' => 
  array (
    'name' => 'location4Path',
    'desc' => 'elFinder path. Location to open/start from. Root upload folder.',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '[[++core_path]]cache/',
    'lexicon' => NULL,
    'area' => '04 location4',
  ),
  'location4Quarantine' => 
  array (
    'name' => 'location4Quarantine',
    'desc' => 'elFinder quarantine (Example: .quarantine). Temporary directory for archive file extracting. We recommend to set a path outside the document root.',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => NULL,
    'area' => '04 location4',
  ),
  'location4Url' => 
  array (
    'name' => 'location4Url',
    'desc' => 'elFinder URL. This is used/needed to find file paths in say, TinyMCE. To hide the location of files, leave empty (not recommended).',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => NULL,
    'area' => '04 location4',
  ),
  'location4tmbPath' => 
  array (
    'name' => 'location4tmbPath',
    'desc' => 'elFinder tmbPath. This is will create .tmb folder in the root upload folder that is, location?Path. This folder is used to store elFinder thumbnails for images and the like. You may leave empty if this is too much trouble to you. If ever you use another file browser like Responsive FManager you may want to hide these folders (.tmb etc) which elFinder hides by default.',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => NULL,
    'area' => '04 location4',
  ),
  'location5' => 
  array (
    'name' => 'location5',
    'desc' => 'elFinder alias. Identify this location. To disable this location, leave empty.',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'Manager Folder',
    'lexicon' => NULL,
    'area' => '05 location5',
  ),
  'location5AccessPermission' => 
  array (
    'name' => 'location5AccessPermission',
    'desc' => 'elFinder attributes. Use to protect folder and files. Use JSON format here are examples
[{"pattern":"\\/\\/","read":true,"write":false,"locked":true},{"pattern":"\\/core\\/","read":false,"write":false,"hidden":true},{"pattern":"\\/.tmb*\\/","hidden":true},{"pattern":"\\/*.php/$\\/","locked":false,"write":true,"read":true}]',
    'type' => 'textarea',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => NULL,
    'area' => '05 location5',
  ),
  'location5AccessUserGroup' => 
  array (
    'name' => 'location5AccessUserGroup',
    'desc' => 'Comma-separated list of user groups that can access this location.',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'Administrator',
    'lexicon' => NULL,
    'area' => '05 location5',
  ),
  'location5Disabled' => 
  array (
    'name' => 'location5Disabled',
    'desc' => 'elFinder disabled commands. JSON list of detailed activities to deny a user in this location: ["open", "reload", "home", "up", "back", "forward", "getfile", "quicklook", "download", "rm", "duplicate", "rename", "mkdir", "mkfile", "upload", "copy", "cut", "paste", "edit", "extract", "archive", "search", "info", "view", "help", "resize", "sort"]',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => NULL,
    'area' => '05 location5',
  ),
  'location5Path' => 
  array (
    'name' => 'location5Path',
    'desc' => 'elFinder path. Location to open/start from. Root upload folder.',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '[[++manager_path]]',
    'lexicon' => NULL,
    'area' => '05 location5',
  ),
  'location5Quarantine' => 
  array (
    'name' => 'location5Quarantine',
    'desc' => 'elFinder quarantine (Example: .quarantine). Temporary directory for archive file extracting. We recommend to set a path outside the document root.',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => NULL,
    'area' => '05 location5',
  ),
  'location5Url' => 
  array (
    'name' => 'location5Url',
    'desc' => 'elFinder URL. This is used/needed to find file paths in say, TinyMCE. To hide the location of files, leave empty (not recommended).',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '[[++manager_url]]',
    'lexicon' => NULL,
    'area' => '05 location5',
  ),
  'location5tmbPath' => 
  array (
    'name' => 'location5tmbPath',
    'desc' => 'elFinder tmbPath. This is will create .tmb folder in the root upload folder that is, location?Path. This folder is used to store elFinder thumbnails for images and the like. You may leave empty if this is too much trouble to you. If ever you use another file browser like Responsive FManager you may want to hide these folders (.tmb etc) which elFinder hides by default.',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => NULL,
    'area' => '05 location5',
  ),
  'enablePersonalFolder' => 
  array (
    'name' => 'enablePersonalFolder',
    'desc' => 'If you want a browsing user to have a folder created, so that this new folder becomes their root folder (the default folder name is username. Please configure autoCreateFoldersTWelfinder snippet.',
    'type' => 'combo-boolean',
    'options' => 
    array (
    ),
    'value' => false,
    'lexicon' => NULL,
    'area' => 'Personal Folder',
  ),
  'locationPersonal' => 
  array (
    'name' => 'locationPersonal',
    'desc' => 'elFinder alias',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'Personal Folder',
    'lexicon' => NULL,
    'area' => 'Personal Folder',
  ),
  'locationPersonalAccessPermission' => 
  array (
    'name' => 'locationPersonalAccessPermission',
    'desc' => 'elFinder attributes. Use to protect folder and files. Use JSON format here are examples
[{"pattern":"\\/\\/","read":true,"write":false,"locked":true},{"pattern":"\\/core\\/","read":false,"write":false,"hidden":true},{"pattern":"\\/.tmb*\\/","hidden":true},{"pattern":"\\/*.php/$\\/","locked":false,"write":true,"read":true}]',
    'type' => 'textarea',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => NULL,
    'area' => 'Personal Folder',
  ),
  'locationPersonalAccessUserGroup' => 
  array (
    'name' => 'locationPersonalAccessUserGroup',
    'desc' => 'Comma-separated list of usergroups - Whether the user has to belong to a particular user group to enjoy this feature',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => 'Administrator',
    'lexicon' => NULL,
    'area' => 'Personal Folder',
  ),
  'locationPersonalDisabled' => 
  array (
    'name' => 'locationPersonalDisabled',
    'desc' => 'elFinder disabled commands. JSON list of detailed activities to deny a user in this location: ["open", "reload", "home", "up", "back", "forward", "getfile", "quicklook", "download", "rm", "duplicate", "rename", "mkdir", "mkfile", "upload", "copy", "cut", "paste", "edit", "extract", "archive", "search", "info", "view", "help", "resize", "sort"]',
    'type' => 'textarea',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => NULL,
    'area' => 'Personal Folder',
  ),
  'locationPersonalPath' => 
  array (
    'name' => 'locationPersonalPath',
    'desc' => 'Under what parent folder is the user personal folder(s) to be created',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '[[++base_path]]',
    'lexicon' => NULL,
    'area' => 'Personal Folder',
  ),
  'locationPersonalQuarantine' => 
  array (
    'name' => 'locationPersonalQuarantine',
    'desc' => 'elFinder quarantine (Example: .quarantine). Temporary directory for archive file extracting. We recommend to set a path outside the document root.',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => NULL,
    'area' => 'Personal Folder',
  ),
  'locationPersonalUrl' => 
  array (
    'name' => 'locationPersonalUrl',
    'desc' => 'elFinder URL. This is used/needed to find file paths in say, TinyMCE. To hide the location of files, leave empty (not recommended).',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '[[++base_url]]',
    'lexicon' => NULL,
    'area' => 'Personal Folder',
  ),
  'locationPersonaltmbPath' => 
  array (
    'name' => 'locationPersonaltmbPath',
    'desc' => 'elFinder tmbPath. This is will create .tmb folder in the root upload folder that is, location?Path. This folder is used to store elFinder thumbnails for images and the like. You may leave empty if this is too much trouble to you. If ever you use another file browser like Responsive FManager you may want to hide these folders (.tmb etc) which elFinder hides by default.',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => NULL,
    'area' => 'Personal Folder',
  ),
);

return $properties;

