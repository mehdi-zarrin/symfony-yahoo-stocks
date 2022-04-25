<?php

namespace App\Service;

class DummyStocksApi implements StocksApiInterface
{

    public function getStocks(string $symbol, string $region): array
    {
        $price = 1000;
        $previousClose = 1100;

        return [
            'symbol' => 'AMZN',
            'shortName' => 'Amazon Inc',
            'currency' => 'USD',
            'exchangeName' => 'Nasdaq',
            'region' => 'US',
            'price' => $price,
            'previousClose' => $previousClose,
            'priceChange' => $price - $previousClose,
        ];
    }
}