<?php

namespace App\Contracts;

interface PaymentGateway
{
    public function rpay($amount);
}
