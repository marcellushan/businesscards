<?php
$html = new DOMDocument('1.0', 'iso-8859-1');
$html->formatOutput = true;
$elem = $html->createElement('input');
$elem->setAttribute('type','button');
$elem->setAttribute('value','My Button');
$elem->setAttribute('style','width:125px');
$html->appendChild($elem);
echo html_entity_decode($html->saveHTML());
?>
