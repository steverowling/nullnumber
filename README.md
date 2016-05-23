# Null Number plugin for Craft CMS

Extension of the built-in Number field with a default value of `null`.

## Installation

To install Null Number, follow these steps:

1. Download & unzip the file and place the `nullnumber` directory into your `craft/plugins` directory
2.  -OR- do a `git clone https://github.com/steverowling/nullnumber.git` directly into your `craft/plugins` folder.  You can then update it with `git pull`
3. Install plugin in the Craft Control Panel under Settings > Plugins
4. The plugin folder should be named `nullnumber` for Craft to see it.  GitHub recently started appending `-master` (the branch name) to the name of the folder for zip file downloads.

Null Number works on Craft 2.4.x and higher.

## Null Number Overview

Useful for situations where you want a number field, but zero has meaning in the system and you want to be able to have a `null` default value.

## Using Null Number

Use it in exactly the same like the built-in Number field. If you don't set a default value, it will be `null`.

## Null Number Changelog

### 1.0.0 -- 2016.04.12

* Initial release

Brought to you by [Steve Rowling](https://springworks.co.uk)