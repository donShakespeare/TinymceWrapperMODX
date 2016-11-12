/*
  twShowdown.js 
  Live Preview your TinyMCE Markdown in Showdown.js with full MathJax support
  View Sidebyside or popped up
  Works with twExoticMarkdownEditor.js

  If you are using another library to Parse your published Markdown, say PHP Parsedown Extra, note that Markdown Parsers have syntax flavours, therefore using Showdown (Javascript) might show little differences from your final official output.

  https://github.com/donShakespeare/twShowdown
  Demo: http://www.leofec.com/modx-revolution/
  (c) 2016 by donShakespeare for MODx awesome TinymceWrapper

  Usage:

  tinymce.init({
    external_plugins: {
      twShowdown: "[[++assets_url]]components/tinymcewrapper/tinymceplugins/twShowdown.js", //plugin location
    },
    twShowdownSettings: { 
      (coming soon)... pass in any Showdown official setting you like to overwrite default behaviour
      ... below are proprietary settings
      twShowdownCDNbase: "",
      twEnableMathJax: true, // default is false
      twMathJaxURL: "", //defauls to CDN
      twPoppedTitle: "",
      twPopped: 0, // popped (default) or inline
      twPoppedWidth: "",
      twPoppedHeight: "",
      twViewInlineButtonText: "View Inline",
      twCloseButtonText: "Close",
      twInlineHeight: 250
    },
    toolbar: "preview",
    contextmenu: "preview"
});
*/
showDownInnerInitRTE = function(userShowdownSettings) {
  var defaultShowdownSettings = {
    }
  var settings = $.extend({}, defaultShowdownSettings, userShowdownSettings);
  return settings;
}
function transformMarks(editor, id, request){
  if(editor.getParam("inline")){
    var editorMode = $("textarea[name="+id+"]").val();
  }
  else{
    var editorMode = editor.getElement().value;
  }
  var converter = new showdown.Converter();
  if(document.getElementById("codeT" + id)){
    targetArea = document.getElementById("codeT" + id);
    text = editorMode,
    data = converter.makeHtml(text);
    targetArea.innerHTML = data;
    if(tinymce.activeEditor.getParam("twShowdownSettings",{}).twEnableMathJax !== false){
      MathJax.Hub.Queue(["Typeset",MathJax.Hub,"codeT" + id]);
    }
  }
}
function popShowdown(target, title, width, height, viewInline, close, inlineW, inlineH) {
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
      var killCodeStat = twShowdownKillCode;
      if(twShowdownKillCodeSecure == 0){
        killCodeShowdown(targetid, 1);
      }
    },
    items: [{
      classes: "popShowdown " +targetid,
      type: 'container',
      onPostRender: function() {
        twShowdownKillCode = 0;
        twShowdownKillCodeSecure = 0;
        $(target).appendTo(".mce-popShowdown.mce-"+targetid+" > .mce-container-body");
        setTimeout(function(){
          $(".mce-popCode.mce-"+targetid).removeClass("mce-container").find("*").removeClass("mce-container");
          $(".mce-popCode.mce-"+targetid+" .mce-close").addClass("mce-reset");
          var patientWaiter = setInterval(function(){
            if($(".mce-popShowdown.mce-"+targetid+" .showdown").length){
              transformMarks(tinymce.activeEditor, targetid);
              clearInterval(patientWaiter);
            }
          var storedHeight =  $('.codeT.' + targetid).data("height");
          $('#codeT' + targetid + ', .coderSNparent.' + targetid).css({"max-width":width, "height":height})
          },100)
        },100)
      }
    }],
    buttons: [
      {
        text: viewInline,
        active: true,
        onclick: function() {
          var editorWidth = $('#'+targetid).width();
          var storedHeight =  $('#codeT' + targetid).data("height");
          var storedHeightSinePadding = storedHeight-5;
          $('.coderSNparent.' + targetid).css({"max-width":editorWidth, "height":storedHeight});
          $('#codeT' + targetid).css({"max-width":editorWidth, "height":storedHeightSinePadding});
          $inline.replaceWith(target);
          twShowdownKillCode = 0;
          twShowdownKillCodeSecure = 1;
          tinymce.activeEditor.windowManager.close();
        }
      },
    ]
  });
}

function killCodeShowdown(target,sender) {
  if (sender == 1) {
    $(".coderSNparent." + target).remove();
    tinymce.activeEditor.windowManager.close();
  }
}

function popCodeShowdown(target) {
  var twPoppedTitle = tinymce.get(target).getParam("twShowdownSettings",{}).twPoppedTitle || "Markdown / MathJax Preview";
  var twPoppedWidth = tinymce.get(target).getParam("twShowdownSettings",{}).twPoppedWidth || window.innerWidth / 1.2;
  var twPoppedHeight = tinymce.get(target).getParam("twShowdownSettings",{}).twPoppedHeight || 300;
  var twViewInlineButtonText = tinymce.get(target).getParam("twShowdownSettings",{}).twViewInlineButtonText || "View Inline";
  var twCloseButtonText = tinymce.get(target).getParam("twShowdownSettings",{}).twCloseButtonText || "Close";
  var twInlineWidth = tinymce.get(target).getParam("twShowdownSettings",{}).twInlineWidth || 'auto';
  var twInlineHeight = tinymce.get(target).getParam("twShowdownSettings",{}).twInlineHeight || 250;
  popShowdown(".coderSNparent."+target, twPoppedTitle, twPoppedWidth, twPoppedHeight, twViewInlineButtonText, twCloseButtonText, twInlineWidth, twInlineHeight);
}
tinymce.PluginManager.add('twShowdown', function(editor) {
  var target = $("#" + editor.id);

  function initShowdown(justPop) {
    if (justPop == 1) {
      popCodeShowdown(editor.id);
    }
    // else if (!$('.coderSNparent.' + editor.id).length) {
    else if (justPop == 0) {
      var twInlineWidth = editor.getParam("twShowdownSettings",{}).twInlineWidth || 'auto';
      var twInlineHeight = editor.getParam("twShowdownSettings",{}).twInlineHeight || 250;

      if(editor.getParam("inline")){
        var edId = editor.id;
      }
      else{
        var edId = editor.getContainer().id;
      }

      $("#" + edId).before("<div style=dispaly:none; class='coderSNparent " + editor.id +"' data-origin="+editor.id+"><span type=button onclick='killCodeShowdown(\"" + editor.id + "\",1)' class='mce-close-button mce-reset'  title='Close this Showdown'><i class='mce-ico mce-i-remove'></i></span><div class='showdown codeT' id='codeT" + editor.id + "' data-height="+twInlineHeight+" data-width="+twInlineWidth+"></div>");
      var editorWidth = $('#'+edId).width();
      var storedHeightSinePadding =  twInlineHeight-5;
      $('#codeT' + editor.id).css({"max-width":editorWidth, "height":storedHeightSinePadding});
      $('.coderSNparent.' + editor.id).css({"max-width":editorWidth, "height":twInlineHeight}).fadeIn();
      transformMarks(editor, editor.id);

      $(window).resize(function() {
        if ($('.coderSNparent.' + editor.id).length) {
          $('.codeT.' + editor.id + ', .coderSNparent.' + editor.id).css("max-width", editorWidth);
        }
      });

      editor.on("change InsertContent", function() {
        transformMarks(editor, editor.id);
      })
      if(editor.getParam("twShowdownSettings",{}).twPopped !== 0){
        popCodeShowdown(editor.id)
      }
    } 
    else {
      if (!$('.coderSNparent.' + editor.id).length) {
        initShowdown(0)
      }
      else{
        popCodeShowdown(editor.id)
      }
    }
  }

  function loadAllshowDown(style) {
    var mainCss = '<style id="mainCSSshowDown">.x-window-body{overflow-x:hidden!important;}.codeT,.coderSNparent{position:relative; margin:auto}.mce-popCode .mce-title{text-align:center;} .mce-popCode .mce-close-button{display:none;}.coderSNparent > .mce-close-button{position:absolute;top:-22px;right:0;cursor: pointer;background: #FFF;margin: 0 19px -4px 0;text-align: center;border-radius: 5px 5px 0 0;padding: 2px;box-shadow: 0px 0px 1px 1px rgba(0, 0, 0, 0.4);}.mce-popShowdown,.mce-popShowdown .mce-container-body{width:inherit!important}.coderSNparent .showdown{white-space: normal !important;word-wrap: break-word;box-shadow: 0px 0px 1px 1px rgba(0, 0, 0, 0.4); width:inherit;height:inherit;overflow:auto;padding:10px ;margin:auto}.mce-popCode .showdown{box-shadow:none;}.coderSNparent > .mce-close-button > .mce-ico{font-size:15px; color:#000;}</style>';
    if(!$("#mainCSSshowDown").length){
      $('head').append(mainCss);
    }
    if (typeof showdown == 'undefined') {
      var basePath = editor.getParam("twShowdownSettings",{}).twShowdownCDNbase || "https://cdnjs.cloudflare.com/ajax/libs/showdown/1.4.1/";
      var twMathJaxURL = editor.getParam("twShowdownSettings",{}).twMathJaxURL || "https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-MML-AM_CHTML";
      var scriptLoaderMain = new tinymce.dom.ScriptLoader();
      var scriptLoaderSubs = new tinymce.dom.ScriptLoader();
      scriptLoaderMain.add(basePath+'showdown.min.js');
      if (typeof MathJax == 'undefined' && editor.getParam("twShowdownSettings",{}).twEnableMathJax !== false){
        scriptLoaderMain.add(twMathJaxURL);
      }
      scriptLoaderMain.loadQueue(function() {
        setTimeout (function(){
          initShowdown(style);
        },500)
      });
    } else {
      initShowdown(style);
    }
  }
  editor.on("focus change", function() {
    editor.save();
  });
  editor.addButton('preview', {
    type: "button",
    icon: 'preview',
    tooltip: 'Markdown/MathJax Preview',
    onclick: function(){
      if (!$('.mce-popShowdown.mce-'+editor.id).length){
        loadAllshowDown()
      }
    }
  });
  editor.addMenuItem('preview', {
    icon: 'preview',
    text: 'Markdown/MathJax Preview',
    onclick: function(){
      if (!$('.mce-popShowdown.mce-'+editor.id).length){
        loadAllshowDown()
      }
    }
  });
});