[
  {
    "name": "activateTinyMCE",
    "desc": "To work, this has to be set to Yes; this plugin will then disable whatever RTE you might have used before now.If set to false, with tvSuperAddict you can use Responsive FileManager for your File/Image TVs, and also use TinyMCE(CDN) for RichTextareaTVs",
    "xtype": "combo-boolean",
    "options": [],
    "value": true,
    "lexicon": "",
    "overridden": false,
    "desc_trans": "To work, this has to be set to Yes; this plugin will then disable whatever RTE you might have used before now.If set to false, with tvSuperAddict you can use Responsive FileManager for your File/Image TVs, and also use TinyMCE(CDN) for RichTextareaTVs",
    "area": "Editor Settings",
    "area_trans": "Editor Settings",
    "menu": null
  },
  {
    "name": "chunkSuffix",
    "desc": "This plugin will create four chunks for you; it will not override them once created, but you were better off duplicating them.\nPLEASE simply add a suffix (_test or -su) to your new name.\nTinymceWrapperIntrotext becomes TinymceWrapperIntrotext-test or TinymceWrapperIntrotext-suffix",
    "xtype": "textfield",
    "options": [],
    "value": "",
    "lexicon": "",
    "overridden": false,
    "desc_trans": "This plugin will create four chunks for you; it will not override them once created, but you were better off duplicating them.\nPLEASE simply add a suffix (_test or -su) to your new name.\nTinymceWrapperIntrotext becomes TinymceWrapperIntrotext-test or TinymceWrapperIntrotext-suffix",
    "area": "Editor Settings",
    "area_trans": "Editor Settings",
    "menu": null
  },
  {
    "name": "disableEnableCheckbox",
    "desc": "Do you want a checkbox to appear before every TinyMCE textarea, to quickly disable/enable a particular TinyMCE?\nNOTE: Any changes you make while TinyMCE is disabled will not be saved, UNLESS you re-enable TinyMCE after the change is made, before saving.",
    "xtype": "combo-boolean",
    "options": [],
    "value": true,
    "lexicon": "",
    "overridden": false,
    "desc_trans": "Do you want a checkbox to appear before every TinyMCE textarea, to quickly disable/enable a particular TinyMCE?\nNOTE: Any changes you make while TinyMCE is disabled will not be saved, UNLESS you re-enable TinyMCE after the change is made, before saving.",
    "area": "Editor Settings",
    "area_trans": "Editor Settings",
    "menu": null
  },
  {
    "name": "jQuery",
    "desc": "This plugin requires jQuery in the order that it is loaded",
    "xtype": "textfield",
    "options": [],
    "value": "https://code.jquery.com/jquery-2.1.3.min.js",
    "lexicon": "",
    "overridden": false,
    "desc_trans": "This plugin requires jQuery in the order that it is loaded",
    "area": "Editor Settings",
    "area_trans": "Editor Settings",
    "menu": null
  },
  {
    "name": "responsiveFileManagerPath",
    "desc": "This allows you to use your very own installation of RFM. Just enter the correct absolute path up to RFM's root folder; the 1st folder that is unzipped\n/assets/responsivefilemanager/\n   OR  \n\"+MODx.config.assets_url+\"responsivefilemanager/\n\n+trailing dash",
    "xtype": "textfield",
    "options": [],
    "value": "\"+MODx.config.assets_url+\"components/tinymcewrapper/responsivefilemanager/",
    "lexicon": "",
    "overridden": false,
    "desc_trans": "This allows you to use your very own installation of RFM. Just enter the correct absolute path up to RFM's root folder; the 1st folder that is unzipped\n/assets/responsivefilemanager/\n   OR  \n\"+MODx.config.assets_url+\"responsivefilemanager/\n\n+trailing dash",
    "area": "Editor Settings",
    "area_trans": "Editor Settings",
    "menu": null
  },
  {
    "name": "tinySrc",
    "desc": "You may use either TinyMCE\"s CDN or TinyMCE located on your own folder\n//tinymce.cachefly.net/4.2/tinymce.min.js\n(other CDN versions 4, 4.0, 4.1, 4.2)\n                      OR\n[[++assets_url]]yourTinymce/js/tinymce/tinymce.min.js",
    "xtype": "textfield",
    "options": [],
    "value": "//tinymce.cachefly.net/4.2/tinymce.min.js",
    "lexicon": "",
    "overridden": false,
    "desc_trans": "You may use either TinyMCE\"s CDN or TinyMCE located on your own folder\n//tinymce.cachefly.net/4.2/tinymce.min.js\n(other CDN versions 4, 4.0, 4.1, 4.2)\n                      OR\n[[++assets_url]]yourTinymce/js/tinymce/tinymce.min.js",
    "area": "Editor Settings",
    "area_trans": "Editor Settings",
    "menu": null
  },
  {
    "name": "tvAddict",
    "desc": "Do you want your TVs (Rich/File/Image) to be modjacked by this plugin even if you have RTE disabled for the particular resource? This will work even in the Articles Extra (hopefully!)",
    "xtype": "combo-boolean",
    "options": [],
    "value": true,
    "lexicon": "",
    "overridden": false,
    "desc_trans": "Do you want your TVs (Rich/File/Image) to be modjacked by this plugin even if you have RTE disabled for the particular resource? This will work even in the Articles Extra (hopefully!)",
    "area": "Editor Settings",
    "area_trans": "Editor Settings",
    "menu": null
  },
  {
    "name": "tvSuperAddict",
    "desc": "Even though you have another RTE in use (that is, you have set activateTinyMCE to false), you can still use Responsive FileManager for your File/Image TVs, and also use TinyMCE(CDN) for RichTextareaTVs",
    "xtype": "combo-boolean",
    "options": [],
    "value": true,
    "lexicon": "",
    "overridden": false,
    "desc_trans": "Even though you have another RTE in use (that is, you have set activateTinyMCE to false), you can still use Responsive FileManager for your File/Image TVs, and also use TinyMCE(CDN) for RichTextareaTVs",
    "area": "Editor Settings",
    "area_trans": "Editor Settings",
    "menu": null
  },
  {
    "name": "Content",
    "desc": "Transform Reource Content textarea?",
    "xtype": "combo-boolean",
    "options": [
      {
        "text": "Yes",
        "value": "Yes",
        "name": "Yes"
      },
      {
        "text": "No",
        "value": "No",
        "name": "No"
      }
    ],
    "value": true,
    "lexicon": "",
    "overridden": false,
    "desc_trans": "Transform Reource Content textarea?",
    "area": "Textareas to transform",
    "area_trans": "Textareas to transform",
    "menu": null
  },
  {
    "name": "Description",
    "desc": "Transform Description textarea?",
    "xtype": "combo-boolean",
    "options": [
      {
        "text": "Yes",
        "value": "Yes",
        "name": "Yes"
      },
      {
        "text": "No",
        "value": "No",
        "name": "No"
      }
    ],
    "value": true,
    "lexicon": "",
    "overridden": false,
    "desc_trans": "Transform Description textarea?",
    "area": "Textareas to transform",
    "area_trans": "Textareas to transform",
    "menu": null
  },
  {
    "name": "Introtext",
    "desc": "Transform Introtext textarea?",
    "xtype": "combo-boolean",
    "options": [
      {
        "text": "Yes",
        "value": "Yes",
        "name": "Yes"
      },
      {
        "text": "No",
        "value": "No",
        "name": "No"
      }
    ],
    "value": true,
    "lexicon": "",
    "overridden": false,
    "desc_trans": "Transform Introtext textarea?",
    "area": "Textareas to transform",
    "area_trans": "Textareas to transform",
    "menu": null
  },
  {
    "name": "TVs",
    "desc": "Transform Rich TVs textarea?",
    "xtype": "combo-boolean",
    "options": [],
    "value": true,
    "lexicon": "",
    "overridden": false,
    "desc_trans": "Transform Rich TVs textarea?",
    "area": "Textareas to transform",
    "area_trans": "Textareas to transform",
    "menu": null
  },
  {
    "name": "fileImageTVs",
    "desc": "You will be able to use Responsive Filemanager to input data in your Fie and Image TVs, hurray! The native method will still be there; at least now you have awesome choices",
    "xtype": "combo-boolean",
    "options": [],
    "value": true,
    "lexicon": "",
    "overridden": false,
    "desc_trans": "You will be able to use Responsive Filemanager to input data in your Fie and Image TVs, hurray! The native method will still be there; at least now you have awesome choices",
    "area": "Textareas to transform",
    "area_trans": "Textareas to transform",
    "menu": null
  }
]