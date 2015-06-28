<?php
/**plugin fires at
OnRichTextEditorRegister - 0
OnDocFormPrerender - 1
**/
$modxEventName = $modx->event->name;
//let us tell System Settings that we have a new RTEditor
if ($modxEventName == 'OnRichTextEditorRegister') {
  $modx->event->output('TinyMCE_Wrapper');
  return;
}
//whether the user has RTE enabled in System Settings
$useEditor = $modx->getOption('use_editor');
//is our awesome wrapper the set one?
$whichEditor = $modx->getOption('which_editor');
$sp = $scriptProperties;
//let's grab a few things from our plugin's property set
//is it better to store these settings in the System Settings, seeing that this blasted plugin refreshes the whole site cache?
$activate = $modx->getOption('activateTinyMCE', $sp);
$jQuerySrc = $modx->getOption('jQuery', $sp);
$introtext = $modx->getOption('Introtext', $sp);
$intro = '';
$description = $modx->getOption('Description', $sp);
$desc = '';
$content = $modx->getOption('Content', $sp);
$con = '';
$tvs = $modx->getOption('TVs', $sp);
$disable = $modx->getOption('disableEnable', $sp);
//if a suffix is entered, all the chunks in use must have the same suffix. (e.g. TinyMCE_Wrapper_Introtext-suff, TinyMCE_Wrapper_Description-suff,TinyMCE_Wrapper_Content-suff,TinyMCE_Wrapper_Tvs-suff)
$suffix = $modx->getOption('chunk_Suffix', $sp);
$enableDisableTiny = '';
//is the enable/disable TinyMCE option selected? If so, let's create all the buttons at once; this will be split later on. This is good for TVs that have default content, and user wishes to revert. Disable TinyMCE, then revert.
if ($disable == 1) {
  $enableDisableTiny = '$("#modx-resource-introtext").parent().parent().prepend("<input data-tiny=\'modx-resource-introtext\' checked=\'checked\' title=\'Enable TinyMCE\' type=\'checkbox\' class=\'tinyTVcheck\' />");@
$("#modx-resource-description").parent().parent().prepend("<input data-tiny=\'modx-resource-description\' checked=\'checked\' title=\'Enable TinyMCE\' type=\'checkbox\' class=\'tinyTVcheck\' />");@
$("#ta").parent().parent().prepend("<input data-tiny=\'ta\' checked=\'checked\' title=\'Enable TinyMCE\' type=\'checkbox\' class=\'tinyTVcheck\' />");';
}
//let's split the enable/disable checkboxes so that they don't appear randomly or unexpectedly
$enableDisableTiny = explode("@", $enableDisableTiny);
//what happens when you click the enable/disable checkbox
$enableDisableTinyClick = '$(".tinyTVcheck").mousedown(function() {
        if (this.checked) {
            tinymce.get($(this).attr("data-tiny")).hide();
            $(this).trigger("change").attr("title","Enable TinyMCE");
        }
else{
 tinymce.get($(this).attr("data-tiny")).show();
            $(this).trigger("change").attr("title","Disable TinyMCE");
}
    });';
//if user selects the option to activate this wrapper, we save him/her the trip of heading to System Settings - is this being too officious or intrusive?
if ($activateTinyMCE) {
  if ($useEditor !== 1 || $whichEditor !== 'TinyMCE_Wrapper') {
    $use = $modx->getObject('modSystemSetting', 'use_editor');
    $use->set('value', 1);
    $use->save();
    $which = $modx->getObject('modSystemSetting', 'which_editor');
    $which->set('value', 'TinyMCE_Wrapper');
    $which->save();
  }
  //leave all elements alone - attack only resources
  if ($modxEventName == 'OnDocFormPrerender') {
    //all new resources before first save will not have TinyMCE enabled - also no need to check if user has richtext_default set to true in System settings.
    //see whether this is an existing resource, and has RTE enabled - this affects all textareas including Rich TVs
    if (isset($scriptProperties['resource']) && $resource->get('richtext')) {
      //should we load jQuery?
      if ($jQuerySrc) {
        $modx->regClientStartupHTMLBlock("<script src='" . $jQuerySrc . "'></script>");
      }
      //should we load TinyMCE (from CDN or assets folder)?
      if ($tinySrc) {
        $modx->regClientStartupHTMLBlock("<script src='" . $tinySrc . "'></script>");
      }
      //let's init introtext, description and content textareas only if user has specified so in this plugin's properties
      if ($introtext == 1) {
        $introChunk = $modx->getChunk('TinyMCE_Wrapper_Introtext' . $suffix);
        if ($introChunk) {
          $intro = $enableDisableTiny[0] . $introChunk;
        }
      }
      if ($description == 1) {
        $descChunk = $modx->getChunk('TinyMCE_Wrapper_Description' . $suffix);
        if ($descChunk) {
          $desc = $enableDisableTiny[1] . $descChunk;
        }
      }
      if ($content == 1) {
        $conChunk = $modx->getChunk('TinyMCE_Wrapper_Content' . $suffix);
        if ($conChunk) {
          $con = $enableDisableTiny[2] . $conChunk;
        }
      }
      //all textareas depend on whether the Resource is Rich Text-enabled. We use so many IFs to protect against error
      //any and all Rich TVs will now be initiated
      if ($tvs == 1) {
        $tvsChunk = $modx->getChunk('TinyMCE_Wrapper_TVs' . $suffix);
        if ($tvsChunk) {
          //let's remove the checkboxes that enables/disables TinyMCE for the TVs
          //change this IF/ELSE to keep the checkboxes always present for rich TVs
          if ($disable == 1) {
            $richTv = 'if($(".modx-richtext").length){
$.each($(".modx-richtext"), function() {
$(this).parent().parent().prepend("<input data-tiny=\'"+this.id+"\' checked=\'checked\' title=\'Disable TinyMCE\' type=\'checkbox\' class=\'tinyTVcheck\' />");' . $tvsChunk . '});}';
          } 
          else {
            $richTv = 'if($(".modx-richtext").length){
$.each($(".modx-richtext"), function() {' . $tvsChunk . '});}';
          }
        }
      }
      //Now let's do the real init of all textareas
      //seems Ext.onReady is better than setTimeout, delay of 400
      $modx->regClientStartupHTMLBlock("<script>Ext.onReady(function () {" . $intro . $desc . $con . $richTv . $enableDisableTinyClick . "});</script>");
    }
  }
}
