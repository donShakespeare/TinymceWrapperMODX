//tinymce_wrapper plugin scriptproperties... just "Import Properties" if you ever need this
[
  {
    "name": "activateTinyMCE",
    "desc": "To work, this has to be set to Yes; this plugin will then disable whatever RTE you might have used before now.",
    "xtype": "combo-boolean",
    "options": [],
    "value": true,
    "lexicon": "",
    "overridden": false,
    "desc_trans": "To work, this has to be set to Yes; this plugin will then disable whatever RTE you might have used before now.",
    "area": "Editor Settings",
    "area_trans": "Editor Settings",
    "menu": null
  },
  {
    "name": "chunk_Suffix",
    "desc": "This plugin will create four chunks for you; it will not override them once created, but you were better off duplicating them.\nPLEASE simply add a suffix (_test or -su) to your new name.\nTinyMCE_Wrapper_Introtext becomes TinyMCE_Wrapper_Introtext_test or TinyMCE_Wrapper_Introtext-su",
    "xtype": "textfield",
    "options": [],
    "value": "",
    "lexicon": "",
    "overridden": false,
    "desc_trans": "This plugin will create four chunks for you; it will not override them once created, but you were better off duplicating them.\nPLEASE simply add a suffix (_test or -su) to your new name.\nTinyMCE_Wrapper_Introtext becomes TinyMCE_Wrapper_Introtext_test or TinyMCE_Wrapper_Introtext-su",
    "area": "Editor Settings",
    "area_trans": "Editor Settings",
    "menu": null
  },
  {
    "name": "disableEnable",
    "desc": "Do you want a checkbox to appear before every TinyMCE textarea, to quickly disable/enable a particular TinyMCE?\nNOTE: Any changes you make while TinyMCE is disabled will be reverted upon saving, UNLESS you re-enable TinyMCE after the change is made, before saving.",
    "xtype": "combo-boolean",
    "options": [],
    "value": false,
    "lexicon": "",
    "overridden": false,
    "desc_trans": "Do you want a checkbox to appear before every TinyMCE textarea, to quickly disable/enable a particular TinyMCE?\nNOTE: Any changes you make while TinyMCE is disabled will be reverted upon saving, UNLESS you re-enable TinyMCE after the change is made, before saving.",
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
    "name": "tinySrc",
    "desc": "You may use either TinyMCE's CDN or TinyMCE located on your own folder\n//tinymce.cachefly.net/4.2/tinymce.min.js\n(other CDN versions 4, 4.0, 4.1, 4.2)\n                      OR\n[[++assets_url]]yourTinymce/js/tinymce/tinymce.min.js",
    "xtype": "textfield",
    "options": [],
    "value": "//tinymce.cachefly.net/4.2/tinymce.min.js",
    "lexicon": "",
    "overridden": false,
    "desc_trans": "You may use either TinyMCE's CDN or TinyMCE located on your own folder\n//tinymce.cachefly.net/4.2/tinymce.min.js\n(other CDN versions 4, 4.0, 4.1, 4.2)\n                      OR\n[[++assets_url]]yourTinymce/js/tinymce/tinymce.min.js",
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
  }
]
