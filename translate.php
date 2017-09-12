<?php

$messagePath = "./messages";
$sourceLanguage = "de";
$targetLanguage = "en";

function getInput($text,$default) {
	readline_clear_history();
	readline_add_history($default);
	$line = readline($text." [".(strlen($default)>10?substr($default,0,10)."...":$default)."]");
	if (trim($line)=='')
		$line = $default;
	return $line;
}

$messagePath = getInput("Path to Yii2-message directory",$messagePath);
$sourceLanguage = getInput("Source language (de)",$sourceLanguage);
$targetLanguage = getInput("Target language (de)",$targetLanguage);


$files = glob($messagePath."/".$sourceLanguage.'/*.php', GLOB_BRACE);

echo count($files)." files found in $messagePath\n";

foreach($files as $file)
{    
	$auswahl = getInput("Translate source file $file (y/N/.=>End)?","N");
	if ($auswahl==".") break;
	if ($auswahl=="y") {
		$sourceMessages = require($file);
		echo "Source file contains ".count($sourceMessages)." messages\n";
		$targetFile = $messagePath."/".$targetLanguage."/".basename($file);
		$targetMessages = [];
		if (file_exists($targetFile))
			$targetMessages = require($targetFile);
		echo "Translation file contains ".count($targetMessages)." messages\n";
		foreach($sourceMessages as $key => $value) {
			if (empty($targetMessages[$key]))
				$targetMessages[$key] = $sourceMessages[$key];
		}
		foreach($sourceMessages as $key => $value) {
			echo "---\n";
			echo "--> [$key]\n";
			echo "$sourceLanguage: [$value]\n";
			if (!isset($targetMessages[$key]))
				$targetMessages[$key]="";
			echo "$targetLanguage: [".$targetMessages[$key]."]\n";
			$antwort = getInput("New (Return->OK/.->End)",$targetMessages[$key]);
			if ($antwort == ".") break;
			$targetMessages[$key] = $antwort;
		}
		echo "New translation file:\n";
		$newTargetContent = "<?php\n";
		$newTargetContent .= "return [\n";
		foreach($targetMessages as $key => $value)
			$newTargetContent .= "    '$key' => '$value',\n";
		$newTargetContent .= "];\n";
		echo $newTargetContent;
		$antwort = getInput("Save new translationfile as ".$targetFile." (y/N):","N");
		if ($antwort=="y") {
			if (!file_exists($messagePath."/".$targetLanguage))
				mkdir($messagePath."/".$targetLanguage);
			file_put_contents($targetFile,$newTargetContent);
			echo "File saved as $targetFile\n";
		}
	}
}


