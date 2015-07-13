<?php
/*TinyMCE_Wrapper
plugin fires at
OnRichTextEditorRegister - 0
OnDocFormPrerender - 1

-------------------Roadmap:
-Create more awesome themes; find a better home for this plugin's properties (mayhaps MIGx, System Settings, bare CMP...???)
-Now that all the MODx native textareas, RichText, File and Image TVs are supported, move to MIGX, textreas created on the fly / "Quick Update"
---------------------------

Use freely, recode freely, report freely, enjoy freely
Dedicated to those who have cried
---------------------------

http://www.leofec.com/modx-revolution/
-donshakespeare in the MODx forum
*/

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
$tvAddict = $modx->getOption('tvAddict', $sp);
$fileImageTVs = $modx->getOption('fileImageTVs', $sp);
$browserTVs = '';
$disable = $modx->getOption('disableEnableCheckbox', $sp);
//if a suffix is entered, all the chunks in use must have the same suffix. (e.g. TinyMCE_Wrapper_Introtext-suff, TinyMCE_Wrapper_Description-suff,TinyMCE_Wrapper_Content-suff,TinyMCE_Wrapper_Tvs-suff)
$suffix = $modx->getOption('chunk_Suffix', $sp);
$enableDisableTiny = '';
//is the enable/disable TinyMCE option selected? If so, let's create all the buttons at once; this will be split later on. This is good for TVs that have default content, and user wishes to revert. Disable TinyMCE, then revert.
//there are two $("#ta") below; don't ask me why the Article's Extra has its own thing going own here
if ($disable == 1) {
//prepend is better than append - you'll see!!!
  $disableTitle = 'Disable TinyMCE - you must re-enable for changes to be saved';
  $enableDisableTiny = '
  $("#modx-resource-introtext").parent().parent().prepend("<input data-tiny=\'modx-resource-introtext\' checked=\'checked\' title=\''.$disableTitle.'\' type=\'checkbox\' class=\'tinyTVcheck\' />&nbsp;&nbsp;&nbsp;");@
  $("#modx-resource-description").parent().parent().prepend("<input data-tiny=\'modx-resource-description\' checked=\'checked\' title=\''.$disableTitle.'\' type=\'checkbox\' class=\'tinyTVcheck\' />&nbsp;&nbsp;&nbsp;");@
  $("#ta").parents("#modx-resource-content").find(".x-panel-header-text").prepend("<input data-tiny=\'ta\' checked=\'checked\' title=\''.$disableTitle.'\' type=\'checkbox\' class=\'tinyTVcheck\' />&nbsp;&nbsp;&nbsp;");
  $("#ta").parents(".contentblocks_replacement").find("label[for=ta]").prepend("<input data-tiny=\'ta\' checked=\'checked\' title=\''.$disableTitle.'\' type=\'checkbox\' class=\'tinyTVcheck\' />&nbsp;&nbsp;&nbsp;");
';
//let's split the enable/disable checkboxes so that they don't appear randomly or unexpectedly
$enableDisableTiny = explode("@", $enableDisableTiny);
//what happens when you click the enable/disable checkbox
$enableDisableTinyClick = '
  $(".tinyTVcheck").mousedown(function() {
    if (this.checked) {
      tinymce.get($(this).attr("data-tiny")).hide();
      $(this).trigger("change").attr("title","Enable TinyMCE");
    }
    else{
      tinymce.get($(this).attr("data-tiny")).show();
      $(this).trigger("change").attr("title","'.$disableTitle.'");
    }
    });';
}

//All TVs are here nicely placed independent of strict conditions, just in case we want to activate TVS even RTE is diabled for a particular reource
if ($tvs == 1) {
  $tvsChunk = $modx->getChunk('TinyMCE_Wrapper_TVs' . $suffix);
  if ($tvsChunk) {
    //let's remove the checkboxes that enables/disables TinyMCE for the TVs
    if ($disable == 1) {
      $richTv = '
      if($(".modx-richtext").length){
        $.each($(".modx-richtext"), function() {
        $(this).parent().parent().prepend("<input data-tiny=\'"+this.id+"\' checked=\'checked\' title=\'Disable TinyMCE - you must re-enable for changes to be saved\' type=\'checkbox\' class=\'tinyTVcheck\' />");
        });
      setTimeout(function(){
        ' . $tvsChunk . '
      },1000);
      }
      ';
    } 
    else {
      $richTv = '
      if($(".modx-richtext").length){
        $.each($(".modx-richtext"), function() {
          });
          ' . $tvsChunk . '
      }';
    }
  }
}
if ($fileImageTVs == 1) {
  /*
  - RFM callback when an item is clicked
  - provide two ways to pop up RFM; the TInyMCE way is neater and more uniform
  - append hidden input#tinyFileImageBrowser to the body so that we have at least one active editor, in case the user has disabled TinyMCE for all other textareas and TVs
  - do some magic: create the respective image and file RFM buttons with appropriate properties when the page is really ready
  - create rudimentary image prev something similar to the native MODx' file browser
  - init blank and hidden #tinyFileImageBrowser
  - give #tinyFileImageBrowser a definite but blank CSS theme to avoid overriding issues
  - make rfmTinyPopup popup somewhat responsive
  */
  $browserTVs = '
    function responsive_filemanager_callback(field_id){
      thisFieldVal = $("#"+field_id).val();
      thisFieldNum = field_id.split("er");
      $("input#tv"+thisFieldNum[1]).val(thisFieldVal);
      $("#tv-image-preview-"+thisFieldNum[1]+" img").attr("title","preview by native MODx Image Browser");
      $("#"+field_id).parents(".modx-tv").find(".rfmPrev").hide().attr("src",thisFieldVal).insertBefore("#tv-image-preview-"+thisFieldNum[1]).fadeIn("slow");
      tinyMCE.activeEditor.windowManager.close();
    }
     function rfmPopup(url, title)
      {
        var w = 880;
        var h = 570;
        var l = Math.floor((screen.width-w)/2);
        var t = Math.floor((screen.height-h)/2);
        var win = window.open(url, title, "scrollbars=1,width=" + w + ",height=" + h + ",top=" + t + ",left=" + l);
      }
     function rfmTinyPopup(url, title)
      {
       tinyMCE.activeEditor.windowManager.open({
       url : url,
       title: title,
       width : $(window).width()/1.2,
       height : $(window).height()/1.2
      });
      }
      Ext.onReady(function(){
       setTimeout(function(){
         $("body").append("<input id=\'tinyFileImageBrowser\' type=\'hidden\' value=\'\' />");
         $("input[id^=tvbrowser]").each(function(){
          fileOrImage = $(this).parents(".modx-tv").find(".x-form-file-trigger").attr("id");
        if($("#"+fileOrImage).length){
        rfmUrl = "rfmPopup(\''.MODX_ASSETS_URL.'components/tinymce_wrapper/responsivefilemanager/filemanager/dialog.php?type=2&amp;popup=1&amp;field_id="+this.id+"\')";
        rfmTinyUrl = "rfmTinyPopup(\''.MODX_ASSETS_URL.'components/tinymce_wrapper/responsivefilemanager/filemanager/dialog.php?type=2&amp;field_id="+this.id+"\',\'File&nbsp;Browser&nbsp;&nbsp;&nbsp;-&nbsp;Responsive&nbsp;FileManager\')";
        rfmBtn = \'&nbsp;RFM&nbsp;(all&nbsp;files)&nbsp;\';
        rfmBtnTitle = \'&nbsp;RFM&nbsp;All-File&nbsp;Browser&nbsp;\';
        rfmPrev = "";
          }
          else{
        rfmUrl = "rfmPopup(\''.MODX_ASSETS_URL.'components/tinymce_wrapper/responsivefilemanager/filemanager/dialog.php?type=1&amp;popup=1&amp;field_id="+this.id+"\')";
        rfmTinyUrl = "rfmTinyPopup(\''.MODX_ASSETS_URL.'components/tinymce_wrapper/responsivefilemanager/filemanager/dialog.php?type=1&amp;field_id="+this.id+"\',\'Image-Only&nbsp;Browser&nbsp;&nbsp;&nbsp;-&nbsp;Responsive&nbsp;FileManager\')";
        rfmBtn = \'&nbsp;RFM&nbsp;(images)&nbsp;\';
        rfmBtnTitle = \'&nbsp;RFM&nbsp;Image-Only&nbsp;Browser&nbsp;\';
        rfmPrev = "<img class=\'rfmPrev\' title=\'preview by RFM Image Browser\' src=\'\' style=\'width:100px;display:none;\' />";
          }
          $(this).parents(".x-form-item")
          .find(".modx-tv-caption")
          .parent()
          .prepend("<input class=\'rfmBtnClass x-form-field-wrap x-form-trigger\' type=\'button\' value="+rfmBtn+" title="+rfmBtnTitle+" onclick="+rfmTinyUrl+">"+rfmPrev);
          tinymce.init({
          selector: "#tinyFileImageBrowser",
          inline:true,
          menubar:false,
          toolbar:false,
          statusbar:false, 
          relative_urls:false,
          skin: "blank",
          skin_url:"'.MODX_ASSETS_URL.'components/tinymce_wrapper/modxSkins/blank",
          plugins:"",
          height: 0,
          width: 0,
          valid_elements:"",
          forced_root_block:false,
           })
        })
        },1000)
      })
      ';
}
      




//if user selects the option to activate this wrapper, we save him/her the trip of heading to System Settings - is this being too officious or intrusive?
if ($activateTinyMCE) {
  if ($useEditor !== 1 || $whichEditor !== 'TinyMCE_Wrapper') {
    $use = $modx->getObject('modSystemSetting', 'use_editor');
    $use->set('value', 1);
    $use->save();
    $which = $modx->getObject('modSystemSetting', 'which_editor');
    $which->set('value', 'TinyMCE_Wrapper');
    $which->save();
    // $forceActivate = $modx->getOption('activateTinyMCE', $sp);
    // $forceActivate->set('value', 0);
    // $forceActivate->save();
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
      //any and all Rich TVs + File and Image TVs will now be initiated
      //Now let's do the real init of all textareas
      //seems Ext.onReady is better than setTimeout, delay of 400
      $modx->regClientStartupHTMLBlock("<script>" . $browserTVs . "Ext.onReady(function () {" . $intro . $desc . $con . $richTv . $enableDisableTinyClick . "});</script>");
    }
    //let's see if the person wants TVs activated even when RTE is disabled for the Resource.
    elseif (isset($scriptProperties['resource']) && !$resource->get('richtext')) {
        if ($tvAddict == 1) {
          if ($jQuerySrc) {
            $modx->regClientStartupHTMLBlock("<script src='" . $jQuerySrc . "'></script>");
          }
          if ($tinySrc) {
            $modx->regClientStartupHTMLBlock("<script src='" . $tinySrc . "'></script>");
          }
          $modx->regClientStartupHTMLBlock("<script>" . $browserTVs . "Ext.onReady(function () {" . $richTv . $enableDisableTinyClick . "});</script>");
        }
    }
  }
}
