<?php

namespace App\Command;

use App\Entity\Stock;
use App\Service\StocksApiInterface;
use App\Service\YahooStocksApi;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

#[AsCommand(
    name: 'app:refresh-stock-profile',
    description: 'The command will refresh the stock profile in question',
)]
class RefreshStockProfileCommand extends Command
{
    public const INPUT_SYMBOL = 'symbol';
    public const INPUT_REGION = 'region';
    private EntityManagerInterface $entityManager;
    private StocksApiInterface $stocksApi;
    private SerializerInterface $serializer;

    public function __construct(EntityManagerInterface $entityManager, StocksApiInterface $stocksApi, SerializerInterface $serializer, string $name = null)
    {
        parent::__construct($name);
        $this->entityManager = $entityManager;
        $this->stocksApi = $stocksApi;
        $this->serializer = $serializer;
    }

    protected function configure(): void
    {
        $this
            ->addArgument(self::INPUT_SYMBOL, InputArgument::REQUIRED, 'The stock symbol')
            ->addArgument(self::INPUT_REGION, InputArgument::REQUIRED, 'The stock region')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $stockProfile = $this->stocksApi->getStocks($input->getArgument(self::INPUT_SYMBOL), $input->getArgument(self::INPUT_REGION));
        $stock = $this->serializer->deserialize(json_encode($stockProfile), Stock::class, 'json');

        $this->entityManager->persist($stock);
        $this->entityManager->flush();

        return Command::SUCCESS;
    }
}
