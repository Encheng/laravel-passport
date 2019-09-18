<?php
namespace App\Traits;

use App;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Exception;

trait HttpRequestTrait
{
    protected function postRequestWithToken($request, $url, $token = null)
    {
        $bearer_token = $request->bearerToken();
        if (!empty($token)) {
            $bearer_token = $token;
        }

        $client = new Client();
        $response = $client->request('POST', $url, [
            'headers' => [
                'Authorization' => 'Bearer ' . $bearer_token,
                'Accept' => 'application/json'
            ],
            'form_params' => $request->all(),
        ]);
        return $this->performJsonDecode($response);
    }

    protected function postRequestGetToken($request, $url)
    {
        $client_array = [
            'client_id' => env('OAUTH_CLIENT_ID'),
            'client_secret' => env('OAUTH_CLIENT_SECRET'),
        ];
        $post_array = array_merge($client_array, $request->all());
        $client = new Client();
        $response = $client->request('POST', $url, [
            'form_params' => $post_array,
        ]);
        return $this->performJsonDecode($response);
    }

    protected function getRequestWithToken($request, $url)
    {
        $client = new Client();
        $response = $client->request('GET', $url, [
            'headers' => [
                'Authorization' => $request->bearerToken(),
                'Accept' => 'application/json'
            ],
            'query' => $request->all(),
        ]);
        return $this->performJsonDecode($response);
    }

    protected function getRequestWithoutToken($request, $url)
    {
        $client = new Client();
        $response = $client->request('GET', $url, [
            'query' => $request->all(),
        ]);
        return $this->performJsonDecode($response);
    }

    protected function performJsonDecode($response)
    {
        try {
            $json_response = json_decode($response->getBody()->getContents(), true);
            if (!is_array($json_response)) {
                throw new Exception('Could not decode JSON');
            }
        } catch (Exception $e) {
            throw new Exception('Response error');
        }
        return $json_response;
    }
}
