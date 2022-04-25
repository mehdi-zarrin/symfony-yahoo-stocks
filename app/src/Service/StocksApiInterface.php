<?php
namespace App\Service;

use App\DTO\StockProfile;

interface StocksApiInterface
{
    public function getStocks(string $symbol, string $region): array;
}