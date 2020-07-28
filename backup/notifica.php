<?php
include_once '../conexao.php';
// SDK de Mercado Pago
require 'lib/vendor/autoload.php';


//MercadoPago\SDK::setAccessToken("TEST-2171831318822753-060819-32bee9998cce633a5005df5209e8e200-139491901");
MercadoPago\SDK::setAccessToken('TEST-2171831318822753-062400-47a1dfab39d6e2c53cb112141b1c1a82-139491901');

$payment = MercadoPago\Payment::find_by_id($_GET["data_id"]);
// $payment = MercadoPago\Payment::find_by_id($_GET["id"]);
// // Get the payment and the corresponding merchant_order reported by the IPN.
// $merchant_order = MercadoPago\MerchantOrder::find_by_id($payment->order->id);

$referencia = $payment->{'external_reference'};
$status_payment = $payment->{'status'};
$forma_pagamento_payment = $payment->{'payment_type_id'};

// $status_payment = "in_mediation";
// $forma_pagamento_payment = "account_money";

// $referencia = 2022;
// $status = "default";
// $forma_pagamento = "default";



// $fp=fopen('log.txt','a');
// $html=$payment->{'external_reference'} . ' | ' . $payment->{'id'} . ' | ' . $payment->{'status'}.' | '.$payment->{'payment_type_id'};
// $write=fwrite($fp,$html);
// fclose($fp);

if($status_payment == 'approved'){
	global $status;
	$status = 'APROVADO';
}else if($status_payment == 'pending'){
	global $status;
	$status = 'PENDENTE';
}else if($status_payment == 'authorized'){
	global $status;
	$status = 'AUTORIZADO';
}else if($status_payment == 'in_process'){
	global $status;
	$status = 'EM ANÁLISE';
}else if($status_payment == 'rejected'){
	global $status;
	$status = 'REJEITADO';
}else if($status_payment == 'refunded'){
	global $status;
	$status = 'DEVOLVIDO';
}else if($status_payment == 'cancelled'){
	global $status;
	$status = 'CANCELADO';
}else if($status_payment == 'in_mediation'){
	global $status;
	$status = 'EM MEDIAÇÃO';
}else if($status_payment == 'charged_back'){
	global $status;
	$status = 'ESTORNADO';
}else{
	global $status;
	$status = $status_payment;
}


if ($forma_pagamento_payment == 'ticket') {
	global $forma_pagamento;
	$forma_pagamento = 'Boleto/Lotérica';
}else if($forma_pagamento_payment == 'account_money'){
	global $forma_pagamento;
	$forma_pagamento = 'Saldo MP';
}else if($forma_pagamento_payment == 'credit_card'){
	global $forma_pagamento;
	$forma_pagamento = 'Cartão de Crédito';
}else if($forma_pagamento_payment == 'debit_card'){
	global $forma_pagamento;
	$forma_pagamento = 'Cartão de Débito';
}else{
	global $forma_pagamento;
	$forma_pagamento = $forma_pagamento_payment;
}

$sql_pagamento = "UPDATE pagamentos
				  SET forma_pagamento = :forma_pagamento, status = :status
				  WHERE referencia = :referencia";

// //echo "| " . $referencia . " | " . $status . " | " . $forma_pagamento . " |";

$sql_pagamento = $conexao->prepare($sql_pagamento);
$sql_pagamento->bindParam(':referencia', $referencia);
$sql_pagamento->bindParam(':forma_pagamento', $forma_pagamento);
$sql_pagamento->bindParam(':status', $status);
//$sql_pagamento->execute();

$html= "";

if($sql_pagamento->execute()){
	echo "GRAVADO COM SUCESSO";
	global $html;
	$html="GRAVADO COM SUCESSO";
}else{
	echo "ERRO AO GRAVAR";
	global $html;
	$html="ERRO AO GRAVAR";
}

// $fp=fopen('log.txt','a');
// $html=$payment->{'external_reference'} . ' | ' . $payment->{'id'} . ' | ' . $payment->{'status'}.' | '.$payment->{'payment_type_id'};
// $write=fwrite($fp,$html);
// fclose($fp);

$fp=fopen('log.txt','a');
$write=fwrite($fp,$html);
fclose($fp);

?>