Fontis WYSIWYG Editor
=====================

Adds a chosen JavaScript WYSIWYG editor to selected admin pages.

This extension gives you the option to add a JavaScript WYSIWYG editor to specified admin page text areas. Currently available editors are:

* [CKeditor](http://ckeditor.com/)

Settings are available from the System &rarr; Configuration page, under Fontis Extensions &rarr; WYSGIWYG Editors section.

Note that by default, the file upload functionality of the included editors is disabled. If you would like to use it, set the Enable File Uploads option to 'Yes'. There is always some potential risk in allowing users to upload files to your web server, so you should only enable this functionality if you intend to use it. We have added additional checks and access controls to the file upload scripts so that only logged-in Magento administrators are able to access them, but if you don't use the upload functionality it is safer to leave it turned off.

Installation
============

You can install this module in 3 ways:

- Manually
- Modman
- Composer

After installing this module you will need to copy and configure the `vendor/fontis/fontis_wysiwyg/fontis_config.inc.php.dist` to `path/to/mageroot/fontis_config.inc.php`.
Default path within the .dist file should work most installations. If not configured correctly the image uploader will not work.
If you don't want to use the image uploader then you can just ignore this step.