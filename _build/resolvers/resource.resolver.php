<?php
/**
* Resource resolver  for TinymceWrapper extra.
* Sets template, parent, and (optionally) TV values
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
            if (! isset($objectFields[$field])) {
                $modx->log(modX::LOG_LEVEL_ERROR, '[Resource Resolver] Missing field: ' . $field);
                return false;
            }
        }
        return true;
    }
}
if($object->xpdo) {
    $modx =& $object->xpdo;
    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:

            $intersects = array (
                0 =>  array (
                  'pagetitle' => 'TinymceWrapper',
                  'parent' => '0',
                  'template' => 'tw_ImogenTheme',
                  'tvValues' =>  array (
                    'TinymceWrapperMiscTV1' => '<h2>Free Download at Start Bootstrap!</h2>
<a href="#" class="btn btn-default btn-xl wow tada">Download Now!</a>',
                    'TinymceWrapperMiscTV2' => '<h2 class="section-heading">Let\'s Get In Touch!</h2>
<hr class="primary">
<p>Ready to start your next project with us? That\'s great! Give us a call or send us an email and we will get back to you as soon as possible!</p>',
                    'TinymceWrapperServiceTV1' => '<h3>Sturdy Templates</h3>
<p class="text-muted">Our templates are updated regularly so they don\'t break.</p>',
                    'TinymceWrapperServiceTV2' => '<h3>Ready to Ship</h3>
<p class="text-muted">You can use this theme as is, or you can make changes!</p>',
                    'TinymceWrapperServiceTV3' => '<h3>Up to Date</h3>
<p class="text-muted">We update dependencies to keep things fresh.</p>',
                    'TinymceWrapperServiceTV4' => '<h3>Made with Love</h3>
<p class="text-muted">You have to make your websites with love these days!</p>',
                  ),
                ),
                1 =>  array (
                  'pagetitle' => 'tw_elfinder_browser',
                  'parent' => 'TinymceWrapper',
                  'template' => 'tw_Empty',
                ),
                2 =>  array (
                  'pagetitle' => 'tw_magic_create_page',
                  'parent' => 'TinymceWrapper',
                  'template' => 'tw_ImogenTheme',
                  'tvValues' =>  array (
                    'TinymceWrapperMiscTV1' => '<h2>Free Download at Start Bootstrap!</h2>
<p><a class="btn btn-default btn-xl wow tada" href="#">Download Now!</a></p>',
                    'TinymceWrapperMiscTV2' => '<h2 class="section-heading">Let\'s Get In Touch!</h2>
<p>Ready to start your next project with us? That\'s great! Give us a call or send us an email and we will get back to you as soon as possible!</p>',
                    'TinymceWrapperServiceTV1' => '<h3>Sturdy Templates</h3>
<p>Our templates are updated regularly so they don\'t break.</p>',
                    'TinymceWrapperServiceTV2' => '<h3>Ready to Ship</h3>
<p>You can use this theme as is, or you can make changes!</p>',
                    'TinymceWrapperServiceTV3' => '<h3>Up to Date</h3>
<p>We update dependencies to keep things fresh.</p>',
                    'TinymceWrapperServiceTV4' => '<h3>Made with Love</h3>
<p>You have to make your websites with love these days!</p>',
                  ),
                ),
                3 =>  array (
                  'pagetitle' => 'tw_traditional_create_page',
                  'parent' => 'TinymceWrapper',
                  'template' => 'tw_Empty',
                  'tvValues' =>  array (
                    'TinymceWrapperMiscTV1' => '<h2>Free Download at Start Bootstrap!</h2>
<p><a href="#" class="btn btn-default btn-xl wow tada">Download Now!</a></p>',
                    'TinymceWrapperMiscTV2' => '<h2 class="section-heading">Let\'s Get In Touch!</h2>
<p>Ready to start your next project with us? That\'s great! Give us a call or send us an email and we will get back to you as soon as possible!</p>
<p>123-456-6789</p>
<p><a href="mailto:your-email@your-domain.com">feedback@startbootstrap.com</a></p>',
                    'TinymceWrapperServiceTV1' => '<h3>Sturdy Templates</h3>
<p>Our templates are updated regularly so they don\'t break.</p>',
                    'TinymceWrapperServiceTV2' => '<h3>Sturdy Templates</h3>
<p>Our templates are updated regularly so they don\'t break.</p>',
                    'TinymceWrapperServiceTV3' => '<h3>Sturdy Templates</h3>
<p>Our templates are updated regularly so they don\'t break.</p>',
                    'TinymceWrapperServiceTV4' => '<h3>Sturdy Templates</h3>
<p>Our templates are updated regularly so they don\'t break.</p>',
                    'TinyJSONGalleryTV' => '<h2 class="section-heading">Let\'s Get In Touch!</h2>
<p>Ready to start your next project with us? That\'s great! Give us a call or send us an email and we will get back to you as soon as possible!</p>
<p>123-456-6789</p>
<p><a href="mailto:your-email@your-domain.com">feedback@startbootstrap.com</a></p>',
                  ),
                ),
            );

            if (is_array($intersects)) {
                foreach ($intersects as $k => $fields) {
                    /* make sure we have all fields */
                    if (! checkFields('pagetitle,parent,template', $fields)) {
                        continue;
                    }
                    $resource = $modx->getObject('modResource', array('pagetitle' => $fields['pagetitle']));
                    if (! $resource) {
                        continue;
                    }
                    if ($fields['template'] == 'default') {
                        $resource->set('template', $modx->getOption('default_template'));
                    } else {
                        $templateObj = $modx->getObject('modTemplate', array('templatename' => $fields['template']));
                        if ($templateObj) {
                            $resource->set('template', $templateObj->get('id'));
                        } else {
                            $modx->log(modX::LOG_LEVEL_ERROR, '[Resource Resolver] Could not find template: ' . $fields['template']);
                        }
                    }
                    if (!empty($fields['parent'])) {
                        if ($fields['parent'] != 'default') {
                            $parentObj = $modx->getObject('modResource', array('pagetitle' => $fields['parent']));
                            if ($parentObj) {
                                $resource->set('parent', $parentObj->get('id'));
                            } else {
                                $modx->log(modX::LOG_LEVEL_ERROR, '[Resource Resolver] Could not find parent: ' . $fields['parent']);
                            }
                        }
                    }

                    if (isset($fields['tvValues'])) {
                        foreach($fields['tvValues'] as $tvName => $value) {
                            $resource->setTVValue($tvName, $value);
                        }

                    }
                    $resource->save();
                }

            }
            break;

        case xPDOTransport::ACTION_UNINSTALL:
            break;
    }
}

return true;