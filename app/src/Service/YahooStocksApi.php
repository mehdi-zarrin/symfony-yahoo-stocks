<?php
namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class YahooStocksApi implements StocksApiInterface
{
    private HttpClientInterface $client;

    public function __construct(HttpClientInterface $client, string $apiKey)
    {
        $this->client = $client->withOptions([
            'base_uri' => 'https://yh-finance.p.rapidapi.com',
            'headers' => ['X-RapidAPI-Key' => $apiKey]
        ]);
    }

    public function getStocks(string $symbol, string $region): array
    {
        $response = $this->client->request('GET', '/stock/v2/get-profile', [
            'query' => [
                'symbol' => $symbol,
                'region' => $region
            ]
        ]);

        $stockResponse = json_decode($response->getContent())->price;

        return [
            'symbol' => $stockResponse->symbol,
            'shortName' => $stockResponse->shortName,
            'region' => $region,
            'exchangeName' => $stockResponse->exchangeName,
            'currency' => $stockResponse->currency,
            'price' => $stockResponse->regularMarketPrice->raw,
            'previousClose' => $stockResponse->regularMarketPreviousClose->raw,
            'priceChange' => $stockResponse->regularMarketPrice->raw - $stockResponse->regularMarketPreviousClose->raw,
        ];
    }
}