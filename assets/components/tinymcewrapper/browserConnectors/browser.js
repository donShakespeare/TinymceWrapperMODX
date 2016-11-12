function twBrowserCallback(data) {
  parent.tinymce.activeEditor.windowManager.getParams().oninsert(data.fullRelativeUrl);
  parent.tinymce.activeEditor.windowManager.close();
};