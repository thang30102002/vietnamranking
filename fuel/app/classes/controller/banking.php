<?php

use Fuel\Core\Controller;

class Controller_Banking extends Controller
{
    public static function createQr($bank_id, $account, $template, $amount, $description, $account_name)
    {
        return "https://img.vietqr.io/image/$bank_id-$account-$template.png?amount=$amount&addInfo=$description&accountName=$account_name";
    }
}
