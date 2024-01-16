<?php

namespace App\Helpers;

use Exception;
use Illuminate\Support\Facades\Http;

class SMSHelper
{
    static public function sendSMS($phoneNo, $messageText)
    {
        try {
            $account_name = getenv("OUR_SMS_NAME");
            $token = getenv("OUR_SMS_TOKEN");
            $base_url = getenv("OUR_SMS_URL");

            Http::withHeaders([
                'Authorization' => "Bearer " . $token
            ])->post($base_url . "/msgs/sms", [
                "src" => $account_name,
                "dests" => $phoneNo,
                "body" => $messageText,
                "priority" => 0,
                "delay" => 0,
                "validity" => 0,
                "maxParts" => 0,
                "dlr" => 0,
                "prevDups" => 0,
                // "msgClass" => "promotional"  

            ]);
            return true;
        } catch (Exception $e) {
            info("Error: " . $e->getMessage());
            return false;
        }
    }
}
