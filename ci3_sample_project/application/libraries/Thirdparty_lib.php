<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Thirdparty_lib {
    protected $ci;
    public function __construct(){
        $this->ci =& get_instance();
    }

    // Simple cURL wrapper
    protected function curl_get($url, $headers = array()){
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if(!empty($headers)) curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        $resp = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);
        if($err) return array('error' => $err);
        $decoded = json_decode($resp, true);
        return $decoded ? $decoded : array('raw' => $resp);
    }

    // Example: fetch public GitHub user details
    public function fetch_github_user($username){
        $url = 'https://api.github.com/users/'.urlencode($username);
        $headers = array('User-Agent: CI3-App-Client');
        return $this->curl_get($url, $headers);
    }

    // Example: fetch weather from OpenWeatherMap
    public function fetch_weather($city){
        // NOTE: Replace OPENWEATHER_API_KEY with a real key for live calls.
        $apiKey = 'OPENWEATHER_API_KEY';
        $q = urlencode($city);
        $url = "https://api.openweathermap.org/data/2.5/weather?q={$q}&appid={$apiKey}&units=metric";
        return $this->curl_get($url);
    }

    // Mock Stripe-like charge for static testing (DO NOT USE IN PRODUCTION)
    public function mock_stripe_charge($payload){
        // This function simulates validation and returns a fake response structure
        $amount = isset($payload['amount']) ? (int)$payload['amount'] : 0;
        $currency = isset($payload['currency']) ? $payload['currency'] : 'usd';
        $card = isset($payload['card']) ? $payload['card'] : array('last4' => '4242');

        // simple validation
        if($amount <= 0) return array('error'=>'invalid_amount','message'=>'Amount must be > 0');

        // Simulated response
        return array(
            'id' => 'ch_'.uniqid(),
            'amount' => $amount,
            'currency' => $currency,
            'status' => 'succeeded',
            'payment_method' => array('card' => $card),
            'created' => time()
        );
    }
}
