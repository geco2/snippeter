snippeter
=========
snippeter Plugin for DokuWiki

Add document snippets into a page.

All documentation for this plugin can be found at
https://github.com/geco2/snippeter

If you install this plugin manually, make sure it is installed in
lib/plugins/snippeter/ - if the folder is called different it
will not work!

Please refer to http://www.dokuwiki.org/plugins for additional info
on how to install plugins in DokuWiki.

----
Copyright (C) Andreas Eisenreich <andi@nanuc.de>

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; version 2 of the License

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

See the COPYING file in your DokuWiki folder for details

----

HOWTO
=========

Configuration
After successful installation you will find an additional chapter in the 
wiki configuration wizard called "sippeter". Withing that section you can
configure the namespace you want to use for your snippets.

The plugin provide a shortcut for each page created in that namespace.

Create snippets
========
In general you can use any wikipage placed in the namespace you configured
for snippeter. To add an icon to identify the snipped within the editor toolbar,
you have to add the picture you plan to use using the dokuwiki media manager
right within the snippet page.

NOTE: Snippeter only support PNG (.png) files in the current version. This might
be changed in the future. Please refresh dokuwikis caches to see your new icon!
(touch the file local.php)

Valid Example:

	{{ :snippets:phone16.png |}}
	
	==== Call: <project> - <description> ====
	{{tag>}}
	* **Person:** 
	* **Time:** 
	
	**Notes**\\
	* 
	
	----
	
Usage
========
Snippeter create a shortcut within the default editor toolbar (the "+" icon). That
icon open up an overview of you snippets. While choose one of them with a klick on 
the related icon will insert your snippet without the media manager information for
the icon on the current curser position within your open wiki page.

Templating
========
Some part of the snippet can be dynamically replaced by an automatic content. In the snippet text, you need to use the variable name in between `< >`.

The possible variables names are:

| Variable name | Description |
| ------------- | ----------- |
| `PAGE_TITLE` | the id of the currently edited page, underscores replaced by spaces |
| `CURRENT_DATE` | the current date in iso format, e.g.: 2024-02-10 for the 10th February, 2024 |
| `CURRENTDATE` | the current date in format YYYYMMDD, e.g.: 20240210 for the 10th February, 2024 |
| `CURRENT_DATE_UNDERSCORE` | the current date in format YYYY_MM_DD, e.g.: 2024_02_10 for the 10th February, 2024 |
| `CURRENT_DATE_DASH` | the current date in format YYYY/MM/DD, e.g.: 2024/02/10 for the 10th February, 2024 |
| `CURRENT_DATE_LOCALE` | the current date in Locale format, format will depend on your server setup |

FAQ
========
Q: I added a customized icon for my snipped, but snippeter still provide the default one
in the toolbar.
A: Please reset DokuWikis cache while touch the file conf/local.php or press the save
button within the configuration wizzard page.

