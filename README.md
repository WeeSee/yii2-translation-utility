Yii2 translation utility
========================

This PHP script helps to quickly create or update translations of Yii2 message files.
Use it if you want to initially translate Yii2 messages or update translations when development proceeds.

It is a little command line utility running standalone (without webserver, database, ...).

The script  ...

* reads all source input files in Yii2 message folder (source language),
* shows a message in source language,
* shows the translated messge in the target language (if available),
* shows a translation proposal usingthe Google translation service,
* asks the user for a translated message (either a new message or the Google translated message),
* saves translated messages in the target language folder

This utility does not have to installed in the Yii2 folder. Install it anywhere outside (e.g. in a user ./tmp folder).

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
	Translate source file ./messages/de/app-band.php (y/N/.=>End)? [N]y
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

# Disclaimer

This software is developed for educational purposes only. It uses the repo [Stichoza/google-translate-php](https://github.com/Stichoza/google-translate-php) to access Google translation service.Please note that the Google translation feature may break anytime as it is based on crawling the Google Translate website. Consider buying Official Google Translate API for other types of usage.

Also, Google might ban your server IP or require to solve CAPTCHA if you send unusual traffic (large amount of data/requests).
