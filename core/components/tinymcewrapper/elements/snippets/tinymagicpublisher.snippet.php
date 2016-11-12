<?php
/*TinymceWrapper TinyMagicPublisher Snippet transforms any textareas that NewsPublisher provides.
It can manipulate any field that is hidden and restore the values right back to DOM origin

-------------------Roadmap:
-Create more beautiful themes;
-Create more beautiful plugins;
-Look for more ways to be awesome;
---------------------------

Use freely, report freely, enjoy freely
Dedicated to those who have cried
---------------------------

http://www.leofec.com/modx-revolution/
-donshakespeare in the MODx forum
*/

//TinyMagicPublisherModifier Snippet
//empty value gets default_text for both new and existing docs
/*if (isset($_GET['edit']) && $_GET['edit'] == 'true' || isset($_GET['create']) && $_GET['create'] == 'true' ) {
  if($input){
    if ($modx->resource->get('createdby') == $modx->user->get('id') ) {
      $legalOWNER = 1;
    }
    if (!$legalOWNER || !$modx->hasPermission('edit_document') && !$modx->hasPermission('new_document') ) {
      return;
    }
    $typesOfResourcesFields = array("pagetitle","alias","menutitle","longtitle","introtext","description","content");
    if(in_array($name, $typesOfResourcesFields)) {
      if($_POST[$name]){
        $name = $_POST[$name];
      }
      else{
        $name = $modx->resource->get($name);
      }
    }
    else{
      if($_POST[$name]){
        if($_POST[$name] == ''){
          $name = '';
        }
        $name = $_POST[$name];
      }
      else{
        $name = $modx->resource->getTVValue($name);
      }
    }
    $name = str_replace(array('[[',']]'),array('{{','}}'),$name);
    return $name;
  }
}*/
function listArray($thisList){
  $thisList = preg_replace('/\s+/', '', $thisList);
  $thisList = preg_replace("/[^a-z0-9,-_]+/i", ' ', $thisList);
  $thisList = explode(',', $thisList);
  return $thisList;
}
function cssANDjs($mainCSSfile,$mainCSS,$jQueryCDN,$tinymceCDN,$tinyInitsANDfunctions, $TinyJSONGalleryJS){
  global $modx;
  //register CSS and JS to browser for MAGIC mode
  if($mainCSSfile){
    $modx->regClientCSS($mainCSSfile);
  }
  else{
    $modx->regClientStartupHTMLBlock($mainCSS);
  }
  if($jQueryCDN){
    $modx->regClientScript($jQueryCDN);
  }
  $modx->regClientScript($tinymceCDN);
  $modx->regClientHTMLBlock($tinyInitsANDfunctions);
  if($TinyJSONGalleryJS){
    $modx->regClientScript($TinyJSONGalleryJS);
  }
}
function cssANDjsplain($jQueryCDN,$tinymceCDN,$tinyInitsANDfunctions,$TinyJSONGalleryJS){
  global $modx;
  //register CSS and JS to browser for MAGIC mode
  if($jQueryCDN){
    $modx->regClientScript($jQueryCDN);
  }
  $modx->regClientScript($tinymceCDN);
  $modx->regClientHTMLBlock($tinyInitsANDfunctions);
  if($TinyJSONGalleryJS){
    $modx->regClientScript($TinyJSONGalleryJS);
  }
}
function redirectTo($desti,$param){
  global $modx;
  $url = $modx->makeUrl($desti,'',$param,'full');
  $modx->sendRedirect($url);
}
//let's set up some restrictions
if (isset($_GET['edit']) && !isset($_GET['create']) && $modx->resource->get('id') !== $npCreateResource ) {
  $legalEDITparam = 1;
}
if (isset($_GET['create']) && !isset($_GET['edit']) && $modx->resource->get('id') == $npCreateResource ) {
  $legalCREATEparam = 1;
}
if (!$modx->hasPermission('new_document') || $_GET['create'] !== 'true') {
  $legalHASpermission = 1;
}
if ($modx->resource->get('createdby') == $modx->user->get('id') || $modx->user->isMember(listArray($editorAdminGroups))) {
  $legalOWNER = 1;
}
if($npPureMagicNonTraditional){
  //force disable a few NP calls
  $deletebutton = $duplicatebutton = 0;
  //never edit the (create) page - from which new resources will be created
  if($modx->resource->get('id') == $npCreateResource && isset($_GET['edit'])) {
    redirectTo($npCancelCreateId,'');
  }
  //never load the (create) page without the 'create' url parameter
  if($modx->resource->get('id') == $npCreateResource && !isset($_GET['create']) ) {
    redirectTo($npCreateResource,'create=true');
  }
  //do not show 'edit' or 'create' buttons or load NewsPublisher on any pages specified
  if($npNoShow){
    $npNoShow = listarray($npNoShow);
    $rId = $modx->resource->get('id');
    if(in_array((string)$rId, $npNoShow, true)) {
     return;
    }
  }
  //force a few NP settings
  $rtsummary = $rtcontent = $usetabs = 0;
  $which_editor = '';
  $richtext = 'No';

  //do not show 'edit' or 'create' buttons or load Newspublisher on children with specified parentid
  if($npNoShowChildOfParents){
    $npNoShowChildOfParents = listarray($npNoShowChildOfParents);
    $parentId = $modx->resource->get('parent');
    if(in_array((string)$parentId, $npNoShowChildOfParents, true)) {
     return;
    }
  }

  //superficially show or hide NewsPublisher form on client when debug status changes
  $npHide = 'style="display:none !important;"';
  if($npDebug == 1) {
     $cssfile = '';
     $npHide = 'style="display:block !important;"';
  }

  //use custom NewsPublisher outertpl to ensure <form action> url has the correct create/edit parameter
  if($modx->resource->get('id') == $npCreateResource){
    $outertpl = $npCreateOuterTpl;
  }
  else{
    $outertpl = $npEditOuterTpl;
  }

  //quickly set variable to be pushed over to JS to see if to update resource with NewspUblisher content //now replaced by TMPModifier
  $npCreate = "''";
  if (isset($_GET['edit']) && $_GET['edit'] == 'true' && !isset($_GET['create']) && $modx->resource->get('id') !== $npCreateResource ) {
    $npCreate = 1;
  }

  //prepare the top bar buttons
  //no need for chunkSuffix, since calls to this are in template (@psets)
  if($jsTopBarButtonsTpl){
    if($npCreate == 1){
      $cancelHREF = $modx->resource->get('id');
    }
    else{
      $cancelHREF = $npCancelCreateId;

    }
    $topBar = $modx->getChunk($jsTopBarButtonsTpl, array("cancelid" => $cancelHREF));
  }

  $errorJSandContentRefresh = '
    var npTWerrTime;
    function npErrors(){
      clearTimeout(npTWerrTime);
      if (!$("#newspublisherForm").length) {
         $(".errorMessagesNpTw").fadeIn().html("NewsPublisher did not load: is it installed?");
      }
      if ($(".newspublisher > .errormessage").length) {
        // var err = $(".newspublisher").clone().children().remove().end().text();
        $(".errorMessagesNpTw").html("");
         $(".newspublisher > .errormessage").each(function(i, obj) {
            $(".errorMessagesNpTw").fadeIn().html($(".errorMessagesNpTw").html()+$(this).text()+"<br>");
         });
      }
      if ($(".fielderrormessage").length) {
        $(".errorMessagesNpTw").html("");
         $(".fielderrormessage").each(function(i, obj) {
            $(".errorMessagesNpTw").fadeIn().html($(".errorMessagesNpTw").html()+$(this).text()+"<br>");
         });

         // $("[data-tiny]").each(function(){
         //  npStuff = $(this).attr("data-tiny");
         //  npStuffVal = $("#"+npStuff).val();
         //  $(this).html(npStuffVal);
         //  })
      }
       npTWerrTime = setTimeout(function(){
         $(".errorMessagesNpTw").slideUp();
       },8500);
    }
    npErrors();
    npCreate = '.$npCreate.';
    // if(npCreate == 1){
    //    $("[data-tiny]").each(function(){
    //     npStuff = $(this).attr("data-tiny");
    //     npStuffVal = $("#"+npStuff).val();
    //     $(this).html(npStuffVal);
    //     })
    // }
    $("[data-tiny]").addClass("twNPactive")
  ';

  //get chunks according to NewsPublisher &show=`pagetitle,content,TV1`
  //this allows user to use custom JS (especially TinyMCE inits only when needed) for each textfield that will be reporting back to NewsPublisher on the client side.

  $commonTinyMCECode = $modx->getChunk('TinymceWrapperNPCommonCode'.$chunkSuffix);
  $commonTinyMCECode = $commonTinyMCECode ? $commonTinyMCECode : '';
  $getTWchunks = "";
  $npshow = listarray($show);
  $i = 0;
  foreach ($npshow as $s) {
    $npshow[$i] = $modx->getChunk('TinymceWrapperNP'.$s.$chunkSuffix, array('commonTinyMCECode'=>$commonTinyMCECode));
    $getTWchunks.= $npshow[$i];
  }
}
else{
  $topBar = $errorJSandContentRefresh = ''; 
  if($npTraditionalTinyChunk){
    $getTWchunks = $modx->getChunk($npTraditionalTinyChunk);
  }
}


//let's setup some functions and file select callbacks for our supported file browsers
switch ($autoFileBrowser) {
  case 'elFinderBrowser':
    $browserRTEurl = $elFinderBrowserRTEurl;
    $browserRTEtitle = $elFinderBrowserRTEtitle;
    break;
  case 'responsivefilemanagerBrowser':
    $browserRTEurl = $responsivefilemanagerBrowserRTEurl;
    $browserRTEtitle = $responsivefilemanagerBrowserRTEtitle;
    break;
  case 'roxyFilemanBrowser':
    $browserRTEurl = $roxyFilemanBrowserRTEurl;
    $browserRTEtitle = $roxyFilemanBrowserRTEtitle;
    break;
}
if ($autoFileBrowser == 'responsivefilemanagerBrowser') {
  $browserFunctions ='
    autoFileBrowser = '.$autoFileBrowser.';
    function '.$autoFileBrowser.'(field_name, url, type, win, image) {
      myImage = image;
      resp = "'.$browserRTEurl.'";
      if (resp.indexOf("?") < 0) {
        resp += "?field_id=" + field_name;
      }
      else {
        resp += "&field_id=" + field_name;
      }
      tinyMCE.activeEditor.windowManager.open({
        // console.log(resp);
        title: "'.$browserRTEtitle.'",
        url: resp,
        width : window.innerWidth / 1.2,
        height : window.innerHeight /1.2
      }, {
        oninsert: function(url) {
         if(field_name.indexOf("np-") > -1){
          document.getElementById(field_name).value = url;
          tinyMCE.activeEditor.windowManager.close();
         }
         else{
          win.document.getElementById(field_name).value = url;
         }
        }
      });
    return false;
    }
    function responsive_filemanager_callback(field_id){
      tinyMCE.activeEditor.windowManager.close();
      if(myImage){
        var url=$("#"+field_id).val();
        $("[data-tiny-image="+field_id+"]").attr("src",url);
        tinyMCE.activeEditor.windowManager.alert("Image updated");
     }
    }
  ';
}
elseif ($autoFileBrowser == 'roxyFilemanBrowser') {
  $browserFunctions='
    autoFileBrowser = '.$autoFileBrowser.';
      function '.$autoFileBrowser.'(field_name, url, type, win, image) {
        myImage = image;
        roxyFileman = "'.$browserRTEurl.'";
        if (roxyFileman.indexOf("?") < 0) {
          roxyFileman += "?type=" + type;
        }
        else {
          roxyFileman += "&type=" + type;
        }
        if(field_name.indexOf("np-") > -1){
          roxyFileman += "&input=" + field_name + "&value=" + document.getElementById(field_name).value;
        }
        else{
          roxyFileman += "&input=" + field_name + "&value=" + win.document.getElementById(field_name).value;
        }
        if(tinyMCE.activeEditor.settings.language){
          roxyFileman += "&langCode=" + tinyMCE.activeEditor.settings.language;
        }
        if(myImage){
           fieldValue = document.getElementById(field_name);
           var oldFieldValue = fieldValue.value;
           var checkChange = setInterval(function() {
            if(fieldValue.value != oldFieldValue) {
                $(fieldValue).trigger("change");
                $("[data-tiny-image="+field_name+"]").attr("src",fieldValue.value);
                tinyMCE.activeEditor.windowManager.alert("Image updated");
                clearInterval(checkChange);
            }
           },500);
        }
        tinyMCE.activeEditor.windowManager.open({
          title: "'.$browserRTEtitle.'",
          url: roxyFileman,
          plugins: "media",
          width : window.innerWidth / 1.2,
          height : window.innerHeight / 1.2
        },
        {
         onclose:function(){
          alert("closed")
         }
        });
      return false;
      }
  ';
}
else{
  $browserFunctions ='
    autoFileBrowser = '.$autoFileBrowser.';
    function '.$autoFileBrowser.'(field_name, url, type, win, image) {
      myImage = image;
      tinyMCE.activeEditor.windowManager.open({
        title: "'.$browserRTEtitle.'",
        url: "'.$browserRTEurl.'",
        width : window.innerWidth / 1.2,
        height : window.innerHeight / 1.2
      }, {
        oninsert: function(url) {
         if(myImage){
            document.getElementById(field_name).value = url;
            $("[data-tiny-image="+field_name+"]").attr("src",url);
            tinyMCE.activeEditor.windowManager.alert("Image updated");
         }
         else{
          if(win){
            win.document.getElementById(field_name).value = url;
          }
          else{
            document.getElementById(field_name).value = url;
          }
         }
        }
      });
    return false;
    }
  ';
}


//prepare NewsPublisher snippet call with all possible default settings
$sD = 'System Default';

//runSnippet (which used to cause session problems)
 $newsPublisher = '
[[!NewsPublisher? &activetab=`'.$activetab.'` &badwords=`'.$badwords.'` &allowedtags=`'.$allowedtags.'` &captions=`'.$captions.'` &clearcache=`'.$clearcache.'` &contentcols=`'.$clearcache.'` &contentrows=`'.$clearcache.'` &cssfile=`'.$cssfile.'` &groups=`'.$groups.'` &hoverhelp=`'.$hoverhelp.'` &initdatepicker=`'.$initdatepicker.'` &initrte=`'.$initrte.'` &intmaxlength=`'.$intmaxlength.'` &language=`'.$language.'` &listboxmax=`'.$listboxmax.'` &multiplelistboxmax=`'.$multiplelistboxmax.'` &parents=`'.$parents.'` &postid=`'.$postid.'` &prefix=`'.$prefix.'` &readonly=`'.$readonly.'` &required=`'.$required.'` &rtcontent=`'.$rtcontent.' `&rtsummary=`'.$rtsummary.'` &show=`'.$show.'` &stopOnBadTv=`'.$stopOnBadTv.'` &summarycols=`'.$summarycols.'` &summaryrows=`'.$summaryrows.'` &tabs=`'.$tabs.'` &templates=`'.$templates.'` &textmaxlength=`'.$textmaxlength.'` &tinyheight=`'.$tinyheight.'` &tinywidth=`'.$tinywidth.'` &usetabs=`'.$usetabs.'` &which_editor=`'.$which_editor.'` &aliasdateformat=`'.$aliasdateformat.'` &aliasprefix=`'.$aliasprefix.'` &aliastitle=`'.$aliastitle.'` &cacheable=`'.$cacheable.'` &classkey=`'.$classkey.'` &hidemenu=`'.$hidemenu.'` &parentid=`'.$parentid.'` &published=`'.$published.'` &richtext=`'.$richtext.'` &searchable=`'.$searchable.'` &template=`'.$template.'` &templateid=`'.$templateid.'` &booltpl=`'.$booltpl.'` &datetpl=`'.$datetpl.'` &errortpl=`'.$errortpl.'` &fielderrortpl=`'.$fielderrortpl.'` &inttpl=`'.$inttpl.'` &listoptiontpl=`'.$listoptiontpl.'` &listoutertpl=`'.$listoutertpl.'` &optionoutertpl=`'.$optionoutertpl.'` &optiontpl=`'.$optiontpl.'` &outertpl=`'.$outertpl.'` &texttpl=`'.$texttpl.'` &textareatpl=`'.$textareatpl.'` &cancelid=`'.$cancelid.'` &activetabs=`'.$activetabs.'` &shownotify=`'.$shownotify.'` &notifyChecked=`'.$notifyChecked.'` &editHome=`'.$editHome.'` &imagetpl=`'.$imagetpl.'` &filetpl=`'.$filetpl.'` &duplicatebutton=`'.($duplicatebutton ?: 0).'` &deletebutton=`'.($deletebutton ?: 0).'` &confirmdelete=`'.($confirmdelete ?: 0).'` &published_default=`'.($published_default ? $published_default : $sD).'` &hidemenu_default=`'.($hidemenu_default ? $hidemenu_default : $sD).'` &cacheable_default=`'.($cacheable_default ? $cacheable_default : $sD).'` &searchable_default=`'.($searchable_default ? $searchable_default : $sD).'` &richtext_default=`'.($richtext_default ? $richtext_default : $sD).'`]]
 ';
// $newsPublisher = $modx->runSnippet('NewsPublisher',
//   array(
//   'activetab'=>$activetab,
//   'badwords'=>$badwords,
//   'allowedtags'=>$allowedtags,
//   'captions'=>$captions,
//   'clearcache'=>$clearcache,
//   'contentcols'=>$clearcache,
//   'contentrows'=>$clearcache,
//   'cssfile'=>$cssfile,
//   'groups'=>$groups,
//   'hoverhelp'=>$hoverhelp,
//   'initdatepicker'=>$initdatepicker,
//   'initrte'=>$initrte,
//   'intmaxlength'=>$intmaxlength,
//   'language'=>$language,
//   'listboxmax'=>$listboxmax,
//   'multiplelistboxmax'=>$multiplelistboxmax,
//   'parents'=>$parents,
//   'postid'=>$postid,
//   'prefix'=>$prefix,
//   'readonly'=>$readonly,
//   'required'=>$required,
//   'rtcontent'=>$rtcontent,
//   'rtsummary'=>$rtsummary,
//   'show'=>$show,
//   'stopOnBadTv'=>$stopOnBadTv,
//   'summarycols'=>$summarycols,
//   'summaryrows'=>$summaryrows,
//   'tabs'=>$tabs,
//   'templates'=>$templates,
//   'textmaxlength'=>$textmaxlength,
//   'tinyheight'=>$tinyheight,
//   'tinywidth'=>$tinywidth,
//   'usetabs'=>$usetabs,
//   'which_editor'=>$which_editor,
//   'aliasdateformat'=>$aliasdateformat,
//   'aliasprefix'=>$aliasprefix,
//   'aliastitle'=>$aliastitle,
//   'cacheable'=>$cacheable,
//   'classkey'=>$classkey,
//   'hidemenu'=>$hidemenu,
//   'parentid'=>$parentid,
//   'published'=>$published,
//   'richtext'=>$richtext,
//   'searchable'=>$searchable,
//   'template'=>$template,
//   'templateid'=>$templateid,
//   'booltpl'=>$booltpl,
//   'datetpl'=>$datetpl,
//   'errortpl'=>$errortpl,
//   'fielderrortpl'=>$fielderrortpl,
//   'inttpl'=>$inttpl,
//   'listoutertpl'=>$listouterpl,
//   'listoptiontpl'=>$listoptiontpl,
//   'optionoutertpl'=>$optionoutertpl,
//   'optiontpl'=>$optiontpl,
//   'outertpl'=>$outertpl,
//   'texttpl'=>$texttpl,
//   'textareatpl'=>$textareatpl,
//   'cancelid'=>$cancelid,
//   'activetabs'=>$activetabs,
//   'shownotify'=>$shownotify,
//   'notifyChecked'=>$notifyChecked,
//   'editHome'=>$editHome,
//   'imagetpl'=>$imagetpl,
//   'filetpl'=>$filetpl,
//   'duplicatebutton'=>($duplicatebutton ?: 0),
//   'deletebutton'=>($deletebutton ?: 0),
//   'confirmdelete'=>($confirmdelete ?: 0),
//   'published_default'=>($published_default ? $published_default : $sD),
//   'hidemenu_default'=>($hidemenu_default ? $hidemenu_default : $sD),
//   'cacheable_default'=>($cacheable_default ? $cacheable_default : $sD),
//   'searchable_default'=>($searchable_default ? $searchable_default : $sD),
//   'richtext_default'=>($richtext_default ? $richtext_default : $sD)
//   )
// ) ? : '';

//grab tag TV name
$twTagsTV = $twTagsTV ? : 'doesNotExist';
//get possible getResource call that builds the <select> Tags site-wide
$twExistingTagsChunk = $modx->getChunk($twExistingTagsChunk);

//prepare TinyMCE for the frontend
$tinyInitsANDfunctions = '
  <script type="text/javascript">
    twTAGtvID = "'.$twTagsTV.'";
    modxGalleryAssetsUrl = "'.$modxGalleryAssetsUrl.'";
    galleryBackUpRTEskin  = "'.$galleryBackUpRTEskin .'";
    '.$errorJSandContentRefresh.'
    '.$browserFunctions.'
    '.$topBar.'
    $(document).ready(function() {
      '.$getTWchunks.'
      });
  </script>
 ';

//prepare buttons and final NP call to be echoed
$buttonsANDnewspublisher  = '<div id="tinymceWrapperBubbleNP"></div><div class="publishButtons"></div>'.$npErrorMessages.'<div id="twNpContainer" '.$npHide.'>'.$twExistingTagsChunk.$newsPublisher.'</div>';

//do the plain ol' NP
if($npPureMagicNonTraditional == 0){
  cssANDjsplain($jQueryCDN,$tinymceCDN,$tinyInitsANDfunctions,$TinyJSONGalleryJS);
  echo $newsPublisher;
}
//supercharge the plain ol' NP
else{
  //reset these session variables so that NewsPublisher can have clean slate for Editing existing resource or creating a new one
  if(isset($_SESSION['np_doc_id'], $_SESSION['np_doc_to_edit'])) {
    unset($_SESSION['np_doc_id'], $_SESSION['np_doc_to_edit']);
  }

  //grab url parameters and init NewsPublisher accordingly
  if ($legalEDITparam == 1) {
    //return to resource url withou the edit parameter
    if ($_GET['edit'] !== 'true' || !$legalOWNER == 1) {
      redirectTo($modx->resource->get('id'),'');
    }
    //restrict editing to owner of resource or Admin editors
    if ($legalOWNER == 1) {
      //give NewsPublisher snippet some food
      $_SESSION['np_doc_to_edit'] = $modx->resource->get('id');
      $_SESSION['np_doc_id'] = $modx->resource->get('id');

      //register CSS and JS to browser
      cssANDjs($mainCSSfile,$mainCSS,$jQueryCDN,$tinymceCDN,$tinyInitsANDfunctions,$TinyJSONGalleryJS);
      echo $buttonsANDnewspublisher;
    }
  }
  elseif ($legalCREATEparam == 1) {
    if ($legalHASpermission) {
      redirectTo($npCancelCreateId,'');
    }

    //register CSS and JS to browser
    cssANDjs($mainCSSfile,$mainCSS,$jQueryCDN,$tinymceCDN,$tinyInitsANDfunctions,$TinyJSONGalleryJS);
    echo $buttonsANDnewspublisher;
  }
  else{
    if($createNewButton){
      $createNewButton = '<a href="[[~'.$npCreateResource.' ? &create=`true` &scheme=`full`]]">'.$createNewButton.'</a>';
    }
    else{
      $createNewButton = '';
    }
    if($editThisButton){
      $editThisButton = '<a href="[[~[[*id]]? &edit=`true` &scheme=`full`]]">'.$editThisButton.'</a>';
    }
    else{
      $editThisButton = '';
    }
    if($editInManagerButton){
      $editInManagerButton = '<a href="'.MODX_MANAGER_URL.'?a=resource/update&id='.$modx->resource->get("id").'">'.$editInManagerButton.'</a>';
    }
    else{
      $editInManagerButton = '';
    }
    if (!$modx->hasPermission('new_document')) {
      $createNewButton = '';
    }
    if (!$modx->user->hasSessionContext('mgr') && !$modx->hasPermission('edit_document') && !$legalOWNER) {
      $editInManagerButton = '';
    }
    if (!$legalOWNER || !$modx->hasPermission('edit_document') ) {
      $editThisButton = '';
    }
    // if (!$legalOWNER || !$modx->hasPermission('edit_document') && !$modx->hasPermission('new_document') ) {
    if (!$legalOWNER || !$modx->hasPermission('edit_document') && !$modx->hasPermission('new_document') ) {
      return;
    }
    $editCreateButtons = '<div class="publishButtons">'.$editThisButton.$createNewButton.$editInManagerButton.'</div>';
    echo $editCreateButtons;
    $modx->regClientStartupHTMLBlock($publishButtonCSS);
  }
}