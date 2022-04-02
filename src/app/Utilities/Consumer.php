<?php

namespace App\Utilities;

use Illuminate\Support\Facades\Http;

trait Consumer
{
	private $defaultHeader = ['Content-Type' => 'application/json'];

	public function get($url = null, $params = [], $headers = [])
    {
        if (!array_key_exists('Content-Type', $headers)) {
            $headers = array_merge($headers, $this->defaultHeader);
        }

        $response = Http::withHeaders($headers)->get($url);

        if ($params) {
            $response = Http::withHeaders($headers)->get($url, $params);
        }

        return json_decode($response->getBody()->getContents());
    }

    public function post($url = null, $params = [], $headers = [])
    {
        if (!array_key_exists('Content-Type', $headers)) {
            $headers = array_merge($headers, $this->defaultHeader);
        }

        $response = Http::withHeaders($headers)->post($url, $params);

        return json_decode($response->getBody()->getContents());
    }

    public function put($url = null, $params = [])
    {
        if (!array_key_exists('Content-Type', $headers)) {
            $headers = array_merge($headers, $this->defaultHeader);
        }

        $response = Http::withHeaders($headers)->put($url, $params);

        return json_decode($response->getBody()->getContents());
    }

    public function delete($url = null, $params = [])
    {
        if (!array_key_exists('Content-Type', $headers)) {
            $headers = array_merge($headers, $this->defaultHeader);
        }

        $response = Http::withHeaders($headers)->delete($url);

        if ($params) {
            $response = Http::withHeaders($headers)->delete($url, $params);
        }

        return json_decode($response->getBody()->getContents());
    }
}