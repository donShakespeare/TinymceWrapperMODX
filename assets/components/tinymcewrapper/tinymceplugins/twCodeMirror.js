/*
  jquery.twCodeMirror.js 
  View your TinyMCE source code in the best Code editor, CodeMirror - pure CDN!
  Sidebyside or popped up - with live preview - no nonsense!

  https://github.com/donShakespeare/twCodeMirror
  Demo: http://www.leofec.com/modx-revolution/
  (c) 2016 by donShakespeare for MODx awesome TinymceWrapper

  Usage:

  tinymce.init({
    external_plugins: {
      twCodeMirror: "[[++assets_url]]components/tinymcewrapper/tinymceplugins/twCodeMirror.js", //plugin location
    },
    twCodeMirrorSettings: { 
      ... pass in any CodeMirror official setting you like to overwrite default behaviour
      ... below are proprietary settings
      twCodeMirrorCDNbase: "",
      twFontSize: 15,
      twPoppedTitle: "",
      twPopped: 0, // popped (default) or inline
      twPoppedWidth: "",
      twPoppedHeight: "",
      twEmmetUrl: "", // emmet.js version must be for CodeMirror
      twViewInlineButtonText: "View Inline",
      twCloseButtonText: "Close",
      twInlineWidth: "auto",
      twInlineHeight: 250
    },
    toolbar: "code",
    contextmenu: "code"
});
*/
codeMirrorInnerInitRTE = function(userCodeMirrorSettings) {
  var defaultCodeMirrorSettings = {
      mode: "htmlmixed",
      theme: "",
      indentOnInit: true,
      lineNumbers: true,
      lineWrapping: true,
      foldGutter: true,
      gutters: ["CodeMirror-linenumbers", "CodeMirror-foldgutter"],
      indentUnit: 1,
      tabSize: 1,
      matchBrackets: true,
      styleActiveLine: true,
      autoCloseTags: true,
      showTrailingSpace: true,
      extraKeys: {
        "Ctrl-Space": "autocomplete",
        "Alt-F": "findPersistent",
        "F11": function(cm) {
          cm.setOption("fullScreen", !cm.getOption("fullScreen"));
        },
        "Esc": function(cm) {
          if (cm.getOption("fullScreen")) cm.setOption("fullScreen", false);
        },
        "Ctrl-Q": function(cm){
          cm.foldCode(cm.getCursor());
         }
      }
    }
  var settings = $.extend({}, defaultCodeMirrorSettings, userCodeMirrorSettings);
  return settings;
}
function popMirror(target, title, width, height, viewInline, close, inlineW, inlineH) {
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
      var killCodeStat = twCodeMirrorKillCode;
      if(twCodeMirrorKillCodeSecure == 0){
        killCode(targetid, 1);
      }
    },
    items: [{
      classes: "popCodeMirror " +targetid,
      type: 'container',
      onPostRender: function() {
        twCodeMirrorKillCode = 0;
        twCodeMirrorKillCodeSecure = 0;
        $(target).appendTo(".mce-popCodeMirror.mce-"+targetid+" > .mce-container-body");
        setTimeout(function(){
          $(".mce-popCode.mce-"+targetid).removeClass("mce-container").find("*").removeClass("mce-container");
          $(".mce-popCode.mce-"+targetid+" .mce-close").addClass("mce-reset");
          window["codeT" + targetid].refresh();
          var patientWaiter = setInterval(function(){
            if($(".mce-popCodeMirror.mce-"+targetid+" .CodeMirror").length){
              $(".mce-popCodeMirror.mce-"+targetid+" .coder").css({"width":width,"height":height});
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
          $(".mce-popCodeMirror.mce-"+targetid+" .coder").css({"width":inlineW,"height":inlineH});
          $inline.replaceWith(target);
          window["codeT" + targetid].refresh();
          twCodeMirrorKillCode = 0;
          twCodeMirrorKillCodeSecure = 1;
          tinymce.activeEditor.windowManager.close();
        }
      },
      // {
      //   text: close,
      //   onclick: function() {
      //     killCode(targetid,1);
      //     tinymce.activeEditor.windowManager.close();
      //   }
      // }
    ]
  });

}

function killCode(target,sender) {
  if (sender == 1) {
    codeMirrorSetContentsilent = true;
    // tinymce.get(target).setContent(window["codeT" + target].getValue());
    $("#" + target).html(window["codeT" + target].getValue());
    window["codeT" + target].toTextArea();
    $(".coder." + target).remove();
    tinymce.activeEditor.windowManager.close();
  }
}

function popCode(target) {
  var twPoppedTitle = tinymce.get(target).getParam("twCodeMirrorSettings",{}).twPoppedTitle || "CodeMirror HTML Source Code";
  var twPoppedWidth = tinymce.get(target).getParam("twCodeMirrorSettings",{}).twPoppedWidth || window.innerWidth / 1.2;
  var twPoppedHeight = tinymce.get(target).getParam("twCodeMirrorSettings",{}).twPoppedHeight || 300;
  var twViewInlineButtonText = tinymce.get(target).getParam("twCodeMirrorSettings",{}).twViewInlineButtonText || "View Inline";
  var twCloseButtonText = tinymce.get(target).getParam("twCodeMirrorSettings",{}).twCloseButtonText || "Close";
  var twInlineWidth = tinymce.get(target).getParam("twCodeMirrorSettings",{}).twInlineWidth || 'auto';
  var twInlineHeight = tinymce.get(target).getParam("twCodeMirrorSettings",{}).twInlineHeight || 250;
  popMirror(".coder."+target, twPoppedTitle, twPoppedWidth, twPoppedHeight, twViewInlineButtonText, twCloseButtonText, twInlineWidth, twInlineHeight);
}
tinymce.PluginManager.add('twCodeMirror', function(editor) {
  var target = $("#" + editor.id);

  //editor.getContent({format : 'raw'})
  //or
  //getContent({source_view: true})
  function initMirr(justPop) {
    if (justPop == 1) {
      popCode(editor.id);
    }
    // else if (!$('.coder.' + editor.id).length) {
    else if (justPop == 0) {
      var twInlineWidth = editor.getParam("twCodeMirrorSettings",{}).twInlineWidth || 'auto';
      var twInlineHeight = editor.getParam("twCodeMirrorSettings",{}).twInlineHeight || 250;

      if(editor.getParam("inline")){
        var edId = editor.id;
      }
      else{
        var edId = editor.getContainer().id;
      }
      $("#" + edId).before("<div style=dispaly:none; class='coder " + editor.id +"' data-origin="+editor.id+"><span type=button onclick='killCode(\"" + editor.id + "\",1)' class='mce-close-button mce-reset'  title='Close this CodeMirror'><i class='mce-ico mce-i-remove'></i></span><textarea class='codeT' id='codeT" + editor.id + "'>" + editor.getContent() + "</textarea>");
      $('.coder.' + editor.id).css({"width":twInlineWidth, "height":twInlineHeight}).fadeIn();
      window["codeT" + editor.id] = CodeMirror.fromTextArea(document.getElementById('codeT' + editor.id), codeMirrorInnerInitRTE(editor.getParam("twCodeMirrorSettings",{})));
      if(editor.getParam("twCodeMirrorSettings",{}).twFontSize){
        var twFontSize = editor.getParam("twCodeMirrorSettings").twFontSize;
      }
      else{
        var twFontSize = 15;
      }
      $(".coder." + editor.id + " .CodeMirror").css("font-size", twFontSize)

      window["codeT" + editor.id].refresh();
      if(typeof emmetCodeMirror !== 'undefined'){
        emmetCodeMirror(window["codeT" + editor.id]);
      }
      codeMirrorSetContentsilent = false;
      window["codeT" + editor.id].on("keyup", function() {
        if (codeMirrorSetContentsilent){
         return;
        }
        else{
          editor.setContent(window["codeT" + editor.id].getValue());
        }
      })
      editor.on("keyup", function() {
          codeMirrorSetContentsilent = true;
          // window["codeT" + editor.id].getDoc().setValue(editor.getContent({source_view: true}));
          window["codeT" + editor.id].getDoc().setValue(editor.getContent());
          codeMirrorSetContentsilent = false;
      })
      if(editor.getParam("twCodeMirrorSettings",{}).twPopped !== 0){
        popCode(editor.id)
      }
    } 
    else {
      if (!$('.coder.' + editor.id).length) {
        initMirr(0)
      }
      else{
        popCode(editor.id)
      }
    }
  }

  function loadAll(style) {
    var mainCss = '<style id="mainCSScodeMIrror">.x-window-body{overflow-x:hidden!important;}.codeT,.coder{position:relative}.mce-popCode .mce-title{text-align:center;} .mce-popCode .mce-close-button{display:none;}.CodeMirror{text-align:left!important}.cm-trailingspace{background-image:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAQAAAACCAYAAAB/qH1jAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3QUXCToH00Y1UgAAACFJREFUCNdjPMDBUc/AwNDAAAFMTAwMDA0OP34wQgX/AQBYgwYEx4f9lQAAAABJRU5ErkJggg==);background-position:bottom left;background-repeat:repeat-x}.coder > .mce-close-button{position:absolute;top:-18px;right:0;cursor: pointer;background: #FFF;margin: 0 19px -4px 0;text-align: center;border-radius: 5px 5px 0 0;padding: 2px;box-shadow: 0px 0px 1px 1px rgba(0, 0, 0, 0.4);}.mce-popCodeMirror,.mce-popCodeMirror .mce-container-body{width:inherit!important}.coder .CodeMirror{box-shadow: 0px 0px 1px 1px rgba(0, 0, 0, 0.4); width:inherit;height:inherit;}.mce-popCode .CodeMirror{box-shadow:none;width:98.8%!important;}.coder > .mce-close-button > .mce-ico{font-size:15px; color:#000;}</style>';
    if(!$("#mainCSScodeMIrror").length){
      $('head').append(mainCss);
    }
    if (typeof CodeMirror == 'undefined') {
      var basePath = editor.getParam("twCodeMirrorSettings",{}).twCodeMirrorCDNbase || "https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.14.2/";
      var scriptLoaderMain = new tinymce.dom.ScriptLoader();
      var scriptLoaderSubs = new tinymce.dom.ScriptLoader();
      tinymce.DOM.loadCSS(basePath+'codemirror.min.css');
      tinymce.DOM.loadCSS(basePath+'addon/dialog/dialog.css');
      tinymce.DOM.loadCSS(basePath+'addon/search/matchesonscrollbar.css');
      tinymce.DOM.loadCSS(basePath+'addon/display/fullscreen.css');
      tinymce.DOM.loadCSS(basePath+'addon/fold/foldgutter.css');
      if(editor.getParam("twCodeMirrorSettings",{}).theme){
        tinymce.DOM.loadCSS(basePath+'theme/'+editor.getParam("twCodeMirrorSettings").theme+'.css');
      }
      scriptLoaderMain.add(basePath+'codemirror.min.js');
      scriptLoaderMain.loadQueue(function() {
        if(typeof emmetCodeMirror == 'undefined' && editor.getParam("twCodeMirrorSettings",{}).twEmmetUrl){
          scriptLoaderSubs.add(editor.getParam("twCodeMirrorSettings").twEmmetUrl);
        }
        scriptLoaderSubs.add(basePath+'addon/wrap/hardwrap.min.js');
        scriptLoaderSubs.add(basePath+'addon/selection/active-line.min.js');
        scriptLoaderSubs.add(basePath+'addon/search/searchcursor.min.js');
        scriptLoaderSubs.add(basePath+'addon/scroll/annotatescrollbar.js');
        scriptLoaderSubs.add(basePath+'addon/search/matchesonscrollbar.js');
        scriptLoaderSubs.add(basePath+'addon/search/jump-to-line.min.js');
        scriptLoaderSubs.add(basePath+'addon/search/search.min.js');
        scriptLoaderSubs.add(basePath+'addon/dialog/dialog.min.js');
        scriptLoaderSubs.add(basePath+'addon/hint/show-hint.min.js');
        scriptLoaderSubs.add(basePath+'addon/hint/html-hint.min.js');
        scriptLoaderSubs.add(basePath+'addon/hint/xml-hint.min.js');
        scriptLoaderSubs.add(basePath+'addon/edit/closetag.min.js');
        scriptLoaderSubs.add(basePath+'addon/edit/trailingspace.min.js');
        scriptLoaderSubs.add(basePath+'addon/display/fullscreen.js');
        scriptLoaderSubs.add(basePath+'addon/fold/foldcode.js');
        scriptLoaderSubs.add(basePath+'addon/fold/foldgutter.js');
        scriptLoaderSubs.add(basePath+'addon/fold/brace-fold.js');
        scriptLoaderSubs.add(basePath+'addon/fold/xml-fold.js');
        scriptLoaderSubs.add(basePath+'addon/fold/comment-fold.js');
        scriptLoaderSubs.add(basePath+'addon/edit/matchbrackets.min.js');
        scriptLoaderSubs.add(basePath+'mode/htmlmixed/htmlmixed.min.js');
        scriptLoaderSubs.add(basePath+'mode/javascript/javascript.min.js');
        scriptLoaderSubs.add(basePath+'mode/xml/xml.min.js');
        scriptLoaderSubs.add(basePath+'mode/css/css.min.js');
        // scriptLoaderSubs.add(basePath+'mode/clike/clike.js');
        // scriptLoaderSubs.add(basePath+'mode/php/php.min.js');
        scriptLoaderSubs.loadQueue(function() {
          setTimeout (function(){
            initMirr(style);
          },500)
        })
      });
    } else {
      initMirr(style);
    }
  }

  editor.addButton('code', {
    type: "button",
    classes: "twCoderM",
    icon: 'code',
    tooltip: 'CodeMirror',
    onclick: function(){
      if (!$('.mce-popCodeMirror.mce-'+editor.id).length){
        loadAll()
      }
    }
  });
  editor.addMenuItem('code', {
    icon: 'code',
    text: 'CodeMirror',
    onclick: function(){
      if (!$('.mce-popCodeMirror.mce-'+editor.id).length){
        loadAll()
      }
    }
  });
});