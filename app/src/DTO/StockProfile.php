<?php
namespace App\DTO;

class StockProfile
{
    public string $symbol;
    public string $shortName;
    public string $currency;
    public string $exchangeName;
    public string $region;
    public float $price;
    public float $previousClose;
    public float $priceChange;

    /**
     * @return string
     */
    public function getSymbol(): string
    {
        return $this->symbol;
    }

    /**
     * @param string $symbol
     * @return StockProfile
     */
    public function setSymbol(string $symbol): StockProfile
    {
        $this->symbol = $symbol;
        return $this;
    }

    /**
     * @return string
     */
    public function getShortName(): string
    {
        return $this->shortName;
    }

    /**
     * @param string $shortName
     * @return StockProfile
     */
    public function setShortName(string $shortName): StockProfile
    {
        $this->shortName = $shortName;
        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     * @return StockProfile
     */
    public function setCurrency(string $currency): StockProfile
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @return string
     */
    public function getExchangeName(): string
    {
        return $this->exchangeName;
    }

    /**
     * @param string $exchangeName
     * @return StockProfile
     */
    public function setExchangeName(string $exchangeName): StockProfile
    {
        $this->exchangeName = $exchangeName;
        return $this;
    }

    /**
     * @return string
     */
    public function getRegion(): string
    {
        return $this->region;
    }

    /**
     * @param string $region
     * @return StockProfile
     */
    public function setRegion(string $region): StockProfile
    {
        $this->region = $region;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     * @return StockProfile
     */
    public function setPrice(float $price): StockProfile
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return float
     */
    public function getPreviousClose(): float
    {
        return $this->previousClose;
    }

    /**
     * @param float $previousClose
     * @return StockProfile
     */
    public function setPreviousClose(float $previousClose): StockProfile
    {
        $this->previousClose = $previousClose;
        return $this;
    }

    /**
     * @return float
     */
    public function getPriceChange(): float
    {
        return $this->priceChange;
    }

    /**
     * @param float $priceChange
     * @return StockProfile
     */
    public function setPriceChange(float $priceChange): StockProfile
    {
        $this->priceChange = $priceChange;
        return $this;
    }
}