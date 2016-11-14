<?php
/*TinymceWrapper transforms all MODX native and non-native textareas (introtext, description, content, RichTVs, File/Image TVs, Quick Update/Create, MIGX TVs etc etc)

plugin fires at
OnRichTextEditorRegister
OnDocFormPrerender 

(optionally)
OnTempFormPrerender,OnSnipFormPrerender,OnChunkFormPrerender,OnPluginFormPrerender,OnFileEditFormPrerender

OnManagerPageInit
  FOR ALL ROUND ENJOYMENT THROUGH OUT THE MANAGER
  1. for (quick update/create resources & elements (for Ace or CodeMirror),
  2. for top nav media link for elFinder, Responsive FileManager and Roxy custom file browsers,


-------------------Roadmap:
-Create more beautiful themes;
-Look for more ways to be awesome;
---------------------------

Dedicated to those who have cried
---------------------------

http://www.leofec.com/modx-revolution/
-donshakespeare in the MODx forum
To God, almighty, be all the glory.
*/

// $modx->getService('error','error.modError', '', '');
$modxEventName = $modx->event->name;
//let us tell System Settings that we have a new RTEditor
if ($modxEventName == 'OnRichTextEditorRegister') {
  $modx->event->output('TinymceWrapper');
  return;
}

//let us get MODx browser callback ready to fire
if ($modxEventName == 'OnRichTextBrowserInit' && $autoFileBrowser == 'modxNativeBrowser') {
 $modx->controller->addJavascript(MODX_ASSETS_URL.'components/tinymcewrapper/browserConnectors/browser.js');
  $modx->event->output('twBrowserCallback');
  return;
}

//whether the user has RTE enabled in System Settings
$useEditor = $modx->getOption('use_editor');
//is our awesome wrapper the set one?
$whichEditor = $modx->getOption('which_editor');
$whichElementEditor = $modx->getOption('which_element_editor');
//whether the user has RTE set to default for all resources in System Settings
$richtext_default = $modx->getOption('richtext_default');

$sp = $scriptProperties;
//let's grab a few things from our plugin's defualt properties property set
$activate = $modx->getOption('activateTinyMCE', $sp);
$activateAceOrCodeMirror = $modx->getOption('activateAceOrCodeMirror', $sp);
$useAceOrCodeMirrorEveryWhere = $modx->getOption('useAceOrCodeMirrorEveryWhere', $sp);
$useAceOrCodeMirrorOnElementsFiles = $modx->getOption('useAceOrCodeMirrorOnElementsFiles', $sp);
$useAceOrCodeMirrorOnResources = $modx->getOption('useAceOrCodeMirrorOnResources', $sp);
$RTEualizeAceOrCodeMirror = $modx->getOption('RTEualizeAceOrCodeMirror', $sp);
$activateAceOrCodeMirrorOnNewResource = $modx->getOption('activateAceOrCodeMirrorOnNewResource', $sp);
$activateAceOrCodeMirrorOnRichText = $modx->getOption('activateAceOrCodeMirrorOnRichText', $sp);
$AceTHEME = $modx->getOption('AceTHEME', $sp);
$AceSrc = $modx->getOption('AceSrc', $sp);
$CodeMirrorTHEME = $modx->getOption('CodeMirrorTHEME', $sp);
$CodeMirrorSrc = $modx->getOption('CodeMirrorSrc', $sp);
$jQuerySrc = $modx->getOption('jQuery', $sp);
$tinySrc = $modx->getOption('tinySrc', $sp);
$newResources = $modx->getOption('newResources', $sp);
$introtext = $modx->getOption('Introtext', $sp);
$intro = '';
$description = $modx->getOption('Description', $sp);
$desc = '';
$content = $modx->getOption('Content', $sp);
$con = '';
$tvs = $modx->getOption('TVs', $sp);
$tvAddict = $modx->getOption('tvAddict', $sp);
$tvSuperAddict = $modx->getOption('tvSuperAddict', $sp);
$autoFileBrowser = $modx->getOption('autoFileBrowser', $sp);
$browserTopNAVsubtext = $modx->getOption('browserTopNAVsubtext', $sp);
$fileImageTVs = $modx->getOption('fileImageTVs', $sp);
$browserTVs = '';
$disable = $modx->getOption('disableEnableCheckbox', $sp);
//if a suffix is entered, all the chunks in use must have the same suffix. (e.g. TinymceWrapperIntrotext-suff, TinymceWrapperDescription-suff,TinymceWrapperContent-suff,TinymceWrapperTvs-suff)
$suffix = $modx->getOption('chunkSuffix', $sp);
$fileManagerTopNavLink = $modx->getOption('fileManagerTopNavLink', $sp);
$fileManagerTopNavModal = $modx->getOption('fileManagerTopNavModal', $sp);
$fileManagerTopNavModalSkin = $modx->getOption('fileManagerTopNavModalSkin', $sp);
$fileManagerTopNavModalSkin = $fileManagerTopNavModalSkin ? : '""';

//grab file browser options
$modxNativeBrowserRTEurl = $modx->getOption('modxNativeBrowserRTEurl', $sp);
$modxNativeBrowserRTEtitle = $modx->getOption('modxNativeBrowserRTEtitle', $sp);
$modxNativeBrowserTopNAVpresent = $modx->getOption('modxNativeBrowserTopNAVpresent', $sp);
$modxNativeBrowserQuirkMode = $modx->getOption('modxNativeBrowserQuirkMode', $sp);

$replaceDefaultFileImageTVbutton = $modx->getOption('replaceDefaultFileImageTVbutton', $sp) ? : 0;

$elFinderBrowserRTEurl = $modx->getOption('elFinderBrowserRTEurl', $sp);
$elFinderBrowserRTEtitle = $modx->getOption('elFinderBrowserRTEtitle', $sp);
$elFinderBrowserTopNAVurl = $modx->getOption('elFinderBrowserTopNAVurl', $sp);
$elFinderBrowserTopNAVtitle = $modx->getOption('elFinderBrowserTopNAVtitle', $sp);
$elFinderBrowserSHORTtitle = $modx->getOption('elFinderBrowserSHORTtitle', $sp);

$responsivefilemanagerBrowserRTEurl = $modx->getOption('responsivefilemanagerBrowserRTEurl', $sp);
$responsivefilemanagerBrowserRTEtitle = $modx->getOption('responsivefilemanagerBrowserRTEtitle', $sp);
$responsivefilemanagerBrowserTopNAVurl = $modx->getOption('responsivefilemanagerBrowserTopNAVurl', $sp);
$responsivefilemanagerBrowserTopNAVtitle = $modx->getOption('responsivefilemanagerBrowserTopNAVtitle', $sp);
$responsivefilemanagerBrowserSHORTtitle = $modx->getOption('responsivefilemanagerBrowserSHORTtitle', $sp);

$roxyFilemanBrowserRTEtitle = $modx->getOption('roxyFilemanBrowserRTEtitle', $sp);
$roxyFilemanBrowserRTEurl = $modx->getOption('roxyFilemanBrowserRTEurl', $sp);
$roxyFilemanBrowserTopNAVurl = $modx->getOption('roxyFilemanBrowserTopNAVurl', $sp);
$roxyFilemanBrowserTopNAVtitle = $modx->getOption('roxyFilemanBrowserTopNAVtitle', $sp);
$roxyFilemanBrowserSHORTtitle = $modx->getOption('roxyFilemanBrowserSHORTtitle', $sp);

//grab gallery settings
$enableImageGallery = $modx->getOption('enableImageGallery', $sp);
$tinyJSONGalleryTABtitle = $modx->getOption('tinyJSONGalleryTABtitle', $sp) ? : "JSON Image Gallery";
$tinyJSONGalleryTABposition = $modx->getOption('tinyJSONGalleryTABposition', $sp) ? : 0;
$imageGalleryIDs = $modx->getOption('imageGalleryIDs', $sp);
$galleryChunkNameKey = $modx->getOption('galleryChunkNameKey', $sp);
$TinyJSONGalleryTV = $modx->getOption('TinyJSONGalleryTV', $sp) ?:"TinyJSONGalleryTV";
$galleryJSfile = $modx->getOption('galleryJSfile', $sp);

//grab 3rd party TinyMCE inits
$customJS = $modx->getOption('customJS', $sp);
$customJSchunks = $modx->getOption('customJSchunks', $sp);

//this eliminates clutter and confusion: reusuable config is the way of the past and the future - code here will be put in placeholder [[+commonTinyMCECode]]
//apply comma here, not in the chunk calling it --na na, make user leave trailing comma in commonCode Chunk

if ($enableImageGallery == 1) {
  if ($modxEventName == 'OnChunkFormPrerender' || $modxEventName == 'OnDocFormPrerender') {
    $galleryIsGolden = 0;
    if ($modxEventName == 'OnChunkFormPrerender') {
      if($id){
        $thisChunkId = $id;
        $imageGalleryIDsTrue = '';
        if($imageGalleryIDs){
          $imageGalleryIDs = preg_replace('/\s+/', '', $imageGalleryIDs);
          $imageGalleryIDs = preg_replace("/[^a-z0-9,-_]+/i", ' ', $imageGalleryIDs);
          $imageGalleryIDs = explode(',', $imageGalleryIDs);
          if(in_array($thisChunkId, $imageGalleryIDs)) {
            $imageGalleryIDsTrue = 1;
          }
        }
        $chS = $modx->getObject("modChunk", $thisChunkId);
        $ch = $chS->get('name');
        $chunkGalleryVal = $chS->get('content');
        // if(in_array($thisChunkId, $imageGalleryIDs) || substr($ch, 0, strlen($galleryChunkNameKey)) === $galleryChunkNameKey && $enableImageGallery) {
        if($imageGalleryIDsTrue || strpos($ch, $galleryChunkNameKey) !== false && $enableImageGallery) {
          $modx->regClientStartupHTMLBlock('
            <script type="text/javascript">
              var extjsPanelTabs = "modx-chunk-tabs";
              var textareaForJSON = "modx-chunk-snippet";
              var textareaForJSONbk = "modx-chunk-snippet";
              var tinyJSONGalleryGalButtons = "#modx-action-buttons .x-toolbar-left-row";
              var tvChunkGalleryVal = '.json_encode($chunkGalleryVal).';
              var backendOrfrontendGallery = "backend";
              var tinyJSONGalleryTABtitle = "'.$tinyJSONGalleryTABtitle.'";
              var tinyJSONGalleryTABposition = '.$tinyJSONGalleryTABposition.';
              var modxGalleryAssetsUrl = MODx.config.assets_url;
              var galleryBackUpRTEskin = '.$fileManagerTopNavModalSkin.';
            </script>
          ');
          $galleryIsGolden = 1;
        }
      }
    }
    if ($modxEventName == 'OnDocFormPrerender' && $id) {
      if($tvName = $modx->getObject('modTemplateVar', array('name' =>$TinyJSONGalleryTV))){
        $tvId = $tvName->get('id');
        $tvGalleryVal = $resource->getTVValue($tvId);
        // $tvTemplateId = $modx->getObject('modTemplateVarTemplate', array("tmplvarid" => $tvId))->get("templateid");
        if($resourceTemplateId = $resource->get("template")){
          if($tvTemplateId = $modx->getObject('modTemplateVarTemplate', array("tmplvarid" => $tvId)) ){
            $tvTemplateId = $tvTemplateId->get("templateid");
            if ($tvGalleryVal || $tvGalleryVal == ''){
              if ($tvTemplateId == $resourceTemplateId) {
                $modx->regClientStartupHTMLBlock('
                  <script type="text/javascript">
                    var extjsPanelTabs = "modx-resource-tabs";
                    var textareaForJSON = "tv'.$tvId.'";
                    var textareaForJSONbk = "tv'.$tvId.'";
                    var tinyJSONGalleryGalButtons = "#modx-action-buttons .x-toolbar-left-row";
                    var tvChunkGalleryVal = '.json_encode($tvGalleryVal).';
                    var backendOrfrontendGallery = "backend";
                    var tinyJSONGalleryTABtitle = "'.$tinyJSONGalleryTABtitle.'";
                    var tinyJSONGalleryTABposition = '.$tinyJSONGalleryTABposition.';
                    var modxGalleryAssetsUrl = MODx.config.assets_url;
                    var galleryBackUpRTEskin = '.$fileManagerTopNavModalSkin.';
                  </script>
                ');
                $galleryIsGolden = 1;
              }
            }
          }
        }//////
      }
    }
    if($galleryIsGolden == 1){
      if($galleryJSfile){
        $modx->regClientStartupHTMLBlock("<script src='" . $galleryJSfile . "''></script>");
      }
      else{
        $modx->regClientStartupHTMLBlock("<script src='" . MODX_ASSETS_URL . "components/tinymcewrapper/gallery/js/TinyJSONGallery.js'></script>");
      }
    }
  }
}


if ($modxEventName == 'OnManagerPageInit' || $modxEventName == 'OnDocFormPrerender') {
  $commonCode = $modx->getChunk('TinymceWrapperCommonCode' . $suffix);
  $commonCode = $commonCode ? $commonCode : '';
}

//Quick and dirty hack to allow any and all other 3rd party Extras use TinyMCE


if ($modxEventName == 'OnManagerPageInit' && $customJS && $customJSchunks) {
  function listArray($thisList){
    $thisList = preg_replace('/\s+/', '', $thisList);
    $thisList = preg_replace("/[^a-z0-9,-_]+/i", ' ', $thisList);
    $thisList = explode(',', $thisList);
    return $thisList;
  }
  $getCustomJSchunks = "";
  $customJSchunk = listarray($customJSchunks);
  $i = 0;
  foreach ($customJSchunk as $c) {
    $customJSchunk[$i] = $modx->getChunk('TinymceWrapper'.$c.$suffix)."\n";
    $getCustomJSchunks.= $customJSchunk[$i];
    $i++;
  }
  $modx->regClientStartupHTMLBlock("<script>" . $getCustomJSchunks . "</script>");
}

//when TinyMCE is temporarily disabled, any new edit is updated before saving
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

//let's setup some functions and file select callbacks for our supported file browsers
switch ($autoFileBrowser) {
  case 'modxNativeBrowser':
    $browserRTEurl = $modxNativeBrowserRTEurl;
    $browserRTEtitle = $modxNativeBrowserRTEtitle;
    break;
  case 'elFinderBrowser':
    $browserRTEurl = '"'.$elFinderBrowserRTEurl.'"';
    $browserRTEtitle = $elFinderBrowserRTEtitle;
    $browserTopNAVurl = '\''.$elFinderBrowserTopNAVurl.'\'';
    $browserTopNAVtitle = $elFinderBrowserTopNAVtitle;
    $browserShortTitle = $elFinderBrowserSHORTtitle;
    break;
  case 'responsivefilemanagerBrowser':
    $browserRTEtitle = $responsivefilemanagerBrowserRTEtitle;
    $browserRTEurl = $responsivefilemanagerBrowserRTEurl;
    $browserTopNAVurl = $responsivefilemanagerBrowserTopNAVurl;
    $browserTopNAVtitle = $responsivefilemanagerBrowserTopNAVtitle;
    $browserShortTitle = $responsivefilemanagerBrowserSHORTtitle;
    break;
  case 'roxyFilemanBrowser':
    $browserRTEtitle = $roxyFilemanBrowserRTEtitle;
    $browserRTEurl = $roxyFilemanBrowserRTEurl;
    $browserTopNAVurl = $roxyFilemanBrowserTopNAVurl;
    $browserTopNAVtitle = $roxyFilemanBrowserTopNAVtitle;
    $browserShortTitle = $roxyFilemanBrowserSHORTtitle;
    break;
}


if ($autoFileBrowser == 'responsivefilemanagerBrowser') {
  $browserFunctions='
    function responsive_filemanager_callback(field_id){
      thisFieldVal = $("#"+field_id).val();
      thisFieldNum = field_id.split("er");
      $("input#tv"+thisFieldNum[1]).val(thisFieldVal);
      $("#tv-image-preview-"+thisFieldNum[1]+" img").attr("title","preview by native MODx Image Browser");
      $("#"+field_id).parents(".modx-tv").find(".twImagePreview").hide().attr("src",thisFieldVal).insertBefore("#tv-image-preview-"+thisFieldNum[1]).fadeIn("slow");
      tinyMCE.activeEditor.windowManager.close();
    }
    autoFileBrowser = '.$autoFileBrowser.';
    function '.$autoFileBrowser.'(field_name, url, type, win) {
      resp = '.$browserRTEurl.';
      if (resp.indexOf("?") < 0) {
        resp += "?field_id=" + field_name;
      }
      else {
        resp += "&field_id=" + field_name;
      }
      // console.log(resp); //debug stuff
      tinyMCE.activeEditor.windowManager.open({
        title: "'.$browserRTEtitle.'",
        url: resp,
        width : window.innerWidth / 1.2,
        height : window.innerHeight / 1.2
      }, {
        // oninsert: function(url) {
        //   alert("rte") //debug
        //   win.document.getElementById(field_name).value = url;
        // }
      });
    return false;
      }
  ';
}
elseif ($autoFileBrowser == 'roxyFilemanBrowser') {
  $browserFunctions='
    autoFileBrowser = '.$autoFileBrowser.';
      function '.$autoFileBrowser.'(field_name, url, type, win) {
        roxyFileman = '.$browserRTEurl.';
        if (roxyFileman.indexOf("?") < 0) {
          roxyFileman += "?type=" + type;
        }
        else {
          roxyFileman += "&type=" + type;
        }
        roxyFileman += "&input=" + field_name + "&value=" + win.document.getElementById(field_name).value;
        if(tinyMCE.activeEditor.settings.language){
          roxyFileman += "&langCode=" + tinyMCE.activeEditor.settings.language;
        }
        tinyMCE.activeEditor.windowManager.open({
          title: "'.$browserRTEtitle.'",
          url: roxyFileman,
          plugins: "media",
          width : window.innerWidth / 1.2,
          height : window.innerHeight / 1.2
        }, {
          oninsert: function(url) {
            win.document.getElementById(field_name).value = url;
          }
        });
      return false;
      }
  ';
}
//thanks to Denis 
elseif ($autoFileBrowser == 'modxNativeBrowser' && $modxNativeBrowserQuirkMode) {
  $modx->regClientStartupHTMLBlock("<style>.modx-browser {z-index: 99999!important;}</style>");
  $browserFunctions='
    autoFileBrowser = '.$autoFileBrowser.';
    function '.$autoFileBrowser.'(field_name, url, type, win) {
      var path = url.substring(0,url.lastIndexOf("/")+1);
      var w = MODx.load({
        xtype: "modx-browser",
        multiple: true,
        //If there is no path, use default
        openTo: path || '.$modxNativeBrowserRTEurl.',
        listeners: {
          "select": {fn:function(data) {
            win.document.getElementById(field_name).value = data.relativeUrl;
            MODx.fireEvent("select",data);
          },scope:this}
        }
      });
      w.show();
    }
  ';
}
elseif ($autoFileBrowser == 'modxNativeBrowser') {
  $browserFunctions ='
    autoFileBrowser = '.$autoFileBrowser.';
    function '.$autoFileBrowser.'(field_name, url, type, win) {
      tinyMCE.activeEditor.windowManager.open({
        title: "'.$browserRTEtitle.'",
        url: '.$browserRTEurl.',
        width : window.innerWidth / 1.2,
        height : window.innerHeight / 1.2,
        classes: "twAutoBrowser",
        onPostRender: function(){
          $(".mce-twAutoBrowser iframe").attr("id","twAutoBrowser").load(function(){
            var checkRTEbuttons = setInterval(function() {
              if ($("#twAutoBrowser").contents().find(".modx-browser-rte-buttons").length) {
                $("#twAutoBrowser").contents().find(".modx-browser-rte-buttons").hide();
                clearInterval(checkRTEbuttons);
              }
            }, 50);
          })
        },
      }, {
        oninsert: function(url) {
          win.document.getElementById(field_name).value = url;
        }
      });
    return false;
    }
  ';
}
else{
  $browserFunctions ='
    autoFileBrowser = '.$autoFileBrowser.';
    function '.$autoFileBrowser.'(field_name, url, type, win) {
      tinyMCE.activeEditor.windowManager.open({
        title: "'.$browserRTEtitle.'",
        url: '.$browserRTEurl.',
        width : window.innerWidth / 1.2,
        height : window.innerHeight / 1.2
      }, {
        oninsert: function(url) {
          win.document.getElementById(field_name).value = url;
        }
      });
    return false;
    }
  ';
}

//what happens when you click the enable/disable checkbox
//also for MIGX TVs

$enableDisableTinyClick = '
  function tinyTVcheck(editor) {
    
    if(tinymce.get(editor) && !tinyMCE.get(editor).getParam("twExoticMarkdownEditor",false)){
      autoSaveTextAreas(editor);
      if($("input[data-tiny="+editor+"]").is(":checked")){
        tinymce.get(editor).hide();
        $("input[data-tiny="+editor+"]").attr("title","Show TinyMCE");
      }
      else{
        tinymce.get(editor).show();
        $("input[data-tiny="+editor+"]").trigger("change").attr("title","Temporarily Hide TinyMCE");
      }
    }
    else{
      $("input[data-tiny="+editor+"]").remove();
      if(typeof tinymce !== "undefined"){
        tinymce.activeEditor.windowManager.alert("Not applicable here");
      }
      else{
        alert("Not applicable here");
      }
    }
  }
  // $(".tinyTVcheck").on("mouseup",function() {
  //   autoSaveTextAreas($(this).attr("data-tiny"));
  //   if (this.checked) {
  //     tinymce.get($(this).attr("data-tiny")).hide();
  //     $(this).trigger("change").attr("title","Enable TinyMCE");
  //   }
  //   else{
  //     tinymce.get($(this).attr("data-tiny")).show();
  //     $(this).trigger("change").attr("title","Disable TinyMCE");
  //   }
  //   });
';

//lock the below to this event, to prevent spill over
if ($modxEventName == 'OnDocFormPrerender') {
  $enableDisableTiny = '';
  //is the enable/disable TinyMCE option selected? If so, let's create all the buttons at once; this will be split later on. This is good for TVs that have default content, and user wishes to revert. Disable TinyMCE, then revert.
  //there are two $("#ta") below; don't ask me why the Articles' Container/Child are has own thing going own here
  if ($disable == 1) {
  //prepend is better than append - you'll see!!!
    $enableDisableTiny = '
    $("#modx-resource-introtext").parent().parent().prepend("<input data-tiny=\'modx-resource-introtext\' checked=\'checked\' title=\'Temporarily Hide TinyMCE\' type=\'checkbox\' class=\'tinyTVcheck\' onmouseup=\'tinyTVcheck(\"modx-resource-introtext\")\' />&nbsp;&nbsp;&nbsp;");@
    $("#modx-resource-description").parent().parent().prepend("<input data-tiny=\'modx-resource-description\' checked=\'checked\' title=\'Temporarily Hide TinyMCE\' type=\'checkbox\' class=\'tinyTVcheck\' onmouseup=\'tinyTVcheck(\"modx-resource-description\")\' />&nbsp;&nbsp;&nbsp;");@
    $("#ta").parents("#modx-resource-content").find(".x-panel-header-text").prepend("<input data-tiny=\'ta\' checked=\'checked\' title=\'Temporarily Hide TinyMCE\' type=\'checkbox\' class=\'tinyTVcheck\' onmouseup=\'tinyTVcheck(\"ta\")\' />&nbsp;&nbsp;&nbsp;");
    if($("#articles-box-publishing-information").length){
      $("#ta").parents(".contentblocks_replacement").find("label[for=ta]").prepend("<input data-tiny=\'ta\' checked=\'checked\' title=\'Temporarily Hide TinyMCE\' type=\'checkbox\' class=\'tinyTVcheck\' onmouseup=\'tinyTVcheck(\"ta\")\' />&nbsp;&nbsp;&nbsp;");
    }
    if($("#modx-resource-tabs__articles-tab-template").length){
      $("#modx-resource-header").append("<p id=\'tinyArtAlert\' style=\'width:70%;margin:0 auto;background-color:#32AB9A;padding:10px;border-radius:10px;color:white;text-align:center;\'><b>TinymceWrapper Raw Code Protection:</b><br>Check this Articles Container > Template [Tab] > Content, before saving.<br>Unchecking the box will not only disable but remove TinyMCE, thus protecting your code</p>");
      $("#ta").parent().parent().find("label[for=ta]").prepend("<input data-tiny=\'ta\' checked=\'checked\' title=\'Remove TinyMCE \' type=\'checkbox\' class=\'tinyTVchecky\' onmouseup=\'javascript:tinymce.get(\"ta\").remove();$(this).remove();$(\"#tinyArtAlert\").fadeOut().remove();\' />&nbsp;&nbsp;&nbsp;");
    }
  ';
  //let's split the enable/disable checkboxes so that they don't appear randomly or unexpectedly
  $enableDisableTiny = explode("@", $enableDisableTiny);
  }

  //All TVs are here nicely placed independent of strict conditions, just in case we want to activate TVS even when RTE is disabled for a particular resource
  if ($tvs == 1) {
    $tvsChunk = $modx->getChunk('TinymceWrapperTVs' . $suffix, array('commonTinyMCECode'=>$commonCode));
    if ($tvsChunk) {
      //let's remove the checkboxes that enables/disables TinyMCE for the TVs
      //let's allow the TV reset button to work through TinyMCE, either enabled or disabled - textareas are updated .on change + the delay is neccesary since we are pseudo binding to existing click event
      if ($disable == 1) {
        $richTv = '
          if($(".modx-richtext").length){
            $(".modx-richtext").css({"overflow": "auto", "width": "100%", "min-height": "100px", "resize": "vertical"});
            function updateReset(updateR){
              if(tinymce.get(updateR)){
                setTimeout(function(){
                  tinyMCE.get(updateR).setContent($("#"+updateR).val());
                  // console.log(updateR+" has been updated");//debug stuff
                },200)
              }
            }
            $.each($(".modx-richtext"), function() {
              var updateR = $(this).attr("id");
              $(this).parents(".modx-tv").find(".modx-tv-reset").attr("data-tiny",this.id).on("click", function(){
                updateReset($(this).attr("data-tiny"));
              });
              $(this).parent().parent().prepend("<input data-tiny=\'" + this.id + "\' checked=\'checked\' title=\'Temporarily Hide TinyMCE\' type=\'checkbox\' onmouseup=\'tinyTVcheck(\""+this.id+"\")\' />");
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
            function updateReset(updateR){
              setTimeout(function(){
                tinyMCE.get(updateR).setContent($("#"+updateR).val());
                // console.log(updateR+" has been updated");//debug stuff
              },200)
            }
            $.each($(".modx-richtext"), function() {
              var updateR = $(this).attr("id");
              $(this).parents(".modx-tv").find(".modx-tv-reset").attr("data-tiny",this.id).on("click", function(){
                updateReset($(this).attr("data-tiny"));
              });
            });
            setTimeout(function(){
              ' . $tvsChunk . '
            },1000);
          }
        ';
      }
    }
  }
  if ($fileImageTVs == 1) {
    /*
    - append hidden input#tinyFileImageBrowser to the body so that we have at least one active editor, in case the user has disabled TinyMCE for all other textareas and TVs
    - do some magic: create the respective image and file twBrowser buttons with appropriate properties when the page is really ready
    - create rudimentary image prev something similar to the native MODx' file browser
    - init hidden #tinyFileImageBrowser
    - Create tinymce #tinyFileImageBrowser on condition; give a definite CSS theme (only when one is not already loaded) to avoid overriding issues. Allow cross-browser amiability by setting to inline:true
    - add twBrowser menu button to MODx Media drop down - depends on the option fileImageTvs
    - NOTE - Roxy don't have a callback...no preview 
    */
    $browserTVs = '
      function imageFileTVpop(field_name, url, type, win) {
        thisUrl = '.$browserRTEurl.';
        if (thisUrl.indexOf("dialog") > 0) {
            thisUrl = thisUrl.replace("popup=1", "popup=0");
          if (thisUrl.indexOf("?") < 0) {
            thisUrl += "?field_id="+field_name;
          }
          else {
            thisUrl += "&field_id="+field_name;
          }
        }
        if (thisUrl.indexOf("fileman") > 0) {
          if (thisUrl.indexOf("?") < 0) {
            thisUrl += "?type=" + type;
          }
          else {
            thisUrl += "&type=" + type;
          }
          thisUrl += "&input=" + field_name + "&value=" + document.getElementById(field_name).value;
        }

        tinyMCE.activeEditor.windowManager.open({
          title: "'.$browserRTEtitle.'",
          url: thisUrl,
          width : window.innerWidth / 1.2,
          height : window.innerHeight / 1.2
        }, {
          oninsert: function(url) {
            $("#"+field_name).val(url);
            thisFieldNum = field_name.split("er");
            $("input#tv"+thisFieldNum[1]).val(url);
            $("#tv-image-preview-"+thisFieldNum[1]+" img").hide().attr({"src":url, "title":"preview by '.$browserShortTitle.'"}).fadeIn();
            // $("#"+field_name).parents(".modx-tv").find(".twImagePreview").hide().attr("src",url).insertBefore("#tv-image-preview-"+thisFieldNum[1]).fadeIn("slow");
            tinyMCE.activeEditor.windowManager.close();
          }
        });
      return false;
      }
      Ext.onReady(function(){
        replaceDefaultFileImageTVbutton = '.$replaceDefaultFileImageTVbutton.';
        setTimeout(function(){
          if(!$("#tinyFileImageBrowser").length){
            $("body").append("<input id=\'tinyFileImageBrowser\' type=\'hidden\' value=\'\' />");
          }
           $("input[id^=tvbrowser]").each(function(){
              fileOrImage = $(this).parents(".modx-tv").find(".x-form-file-trigger").attr("id");
              if($("#"+fileOrImage).length){
                twImageFileOnClick = "imageFileTVpop($(this).attr(\'data-tiny\'))";
                twImageFileBtn = \'&nbsp;'.$browserShortTitle.'&nbsp;(all&nbsp;files)&nbsp;\';
                twImageFileBtnTitle = \'&nbsp;'.$browserShortTitle.'&nbsp;All-File&nbsp;Browser&nbsp;\';
                twImageClass = \'twImageFileBtnClass x-form-trigger x-form-file-trigger\';
                twImagePreview = "";
              }
              else{
                twImageFileOnClick = "imageFileTVpop($(this).attr(\'data-tiny\'))";
                twImageFileBtn = \'&nbsp;'.$browserShortTitle.'&nbsp;(images)&nbsp;\';
                twImageFileBtnTitle = \'&nbsp;'.$browserShortTitle.'&nbsp;Image-Only&nbsp;Browser&nbsp;\';
                twImagePreview = "<img class=\'twImagePreview\' title=\'preview by '.$browserShortTitle.' Image Browser\' src=\'\' style=\'width:100px;display:none;\' />";
                twImageClass = \'twImageFileBtnClass x-form-trigger x-form-image-trigger\';
              }
              if(replaceDefaultFileImageTVbutton == 1){
                $(this).parents(".modx-tv").find(".x-form-trigger").replaceWith("<div class=\'"+twImageClass+"\' data-tiny="+this.id+"  title="+twImageFileBtnTitle+" onclick="+twImageFileOnClick+"></div>"+twImagePreview);
              }
              else{
                $(this).parents(".x-form-item")
                .find(".modx-tv-caption")
                .parent()
                .prepend("<input class=\'twImageFileBtnClass x-form-field-wrap x-form-trigger\' data-tiny="+this.id+" type=\'button\' value="+twImageFileBtn+" title="+twImageFileBtnTitle+" onclick="+twImageFileOnClick+">"+twImagePreview);
              }
              if(tinymce.editors.length < 1){
                tinymce.init({
                  selector: "#tinyFileImageBrowser",
                  skin_url: '.$fileManagerTopNavModalSkin.',
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
    if($autoFileBrowser =='modxNativeBrowser'){
      $browserTVs = '';
    }
  }
}

//if user selects the option to activate Ace / CodeMirror, we save him/her the trip of heading to System Settings - is this being too officious or intrusive?
if ($activateAceOrCodeMirror) {
  $fireEditor = 0;
  if ($whichElementEditor !== 'TinymceWrapper') {
    $whichEl = $modx->getObject('modSystemSetting', 'which_element_editor');
    $whichEl->set('value', 'TinymceWrapper');
    $whichEl->save();
  }
  $onlyElementsFiles = 'OnTempFormPrerender,OnSnipFormPrerender,OnChunkFormPrerender,OnPluginFormPrerender,OnFileEditFormPrerender';
  $onlyElementsFiles = explode(',', $onlyElementsFiles);
  $twGetResourceContentType = "";
  // experimental - OnManagerPageInit or other ... would have been good but...
  if($useAceOrCodeMirrorEveryWhere){
    $updateResource = "resource/update";
    $newResource = "resource/create";
    $updateCreateElement = "element/";
    $updateCreateFile = "system/file/";
    $fireEditor = 1;

    // existing or new elements or files
    if (isset($_GET["a"]) && !$useAceOrCodeMirrorOnElementsFiles && (strpos($_GET["a"], $updateCreateElement) !== false || strpos($_GET["a"], $updateCreateFile) !== false)) {
        $fireEditor = 0;
    }

    // existing resource with RT value
    if (isset($_GET["a"], $_GET["id"]) && strpos($_GET["a"], $updateResource) !== false) {
      $twGetResourceContentType = $modx->getObject("modResource",$_GET["id"])->getOne('ContentType')->get('mime_type');
      if (!$activateAceOrCodeMirrorOnRichText && $modx->getObject("modResource",$_GET["id"])->get('richtext')) {
        $fireEditor = 0;
      }
      if (!$useAceOrCodeMirrorOnResources) {
        $fireEditor = 0;
      }
    }
    // new resource with no RT value
    // if (isset($_GET["a"],$_GET["id"]) && $_GET["id"] == 0 && strpos($_GET["a"], $newResource) !== false) {
    if (isset($_GET["a"]) && strpos($_GET["a"], $newResource) !== false) { //expand criteria for Collection Extra and oter weird stuff
      if (!$activateAceOrCodeMirrorOnNewResource) {
        $fireEditor = 0;
      }
      // new resource with no RT value but System settings default RT value
      if ($activateAceOrCodeMirrorOnNewResource && $richtext_default == 1) {
        $fireEditor = 0;
      }
      if (!$useAceOrCodeMirrorOnResources) {
        $fireEditor = 0;
      }
    }
  }

  if($useAceOrCodeMirrorOnElementsFiles && in_array($modxEventName, $onlyElementsFiles)){
    $fireEditor = 1;
  }

  if($useAceOrCodeMirrorOnResources && $modxEventName == "OnDocFormPrerender"){
    $fireEditor = 1;
    // existing resource has contenttype
    if($id){
      $twGetResourceContentType = $resource->getOne('ContentType')->get('mime_type');
    }
    // existing resource with RT value
    if (!$activateAceOrCodeMirrorOnRichText && $id && $resource->get('richtext')) {
      $fireEditor = 0;
    }
    // new resource with no RT value
    if (!$activateAceOrCodeMirrorOnNewResource && !$id) {
      $fireEditor = 0;
    }
    // new resource with no RT value but System settings default RT value
    if ($activateAceOrCodeMirrorOnNewResource && !$id && $richtext_default == 1) {
      $fireEditor = 0;
    }
    // obey resource RTE checkbox thingy - RETualize typo
    if ($RTEualizeAceOrCodeMirror && $id && $resource->get('richtext')) {
      $fireEditor = 1;
    }
    if ($useAceOrCodeMirrorEveryWhere) {
      $fireEditor = 0;
    }
  }

  //make sure that this never fires twice, once at OnManagerPageInit and other events.
  if($fireEditor == 1){
    if ($activateTinyMCE !== 1 && $tvSuperAddict !== 1 && $jQuerySrc) {
      $modx->regClientStartupHTMLBlock("<script src='" . $jQuerySrc . "'></script>");
    }
    if ($activateAceOrCodeMirror == "Ace") {
      $editorOutput= $modx->getChunk('TinymceWrapperAce'.$chunkSuffix, array('AceSrc' => $AceSrc, 'AceTHEME' => $AceTHEME));
      $modx->regClientStartupScript($AceSrc.'ace.js');
    }
    else{
      $editorOutput= $modx->getChunk('TinymceWrapperCodeMirror'.$chunkSuffix, array('CodeMirrorSrc' => $CodeMirrorSrc, 'CodeMirrorTHEME' => $CodeMirrorTHEME));
      $modx->regClientStartupScript($CodeMirrorSrc.'codemirror.min.js');
    }
    $exportVariables = '
      twGetResourceContentType = "'.$twGetResourceContentType.'";
      fileManagerTopNavModalSkin = '.$fileManagerTopNavModalSkin.';
    ';
    $modx->regClientStartupHTMLBlock("<script>" . $exportVariables . $editorOutput . "</script>");
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
    //check if user wants to load TinyMCE for New Resources
      $loadTiny = 0; //default
    if($id && $resource->get('richtext')) { //existing resource with RTE clicked
      $loadTiny = 1;
      }
    if($loadTiny == 0 && $newResources == 1 && $richtext_default == 1 && !$id) {
      $loadTiny = 1;
    }

    if ($loadTiny == 1) {
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
        $introChunk = $modx->getChunk('TinymceWrapperIntrotext' . $suffix, array('commonTinyMCECode'=>$commonCode));
        if ($introChunk) {
          $intro = $enableDisableTiny[0] . $introChunk;
        }
      }
      if ($description == 1) {
        $descChunk = $modx->getChunk('TinymceWrapperDescription' . $suffix, array('commonTinyMCECode'=>$commonCode));
        if ($descChunk) {
          $desc = $enableDisableTiny[1] . $descChunk;
        }
      }
      if ($content == 1) {
        $conChunk = $modx->getChunk('TinymceWrapperContent' . $suffix, array('commonTinyMCECode'=>$commonCode));
        if ($conChunk) {
          $con = $enableDisableTiny[2] . $conChunk;
        }
      }
      //all textareas depend on whether the Resource is Rich Text-enabled. We use so many IFs to protect against error
      //any and all Rich TVs + File and Image TVs will now be initiated
      //Now let's do the real init of all textareas
      //seems Ext.onReady is better than setTimeout, delay of 400
      $modx->regClientStartupHTMLBlock("<script>" . $enableDisableTinyClick . $browserFunctions . $autoSaveTextAreas . $browserTVs . "Ext.onReady(function () {" . $intro . $desc . $con . $richTv . "},this,{delay:".$addTinyMCEloadDelay."});</script>");
    }
    //let's see if the person wants TVs activated even when RTE is disabled for the Resource.
    elseif ($id && !$resource->get('richtext')) {
        if ($tvAddict == 1) {
          if ($jQuerySrc) {
            $modx->regClientStartupHTMLBlock("<script src='" . $jQuerySrc . "'></script>");
          }
          if ($tinySrc) {
            $modx->regClientStartupHTMLBlock("<script src='" . $tinySrc . "'></script>");
          }
          $modx->regClientStartupHTMLBlock("<script>" . $enableDisableTinyClick . $browserFunctions . $autoSaveTextAreas . $browserTVs . "Ext.onReady(function () {" . $richTv . "},this,{delay:".$addTinyMCEloadDelay."});</script>");
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
          $modx->regClientStartupHTMLBlock("<script>" . $enableDisableTinyClick . $browserFunctions . $autoSaveTextAreas . $browserTVs . "Ext.onReady(function () {" . $richTv . "},this,{delay:".$addTinyMCEloadDelay."});</script>");
        }
  }
}

if ($modxEventName == 'OnManagerPageInit' || $modxEventName == 'OnDocFormPrerender') {
  $mediaPopUp ='';
  if ($fileManagerTopNavLink == 1 && $autoFileBrowser !== 'modxNativeBrowser') {
    // inject file browser link to Manager Top Nav Media dropdown
    // if modxNativeBrowserTopNAVpresent is set to NO, remove native link in topNAV only when native browser is not in use
    $mediaPopUp = '
      var fileManagerTopNavModal = "'.$fileManagerTopNavModal.'";
      fileManagerTopNavModalSkin = '.$fileManagerTopNavModalSkin.';
      Ext.onReady(function(){
        if (typeof tinyMCE !== "undefined" && fileManagerTopNavModal == "1") {
          $("body").append("<div id=\'tinyTopNAV\' style=\'display:none!important;border:0!important;outline:0!important;width:0;height:0;\'></div>");
          if(tinymce.editors.length < 1){
            tinymce.init({
              selector: "#tinyTopNAV",
              skin_url: '.$fileManagerTopNavModalSkin.',
              inline:true,
              forced_root_block : "",
              force_br_newlines : false,
              force_p_newlines : false
            })
          }
        }
      },this,{delay: 50})
      function mediaPopup(url){
        if ($("#tinyTopNAV").length) {
          tinyMCE.activeEditor.windowManager.open({
            title: "'.$browserRTEtitle.'",
            url: url,
            width : window.innerWidth / 1.2,
            height : window.innerHeight / 1.2
          },
          {
            oninsert: function(e) {
              e.preventDefault()
              return false;
          }
          })
        }
        else{
          var w = 880;
          var h = 570;
          var l = Math.floor((screen.width-w)/2);
          var t = Math.floor((screen.height-h)/2);
          var win = window.open(url, "", "scrollbars=1,width=" + w + ",height=" + h + ",top=" + t + ",left=" + l);
        }
      }

      taskCounter = 0;
      var linkCheck = setInterval(function(){
        //requires no jQuery or TinyMCE - will work even if activateTinyMCE is false
        var fileBrowserBro = document.getElementById("file_browser");
        if(fileBrowserBro){
          var browserName = "'.$autoFileBrowser.'";
          var modxNativeBrowserTopNAVpresent = "'.$modxNativeBrowserTopNAVpresent.'";
          if(modxNativeBrowserTopNAVpresent !== "1" && browserName !== "modxNativeBrowser"){
            fileBrowserBro.style.display = "none";
          }
          taskCounter++;
          fileBrowserBro.insertAdjacentHTML( "beforebegin", "<li id=\"tinymcewrapperTopNav\"><a href=\"javascript:;\" onclick=\"mediaPopup('.$browserTopNAVurl.')\">'.$browserTopNAVtitle.'<span class=\"description\">'.$browserTopNAVsubtext.'</span></a></li>");
        }
        if(taskCounter = 1)
          {clearInterval(linkCheck);
          }
      },1000);
    ';
     $modx->regClientStartupHTMLBlock("<script>" . $mediaPopUp . "</script>");
  }

  //let's catch only the textarea[content] when it is created. You can use livejquery or arrive.js if you like
  //make it non-obstrusive - mouseenter seems better than mouseout - works when modal pops and cursor is already on the textarea

  $quickUpdateCreate = $modx->getOption('quickUpdateCreate', $sp);
  $quick = '';
  $quickChunk = $modx->getChunk('TinymceWrapperQuickUpdate' . $suffix, array('commonTinyMCECode'=>$commonCode));

  if ($quickChunk) {
    $quick = $quickChunk;
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
      removeCodeMirror = 0;
      $(document).on("mouseenter", ".modx-window", function () {
        var tinyContent = $(this).find("textarea[name=content]");
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
        if($(quickyId).is(":visible")){
          enableTinyInit(quickyId);
          var id = dataTiny;
          $("button[data-tiny=\'"+id+"\']").html("Disable TinyMCE").parent().parent().attr("onclick","disTiny(dataTiny)");
        }
      }
      function disTiny(dataTiny){
        var dataTiny = dataTiny;
        tinymce.get(dataTiny).hide();
        $("button[data-tiny=\'"+dataTiny+"\']").html("Enable TinyMCE").parent().parent().attr("onclick","enTiny(dataTiny)");
        removeCodeMirror = 0;
        $(quickyId).parents(".modx-window").find(".CodeMirror, div.coder").remove();
        $(quickyId).parents(".modx-window").find(".ace_editor, div.coder").remove();
      }
      function enTiny(dataTiny){
        if($(quickyId).is(":visible")){
          $(quickyId).fadeIn().parents(".modx-window").find(".CodeMirror, div.coder").remove();
          $(quickyId).fadeIn().parents(".modx-window").find(".ace_editor, div.coder").remove();
          removeCodeMirror = 1;
          var dataTiny = dataTiny;
          tinymce.get(dataTiny).show();
          $("button[data-tiny=\'"+dataTiny+"\']").html("Disable TinyMCE").parent().parent().attr("onclick","disTiny(dataTiny)");
        }
      }
      function enableTinyInit(quickyId){
        $(quickyId).fadeIn().parents(".modx-window").find(".CodeMirror, div.coder").remove();
        $(quickyId).fadeIn().parents(".modx-window").find(".ace_editor, div.coder").remove();
        removeCodeMirror = 1;
        $(quickyId).parents(".modx-window").find(".x-tab-panel-body.x-tab-panel-body-top").css({"overflow":"hidden","overflow-y":"auto"});
        ' .$quick. '
      }
      ';
    $modx->regClientStartupHTMLBlock("<script>" . $browserFunctions . $quickUpdateTinyMCE . "</script>");
  }
}