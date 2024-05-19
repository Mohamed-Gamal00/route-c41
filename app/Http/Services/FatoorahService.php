<?php

// use Spatie\FlareClient\Http\Client; // ده كلاس لارافيل عملاه عشان تتصل باي حاجة برا الويب سايت بتاعي يعني مش موجودة في الراوتس عندي
use Spatie\FlareClient\Http\Client;

class FatoorahServices
{
    private $base_url;
    private $headers;
    private $request_client;

    public function __construct(Client $request_client)
    {
        $this->request_client = $request_client;
        $this->base_url = env('fatoorah_base_url');
    }
}
