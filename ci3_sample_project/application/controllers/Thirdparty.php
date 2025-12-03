<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Thirdparty extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('thirdparty_lib');
        $this->load->helper('url');
    }

    // Example: fetch GitHub user info (public API, no key required)
    public function github_user($username = 'octocat'){
        $result = $this->thirdparty_lib->fetch_github_user($username);
        header('Content-Type: application/json');
        echo json_encode($result);
    }

    // Example: fetch weather from OpenWeatherMap (replace API_KEY placeholder)
    public function weather($city = 'London'){
        $result = $this->thirdparty_lib->fetch_weather($city);
        header('Content-Type: application/json');
        echo json_encode($result);
    }

    // Mock example to demonstrate a payment-like POST (no real Stripe calls or keys)
    public function mock_charge(){
        $payload = $this->input->post();
        $result = $this->thirdparty_lib->mock_stripe_charge($payload);
        header('Content-Type: application/json');
        echo json_encode($result);
    }
}
