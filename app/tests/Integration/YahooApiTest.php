<?php

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class YahooApiTest extends KernelTestCase
{

    private \App\Service\StocksApiInterface $yahooStocksApi;
    public function setUp(): void
    {
        $container = KernelTestCase::getContainer();
        $this->yahooStocksApi = $container
            ->get(\App\Service\StocksApiInterface::class);
    }
    /**
     * @test
     */
    public function an_api_call_must_be_successful()
    {

        $result = $this->yahooStocksApi->getStocks('AMZN', 'US');
        dd($result);

    }
}