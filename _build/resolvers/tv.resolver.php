<?php
/**
* Resolver to connect TVs to templates for TinymceWrapper extra
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
                $modx->log(modX::LOG_LEVEL_ERROR, '[TV Resolver] Missing field: ' . $field);
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
                0 =>  array (
                  'templateid' => 'tw_ImogenTheme',
                  'tmplvarid' => 'TinymceWrapperMiscTV1',
                  'rank' => 0,
                ),
                1 =>  array (
                  'templateid' => 'tw_ImogenTheme',
                  'tmplvarid' => 'TinymceWrapperMiscTV2',
                  'rank' => 0,
                ),
                2 =>  array (
                  'templateid' => 'tw_ImogenTheme',
                  'tmplvarid' => 'TinymceWrapperServiceTV1',
                  'rank' => 0,
                ),
                3 =>  array (
                  'templateid' => 'tw_ImogenTheme',
                  'tmplvarid' => 'TinymceWrapperServiceTV2',
                  'rank' => 0,
                ),
                4 =>  array (
                  'templateid' => 'tw_ImogenTheme',
                  'tmplvarid' => 'TinymceWrapperServiceTV3',
                  'rank' => 0,
                ),
                5 =>  array (
                  'templateid' => 'tw_ImogenTheme',
                  'tmplvarid' => 'TinymceWrapperServiceTV4',
                  'rank' => 0,
                ),
                6 =>  array (
                  'templateid' => 'tw_ImogenTheme',
                  'tmplvarid' => 'TinymceWrapperCategoryTV1',
                  'rank' => 0,
                ),
                7 =>  array (
                  'templateid' => 'tw_ImogenTheme',
                  'tmplvarid' => 'TinymceWrapperCategoryTV2',
                  'rank' => 0,
                ),
                8 =>  array (
                  'templateid' => 'tw_ImogenTheme',
                  'tmplvarid' => 'TinymceWrapperCategoryTV3',
                  'rank' => 0,
                ),
                9 =>  array (
                  'templateid' => 'tw_ImogenTheme',
                  'tmplvarid' => 'TinymceWrapperCategoryTV4',
                  'rank' => 0,
                ),
                10 =>  array (
                  'templateid' => 'tw_ImogenTheme',
                  'tmplvarid' => 'TinymceWrapperCategoryTV5',
                  'rank' => 0,
                ),
                11 =>  array (
                  'templateid' => 'tw_ImogenTheme',
                  'tmplvarid' => 'TinymceWrapperCategoryTV6',
                  'rank' => 0,
                ),
                12 =>  array (
                  'templateid' => 'tw_ImogenTheme',
                  'tmplvarid' => 'TinymceWrapperImageTV1',
                  'rank' => 0,
                ),
                13 =>  array (
                  'templateid' => 'tw_ImogenTheme',
                  'tmplvarid' => 'TinymceWrapperImageTV2',
                  'rank' => 0,
                ),
                14 =>  array (
                  'templateid' => 'tw_ImogenTheme',
                  'tmplvarid' => 'TinymceWrapperImageTV3',
                  'rank' => 0,
                ),
                15 =>  array (
                  'templateid' => 'tw_ImogenTheme',
                  'tmplvarid' => 'TinymceWrapperImageTV4',
                  'rank' => 0,
                ),
                16 =>  array (
                  'templateid' => 'tw_ImogenTheme',
                  'tmplvarid' => 'TinymceWrapperImageTV5',
                  'rank' => 0,
                ),
                17 =>  array (
                  'templateid' => 'tw_ImogenTheme',
                  'tmplvarid' => 'TinymceWrapperImageTV6',
                  'rank' => 0,
                ),
                18 =>  array (
                  'templateid' => 'tw_ImogenTheme',
                  'tmplvarid' => 'TinymceWrapperTags',
                  'rank' => 0,
                ),
                19 =>  array (
                  'templateid' => 'tw_ImogenTheme',
                  'tmplvarid' => 'TinyJSONGalleryTV',
                  'rank' => 0,
                ),
            );

            if (is_array($intersects)) {
                foreach ($intersects as $k => $fields) {
                    /* make sure we have all fields */
                    if (!checkFields('tmplvarid,templateid', $fields)) {
                        continue;
                    }
                    $tv = $modx->getObject('modTemplateVar', array('name' => $fields['tmplvarid']));
                    if ($fields['templateid'] == 'default') {
                        $template = $modx->getObject('modTemplate', $modx->getOption('default_template'));
                    } else {
                        $template = $modx->getObject('modTemplate', array('templatename' => $fields['templateid']));
                    }
                    if (!$tv || !$template) {
                        $modx->log(xPDO::LOG_LEVEL_ERROR, 'Could not find Template and/or TV ' .
                            $fields['templateid'] . ' - ' . $fields['tmplvarid']);
                        continue;
                    }
                    $tvt = $modx->getObject('modTemplateVarTemplate', array('templateid' => $template->get('id'), 'tmplvarid' => $tv->get('id')));
                    if (! $tvt) {
                        $tvt = $modx->newObject('modTemplateVarTemplate');
                    }
                    if ($tvt) {
                        $tvt->set('tmplvarid', $tv->get('id'));
                        $tvt->set('templateid', $template->get('id'));
                        if (isset($fields['rank'])) {
                            $tvt->set('rank', $fields['rank']);
                        } else {
                            $tvt->set('rank', 0);
                        }
                        if (!$tvt->save()) {
                            $modx->log(xPDO::LOG_LEVEL_ERROR, 'Unknown error creating templateVarTemplate for ' .
                                $fields['templateid'] . ' - ' . $fields['tmplvarid']);
                        }
                    } else {
                        $modx->log(xPDO::LOG_LEVEL_ERROR, 'Unknown error creating templateVarTemplate for ' .
                            $fields['templateid'] . ' - ' . $fields['tmplvarid']);
                    }


                }

            }
            break;

        case xPDOTransport::ACTION_UNINSTALL:
            break;
    }
}

return true;