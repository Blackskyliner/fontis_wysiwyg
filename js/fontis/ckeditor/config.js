/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
  config.extraPlugins = 'imageuploader';

  // Add Magento codes to protected codes.
  config.protectedSource.push(/\{\{[\s\S]*?\}\}/g);
  config.protectedSource.push(/\{\%[\s\S]*?%\}/g);

  // Don'e encode properties, otherwise magento codes may get invalid
  config.entities = false;

  // Don't filter our content, we only use this inside our adminhtml so this should be safe
  config.allowedContent = true;
};
