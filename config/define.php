<?php

return [
	'order' => [
		'payment' => [
			'cod'     => 0,
			'paypal'  => 1,
			'zalopay' => 2
		],
		'payment_title' => [
			0 => 'COD',
			1 => 'Paypal',
			2 => 'ZaloPay'
		],
		'status' => [
			'Waiting' => 0,
			'Approved'   => 1,
            'Delivered' => 2,
            'Canceled' => 3
		],
		'status_title' => [
			0 => 'Waiting',
			1 => 'Approved',
            2 => 'Delivered',
            3 => 'Canceled'
		]
	]
];
