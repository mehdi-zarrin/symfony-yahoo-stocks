<?php

use App\Entity\Stock;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class StockTest extends KernelTestCase
{
    public EntityManager $entityManager;
    public function setUp(): void
    {
        $container = KernelTestCase::getContainer();
        $this->entityManager = $container
            ->get('doctrine')
            ->getManager();
    }

    /** @test */
    public function a_stock_record_can_be_created_in_the_database()
    {
        // arrange
        $price = 1000;
        $previousClose = 1100;
        $stock = new Stock();
        $stock->setSymbol('AMZN');
        $stock->setShortName('Amazon Inc');
        $stock->setCurrency('USD');
        $stock->setExchangeName('Nasdaq');
        $stock->setRegion('US');
        $stock->setPrice($price);
        $stock->setPreviousClose($previousClose);
        $stock->setPriceChange($price - $previousClose);

        $this->entityManager->persist($stock);
        $this->entityManager->flush();

        $stockRepo = $this->entityManager->getRepository(Stock::class);
        $record = $stockRepo->findOneBy(['symbol' => 'AMZN']);

        // assert
        $this->assertEquals('AMZN', $record->getSymbol());
    }

    /**
     * @test
     */
    public function refresh_stocks_command_should_affect_database()
    {
        $kernel = self::bootKernel();
        $application = new \Symfony\Bundle\FrameworkBundle\Console\Application($kernel);
        $command = $application->find('app:refresh-stock-profile');
        $commandTester = new \Symfony\Component\Console\Tester\CommandTester($command);
        $commandTester->execute([
            'symbol' => 'AMZN',
            'region' => 'US'
        ]);

        $stockEntity = $this->entityManager->getRepository(Stock::class)->findOneBy(['symbol' => 'AMZN']);
        $this->assertEquals('AMZN', $stockEntity->getSymbol());
    }
}