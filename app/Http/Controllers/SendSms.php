<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SendSms extends Controller
{
    public function send()
    {
        $basic  = new \Vonage\Client\Credentials\Basic("c231bf47", "2APIIP2HNgEOgpSw");
        $client = new \Vonage\Client($basic);
        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS("212619857409", "FATIHA", 'SALAM FATIHA KIDAYRA HANIYA')
        );

        $message = $response->current();

        if ($message->getStatus() == 0) {
            echo "The message was sent successfully\n";
        } else {
            echo "The message failed with status: " . $message->getStatus() . "\n";
        }        // $message = $client->sms()->send(
        //     new \Vonage\SMS\Message\SMS("+212619916783", "Web Developer Diaries", "Hello From Message To Brahim Taher")
        // );
        // return response()->json("SMS Bien Envoyer");
    }
}
