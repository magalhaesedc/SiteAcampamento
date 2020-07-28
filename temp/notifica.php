<?php

	// SDK de Mercado Pago
	require 'lib/vendor/autoload.php';

	MercadoPago\SDK::setAccessToken('TEST-2171831318822753-062400-47a1dfab39d6e2c53cb112141b1c1a82-139491901');
	$payment = MercadoPago\Payment::find_by_id($_GET["data_id"]);

	$referencia = $payment->{'external_reference'};
	$status_payment = $payment->{'status'};
	$forma_pagamento_payment = $payment->{'payment_type_id'};
	$id = $payment->{'id'};

	$fp=fopen('log.txt','a');
	$html=$referencia . ' | '.
		  $id . ' | '.
		  $status_payment . ' | '.
		  $forma_pagamento_payment;
	$write=fwrite($fp,$html);
	fclose($fp);

?>