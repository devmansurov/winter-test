<?php

namespace Pp\Kistochki\Classes\Services;

use Illuminate\Support\Facades\Http;

class YClients
{
  private const BASE_URL = 'https://api.yclients.com/api/v1';
  private const SALOONS_ENDPOINT = 'companies/?group_id=244791&count=1000&forBooking=1&active=1';
  private const AUTHORIZATION_TOKEN = 'yusw3yeu6hrr4r9j3gw6';

  public static function getSaloons()
  {
    return self::get(self::SALOONS_ENDPOINT);
  }
  
  private static function get($url)
  {
    $defaultResponse = collect([]);
    try {
      $response = Http::baseUrl(self::BASE_URL)
        ->retry(3, 100, throw: false)
        ->acceptJson()
        ->withToken(self::AUTHORIZATION_TOKEN)
        ->get($url);
      
      return $response->ok() ? $response->collect() : $defaultResponse;
    } catch (\Exception $e) {
      return $defaultResponse;
    }
  }
}