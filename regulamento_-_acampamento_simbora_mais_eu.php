<?php

function Inputheader($Filename, $Filepath){
	header("Content-disposition: inline; filename={$Filename}");
	header("Content-type: application/pdf");
	readfile($Filepath);
}

$Filename = "regulamento_-_acampamento_simbora_mais_eu.pdf";
$Filepath = "arquivos/{$Filename}";
Inputheader($Filename, $Filepath);