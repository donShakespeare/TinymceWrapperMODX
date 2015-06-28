tinymce.init({
selector : "#ta",
skin_url:"/assets/tinymce_wrapper/modxSkins/fairOphelia/",
//skin: "fairOphelia",
//statusbar : false,
plugins:"contextmenu,spellchecker,image,wordcount,fullscreen,code,link",
link_list: [
[[$TinyMCE_Wrapper_Link_List]]
],
menubar:false,
//relative_urls:true,
relative_urls: false, //-works with CDN
toolbar: "fullscreen code saveAs | newdocument | link | preview | undo redo | blockquote | bold | italic | aligncenter | | image responsivefilemanager",
external_filemanager_path: "/assets/tinymce_wrapper/responsivefilemanager/filemanager/",
filemanager_title: "Responsive Filemanager 9.9.3 For MODx Revo 2.2.4",
external_plugins: {
      filemanager: "/assets/tinymce_wrapper/responsivefilemanager/filemanager/plugin.min.js"
    },
 contextmenu: "removeformat | link | image responsivefilemanager | code"
});
