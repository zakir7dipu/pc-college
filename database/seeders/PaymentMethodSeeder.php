<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $payments = [
//            [
//                'icon' => '/upload/payment-icons/cash-on-delivery.png',
//                'name' => 'cash_on_delivery',
//                'status' => true
//            ],
            [
                'icon' => '/upload/payment-icons/bKash.jpg',
                'name' => 'bKash',
            ],
            [
                'icon' => '/upload/payment-icons/nagad.jpg',
                'name' => 'nagad',
            ],
            [
                'icon' => '/upload/payment-icons/rocate.jpg',
                'name' => 'rocate',
            ],
            [
                'icon' => '/upload/payment-icons/money-transfer.png',
                'name' => 'money_transfer',
            ]
        ];

        foreach ($payments as $payment){
            PaymentMethod::create($payment);
        }
    }
}
