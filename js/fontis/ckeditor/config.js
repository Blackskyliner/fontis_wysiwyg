/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
  // %REMOVE_START%
  // The configuration options below are needed when running CKEditor from source files.
  config.plugins = 'dialogui,dialog,a11yhelp,about,basicstyles,bidi,blockquote,button,toolbar,notification,clipboard,panelbutton,panel,floatpanel,colorbutton,colordialog,menu,contextmenu,copyformatting,dialogadvtab,div,elementspath,enterkey,entities,popup,filebrowser,find,fakeobjects,flash,floatingspace,listblock,richcombo,font,format,forms,horizontalrule,htmlwriter,iframe,image,imageuploader,indent,indentblock,indentlist,justify,menubutton,language,link,list,liststyle,magicline,maximize,newpage,pagebreak,pastefromword,pastetext,preview,print,removeformat,resize,save,scayt,selectall,showblocks,showborders,smiley,sourcearea,specialchar,stylescombo,tab,table,tabletools,templates,undo,wsc,wysiwygarea';
  config.skin = 'minimalist';
  // %REMOVE_END%

  // Define changes to default configuration here. For example:
  // config.language = 'fr';
  // config.uiColor = '#AADC6E';
  config.extraPlugins = 'imageuploader';

  // Don't encode properties, otherwise magento codes may get invalid
  config.entities = false;

  // Don't filter our content, we only use this inside our adminhtml so this should be safe
  config.allowedContent = true;
};
