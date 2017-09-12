Yii2 translation utility
========================

This PHP script helps to create or update translations of Yii2 message files.

# Installation

You need to have PHP (>=5.4) and [Composer](http://composer.org) installed.

Then get the required libraries:

    > composer install

Finally execute the script

	> php translate.php

# Sample Translation Process

If your Yii2 message path is in your current folder, the script runs as follows:

	> php translate.php

	Path to Yii2-message directory [./messages]
	Source language (de) [de]
	Target language (de) [en]
	Use Google Translate service (y/N) [y]
	14 files found in ./messages
	Translate source file ./messages/de/app-band.php (y/N/.=>End)? [N] ```y```
	Source file contains 11 messages
	Translation file contains 11 messages
	---
	-->         [bands]
	de        : [Bands]
	en        : [Bands]
	google    : bands
	New (Return=>OK/-=>Google/.=>End) [Bands]
	---
	-->         [band]
	de        : [Band / Formation]
	en        : [Band / Group]
	google    : Band / formation
	New (Return=>OK/-=>Google/.=>End) [Band / Gro...].
	New translation file:
	<?php
	return [
	    'bands' => 'Bands',
	    'band' => 'Band / Group',
	];
	Save new translationfile as ./messages/en/app-band.php (y/N): [N]y
	File saved as ./messages/en/app-band.php
	Translate source file ./messages/de/app-benutzer.php (y/N/.=>End)? [N].
	>

That's it. You've got a new transled file in ```./messages/en``` or the file is updated with the new
translated messages.


# Author

weezee@web.de

# Licence
