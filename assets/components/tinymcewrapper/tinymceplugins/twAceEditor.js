/*
  twAceEditor.js 
  View your TinyMCE source code in the best Code editor, Ace Editor - pure CDN!
  Sidebyside or popped up - with live preview - no nonsense!

  https://github.com/donShakespeare/twAceEditor
  Demo: http://www.leofec.com/modx-revolution/
  (c) 2016 by donShakespeare for MODx awesome TinymceWrapper

  Usage:

  tinymce.init({
    external_plugins: {
      twAceEditor: "[[++assets_url]]components/tinymcewrapper/tinymceplugins/twAceEditor.js", //plugin location
    },
    twAceEditorSettings: { // pass in any Ace official setting you like to overwrite default behaviour
      twAceEditorCDNbase: "",
      twPoppedTitle: "",
      twPopped: 0, // popped (default) or inline
      twPoppedWidth: "",
      twPoppedHeight: "",
      twEmmetUrl: "", // emmet.js version must be for Ace
      twViewInlineButtonText: "View Inline",
      twCloseButtonText: "Close",
      twInlineWidth: "auto",
      twInlineHeight: 250
    },
    toolbar: "code",
    contextmenu: "code"
});
*/
aceInnerInitRTE = function(userAceSettings) {
  var defaultAceSettings = {
    mode: "ace/mode/html",
    wrap: "free",
    displayIndentGuides: true,
    scrollPastEnd: false,
    showPrintMargin: false,
    fontSize: 15,
    tabSize: 2,
    // maxLines: Infinity
    }
  var settings = $.extend({}, defaultAceSettings, userAceSettings);
  return settings;
}
function popAce(target, title, width, height, viewInline, close, inlineW, inlineH) {
  var target = $(target);
  var targetid = target.data("origin");
  var $inline = $('<div>').hide().insertBefore(target);
  tinymce.activeEditor.windowManager.open({
    title: title,
    width: width,
    height: height,
    classes: "popCode " +targetid,
    onclose: function(e){
      e.preventDefault;
      var killCodeStat = twAceEditorKillCode;
      if(twAceEditorKillCodeSecure == 0){
        killCodeAce(targetid, 1);
      }
    },
    items: [{
      classes: "popAceEditor " +targetid,
      type: 'container',
      onPostRender: function() {
        twAceEditorKillCode = 0;
        twAceEditorKillCodeSecure = 0;
        $(target).appendTo(".mce-popAceEditor.mce-"+targetid+" > .mce-container-body");
        setTimeout(function(){
          $(".mce-popCode.mce-"+targetid).removeClass("mce-container").find("*").removeClass("mce-container");
          $(".mce-popCode.mce-"+targetid+" .mce-close").addClass("mce-reset");
          window["codeT" + targetid].resize();
          var patientWaiter = setInterval(function(){
            if($(".mce-popAceEditor.mce-"+targetid+" .ace_editor").length){
              $(".mce-popAceEditor.mce-"+targetid+" .coder").css({"width":width,"height":height});
              clearInterval(patientWaiter)
            }
          },100)
        },100)
      }
    }],
    buttons: [
      {
        text: viewInline,
        active: true,
        onclick: function() {
          $(".mce-popAceEditor.mce-"+targetid+" .coder").css({"width":inlineW,"height":inlineH});
          $inline.replaceWith(target);
          window["codeT" + targetid].resize();
          twAceEditorKillCode = 0;
          twAceEditorKillCodeSecure = 1;
          tinymce.activeEditor.windowManager.close();
        }
      }
    ]
  });

}

function killCodeAce(target, sender) {
  if (sender == 1) {
    aceSetContentsilent = true;
    // tinymce.get(target).setContent(window["codeT" + target].getValue());
    $("#" + target).html(window["codeT" + target].getValue());
    window["codeT" + target].remove();
    $(".coder." + target).remove();
    tinymce.activeEditor.windowManager.close();
  }
}

function popCodeAce(target) {
  var twPoppedTitle = tinymce.get(target).getParam("twAceEditorSettings",{}).twPoppedTitle || "Ace HTML Source Code";
  var twPoppedWidth = tinymce.get(target).getParam("twAceEditorSettings",{}).twPoppedWidth || window.innerWidth / 1.2;
  var twPoppedHeight = tinymce.get(target).getParam("twAceEditorSettings",{}).twPoppedHeight || 300;
  var twViewInlineButtonText = tinymce.get(target).getParam("twAceEditorSettings",{}).twViewInlineButtonText || "View Inline";
  var twCloseButtonText = tinymce.get(target).getParam("twAceEditorSettings",{}).twCloseButtonText || "Close";
  var twInlineWidth = tinymce.get(target).getParam("twAceEditorSettings",{}).twInlineWidth || 'auto';
  var twInlineHeight = tinymce.get(target).getParam("twAceEditorSettings",{}).twInlineHeight || 250;
  popAce(".coder."+target, twPoppedTitle, twPoppedWidth, twPoppedHeight, twViewInlineButtonText, twCloseButtonText, twInlineWidth, twInlineHeight);
}
tinymce.PluginManager.add('twAceEditor', function(editor) {
  var target = $("#" + editor.id);

  //editor.getContent({format : 'raw'})
  //or
  //getContent({source_view: true})
  function initAce(justPop) {
    if (justPop == 1) {
      popCodeAce(editor.id);
    }
    // else if (!$('.coder.' + editor.id).length) {
    else if (justPop == 0) {
      var twInlineWidth = editor.getParam("twAceEditorSettings",{}).twInlineWidth || 'auto';
      var twInlineHeight = editor.getParam("twAceEditorSettings",{}).twInlineHeight || 250;

      if(editor.getParam("inline")){
        var edId = editor.id;
      }
      else{
        var edId = editor.getContainer().id;
      }
      $("#" + edId).before("<div style=dispaly:none; class='coder " + editor.id +"' data-origin="+editor.id+"><span type=button onclick='killCodeAce(\"" + editor.id + "\",1)' class='mce-close-button mce-reset'  title='Close this Ace'><i class='mce-ico mce-i-remove'></i></span><textarea class='codeT' id='codeT" + editor.id + "'>" + editor.getContent() + "</textarea>");
      $('.coder.' + editor.id).css({"width":twInlineWidth, "height":twInlineHeight}).fadeIn();
      window["codeT" + editor.id] = ace.edit('codeT' + editor.id);
      window["codeT" + editor.id].$blockScrolling = Infinity;
      // window["codeT" + editor.id].setAutoScrollEditorIntoView(true);
      if(typeof emmetForAceIsLoaded !== 'undefined' || editor.getParam("twAceEditorSettings",{}).enableEmmet && editor.getParam("twAceEditorSettings",{}).twEmmetUrl ){
        window["codeT" + editor.id].setOption("enableEmmet", true);
      }
      window["codeT" + editor.id].setOptions(aceInnerInitRTE(editor.getParam("twAceEditorSettings",{}))); // find way to remove prpprietary settings
      window["codeT" + editor.id].resize();
      aceSetContentsilent = false;
      window["codeT" + editor.id].on("change", function() {
        if (aceSetContentsilent){
         return;
        }
        else{
          editor.setContent(window["codeT" + editor.id].getValue());
        }
      })
      editor.on("keyup ", function() {
        aceSetContentsilent = true;
        window["codeT" + editor.id].setValue(editor.getContent());
        aceSetContentsilent = false;
      })
      if(editor.getParam("twAceEditorSettings",{}).twPopped !== 0){
        popCodeAce(editor.id)
      }
    } 
    else {
      if (!$('.coder.' + editor.id).length) {
        initAce(0)
      }
      else{
        popCodeAce(editor.id)
      }
    }
  }

  function loadAllace(style) {
    var mainCss = '<style id="mainCSSAceEditor">.x-window-body{overflow-x:hidden!important;}.codeT,.coder{position:relative}.codeT{width:100%;resize:vertical;color:#000;min-height:300px;margin:0 auto}.mce-popCode .mce-title{text-align:center;} .mce-popCode .mce-close-button{display:none;}.ace_editor{text-align:left!important}.mce-popCode .ace_editor{height:inherit;width:99.5%!important;}.coder .ace_editor{height:inherit;width:inherit;}.mce-popAceEditor,.mce-popAceEditor .mce-container-body{width:inherit!important}.coder > .mce-close-button{position:absolute;top:-18px;right:0;cursor: pointer;background: #FFF;margin: 0 19px -4px 0;text-align: center;border-radius: 5px 5px 0 0;padding: 2px;box-shadow: 0px 0px 1px 1px rgba(0, 0, 0, 0.4);}.coder .ace_editor{box-shadow: 0px 0px 1px 1px rgba(0, 0, 0, 0.4)}.mce-popCode .ace_editor{box-shadow:none;}.coder > .mce-close-button > .mce-ico{font-size:15px; color:#000;}</style>';
    if(!$("#mainCSSAceEditor").length){
      $('head').append(mainCss);
    }
    if (typeof ace == 'undefined') {
      var basePath = editor.getParam("twAceEditorSettings",{}).twAceEditorCDNbase || "https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.3/";
      var scriptLoaderMain = new tinymce.dom.ScriptLoader();
      scriptLoaderMain.add(basePath+'ace.js');
      if(typeof emmetForAceIsLoaded == 'undefined' && editor.getParam("twAceEditorSettings",{}).twEmmetUrl){
        scriptLoaderMain.add(editor.getParam("twAceEditorSettings",{}).twEmmetUrl);
        scriptLoaderMain.add(basePath+'ext-emmet.js');
      }
      scriptLoaderMain.loadQueue(function() {
        setTimeout (function(){
          initAce(style);
        },500)
      });
    } else {
      initAce(style);
    }
  }

  editor.addButton('code', {
    type: "button",
    classes: "twAceE",
    icon: 'code',
    tooltip: 'Ace Editor',
    onclick: function(){
      if (!$('.mce-popAceEditor.mce-'+editor.id).length){
        loadAllace()
      }
    }
  });
  editor.addMenuItem('code', {
    icon: 'code',
    text: 'Ace Editor',
    onclick: function(){
      if (!$('.mce-popAceEditor.mce-'+editor.id).length){
        loadAllace()
      }
    }
  });
});