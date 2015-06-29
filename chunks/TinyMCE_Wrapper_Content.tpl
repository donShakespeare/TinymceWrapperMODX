tinymce.init({
selector : "#ta",
skin_url:"[[++assets_url]]components/tinymce_wrapper/modxSkins/fairOphelia",
//skin: "fairOphelia",
//statusbar : false,
plugins:"preview,paste,contextmenu,image,wordcount,fullscreen,code,link",
link_list:[
[[$TinyMCE_Wrapper_Link_List?]]
],
browser_spellcheck: true,
gecko_spellcheck: true,
paste_data_images: false,
paste_word_valid_elements: "a,div,b,strong,i,em,h1,h2,h3,p,blockquote,ol,ul,pre",
valid_elements: "iframe[*],object[*],audio[*],-span[!title|!class<test test2],a[href|target|class|rel|title|data-ajax|data-iframe],strong,b,-p[class<text-align-left?text-align-center?text-align-right],br,-h1[class|data-ajax|data-iframe],-h2[class|data-ajax|data-iframe],-h3[class|data-ajax|data-iframe],-img[!src|!alt|!class=round_img|data-ajax|data-iframe],em,-blockquote,pre[class],-ol,-ul,-li,-code[class]",
valid_children: "-li[ul],-li[ol],-li[div],-strong[*],-em[*],-h1[*],-h2[*],-h3[*],-a[strong|em|h1|h2|h3|p|div],blockquote[p|ol|ul],pre[code],div[pre]",
menubar:false,
//relative_urls:true,
relative_urls: false, //-works with CDN
toolbar: "newdocument | preview | undo redo | blockquote | bold | italic | aligncenter | bullist numlist | link unlink | image responsivefilemanager | styleselect | charmap",
external_filemanager_path: "[[++assets_url]]components/tinymce_wrapper/responsivefilemanager/filemanager/",
filemanager_title: "Responsive Filemanager 9.9.3 For MODx Revo 2.3+",
external_plugins: {
      filemanager: "[[++assets_url]]components/tinymce_wrapper/responsivefilemanager/filemanager/plugin.min.js"
    },
 contextmenu: "removeformat | link | image responsivefilemanager | code"
});
