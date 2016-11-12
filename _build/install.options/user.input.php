<?php

/**
 * Script to interact with user during TinymceWrapper package install
 *
 * Copyright 2016 by donShakespeare donShakespeare@gmail.com
 * Created on 08-01-2016
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
 *
 * @package tinymcewrapper
 */

/**
 * Description: Script to interact with user during TinymceWrapper package install
 * @package tinymcewrapper
 * @subpackage build
 */

/* The return value from this script should be an HTML form (minus the
 * <form> tags and submit button) in a single string.
 *
 * The form will be shown to the user during install
 *
 * This example presents an HTML form to the user with two input fields
 * (you can have as many as you like).
 *
 * The user's entries in the form's input field(s) will be available
 * in any php resolvers with $modx->getOption('field_name', $options, 'default_value').
 *
 * You can use the value(s) to set system settings, snippet properties,
 * chunk content, etc. based on the user's preferences.
 *
 * One common use is to use a checkbox and ask the
 * user if they would like to install a resource for your
 * component (usually used only on install, not upgrade).
 */

/* This is an example. Modify it to meet your needs.
 * The user's input would be available in a resolver like this:
 *
 * $changeSiteName = (! empty($modx->getOption('change_sitename', $options, ''));
 * $siteName = $modx->getOption('sitename', $options, '').
 *
 * */

$output = '
<h2 style="text-align:center;">TinymceWrapper(one word! lowercase "mce")<br><br>
<span style="display:block;font-size:12px;">You are about to enjoy the best and most powerful and configurable Editing experience for MODX
<br>Use it, like it... please donate! :)</span></h2>
<hr>
<p>
<input type="checkbox" name="demo_resources" id="demo_resources" checked="checked" value=1> <b>Install TinymceWrapper startup Resources?</b> (includes elFinder HTML)
<span style="display:block;font-size:12px;padding-left:20px;"> - These(with unmodified pagetitle) WILL BE REMOVED when TinymceWrapper is uninstalled.
<br> - Of all the best 15 reasons to opt out of these demo resources, not one is worth it in the long run. Save yourself future debug problems. Install them!</span>
</p><br><br>
<p>
Not a pro yet?<br>
<a href="https://forums.modx.com/thread/97694/support-comments-for-tinymcewrapper?page=27#dis-post-543700" target="_blank">MODX Forum: Quick steps by enigmatic_user</a><br>
<a href="https://modxcommunity.slack.com/messages/tinymcewrapper-suite/" target="_blank">SLACK CHANNEL SUPPORT</a>: No need to get frustrated, you will always get help.
<b>donShakespeare</b> also provides superior premium support.
</p>
<hr>
<h3>EXCERPT from Changelog:</h3>
<div style="height:10px;">
++SURVIVE UPGRADES: duplicate edited chunks, retain names, add suffix, specify suffix in TinymceWrapper Plugin properties.<br><br>
++CREATE PropertySets where applicable to protect your Plugin and Snippet alterations.<br><br> 
++DEPENDENCIES (optional): pdoTools / getResources, tagLister, MODX Resizer, NewsPublisher, MIGX getImageList<br><br>
++ALWAYS START BY viewing the TinymceWrapper Demo Resource (it has everything enabled, frontend/backend)<br><br>
++INCOMPATIBILITIES<br>
  FixedPre (and any Extra running on OnParseDocument) kills TinymceWrapper dead. Bruno17 has found a possible MODX glitch.<br><br>
  When our TinyJSONGallery is on, Extras Image+ and Gallery do a weird thing of outputting tv path at top of page - will address jako\'s suggestion before next winter<hr>
++CONFIGURE your RTE: valid_elements + valid_children = unlimited possibilities!!!<br>
</div>
';


return $output;