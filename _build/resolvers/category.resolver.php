<?php
/**
 * Category resolver  for TinymceWrapper extra.
 * Sets Category Parent
 *
 * Copyright 2016 by donShakespeare donShakespeare@gmail.com
 * Created on 05-02-2016
 *
 * TinymceWrapper is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * TinymceWrapper is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * TinymceWrapper; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 * @package tinymcewrapper
 * @subpackage build
 */

/* @var $object xPDOObject */
/* @var $modx modX */
/* @var $parentObj modResource */
/* @var $templateObj modTemplate */

/* @var array $options */

if (!function_exists('checkFields')) {
    function checkFields($required, $objectFields) {
        global $modx;
        $fields = explode(',', $required);
        foreach ($fields as $field) {
            if (!isset($objectFields[$field])) {
                $modx->log(modX::LOG_LEVEL_ERROR, '[Category Resolver] Missing field: ' . $field);
                return false;
            }
        }
        return true;
    }
}
if ($object->xpdo) {
    $modx =& $object->xpdo;
    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:

            $intersects = array (
                'TinymceWrapper' =>  array (
                  'category' => 'TinymceWrapper',
                  'parent' => '',
                ),
                'TinyCustomBrowsers' =>  array (
                  'category' => 'TinyCustomBrowsers',
                  'parent' => 'TinymceWrapper',
                ),
                'elFinderVolumes' =>  array (
                  'category' => 'elFinderVolumes',
                  'parent' => 'TinyCustomBrowsers',
                ),
                'ResponsiveFileManager' =>  array (
                  'category' => 'ResponsiveFileManager',
                  'parent' => 'TinyCustomBrowsers',
                ),
                'RoxyFileman' =>  array (
                  'category' => 'RoxyFileman',
                  'parent' => 'TinyCustomBrowsers',
                ),
                'TinyJSONGallery' =>  array (
                  'category' => 'TinyJSONGallery',
                  'parent' => 'TinymceWrapper',
                ),
                'TinyMagicPublisher' =>  array (
                  'category' => 'TinyMagicPublisher',
                  'parent' => 'TinymceWrapper',
                ),
                'TinyMCE' =>  array (
                  'category' => 'TinyMCE',
                  'parent' => 'TinymceWrapper',
                ),
                'Backend' =>  array (
                  'category' => 'Backend',
                  'parent' => 'TinyMCE',
                ),
                '3rdPartyChunks' =>  array (
                  'category' => '3rdPartyChunks',
                  'parent' => 'Backend',
                ),
                'Frontend' =>  array (
                  'category' => 'Frontend',
                  'parent' => 'TinyMCE',
                ),
                'npCustomFormTpl' =>  array (
                  'category' => 'npCustomFormTpl',
                  'parent' => 'Frontend',
                ),
                'TinyUtilities' =>  array (
                  'category' => 'TinyUtilities',
                  'parent' => 'TinymceWrapper',
                ),
            );

            if (is_array($intersects)) {
                foreach ($intersects as $k => $fields) {
                    /* make sure we have all fields */
                    if (!checkFields('category,parent', $fields)) {
                        continue;
                    }
                    $categoryObj = $modx->getObject('modCategory', array('category' => $fields['category']));
                    if (!$categoryObj) {
                        continue;
                    }
                    $parentObj = $modx->getObject('modCategory', array('category' => $fields['parent']));
                        if ($parentObj) {
                            $categoryObj->set('parent', $parentObj->get('id'));
                        }
                    $categoryObj->save();
                }
            }
            break;

        case xPDOTransport::ACTION_UNINSTALL:
            break;
    }
}

return true;