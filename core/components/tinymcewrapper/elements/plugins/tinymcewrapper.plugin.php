<?php
/*TinymceWrapper transforms textareas (introtext, description, content, RichTVs, File/Image TVs, Quick Update/Create, MIGX TVs.

plugin fires at
OnRichTextEditorRegister
OnDocFormPrerender 

FOR ALL ROUND ENJOYMENT THROUGH OUT THE MANANGER
(quick update/create resources, Responsive FileManager link in top nav, MIGX CMPS)
OnManagerPageInit

DON'T WORRY, YOUR SITE WILL NOT BE SLOW ON ACCOUNT OF THIS PLUGIN

-------------------Roadmap:
-Create more beautiful themes;
-Look for more ways to be awesome;
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
  $modx->event->output('TinymceWrapper');
  return;
}

//whether the user has RTE enabled in System Settings
$useEditor = $modx->getOption('use_editor');
//is our awesome wrapper the set one?
$whichEditor = $modx->getOption('which_editor');

$sp = $scriptProperties;
//let's grab a few things from our plugin's defualt properties property set
$activate = $modx->getOption('activateTinyMCE', $sp);
$jQuerySrc = $modx->getOption('jQuery', $sp);
$tinySrc = $modx->getOption('tinySrc', $sp);
$responsiveFileManagerPath = $modx->getOption('responsiveFileManagerPath', $sp);
$introtext = $modx->getOption('Introtext', $sp);
$intro = '';
$description = $modx->getOption('Description', $sp);
$desc = '';
$content = $modx->getOption('Content', $sp);
$con = '';
$tvs = $modx->getOption('TVs', $sp);
$tvAddict = $modx->getOption('tvAddict', $sp);
$tvSuperAddict = $modx->getOption('tvSuperAddict', $sp);
$fileImageTVs = $modx->getOption('fileImageTVs', $sp);
$browserTVs = '';
$disable = $modx->getOption('disableEnableCheckbox', $sp);
//if a suffix is entered, all the chunks in use must have the same suffix. (e.g. TinymceWrapperIntrotext-suff, TinymceWrapperDescription-suff,TinymceWrapperContent-suff,TinymceWrapperTvs-suff)
$suffix = $modx->getOption('chunkSuffix', $sp);

//when TinyMCE is temporarily disabled, any new edit is updated before saving
//keyup vs mouseleave .....on change seems more trustworthy than mouse events
$autoSaveTextAreas = '
  function autoSaveTextAreas(selectorId){
    setTimeout(function(){
      $("#"+selectorId).on("change", function() {
        tinyMCE.get(selectorId).setContent($("#"+selectorId).val())
        // console.log(selectorId+" has been updated");//debug stuff
      })
    },500)
   }
';
if ($responsiveFileManagerPath) {
  $assetsRfmUrl ='
  extFilemanagerPath = "'.$responsiveFileManagerPath.'filemanager/";
  extPluginsFilemanager = "'.$responsiveFileManagerPath.'filemanager/plugin.min.js";
  extPluginsResponsivefilemanager = "'.$responsiveFileManagerPath.'tinymce/plugins/responsivefilemanager/plugin.min.js";
  ';
}
//lock the below to this event, to prevent spill over
if ($modxEventName == 'OnDocFormPrerender') {
  //let's expose the RFM rootfolder url for TinyMCE's external filemanager plugins for the chunks to access

  $enableDisableTiny = '';
  //is the enable/disable TinyMCE option selected? If so, let's create all the buttons at once; this will be split later on. This is good for TVs that have default content, and user wishes to revert. Disable TinyMCE, then revert.
  //there are two $("#ta") below; don't ask me why the Articles' Container/Child are has own thing going own here
  if ($disable == 1) {
  //prepend is better than append - you'll see!!!
    $disableTitle = 'Disable TinyMCE';
    $enableDisableTiny = '
    $("#modx-resource-introtext").parent().parent().prepend("<input data-tiny=\'modx-resource-introtext\' checked=\'checked\' title=\''.$disableTitle.'\' type=\'checkbox\' class=\'tinyTVcheck\' />&nbsp;&nbsp;&nbsp;");@
    $("#modx-resource-description").parent().parent().prepend("<input data-tiny=\'modx-resource-description\' checked=\'checked\' title=\''.$disableTitle.'\' type=\'checkbox\' class=\'tinyTVcheck\' />&nbsp;&nbsp;&nbsp;");@
    $("#ta").parents("#modx-resource-content").find(".x-panel-header-text").prepend("<input data-tiny=\'ta\' checked=\'checked\' title=\''.$disableTitle.'\' type=\'checkbox\' class=\'tinyTVcheck\' />&nbsp;&nbsp;&nbsp;");
    if($("#articles-box-publishing-information").length){
      $("#ta").parents(".contentblocks_replacement").find("label[for=ta]").prepend("<input data-tiny=\'ta\' checked=\'checked\' title=\''.$disableTitle.'\' type=\'checkbox\' class=\'tinyTVcheck\' />&nbsp;&nbsp;&nbsp;");
    }
    if($("#modx-resource-tabs__articles-tab-template").length){
      $("#modx-resource-header").append("<p id=\'tinyArtAlert\' style=\'width:70%;margin:0 auto;background-color:#32AB9A;padding:10px;border-radius:10px;color:white;text-align:center;\'><b>TinyMCE Wrapper Raw Code Protection:</b><br>Check this Articles Container > Template [Tab] > Content, before saving.<br>Unchecking the box will not only disable but remove TinyMCE, thus protecting your code</p>");
      $("#ta").parent().parent().find("label[for=ta]").prepend("<input data-tiny=\'ta\' checked=\'checked\' title=\'Remove TinyMCE \' type=\'checkbox\' class=\'tinyTVchecky\' onclick=\'javascript:tinymce.get(\"ta\").remove();$(this).remove();$(\"#tinyArtAlert\").slideUp().remove();\' />&nbsp;&nbsp;&nbsp;");
    }
  ';
  //let's split the enable/disable checkboxes so that they don't appear randomly or unexpectedly
  $enableDisableTiny = explode("@", $enableDisableTiny);
  //what happens when you click the enable/disable checkbox
  $enableDisableTinyClick = '
    $(".tinyTVcheck").mousedown(function() {
      autoSaveTextAreas($(this).attr("data-tiny"));
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

  //All TVs are here nicely placed independent of strict conditions, just in case we want to activate TVS even when RTE is disabled for a particular resource
  if ($tvs == 1) {
    $tvsChunk = $modx->getChunk('TinymceWrapperTVs' . $suffix);
    if ($tvsChunk) {
      //let's remove the checkboxes that enables/disables TinyMCE for the TVs
      //let's allow the TV reset button to work through TinyMCE, either enabled or disabled - textareas are updated .on change + the delay is neccesary since we are pseudo binding to existing click event
      if ($disable == 1) {
        $richTv = '
        if($(".modx-richtext").length){
          function updateReset(updateR){
            setTimeout(function(){
              tinyMCE.get(updateR).setContent($("#"+updateR).val());
              // console.log(updateR+" has been updated");//debug stuff
            },200)
          }
          $.each($(".modx-richtext"), function() {
            updateR = $(this).attr("id");
          $(this).parent().parent().find(".modx-tv-reset").on("click", function(){
            updateReset($(this).attr("data-tiny"));
          });
          $(this).parent().parent().prepend("<input data-tiny=\'"+this.id+"\' checked=\'checked\' title=\'Disable TinyMCE\' type=\'checkbox\' class=\'tinyTVcheck\' />");
          $(this).parent().parent().find(".modx-tv-reset").attr("data-tiny",this.id)
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
          $(this).parent().parent().find(".modx-tv-reset").on("click", function(){$(this).change()});
            });
        setTimeout(function(){
          ' . $tvsChunk . '
        },1000);
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
    - Create tinymce #tinyFileImageBrowser on condition; give a definite but blank CSS theme to avoid overriding issues. Allow cross-browser amiability by setting to inline:true
    - make rfmTinyPopup popup somewhat responsive
    - add RFM menu button to MODx Media drop down - depends on the option fileImageTvs
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
          rfmUrl = "rfmPopup(\''.MODX_ASSETS_URL.'components/tinymcewrapper/responsivefilemanager/filemanager/dialog.php?type=2&amp;popup=1&amp;field_id="+this.id+"\')";
          rfmTinyUrl = "rfmTinyPopup(\''.MODX_ASSETS_URL.'components/tinymcewrapper/responsivefilemanager/filemanager/dialog.php?type=2&amp;field_id="+this.id+"\',\'File&nbsp;Browser&nbsp;&nbsp;&nbsp;-&nbsp;Responsive&nbsp;FileManager\')";
          rfmBtn = \'&nbsp;RFM&nbsp;(all&nbsp;files)&nbsp;\';
          rfmBtnTitle = \'&nbsp;RFM&nbsp;All-File&nbsp;Browser&nbsp;\';
          rfmPrev = "";
            }
            else{
          rfmUrl = "rfmPopup(\''.MODX_ASSETS_URL.'components/tinymcewrapper/responsivefilemanager/filemanager/dialog.php?type=1&amp;popup=1&amp;field_id="+this.id+"\')";
          rfmTinyUrl = "rfmTinyPopup(\''.MODX_ASSETS_URL.'components/tinymcewrapper/responsivefilemanager/filemanager/dialog.php?type=1&amp;field_id="+this.id+"\',\'Image-Only&nbsp;Browser&nbsp;&nbsp;&nbsp;-&nbsp;Responsive&nbsp;FileManager\')";
          rfmBtn = \'&nbsp;RFM&nbsp;(images)&nbsp;\';
          rfmBtnTitle = \'&nbsp;RFM&nbsp;Image-Only&nbsp;Browser&nbsp;\';
          rfmPrev = "<img class=\'rfmPrev\' title=\'preview by RFM Image Browser\' src=\'\' style=\'width:100px;display:none;\' />";
            }
            $(this).parents(".x-form-item")
            .find(".modx-tv-caption")
            .parent()
            .prepend("<input class=\'rfmBtnClass x-form-field-wrap x-form-trigger\' type=\'button\' value="+rfmBtn+" title="+rfmBtnTitle+" onclick="+rfmTinyUrl+">"+rfmPrev);
            if(tinymce.editors.length < 1){
              tinymce.init({
                selector: "#tinyFileImageBrowser",
                skin_url:"'.MODX_ASSETS_URL.'components/tinymcewrapper/tinymceskins/fairOphelia",
                inline:true,
                forced_root_block : "",
                force_br_newlines : false,
                force_p_newlines : false
              })
            }
          })
          },1000);
        })
        ';
  }
}

//if user selects the option to activate this wrapper, we save him/her the trip of heading to System Settings - is this being too officious or intrusive?
if ($activateTinyMCE == 1) {
  if ($useEditor !== 1 || $whichEditor !== 'TinymceWrapper') {
    $use = $modx->getObject('modSystemSetting', 'use_editor');
    $use->set('value', 1);
    $use->save();
    $which = $modx->getObject('modSystemSetting', 'which_editor');
    $which->set('value', 'TinymceWrapper');
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
        $introChunk = $modx->getChunk('TinymceWrapperIntrotext' . $suffix);
        if ($introChunk) {
          $intro = $enableDisableTiny[0] . $introChunk;
        }
      }
      if ($description == 1) {
        $descChunk = $modx->getChunk('TinymceWrapperDescription' . $suffix);
        if ($descChunk) {
          $desc = $enableDisableTiny[1] . $descChunk;
        }
      }
      if ($content == 1) {
        $conChunk = $modx->getChunk('TinymceWrapperContent' . $suffix);
        if ($conChunk) {
          $con = $enableDisableTiny[2] . $conChunk;
        }
      }
      //all textareas depend on whether the Resource is Rich Text-enabled. We use so many IFs to protect against error
      //any and all Rich TVs + File and Image TVs will now be initiated
      //Now let's do the real init of all textareas
      //seems Ext.onReady is better than setTimeout, delay of 400
      $modx->regClientStartupHTMLBlock("<script>" .$autoSaveTextAreas . $assetsRfmUrl . $browserTVs . "Ext.onReady(function () {" . $intro . $desc . $con . $richTv . $enableDisableTinyClick . "});</script>");
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
          $modx->regClientStartupHTMLBlock("<script>" . $autoSaveTextAreas . $assetsRfmUrl . $browserTVs . "Ext.onReady(function () {" . $richTv . $enableDisableTinyClick . "});</script>");
        }
    }
  }
}
else{
  if ($modxEventName == 'OnDocFormPrerender') {
        if ($tvSuperAddict == 1) {
          if ($jQuerySrc) {
            $modx->regClientStartupHTMLBlock("<script src='" . $jQuerySrc . "'></script>");
          }
          if ($tinySrc) {
            $modx->regClientStartupHTMLBlock("<script src='" . $tinySrc . "'></script>");
          }
          $modx->regClientStartupHTMLBlock("<script>" . $autoSaveTextAreas . $assetsRfmUrl . $browserTVs . "Ext.onReady(function () {" . $richTv . $enableDisableTinyClick . "});</script>");
        }
  }
}

if ($modxEventName == 'OnManagerPageInit' || $modxEventName == 'OnDocFormPrerender') {
  $rfmTopNavMediaLink ='';
  if ($managerTopNavRFMLink == 1) {
    $managerTopNavRFMLink = $modx->getOption('managerTopNavRFMLink', $sp);
    // inject RFM link to Manager Top Nav Media dropdown
    $rfmTopNavMediaLink ='
      function rfmMediaPopup(url)
        {
          var w = 880;
          var h = 570;
          var l = Math.floor((screen.width-w)/2);
          var t = Math.floor((screen.height-h)/2);
          var win = window.open(url, "rfmPopupWindow", "scrollbars=1,width=" + w + ",height=" + h + ",top=" + t + ",left=" + l);
        }
      taskCounter = 0;
      var linkCheck = setInterval(function(){
        //this fancy modal popup requires jQuery and TinyMCE and at least one TV to be transformed
        //$("<li><a href=\"javascript:;\" onclick=\"rfmTinyPopup(MODx.config.assets_url+\'components/tinymcewrapper/responsivefilemanager/filemanager/dialog.php?type=0\',\'Responsive FileManager 9.9.3\')\">Responsive FileManager<span class=\'description\'>View, upload and manage media</span></a></li>").insertBefore("#file_browser");

        //requires no jQuery or TinyMCE - will work even if activateTinyMCE is false
        //modal window is not used, just pure browser pop up with all its advantages
        var fileBrowserBro = document.getElementById("file_browser");
        if(fileBrowserBro){
          taskCounter++;
          fileBrowserBro.insertAdjacentHTML( "afterbegin", "<li><a href=\"javascript:;\" onclick=\"rfmMediaPopup(MODx.config.assets_url+\'components/tinymcewrapper/responsivefilemanager/filemanager/dialog.php?type=0\')\">Responsive FileManager<span class=\"description\">Awesomely manage media</span></a></li>");
        }
        if(taskCounter = 1)
          {clearInterval(linkCheck);
          }
      },1000);
    ';
     $modx->regClientStartupHTMLBlock("<script>" . $rfmTopNavMediaLink . "</script>");
  }

  //let's catch only the textarea[content] when it is created. You can use livejquery or arrive.js if you like
  //make it non-obstrusive - mouseenter seems better tan mouseout - works when modal pops and cursor is already on the textarea

  $quickUpdateCreate = $modx->getOption('quickUpdateCreate', $sp);
  $quickUpdateTinyMCE = '';
  $conChunk = $modx->getChunk('TinymceWrapperQuickUpdate');

  if ($conChunk) {
    $con = $conChunk;
  }
  if ($quickUpdateCreate == 1){
    //do not load these twice when resources are being edited
    if ($modxEventName == 'OnManagerPageInit') {
      if ($jQuerySrc) {
        $modx->regClientStartupHTMLBlock("<script src='" . $jQuerySrc . "'></script>");
      }
      if ($tinySrc) {
        $modx->regClientStartupHTMLBlock("<script src='" . $tinySrc . "'></script>");
      }
    }

    $quickUpdateTinyMCE = '
      $(document).on("mouseenter", ".modx-window", function () {
        tinyContent = $(this).find("textarea[name=content]");
        quickyId = "#"+tinyContent.attr("id");
        dataTiny = tinyContent.attr("id");
        // if ($(this).has("textarea[name=content]").length){//will catch Quick edit files from server
        if ($(this).has("input[name=published]").length && $(this).has("textarea[name=content]").length){
          if ($(this).has(".tinyEn").length){
          }
          else{
          // tinyContent.parent().parent().find("label").prepend("<button class=\'tinyEn x-form-field-wrap x-form-trigger\' onclick=enableTiny(quickyId,dataTiny)>Edit with TinyMCE?</button>&nbsp;&nbsp;&nbsp;");
          $(this).find(".x-toolbar-left-row").prepend("<p onclick=enableTiny(quickyId,dataTiny) class=\'x-btn x-btn-small x-btn-icon-small-left x-btn-noicon\' unselectable=\'on\'><em><button class=\'tinyEn x-btn-text\'>Edit with TinyMCE</button></em></p>");
          $(this).find(".tinyEn").attr("data-tiny",dataTiny);
          // $(this).find("button:contains(\'Close\')").first().attr("data-tiny","close-"+dataTiny);
          // $(this).find("button:contains(\'Save\')").first().attr("data-tiny","save-"+dataTiny);
          }
        }
      // })
      // .on("mouseout", tinymce.activeEditor, function () {
        // if(tinymce.editors.length > 1){}
        // if (tinyMCE.activeEditor !== null){
        //   if(tinyMCE.activeEditor.isHidden() != true){
        //     tinyMCE.activeEditor.save();
        //     javascript:console.log("saved");
        //   }
        // }
      });
      function enableTiny(quickyId,id){
        enableTinyInit(quickyId);
        id = dataTiny;
        $("button[data-tiny=\'"+id+"\']").html("Disable TinyMCE").parent().parent().attr("onclick","disTiny(dataTiny)");
      }
      function disTiny(dataTiny){
        dataTiny = dataTiny;
        tinymce.get(dataTiny).hide();
        $("button[data-tiny=\'"+dataTiny+"\']").html("Enable TinyMCE").parent().parent().attr("onclick","enTiny(dataTiny)");
      }
      function enTiny(dataTiny){
        dataTiny = dataTiny;
        tinymce.get(dataTiny).show();
        $("button[data-tiny=\'"+dataTiny+"\']").html("Disable TinyMCE").parent().parent().attr("onclick","disTiny(dataTiny)");
      }
      function enableTinyInit(quickyId){
        $(quickyId).parents(".modx-window").find(".x-tab-panel-body.x-tab-panel-body-top").css({"overflow":"hidden","overflow-y":"auto"});
        ' .$con. '
      }
      ';
      $modx->regClientStartupHTMLBlock("<script>" .$assetsRfmUrl. $quickUpdateTinyMCE . "</script>");
  }
}