tinymce.init({
selector : "#"+this.id,  //please leave this line alone
skin_url:"/assets/tinymce_wrapper/modxSkins/fairOphelia/",
skin : "fairOphelia",
plugins:"contextmenu,spellchecker,image,fullscreen,code,link",
external_filemanager_path: "/assets/tinymce_wrapper/responsivefilemanager/filemanager/",
filemanager_title: "Responsive Filemanager 9.9.3 For MODx Revo 2.2.4",
external_plugins: {
      filemanager: "/assets/tinymce_wrapper/responsivefilemanager/filemanager/plugin.min.js"
    },
 contextmenu: "removeformat | link | image responsivefilemanager | code",
link_list: [
[[$TinyMCE_Wrapper_Link_List]]
],
relative_urls:true,
statusbar : false,
menubar:false
});
