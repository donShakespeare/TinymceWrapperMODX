/*
Awesome TinyJSONGallery for TinymceWrapper
http://www.leofec.com/modx-revolution/
-donshakespeare in the MODX forum
Copyright 2016

This MODX Extra would be impossible without
jQuery UI, colorbox.js, tinysort.js, fastLiveFilter.js and most importantly, the most powerful json2html.js
*/
var scriptLoader = new tinymce.dom.ScriptLoader();
tinymce.DOM.loadCSS('https://code.jquery.com/ui/1.8.24/themes/smoothness/jquery-ui.css,' + modxGalleryAssetsUrl + 'components/tinymcewrapper/gallery/colorbox/colorbox.css,' + modxGalleryAssetsUrl + 'components/tinymcewrapper/gallery/css/main.css,https://cdnjs.cloudflare.com/ajax/libs/jquery-tagsinput/1.3.6/jquery.tagsinput.min.css');
scriptLoader.add(modxGalleryAssetsUrl +'components/tinymcewrapper/gallery/js/json2html.js');
scriptLoader.add('https://cdnjs.cloudflare.com/ajax/libs/jquery.colorbox/1.6.3/jquery.colorbox-min.js');
scriptLoader.add('https://code.jquery.com/ui/1.11.4/jquery-ui.min.js');
scriptLoader.add('https://cdnjs.cloudflare.com/ajax/libs/tinysort/2.2.2/tinysort.min.js');
scriptLoader.add('https://cdnjs.cloudflare.com/ajax/libs/jquery-tagsinput/1.3.6/jquery.tagsinput.min.js');

// fastLiveFilter forked and hammered by donshakespeare: Original idea by Anthony Bush @ http://anthonybush.com/projects/jquery_fast_live_filter/
jQuery.fn.fastLiveFilter = function(getAttr, list, options) {
  options = options || {};
  list = jQuery(list);
  var input = this;
  var timeout = options.timeout || 0;
  var callback = options.callback || function() {};
  var keyTimeout;
  var lis = list.children();
  var len = lis.length;
  var oldDisplay = len > 0 ? lis[0].style.display : "inline-block";
  callback(len);
  input.change(function() {
    var filter = input.val().toLowerCase();
    var li;
    var numShown = 0;
    for (var i = 0; i < len; i++) {
      li = lis[i];
      if (li.querySelector("a").getAttribute(getAttr).toLowerCase().indexOf(filter) >= 0) {
        if (li.style.display == "none") {
          li.style.display = oldDisplay;
          $(li).find('a').addClass('cboxElement').removeClass('fHidden'); //might slow things down
        }
        numShown++;
      } else {
        if (li.style.display != "none") {
          li.style.display = "none";
          $(li).find('a').removeClass('cboxElement').addClass('fHidden'); //might slow things down
        }
      }
    }
    callback(numShown);
    return false;
  }).keydown(function() {
    clearTimeout(keyTimeout);
    keyTimeout = setTimeout(function() {
      input.change();
    }, timeout);
  });
  return this; // maintain jQuery chainability
}
function toggleLiveEdit(editor){
  if(galleryLiveEdit == 1){
    galleryLiveEdit = 0;
    editor.windowManager.alert("OFF: JSON changes will NOT affect Gallery");
  }
  else{
    galleryLiveEdit = 1;
    editor.windowManager.alert("ON: JSON changes WILL affect Gallery immediately");
  }
}
function pasteSampleCode(editor){
  editor.windowManager.confirm("Reset current JSON to sample code, from which you may Rebuild",function(s){
    if(s){
      tinymce.get("tinyJSONfield").setContent('[{"Location": "assets/components/tinymcewrapper/gallery/stockImages/nature/&autoCreateThumb=1&justJSON=1&options=w=178,h=117,zc=t"}]');
      galleryModified(1);
    }
  })
}
function toggleHelpInstructions(){
  if($("#gallHelp:hidden").length){
    $("#gallHelp").css("display","block !important").fadeIn();
  }
  else{
    $("#gallHelp").css("display","none !important").fadeOut();
  }
}
function rebuildFromCurrent(editor, textareaForJSON){
  editor.windowManager.confirm("Rebuild, really?",function(s){
    if(s){
      loadingThrobber(1);
      // var chunkVal = $("#"+textareaForJSON).val();
      var chunkVal = tinymce.get("tinyJSONfield").getContent();
      chunkTransformer(chunkVal, textareaForJSON);
      runFilter("data-desc");
    }
  })
}
function rebuildFromServer(editor){
  var newChunk = tinymce.get("tinyJSONfield").getContent();
  tinyJSONGalleryDirLocation ='';
  if(newChunk){
    var data = JSON.parse(newChunk, function (k, v) {
      if (k === 'Location') {
        tinyJSONGalleryDirLocation = v.replace(/&amp;/g, '&');
        $("#tinyJSONLocationSettings").html("<b>Your current location and setting:</b><br><i>"+tinyJSONGalleryDirLocation+"</i><br><br>");
      }
    });
  }
  if(tinyJSONGalleryDirLocation){
    editor.windowManager.confirm("Rebuild, really?",function(s){
      if(s){
        loadingThrobber(1);
        editor.windowManager.open({
           title: "Rebuilt JSON from Server",
           width: 410,
           height: 400,
           url: modxGalleryAssetsUrl+"components/tinymcewrapper/gallery/php/TinyJSONGalleryConnector.php?path="+tinyJSONGalleryDirLocation
       });
      }
    })
  }
  else{
    editor.windowManager.alert("Invalid or no JSON in code textarea")
     $("#gallHelp").fadeIn();
  }
}
function addCommas(num) {
  num = String(num);
  var rgx = /(\d+)(\d{3})/;
  while (rgx.test(num)) {
    num = num.replace(rgx, '$1' + ',' + '$2');
  }
  return num;
}
function tinyDesc(editor){
  tinymce.init({
    selector: ".mce-newDesc",
    fixed_toolbar_container: "#descToolbar",
    skin_url: galleryBackUpRTEskin,
    menubar:false,
    plugins:"contextmenu code",
    toolbar:"code undo redo bold italic underline ",
    forced_root_block: "",
    inline:true,
    contextmenu: "code undo redo bold italic underline ",
    setup: function(editor) {
      editor.on("change keyup", function() {
        $('.mce-srcC').parents('li').find("a").attr("data-desc", $(editor.getBody()).html());
        galleryModified(1);
      })
    }
  })
}
function nextPrevSubmit(el, clean){
  el.attr({
    'href':$('.mce-newLink').val(),
    'data-src':$('.mce-newSrc').val(),
    'data-index':$('.mce-newIndex').val(),
    'data-name':$('.mce-newName').val(),
    'data-tag':$('.mce-newTag').val(),
    'data-time':$('.mce-newTime').val(),
    'data-desc':$('.mce-newDesc').html()
  })
  .children('img').attr('src',$('.mce-newSrc').val())
  .parents('li').find('.imageIndex').html($('.mce-newIndex').val())
  .parents('li').find('.twgTitle').html($('.mce-newName').val())
  .parents('li').find('.tagger').attr('data-tag',$('.mce-newTag').val()).html($('.mce-newTag').val())
  if(clean){
    $('.allSRC').removeClass('allSRC');
    $('.thisSRC').removeClass('thisSRC');
  }
}
function myColorbox() {
  $("#list_to_filter li a").colorbox({
    rel: "li a",
    current: false,
    opacity: 0.8,
    transition: "none",
    reposition: true,
    speed: 100,
    scalePhotos:false,
    overlayClose: false,
    maxWidth: $(window).width()*0.93,
    maxHeight: $(window).height()*0.93,
    title:false,
    onOpen: function(){
      $('#tinyOverlay').fadeIn();
      cSet = 0;
      if($('#tinyG').length){
      }
      else{
        $('body').append('<div id="tinyG"><div id="tinyGinner"><span id="cindex" data-label="index #:" class="tinyCs"></span><span id="cname" data-label="title:" class="tinyCs"></span><span id="ctag" data-label="tag:" class="tinyCs"></span><div id="cdesc" data-label="desc:" class="tinyCs"></div></div></div>');
        $('#cboxOverlay').replaceWith('<div id="tinyOverlay"></div>');
        $('#tinyG').hide();
        setTimeout(function(){
          tinymce.init({
            selector: ".tinyCs",
            skin_url: galleryBackUpRTEskin,
            menubar: false,
            inline: true,
            forced_root_block: '',
            force_br_newlines: true,
            force_p_newlines: false,
            menubar: false,
            toolbar: false,
            setup: function(editor) {
              editor.on("change", function() {
                galleryModified(1);
              })
              editor.on("keyup", function() {
                if(editor.id == 'cname'){
                  $($this).attr("data-name", $("#"+editor.id).text().trim());
                  $($this).parent('li').find('.twgTitle').html($("#"+editor.id).text().trim());
                }
                if(editor.id == 'ctag'){
                  $($this).attr("data-tag", $("#"+editor.id).text().trim());
                  $($this).parent('li').find('.tagger').attr('data-tag',$("#"+editor.id).text().trim()).html($("#"+editor.id).text().trim());
                }
                if(editor.id == 'cindex'){
                  $($this).attr("data-index", $("#"+editor.id).text().trim());
                  $($this).parent('li').find('.imageIndex').html($("#"+editor.id).text().trim());
                }
                if(editor.id == 'cdesc'){
                  $($this).attr("data-desc", $("#"+editor.id).text().trim());
                }
              })
            }
          });
        }, 700)
      }
      $('#tinyG').fadeIn();
      $("#colorbox").draggable({
        handle: '#cboxWrapper',
        cancel: '#cboxCurrent, #cboxTitle',
        stop: function(){
          cSet = 1;
          cLeft = $("#colorbox").css("left");
          cTop = $("#colorbox").css("top");
        }
      });
    },
    onCleanup: function(){
      $('#tinyG').fadeOut();
      $('#tinyOverlay').fadeOut();
      delete cSet;
      delete cLeft;
      delete cTop;
    },
    onComplete: function() {
      $('#tinyOverlay').on("click",function(){
        $('#tinyOverlay').fadeOut();
      });
      $('#colorbox').removeAttr('tabindex');
      if(cSet == 1){
        $("#colorbox").css({'top':cTop,'left':cLeft});
      }
      if($("#cboxError").length){
        $($this).attr("data-lerror",1).addClass("missingLarge")
      }
      else{
        $($this).attr("data-lerror",0).removeClass("missingLarge")
      }

    },


    onLoad: function() {
      $this = this;
      $("#cindex").html($($this).attr("data-index"));
      $("#cname").html($($this).attr("data-name"));
      $("#ctag").html($($this).attr("data-tag"));
      $("#cdesc").html($($this).attr("data-desc"));
    },
  });
}
function chunkTransformer(chunkCode, textareaForJSON, fresh){
  var chunkCode = chunkCode;
  var transform = [{
    'tag': 'li',
    'class': function(obj){
      if(obj.hidden == 1){
        return ('galhidden');
      }
    },
    'children': [{
        'tag': 'a',
        'href': '${url}',
        'class':function(obj){
          if(obj.lerror == 1){
            return ("missingLarge");
          }
        },
        'data-name': '${name}',
        'data-hidden': '${hidden}',
        'data-src': '${src}',
        'data-desc': '${desc}',
        'data-index': '${index}',
        'data-tag': '${tag}',
        'data-terror': '',
        'data-lerror': '${lerror}',
        'data-time': '${time}',
        'data-ext': function(obj){return obj.src.split('\\').pop().split('/').pop();},
        'children': [{
          'tag': 'img',
          'src': '${src}',
          'onerror':function(){$(this).parent().attr("data-terror",1).addClass("missingThumb")},
          'onload':function(){$(this).parent().attr("data-terror",0).removeClass("missingThumb")},
        }]
      },
      {
        'tag': 'span',
        'class': 'imageIndex',
        'html': '${index}'
      },
      {
        'tag': 'p',
        'class': 'twgTitle',
        'html': '${name}'
      },
      {
        'tag': 'p',
        'class': 'tagger',
        'data-tag': '${tag}',
        'html': '${tag}'
      }
      ]
  }];

  if(chunkCode){
    if(qcJSON(chunkCode)){
      var data = JSON.parse(chunkCode, function (k, v) {
        if (k === 'Location') {
          tinyJSONGalleryDirLocation = v || "";
          tinyJSONGalleryDirLocation = v.replace(/&amp;/g, '&');
          $("#tinyJSONLocationSettings").html("<b>Your current location and setting:</b><br><i>"+tinyJSONGalleryDirLocation+"</i><br><br>");
        }
        return v;
      });
        data.shift();
      $("#picSettings").hide().appendTo("#tinyJSONGalleryWrapper");
      $('#list_to_filter').empty().json2html(data, transform);
      myColorbox();
      mySorted();
      if(!$('#list_to_filter').children().length && fresh !== 1){
        tinymce.get("tmpTempEditor").windowManager.alert("Insufficient JSON to build Image Gallery")
      }
      loadingThrobber(0, 3000);
    }
    else{
      tinymce.get("tmpTempEditor").windowManager.alert("Sorry, there is a problem with your JSON")
    }
  }
  else{
    chunkCode = '[{"Location": "assets/components/tinymcewrapper/gallery/stockImages/nature/&autoCreateThumb=1&justJSON=1&options=w=178,h=117,zc=t"}]'
    setTimeout(function(){
      $("#"+textareaForJSON).val(chunkCode).change().fadeIn();
      // $("#"+textareaForJSON).val(chunkCode).change().fadeIn();
      tinymce.get("tinyJSONfield").setContent(chunkCode);
      $("#gallHelp").fadeIn();
      tinymce.get("tmpTempEditor").windowManager.alert("Insufficient JSON to build Gallery")
    },500)
  }
    if($("#list_to_filter li img").length < 1 && $("#tinyJSONfield").length){
      $("#gallHelp").fadeIn();
      $("#tinyJSONfield, #galleryContextmenuNotice").fadeIn();
    }
    else{
      $("#gallHelp").fadeOut();
    }
    loadingThrobber(0, 500);
}
function galleryModified(state) {
  if(state == 0){
    $('#galButtons').removeClass("mce-modified");
  }
  else{
    $('#galButtons').addClass("mce-modified");
  }
}
function updateChunk(modx, textareaForJSON) {
  tinymce.get("tmpTempEditor").windowManager.confirm("Your JSON code will be synced with the Visual Gallery",function(s){
    if(s){
      var array = [{Location:tinyJSONGalleryDirLocation}];
      $("#list_to_filter li a").each(function() {
        var arrayItem = {
          name: $(this).attr('data-name'),
          src: $(this).attr('data-src'),
          desc: $(this).attr('data-desc'),
          url: $(this).attr('href'),
          hidden: $(this).attr('data-hidden'),
          lerror: $(this).attr('data-lerror'),
          tag: $(this).attr('data-tag'),
          index: $(this).attr('data-index'),
          time: $(this).attr('data-time')
        };
        array.push(arrayItem);
      });
      if(beautifyJSON == 1){
        $("#"+textareaForJSON).val(JSON.stringify(array, null, 4)).change();
        tinymce.get("tinyJSONfield").setContent(JSON.stringify(array, null, 4));
        galleryModified(0);
      }
      else{
        $("#"+textareaForJSON).val(JSON.stringify(array)).change();
        tinymce.get("tinyJSONfield").setContent(JSON.stringify(array));
        galleryModified(0);
      }
      if(modx){
        $('#modx-abtn-save button').trigger("click");
        setTimeout(function(){
          galleryModified(0);
        }, 2000)
      }
      else{
        loadingThrobber(0);
        tinymce.get("tmpTempEditor").windowManager.alert("JSON updated");
        galleryModified(0);
      }
    }
    else{
      loadingThrobber(0)
    }
  })
}
function saveChunk(modx, textareaForJSON) {
  if($("#list_to_filter li a:hidden").length){
    var meHidden = $("#list_to_filter li a:hidden").length;
    tinymce.get("tmpTempEditor").windowManager.confirm("Filtered images ("+meHidden+") will be marked as hidden, proceed?",function(s){
      if(s){
        $("#list_to_filter li a:hidden").each(function() {
          $(this).attr("data-hidden",1);
          $(this).parent('li').addClass("galhidden");
        });
        updateChunk(modx, textareaForJSON);
      }
  });
  }
  else{
    updateChunk(modx, textareaForJSON);
  }
}
function runFilter(attr) {
  $("#filter_input").val('').change();
  var numDisplayed = $(".num_displayed");
  $("#filter_input").fastLiveFilter(attr, "#list_to_filter",  {
    callback: function(total) {
      numDisplayed.html(addCommas(total)+"<br>"+$("#list_to_filter li").length);
    },
  });
}
function mySorted() {
  $('#list_to_filter').sortable({
    handle: 'a',
    placeholder: "ui-state-highlight",
    start: function(e, info) {
      visibleLi  = $('#list_to_filter li:visible').length;
      visibleSelected  = $(".ui-selected:visible").length;
      if($(".ui-selected:visible").length > 1){
        info.item.siblings(".ui-selected").addClass("galleryEnRouteSibling").appendTo(info.item).hide();
        info.item.addClass("galleryEnRouteMaster");
      }
    },
    stop: function(e, info) {
          info.item.after(info.item.find("li"));
          $(".galleryEnRouteSibling").fadeIn().removeClass("galleryEnRouteSibling");
          $(".galleryEnRouteMaster").removeClass("galleryEnRouteMaster");
    },
    update: function( e, info ) {
      galleryModified(1);
    },
  });
  $('#list_to_filter').selectable({
    filter: "li",
    cancel: "a, .twgTitle, #picSettings",
    selecting: function( event, ui ) {
      $("#picSettings").attr("id","picSetting").hide();
    },
    stop: function( event, ui ) {
      $("#picSetting").attr("id","picSettings");
    }
  });
}
function qcJSON(str) {
  try {
      JSON.parse(str);
  } catch (e) {
      return false;
  }
  return true;
}
function tagClickReset(){
  $('#tagManager .tag span').on("click", function(){
    runFilter("data-tag");
    $('#filter_input').val($(this).text().trim()).change();
    $('.mce-ftag').parent().children().removeClass('mce-active');
    $('.mce-ftag').addClass('mce-active');
  })
}
function tagManager(editor){
  if ($("#list_to_filter li a").length) {
    if ($("#tagManager").length) {
      $("#tagManager").fadeOut().remove();
    } else {
      //var x = $('#list_to_filter li[data-tag]');
      //var yyy = $.map(x, function (element) {
      //return element.getAttribute("data-tag");
      //}).toString();
      var getTags = '';
      $('#list_to_filter li a[data-tag]').each(function() {
        getTags += $(this).attr("data-tag") + ",";
      })
      var tagResult = getTags.split(',').filter(function(allItems, i, a) {
        return i == a.indexOf(allItems);
      }).join(',').replace(/,\s*$/, "");
      $("<div id='tagManager'></div").prependTo("#tinyJSONGalleryWrapper")
      tinymce.ui.Factory.create({
        type: 'textbox',
        value: tagResult,
        size: 20,
        classes: 'imageTag',
        button: false,
        onPostRender: function() {
          function onAddTag(tag) {
            var ctag = tag.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '');
            var tagBg = $(".tag span").filter(function() {return $(this).html() === ctag+"&nbsp;&nbsp;";}).parent().css("background-color");
            if($("#list_to_filter .ui-selected").length){
              var hasSelected = $("#list_to_filter .ui-selected").length;
              $(".ui-selected, .ui-selected a").attr("data-tag", ctag);
              $(".ui-selected .tagger").css('background-color', tagBg).attr("data-tag", ctag).html(ctag).fadeIn();
              tagClickReset();
              runFilter("data-tag");
              $('#filter_input').val(ctag).change();
              $('.mce-ftag').parent().children().removeClass('mce-active');
              $('.mce-ftag').addClass('mce-active');
              $('#tagManager .tag span').each(function(){
                if ($(this).html() == tag+"&nbsp;&nbsp;") {
                  $(this).html(ctag+"&nbsp;&nbsp;");
                }
              })
              galleryModified(1);
            }
            else{
              $('#tagManager .tag span').each(function(){
                if ($(this).html() == tag+"&nbsp;&nbsp;") {
                  $(this).parent().remove();
                }
              })
              editor.windowManager.alert("No image selected");

            }
          }
          function onRemoveTag(tag) {
            var ctag = tag.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '');
            if($("#list_to_filter li a[data-tag='"+ctag+"']").length){
              var hasTag = $("#list_to_filter li a[data-tag="+ctag+"]").length;
              editor.windowManager.alert("Removed '"+tag+"' from "+hasTag+" image(s)");
              $("#list_to_filter li a[data-tag='"+ctag+"'], #list_to_filter a[data-tag='"+ctag+"']").attr("data-tag","");
              $("#list_to_filter .tagger[data-tag='"+ctag+"']").html('');
              tagClickReset();
              runFilter("data-tag");
              $('.mce-tag').parent().children().removeClass('mce-active');
              $('.mce-tag').addClass('mce-active');
              galleryModified(1);
            }
          }
          $(function() {
            $('.mce-imageTag').tagsInput({
              onAddTag: onAddTag,
              onRemoveTag: onRemoveTag,
              interactive: true,
              width: 'auto',
              removeWithBackspace:true,
            });
            tagClickReset();

            $('#tagManager .tag span').each(function(){
              var spanTag = $(this);
               $(".tagger").filter(function() {
                return $(this).html() === spanTag.text().trim();
              }).css("background-color", spanTag.parent().css('background-color'));
               $(".tagger").fadeIn()
        })

          });
        },
      }).renderTo(document.getElementById("tagManager"));
    }
  }
}
function imageMenu(editor){
  editor.windowManager.open({
    title: 'Image attributes',
    minWidth: 500,
    classes:'imageMenu',
    onPostRender:function(){
      $(".mce-imageMenu .mce-close").on("click", function(e) {
        e.preventDefault;
        $('.allSRC').removeClass('allSRC');
        $('.thisSRC').removeClass('thisSRC');
      })
      $('#list_to_filter li:visible').addClass('allSRC');
    },
    onSubmit:function(){
      galleryModified(1);
      var img = $('.mce-srcC').parents('li').find("a");
      nextPrevSubmit(img);
      editor.windowManager.alert('Attributes updated');
      return false;
    },
    body: [
    {
      type: 'textbox',
      label: 'index #',
      classes: 'newIndex',
      onPostRender: function(){
       var index = $('.mce-srcC').parents('li').find("a").attr('data-index');
       $('.mce-newIndex').attr("type","number").val(index);
      }
    },
    {
      type: 'textbox',
      label: 'time',
      style:'width:100px !important',
      tooltip:'valid UNIX timestamp',
      classes: 'newTime',
      onPostRender: function(){
       var time = $('.mce-srcC').parents('li').find("a").attr('data-time');
       $('.mce-newTime').attr("type","number").val(time)
      }
    },
    {
      type: 'textbox',
      label: 'tag',
      classes: 'newTag',
      tooltip:"one word without special xters",
      onPostRender: function(){
       var tag = $('.mce-srcC').parents('li').find("a").attr('data-tag');
       $('.mce-newTag').css('width',200).val(tag)
      }
    },
    {
      type: 'textbox',
      label: 'title',
      classes: 'newName',
      onPostRender: function(){
       var name = $('.mce-srcC').parents('li').find("a").attr('data-name');
       $('.mce-newName').val(name);
      }
    },
    {
      type: 'textbox',
      label: 'src',
      classes: 'newSrc',
      onPostRender: function(){
       var src = $('.mce-srcC').parents('li').find("a").attr('data-src');
       $('.mce-newSrc').val(src)
      }
    },
    {
      type: 'textbox',
      label: 'link',
      classes: 'newLink',
      onPostRender: function(){
       var link = $('.mce-srcC').parents('li').find("a").attr('href');
       $('.mce-newLink').val(link)
      }
    },
    {
      type: 'container',
      label: 'desc',
      classes: 'newDesc',
      minHeight:150,
      onPostRender: function(){
        var desc = $('.mce-srcC').parents('li').find("a").attr('data-desc');
        $('.mce-newDesc').html(desc)
      }
    }
    ],
    buttons:[
    {
      text:'Edit with TinyMCE',
      classes:'editTINY',
      style:'left 5px !important',
      onclick:function(){
        if($('#descToolbar').children().length < 1){
          $('.mce-editTINY').replaceWith('<div id="descToolbar" class="mce-editTINY"></div>');
          tinyDesc(editor);
        }
      },
      onPostRender: function(){
        $('.mce-newIndex').parent().parent().before('<div id="tinyTIP">All inputs but desc are saved when you hit enter. Desc (richtext) is saved automatically always. Prev and Next save everything automatically.</div>');
        // $('.mce-editTINY').html('<div id="descToolbar"></div>');
        // tinyDesc(editor);
      }
    },
    {
      text:'Previous',
      classes:'prevAttribute',
      tooltip:'Attributes will be saved',
      onclick:function(){
        nextPrevSubmit($('.thisSRC a'));
        if($('.thisSRC').prev('.allSRC').length){
          $('.thisSRC').removeClass('thisSRC').prevAll('.allSRC').eq(0).addClass('thisSRC');
          var prevSrc = $('.thisSRC a');
          $('.mce-newFName').val(prevSrc.attr('data-ext'));
          $('.mce-newIndex').val(prevSrc.attr('data-index'));
          $('.mce-newTime').val(prevSrc.attr('data-time'));
          $('.mce-newTag').val(prevSrc.attr('data-tag'));
          $('.mce-newName').val(prevSrc.attr('data-name'));
          $('.mce-newSrc').val(prevSrc.attr('data-src'));
          $('.mce-newLink').val(prevSrc.attr('href'));
          $('.mce-newDesc').html(prevSrc.attr('data-desc'));
          galleryModified(1);
        }
      }
    },
    {
      text:'Next',
      classes:'nextAttribute',
      tooltip:'Attributes will be saved',
      onPostRender:function(){
        $('.mce-srcC').parents('li').addClass('thisSRC');
      },
      onclick:function(){
        nextPrevSubmit($('.thisSRC a'));
        if($('.thisSRC').next('.allSRC').length){
          $('.thisSRC').removeClass('thisSRC').nextAll('.allSRC').eq(0).addClass('thisSRC');
          var nextSrc = $('.thisSRC a');
          $('.mce-newFName').val(nextSrc.attr('data-ext'));
          $('.mce-newIndex').val(nextSrc.attr('data-index'));
          $('.mce-newTime').val(nextSrc.attr('data-time'));
          $('.mce-newTag').val(nextSrc.attr('data-tag'));
          $('.mce-newName').val(nextSrc.attr('data-name'));
          $('.mce-newSrc').val(nextSrc.attr('data-src'));
          $('.mce-newLink').val(nextSrc.attr('href'));
          $('.mce-newDesc').html(nextSrc.attr('data-desc'));
          galleryModified(1);
        }
      }
    },
    ]
  })
}
function loadingThrobber(power,delay){
  delay = delay ? delay : 0;
  if(power == 0){
    setTimeout(function(){
      $("#loadingThrobber").remove()
    }, delay)
  }
  else if(power == 1){
    $("#loadingThrobber").remove();
    $('body').append('<div id="loadingThrobber"></div>')
  }
}

function tinyLord(chunkValOriginal, textareaForJSON){
  var textareaForJSON = textareaForJSON;
  tinymce.init({
    name: "tinyFileImageGallery",
    selector: "#tinyFileImageGallery",
    skin_url: galleryBackUpRTEskin,
    inline: true,
    forced_root_block: "",
    force_br_newlines: false,
    force_p_newlines: false,
    setup: function(editor) {
      editor.on("init", function() {
        $(document).on("mouseenter", "#list_to_filter li", function () {
          $("#picSettings").appendTo($(this).not(".ui-state-highlight")).show();
        });
        tinymce.ui.Factory.create({
          type: "button",
          classes:"moreAttr",
          tooltip: "Toggle img actions...",
          onPostRender:function(){
            $(".mce-moreAttr").html("<i class='mce-caret'></i>")
          },
          onclick: function(){
            if($('.mce-moreAttrMenu:hidden').length){
              $('.mce-moreAttrMenu').show()
              $('.mce-moreAttr').addClass('mce-active')
            }
            else{
              $('.mce-moreAttrMenu').hide()
              $('.mce-moreAttr').removeClass('mce-active')
            }
          }
        }).renderTo(document.getElementById("picSettings"));
        tinymce.ui.Factory.create({
          type: 'menu',
          classes:'moreAttrMenu',
          hidden:true,
          items:[
            {
              tooltip: "Enlarge",
              icon: "fullscreen",
              classes:"zoomPic",
              onclick: function(){
                $(".mce-zoomPic").parents("li").find("a").trigger("click");
              }
            },
            {
              tooltip:'Hide Image(s)',
              icon:'preview',
              classes:'hidePic',
              onclick: function(){
                var hideMe = $(".mce-hidePic").parents("li");
                hideMe.addClass("ui-selected");
                var countSelectedH = $(".ui-selected").length;
                if($(".ui-selected a").attr("data-hidden") == 1){
                    $(".ui-selected a").attr("data-hidden",0);
                    $(".ui-selected").removeClass("galhidden");
                    editor.windowManager.alert("Images unHidden: "+countSelectedH);
                    galleryModified(1);

                  }
                  else{
                    $(".ui-selected a").attr("data-hidden",1);
                    $(".ui-selected").addClass("galhidden");
                    editor.windowManager.alert("Images hidden: "+countSelectedH);
                    galleryModified(1);
                  }
              }
            },
            {
              tooltip:'Delete Image(s)',
              icon:'unlink',
              classes:'delPic',
              onclick: function(){
                var delMe = $(".mce-delPic").parents("li");
                delMe.addClass("ui-selected");
                var countSelected = $(".ui-selected").length;
                editor.windowManager.confirm("Remove "+countSelected+" permanently? (still on server)",function(s){
                  if(s){
                    $("#picSettings").appendTo("#tinyJSONGalleryWrapper").hide();
                    $(".ui-selected").remove();
                    runFilter("data-desc");
                    galleryModified(1);
                  }
                })
              }
            },
            {
              tooltip:'Edit Title(s)',
              icon:'backcolor',
              classes:'eTitles',
              onclick: function() {
                $(".mce-eTitles").parents('li').addClass("ui-selected");
                if($(".ui-selected").length){
                  tinymce.init({
                    selector: ".ui-selected .twgTitle",
                    skin_url: galleryBackUpRTEskin,
                    inline: true,
                    menubar:false,
                    plugins:"contextmenu",
                    toolbar:false,
                    forced_root_block: "",
                    contextmenu: "undo redo",
                    setup: function(editor) {
                      editor.on("change keyup", function() {
                        $("#"+editor.id).parent('li').find('a').attr("data-name", $(editor.getBody()).html());
                        galleryModified(1);
                      })
                    }
                    })
                }
                else{
                  editor.windowManager.alert("No image was selected")
                }
                var countSelected2 = $(".ui-selected").length;
                editor.windowManager.alert("Titles made editable: "+countSelected2);
              }
            },
            {
              tooltip:'Edit All Attributes',
              icon:'image',
              classes:'srcC',
              onclick:function(){
                imageMenu(editor)
              }
            }
          ]
        }).renderTo(document.getElementById("picSettings"));
        tinymce.ui.Factory.create({
          type: "menubutton",
          text: "Options ",
          classes: "options gallery",
          icon: "fullpage",
          tooltip: "Vital settings and tasks",
          autohide:true,
          menu:[
            {
              text: "Toggle Help",
              icon: "help",
              onclick: function() {
                toggleHelpInstructions();
              }
            },
            {
              text: "Toggle Raw JSON Code Area",
              icon: "code",
              onclick:function(){
                if($("#tinyJSONfield:hidden").length){
                  $("#tinyJSONfield, #galleryContextmenuNotice").css("display","block !important").fadeIn();
                }
                else{
                  $("#tinyJSONfield, #galleryContextmenuNotice").css("display","none !important").fadeOut();
                }
              }
            },
            {
              text: "Toggle Live Edit: JSON => GUI",
              icon: "cut",
              onclick: function() {
                toggleLiveEdit(editor);
              }
            },
            {
              text: "Select All (visible items)",
              icon: "table",
              onclick: function() {
                $(".ui-selected").removeClass('ui-selected');
                $("#list_to_filter li:visible").addClass('ui-selected');
              }
            },
            {
              text: "Reindex according to position",
              icon: "numlist",
              onclick: function() {
                editor.windowManager.confirm("Really? this will overwrite the initial index derived from your server",function(s){
                  if(s){
                    $("#list_to_filter li").each(function(){
                      $(this).find(".imageIndex").html($(this).index()+1);
                      $(this).find("a").attr("data-index",$(this).index()+1)
                      galleryModified(1);
                    })
                  }
                })
              }
            },
            {
              text: "Restore Gallery",
              icon: "undo",
              onclick: function() {
                editor.windowManager.confirm("You'll lose any changes, proceed?",function(s){
                  if(s){
                    $("#"+textareaForJSON).val(chunkValOriginal).change();
                    tinymce.get("tinyJSONfield").setContent(chunkValOriginal);
                    chunkTransformer(chunkValOriginal, textareaForJSON);
                    runFilter("data-desc");
                    galleryModified(0);
                  }
                })
              }
            },
            {
              text: "Paste Sample Code",
              icon: "paste",
              onclick:function(){
                pasteSampleCode(editor)
              }
            },
            {
              text:"Build/Visualize Gallery",
              icon:'code',
              menu:[
                {
                  text: "Rebuild Thumbs/JSON (from server)",
                  onclick:function(){
                    rebuildFromServer(editor)
                  }
                },
                {
                  text: "Rebuild from Current JSON",
                  onclick:function(){
                    rebuildFromCurrent(editor, textareaForJSON)
                  }
                },
                {
                  text: "Build other thumb sizes",
                  onclick:function(){
                    editor.windowManager.alert("Coming soon");
                  }
                }
              ]
            },
            {
              text: "File Browser",
              icon: "browse",
              onclick: function() {
                autoFileBrowser("")
              }
            },
            {
              text: "Duplicate this Gallery",
              icon: "copy",
              classes: "duplicateMODXresourceChunk",
              onclick: function() {
                editor.windowManager.confirm("Updated/Saved and ready to proceed?",function(s){
                  if(s){
                    $("#modx-abtn-duplicate").trigger('click');
                    }
                });
              },
              onPostRender:function(){
                if(notApplicableToAppToGal == 1){
                  $(".mce-duplicateMODXresourceChunk").remove();
                }
              }
            },
            {
              text: "Update & Save",
              icon: "save",
              menu:[
                // {
                //   text: "Beautify/Compress JSON",
                //   onclick: function() {
                //     if(beautifyJSON === 0){
                //       beautifyJSON = 1;
                //       editor.windowManager.alert("JSON will be beautified upon JSON update");
                //     }
                //     else{
                //       beautifyJSON = 0;
                //       editor.windowManager.alert("JSON will be compressed upon JSON update");
                //     }
                //   }
                // },
                {
                  text: "Update JSON With Gallery Changes",
                  onclick: function() {
                    editor.windowManager.confirm("Update current JSON with any changes?",function(s){
                      if(s){
                        loadingThrobber(1);
                        saveChunk('',textareaForJSON);
                      }
                    })
                  }
                },
                {
                  text: "Update JSON and Save to MODX",
                  classes: "updateSaveToMODX",
                  onclick: function() {
                    editor.windowManager.confirm("Save Gallery to MODX?",function(s){
                      if(s){
                        saveChunk("modx",textareaForJSON);
                        }
                    });
                    },
                  onPostRender:function(){
                    if(notApplicableToAppToGal == 1){
                      $(".mce-updateSaveToMODX").remove();
                    }
                  }
                }
              ]
            },
            {
              text: "Visualize/Transform All TVs & Chunks",
              icon: "charmap",
              classes: "quickUpdateCreate",
              onclick: function() {
                editor.windowManager.confirm("Saved current changes? Temporarily exiting ... ",function(s){
                  if(s){
                    exitedGalleryToUseElementTree = 1;
                    tradGal(1,textareaForJSON);
                    }
                });
                },
              onPostRender:function(){
                if(notApplicableToAppToGal == 1){
                  $(".mce-quickUpdateCreate").remove()
                }
              }
            }
          ],
          onPostRender: function() {
            if(typeof backendOrfrontendGallery !== "undefined"){
              new Ext.KeyMap(document.body, {
                key  : "s",
                ctrl : true,
                fn: function(keycode, e) {
                  e.stopEvent();
                  if(exitedGalleryToUseElementTree == 0){
                    saveChunk("modx",textareaForJSON);
                  }
                }
              });
            }
            $("#galButtons").hide();
            setTimeout(function(){
              $("#galButtons").css("opacity",1).hide().fadeIn();
            }, 500)
            tinymce.ui.Factory.create({
              type: "button",
              text: "Tags",
              icon: "anchor",
              tooltip:'Toggle/Refresh Tags',
              classes: "tagger gallery",
              onclick: function() {
                tagManager(editor);
              },
            }).renderTo(document.getElementById("galButtons"));
            tinymce.ui.Factory.create({
              type: "button",
              text: " Filter",
              icon: "searchreplace",
              classes: "fastFilter gallery",
              onPostRender: function() {
                $(".mce-fastFilter").addClass('extraFilth').removeAttr('id')
                $('.extraFilth').html("<span class='num_displayed' title='Images displayed'></span><span id='filter_reset'>X</span><input id='filter_input' placeholder='Live filter search' value=''> ");
                runFilter("data-tag");
                $('#filter_reset').on('click',function(){
                  $('#filter_input').val('').change();
                })
              },
            }).renderTo(document.getElementById("galButtons"));
            tinymce.ui.Factory.create({
              type: "splitbutton",
              text: false,
              classes: "gallery splitMe",
              onPostRender: function(){
                $(".mce-splitMe button:first-child").hide();
                $(".mce-alt").parent().addClass('splitMeparent');
              },
              menu:[
              {
                text:"Filter by Tag/Category",
                classes:"ftag",
                active:true,
                onclick:function(){
                  $('.mce-ftag').parent().children().removeClass('mce-active');
                  $('.mce-ftag').addClass('mce-active');
                  runFilter("data-tag");
                }
              },
              {
                text:"Filter by Extension",
                classes:"ext",
                onclick:function(){
                  $('.mce-ext').parent().children().removeClass('mce-active');
                  $('.mce-ext').addClass('mce-active');
                  runFilter("data-ext")
                }
              },
              {
                text:"Filter by Img Desc",
                classes:"desc",
                onclick:function(){
                  $('.mce-desc').parent().children().removeClass('mce-active');
                  $('.mce-desc').addClass('mce-active');
                  runFilter("data-desc");
                }
              },
              {
                text:"Filter by Img Index",
                classes:"index",
                onclick:function(){
                  $('.mce-index').parent().children().removeClass('mce-active');
                  $('.mce-index').addClass('mce-active');
                  runFilter("data-index");
                }
              },
              {
                text:"Filter by Img Name",
                classes:"name",
                onclick:function(){
                  $('.mce-name').parent().children().removeClass('mce-active');
                  $('.mce-name').addClass('mce-active');
                  runFilter("data-name");
                }
              },
              {
                text:"Filter by Hidden/Visible (1/0)",
                classes:"hidden",
                onclick:function(){
                  $('.mce-hidden').parent().children().removeClass('mce-active');
                  $('.mce-hidden').addClass('mce-active');
                  runFilter("data-hidden");
                  $('#filter_input').val(1).change();
                }
              },
              {
                text:"Filter by Missing Thumb (1/0)",
                classes:"terror",
                onclick:function(){
                  $('.mce-terror').parent().children().removeClass('mce-active');
                  $('.mce-terror').addClass('mce-active');
                  runFilter("data-terror");
                  $('#filter_input').val(1).change();
                }
              },
              {
                text:"Filter by Missing Image (1/0)",
                classes:"lerror",
                onclick:function(){
                  $('.mce-lerror').parent().children().removeClass('mce-active');
                  $('.mce-lerror').addClass('mce-active');
                  runFilter("data-lerror");
                  $('#filter_input').val(1).change();
                }
              }
              ]
            }).renderTo(document.getElementById("galButtons"));
            tinymce.ui.Factory.create({
              type: "menubutton",
              text: "Sort ",
              icon: "pagebreak",
              classes: "sort gallery",
              menu:[
              {
                text:"Sort Order",
                classes:"sdir",
                menu:[
                {
                  text:"Ascend",
                  active:true,
                  classes:"sasc",
                  onclick:function(){
                    $('.mce-sasc').parent().children().removeClass('mce-active');
                    $('.mce-sasc').addClass('mce-active');
                    sortDir = "asc";
                  }
                },
                {
                  text:"Descend",
                  classes:"sdesc",
                  onclick:function(){
                    $('.mce-sdesc').parent().children().removeClass('mce-active');
                    $('.mce-sdesc').addClass('mce-active');
                    sortDir = "desc";
                  }
                },
                {
                  text:"Random",
                  classes:"srand",
                  onclick:function(){
                    $('.mce-srand').parent().children().removeClass('mce-active');
                    $('.mce-srand').addClass('mce-active');
                    sortDir = "rand";
                  }
                },

                ]
              },
              {
                text:"Sort by Img Descr",
                classes:"sdesc",
                onclick:function(){
                  $('.mce-sdescr').parent().children().removeClass('mce-active');
                  $('.mce-sdescr').addClass('mce-active');
                  tinysort('#list_to_filter>li',{selector:'a:not([class=fHidden])',attr:'data-desc',order:sortDir});
                  galleryModified(1);
                }
              },
              {
                text:"Sort by Img Name",
                classes:"sname",
                onclick:function(){
                  $('.mce-sname').parent().children().removeClass('mce-active');
                  $('.mce-sname').addClass('mce-active');
                  tinysort('#list_to_filter>li',{selector:'a:not([class=fHidden])',attr:'data-name',order:sortDir});
                  galleryModified(1);
                }
              },
              {
                text:"Sort by Index #",
                classes:"sindex",
                active:true,
                onclick:function(){
                  $('.mce-sindex').parent().children().removeClass('mce-active');
                  $('.mce-sindex').addClass('mce-active');
                  tinysort('#list_to_filter>li',{selector:'a:not([class=fHidden])',attr:'data-index',order:sortDir});
                  galleryModified(1);
                }
              }
              ]
            }).renderTo(document.getElementById("galButtons"));
            scriptLoader.loadQueue(function(){
             chunkTransformer(chunkValOriginal, textareaForJSON, 1);
             })
          }
        }).renderTo(document.getElementById("galButtons"));
        $(".mce-gallery").hide().delay(1400).fadeIn(300);
      })//end of tinymce editor on init
    }//end of tiny setup
  }) // end of tinymce.init
}

function tinyGalleryInit(textareaForJSON){
  // textareaForJSON = textareaForJSON;
  if($("#"+textareaForJSON).length){
    var chunkValOriginal = $("#"+textareaForJSON).val();
    var tvChunkGalleryVal = $("#"+textareaForJSON).val();
    sortDir = "asc";
    beautifyJSON = 0;
    tinymce.init({
      name: "gallery",
      selector: "#tinyJSONfield",
      skin_url: galleryBackUpRTEskin,
      toolbar: false,
      menubar:false,
      hidden_input:false,
      entity_encoding: "raw",
      apply_source_formatting : false,
      cleanup : false,
      inline:true,
      plugins:"paste, contextmenu, code, save, searchreplace",
      contextmenu: "buildFromServer buildFromTextarea toggleHelp pasteSample toggleLive updateChunkOnly undo redo searchreplace",
      forced_root_block : "",
      force_br_newlines : false,
      force_p_newlines : false,
      valid_elements:"grt",
      body_id:"mce-tinyJSONGallery",
      paste_as_text: true,
      save_enablewhendirty: true,
      setup:function(editor){
        editor.addMenuItem('buildFromServer', {
          text: 'Build JSON/Thumbnails From Server',
          icon: "fullpage",
          onclick: function() {
            rebuildFromServer(editor);
          }
        });
        editor.addMenuItem('buildFromTextarea', {
          text: 'Build Gallery From JSON',
          icon: "fullpage",
          onclick: function() {
            rebuildFromCurrent(editor, textareaForJSON);
          }
        });
        editor.addMenuItem('toggleHelp', {
          text: 'Toggle Help and Brief Instructions',
          icon: "fullpage",
          onclick: function() {
            toggleHelpInstructions();
          }
        });
        editor.addMenuItem('pasteSample', {
          text: 'Paste Sample JSON Code',
          icon: "fullpage",
          onclick: function() {
            pasteSampleCode(editor);
          }
        });
        editor.addMenuItem('toggleLive', {
          text: 'Toggle Live Edit: JSON => GUI',
          icon: "fullpage",
          onclick: function() {
            toggleLiveEdit(editor);
          }
        });
        editor.addMenuItem('updateChunkOnly', {
          text: 'Update JSON with any GUI Changes',
          icon: "fullpage",
          onclick: function() {
            editor.windowManager.confirm("Update current JSON with any changes?",function(s){
              if(s){
                loadingThrobber(1);
                saveChunk('',textareaForJSON);
              }
            })
          }
        });
        editor.on("init",function(){
          galleryLiveEdit = 0;
          editor.setContent(tvChunkGalleryVal);
        })
        // editor.on("keydown", function(evt) { //add backend frontend logic - no need
        //   if (evt.keyCode == 83 && evt.ctrlKey && !evt.shiftKey && !evt.altKey && !evt.metaKey) {
        //     if(typeof backendOrfrontendGallery !== "undefined"){
        //       new Ext.KeyMap(document.body, {
        //         key  : "s",
        //         ctrl : true,
        //         fn: function(keycode, e) {
        //           e.stopEvent();
        //           if(exitedGalleryToUseElementTree == 0){
        //             saveChunk("modx",textareaForJSON);
        //           }
        //         }
        //       });
        //     }
        //   }
        // })
        editor.on("change",function(){
          // editor.save();
          $("#"+textareaForJSON).val(editor.getContent());
          galleryModified(1);
          if(galleryLiveEdit == 1){
            chunkTransformer(editor.getContent(), textareaForJSON);
          }
        })
        editor.on("blur",function(){
          if(galleryLiveEdit == 1){
            chunkTransformer(editor.getContent(), textareaForJSON);
          }
        })
      }
    })
  }
  else{
    setTimeout(function(){
      tinymce.get("tmpTempEditor").windowManager.alert("Textarea with id: "+textareaForJSON+" does not exist");
    },200)
  }
  // $("#"+textareaForJSON+"-tr, .CodeMIrror").hide();
  $("#"+textareaForJSON).attr({"placeholder":"Enter valid JSON"});
  loadingThrobber(1);
  tinyLord(chunkValOriginal, textareaForJSON);
}
exitedGalleryToUseElementTree = 0;
tinyJSONgallHelp = "<div id=tinyJSONLocationSettings></div><h3>Gallery Options</h3><ol><li>Options-&gt;<strong>Toggle Raw JSON Code Area</strong>, paste all valid code there, and <strong>Rebuild from Current JSON</strong> or <strong>from server</strong></li><li>Please Explore the rest of the options.</li></ol><h3>Getting started (prepare the code)</h3><ol><li>JSON first line is the location/settings:<br>[{'Location': 'assets/images/&amp;autoCreateThumb=1&amp;justJSON=1&amp;options=w=178,h=117,zc=t'}]</li><li>Complete the JSON yourself, manually or</li><li>Generate it <strong>Options</strong>-&gt; Build/Visualize Gallery-&gt; Rebuild Thumbs/JSON (from Server)&nbsp;</li></ol><h3>JSON</h3><ol><li><strong>Location:<br></strong>the url from root to image folder + trailing slash&nbsp;...site.com/assets/images/ becomes <strong>assets/images/</strong><br>Use&nbsp;assets/images/ with&nbsp;<strong>autoCreateThumb=1</strong> (a folder named 'thumb' with thumbnails will be created for you )<br>Use&nbsp;assets/images/thumb/ with&nbsp;<strong><strong>autoCreateThumb=0</strong></strong> (i.e. if you are supplying your own thumbnails - use any name for the thumbs folder)</li><li><strong>&amp;autoCreateThumb: <br></strong><strong>1(yes)</strong> will create thumb folder and thumbs within the large images' folder (install <a href=https://modx.com/extras/package/resizer>MODX Resizer</a>)<br><strong>0(no)</strong> will assume you <strong>included</strong> a 'thumb' folder name in your <strong>location</strong>(<em>assets/images/thumb/</em> and that the folder is populated with your own thumbnails); it will work backwards to parent folder.</li><li><strong>&amp;justJSON:<br></strong><em>(works with&nbsp;autoCreateThumb=1)</em><strong><br>1(yes)&nbsp;</strong>use this to build/rebuild your gallery, this will not rebuild your thumbs, save your server resources!<br><strong>0(no)</strong> this will rebuild everything including thumbs (slower! best to do this once)</li><li><strong>&amp;options:<br></strong>Comma-separated list of what phpThumbs takes, courtesy of <a href=https://github.com/rthrash/Resizer target=_blank>MODX Resizer<br></a>Best to keep the dimensions 178x117 - or use CSS to fix Gallery ordered list.</li></ol><h3>CUSTOMIZATION (TinymceWrapper Plugin)</h3><ol><li><strong>enableImageGallery</strong>: switch on/off this Gallery module in MODX</li><li><strong>tinyJSONGalleryTABtitle</strong>: change the text of the tab that appears next to Resource or Chunk tab</li><li><strong>tinyJSONGalleryTABposition</strong>: change position of this Gallery tab (# < 1 = first)</li><li><strong>galleryJSfile</strong>: backup your TinyJSONGallery.js file</li><li><strong>galleryChunkNameKey</strong>: specify what suffix a Chunk name is to have in order to transform said Chunk</li><li><strong>imageGalleryIDs</strong>: or... specify which Chunks will be Galleries by Chunk ids</li><li><strong>TinyJSONGalleryTV</strong>: Specify which TV is to be used to transform a Resource in to a Gallery</li></ol><h3>FRONTEND GALLERY MANAGER (using e.g, TinyMagicPublisher)</h3><ol><li><strong>&modxGalleryAssetsUrl =</strong>  `[[++assets_url]]`</li><li><strong>&TinyJSONGalleryJS =</strong> `[[++assets_url]]components/tinymcewrapper/gallery/js/TinyJSONGallery.js`</li><li><strong>&galleryBackUpRTEskin =</strong> `[[++assets_url]]/components/tinymcewrapper/tinymceskins/modxPericles`</li><li>Once ready, you can programmatically initiate a Gallery with one line of code: <b>popGal(textareaForJSON, title, width, height, id)</b><br>All that this module needs is a textarea with JSON code in it</li></ol><h3>FRONTEND OUTPUT (Chunk or Resource TV)</h3><i>Note: the first item of the JSON is the location and settings (not a valid image item), use <b>offset</b> or whatever settings available to skip it - or just use &where to filter nicely</i><ol><li><strong>TinyJSONGalleryOutput</strong>:<br>[[!TinyJSONGalleryOutput?<br> &galleryChunkOrJson=`[[$NatureAlbum_myGallery]]` <b>OR ...(use a snippet to grap TV content of resource)</b><br>&tpl=`NatureAlbum_rowTpl` <br>&imgCls=`pic` <br>&rowCls=`magic` <br>&linkCls=`linked`]]</li><li><strong>MIGX getImageList</strong>:<br>[[!getImageList? <br>&offset=`1`<br>&where =`{\"hidden:=\":\"0\"}`<br>&sort=`[{\"sortby\":\"index\",\"sortdir\":\"DESC\",\"sortmode\":\"numeric\"},{\"sortby\":\"name\",\"sortdir\":\"ASC\"}]`<br>&value=`[[$NatureAlbum_myGallery]]` <b>OR ...(&tvname=`TinyJSONGalleryTV`)</b><br>&tpl=`NatureAlbum_rowTpl`<br>&imgCls=`pic` &rowCls=`magic`<br>&linkCls=`linked`]]</li></ol><h3><strong>ENJOY</strong></h3>";
if(typeof extjsPanelTabs !== "undefined" ){
  if(extjsPanelTabs == "modx-chunk-tabs"){
    tvChunkGalleriesNotice = "Main Gallery has safely and temporarily exited.<br><br>Visible Textareas of Chunks in the Elements Tree<br> can now be transformed into Visual Galleries.<br><br>Just double-click on each!";
  }
  else{
    tvChunkGalleriesNotice = "Main Gallery has safely and temporarily exited.<br><br>Visible Textareas of TVs on this page and Chunks in the Elements Tree<br> can now be transformed into Visual Galleries.<br><br>Just double-click on each!";
  }
}
function tradGal(exit, textareaForJSON) {
  notApplicableToAppToGal = 0;
  textareaForJSON = textareaForJSON;
  $("#tinyJSONGalleryWrapper, #galButtons, #galButtonsTemp, #tinyTemp, #tvChunkGalleries-notice").remove();
  $(".tvChunkGalleries-parent").removeClass("tvChunkGalleries-parent");
  if(exit == 1){
    $("#tinyJSONGalleryWrapperEXtJS").append("<div id=tvChunkGalleries-notice>"+tvChunkGalleriesNotice+"</div>");
    tinymce.EditorManager.execCommand('mceRemoveEditor',true, "tinyFileImageGallery");
    tinymce.EditorManager.execCommand('mceRemoveEditor',true, "tinyJSONfield");
    $('<div id="tinyTemp" style="display:none!important;border:0!important;outline:0!important;width:0;height:0;"></div><div id="galButtonsTemp" class="galButtons" style="opacity:1!important"></div>').prependTo(tinyJSONGalleryGalButtons);
    tinymce.init({
      selector: "#tinyTemp",
      inline: true,
      toolbar:false,
      menubar: false,
      skin_url: galleryBackUpRTEskin
    });
    tinymce.ui.Factory.create({
      type: "button",
      text: "Restore Main Gallery",
      classes: "options gallery",
      icon: "fullpage",
      tooltip: "Restore Gallery to this page, and turn off double-click effect",
      onclick: function(){
        exitedGalleryToUseElementTree = 0;
        tradGal(0, textareaForJSON);
      }
    }).renderTo(document.getElementById("galButtonsTemp"));
    $("#modx-tv-tabs textarea").addClass("tvJSONGalleries");
    $(document).on("mouseenter", ".modx-window, .tvJSONGalleries", function () {
      if($(this).hasClass("tvJSONGalleries")){
        if(exitedGalleryToUseElementTree == 1){
          $(".tvJSONGalleries").parent().addClass("tvChunkGalleries-parent");
        }
        var extraTitleadd = " TV: "+$(this).parents(".modx-tv").find(".modx-tv-caption").text();
        var chunkContentId = $(this).attr("id");
        $(this).on("dblclick",function(){
          if(chunkContentId && exitedGalleryToUseElementTree == 1 && !$("#tinyJSONGalleryWrapper").length){
            popGal(chunkContentId, tinyJSONGalleryTABtitle+extraTitleadd);
          }
        })
      }
      else{
        if(exitedGalleryToUseElementTree == 1){
          $(this).find("textarea[name=snippet]").parents(".modx-window").addClass("tvChunkGalleries-parent");
        }
        $(this).find("textarea[name=snippet]").addClass("chunkJSONGalleries");
        var chunkContentId = $(this).find("textarea[name=snippet]").attr("id");
        var extraTitleadd = " Chunk: "+$(this).find(".x-window-header-text > span").text();
        $(this).find(".chunkJSONGalleries").on("dblclick",function(){
          if(chunkContentId && exitedGalleryToUseElementTree == 1 && !$("#tinyJSONGalleryWrapper").length){
            popGal(chunkContentId, tinyJSONGalleryTABtitle+extraTitleadd);
          }
        })
      }
    })
  }
  else{
    $('<div id="tinyJSONGalleryWrapper"><span id="galleryContextmenuNotice"></span><div id="tinyJSONfield" title="Access  quick options via Context Menu"></div><div id="tinyJSONGalleryStation"><div id="gallHelp">'+tinyJSONgallHelp+'</div><div id=tinyFileImageGallery style=display:none;height:0;width:0;opacity:0;visibility:hidden></div><ol id="list_to_filter" class="grid"></ol><div id="picSettings"></div></div></div>').appendTo("#tinyJSONGalleryWrapperEXtJS");
    $('<div id="galButtons" class="galButtons"></div>').prependTo(tinyJSONGalleryGalButtons);
    tinyGalleryInit(textareaForJSONbk); //attack later
  }
}

function popGal(textareaForJSON, title, width, height, id) {
  var extraTitle = "";
  if(id){
    var extraTitle = " (" + textareaForJSON + ")";
  }
  notApplicableToAppToGal = 1;
  textareaForJSON = textareaForJSON;
  if(!$("#list_to_filter").length && $("#"+textareaForJSON).length){
    tinymce.get("tmpTempEditor").windowManager.open({
      title: title ? title + extraTitle : "JSON Image Gallery"+extraTitle,
      width: width ? width : 885,
      height: height ? height : 500,
      classes: "popGal",
      autoScroll: true,
      items: [{
        classes: "popGallery",
        type: 'container',
      }],
      onClose:function(){
        tinymce.EditorManager.execCommand('mceRemoveEditor',true, "tinyFileImageGallery");
        tinymce.EditorManager.execCommand('mceRemoveEditor',true, "tinyJSONfield");
        // tinymce.EditorManager.execCommand('mceRemoveEditor',true, "tinyTemp");
      },
      buttons: [
        {
          text: "Hidden Toolbar Wrapper",
          classes: "closeGallery",
          style: "visibility:hidden;",
          onPostRender: function() {
            $('<div id="tinyJSONGalleryWrapper"><span id="galleryContextmenuNotice"></span><div id="tinyJSONfield" title="Access  quick options via Context Menu"></div><div id="tinyJSONGalleryStation"><div id="gallHelp">'+tinyJSONgallHelp+'</div><input id="tinyFileImageGallery" type="hidden" value=""><ol id="list_to_filter" class="grid"></ol><div id="picSettings"></div></div></div>').prependTo(".mce-popGallery > .mce-container-body");
            $('<div id="tinyJSONGalleryBAR"><div id="galButtons" class="galButtons"></div></div>').insertBefore(".mce-closeGallery");
            tinyGalleryInit(textareaForJSON);
          }
        }
      ]
    });
  }
  else{
    tinymce.get("tmpTempEditor").windowManager.alert("Invalid operation");
  }
}
function createTempEditorManager(){
  if(!$("#tmpTempEditor").length){
    $("body").append("<div id=tmpTempEditor style=display:none;height:0;width:0;opacity:0;visibility:hidden></div>");
    tinymce.init({
      selector: "#tmpTempEditor",
      skin_url: galleryBackUpRTEskin,
      inline:true,
      forced_root_block : "",
      force_br_newlines : false,
      force_p_newlines : false
    })
  }
}
if(typeof backendOrfrontendGallery !== "undefined"){
  Ext.onReady(function() {
    createTempEditorManager();
    var newPanel = new MODx.Panel({
        title: tinyJSONGalleryTABtitle,
        id: "tinyJSONGallery",
        width: "100%",
        items: [
          {
            html: "<div id=tinyJSONGalleryWrapperEXtJS></div>",
          }
        ]
    });
    var tabs = Ext.getCmp(extjsPanelTabs);
    tabs.insert(tinyJSONGalleryTABposition,newPanel);
    tabs.setActiveTab(newPanel);
    // document.getElementById(textareaForJSON).removeAttribute("class");
    // tabs.hideTabStripItem(1);
    tradGal(0,textareaForJSON);
  })
}
else{
  createTempEditorManager();
}