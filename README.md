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

- Manually (latest master/development snapshot)

    `wget wget -qO- https://github.com/Blackskyliner/fontis_wysiwyg/archive/master.tar.gz | tar xvz -C /path/to/your/mangento/installation`

- Modman

    `modman clone git@github.com:Blackskyliner/fontis_wysiwyg.git`

- Composer

    `composer require fontis/fontis_wysiwyg`

Configuration
=============
To use the upload funciionallity you will need to configure the magento root within the `fontis_config.inc.php`.
A Template for that file is available as `fontis_config.inc.php.dist`.
The Filebrowser tries to load the first `fontis_config.inc.php` file if finds while traversing the path upwards.

Example for configuration search traversal:

- Magento Installed to: /var/www/vhosts/yourdomain.tld/htdocs
- Composer is also initialited within the magento directory thus /var/www/vhosts/yourdomain.tld/htdocs/vendor is the composer vendor directory
- Uploaderscript will search in: 
    - /var/www/vhosts/yourdomain.tld/htdocs/vendor/fontis/fontis_wysiwyg
    - /var/www/vhosts/yourdomain.tld/htdocs/vendor/fontis
    - /var/www/vhosts/yourdomain.tld/htdocs/vendor
    - /var/www/vhosts/yourdomain.tld/htdocs
    - /var/www/vhosts/yourdomain.tld
    - /var/www/vhosts
    - /var/www
    - /var
    - /
- The fontis_config.inc.php should in this setup reside within /var/www/vhosts/yourdomain.tld/htdocs (rule of thumb always store that configuration file beside the vendor directory and it will be found, same applies to manual and modman installations)