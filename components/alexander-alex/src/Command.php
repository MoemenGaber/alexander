<?php

namespace Macedonia\Alex;

use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class Command
 * @package Macedonia\Alex
 */
abstract class Command extends SymfonyCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "command:name";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "";

    /**
     * The console command help message
     *
     * @var string
     */
    protected $help = "";

    /**
     * @var InputInterface
     */
    protected $input;

    /**
     * @var OutputInterface
     */
    protected $output;

    /**
     * Command constructor.
     */
    public function __construct()
    {
        parent::__construct($this->signature);
        $this->setDescription($this->description);
        $this->setHelp($this->help);
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return int|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->input = $input;
        $this->output = $output;
        $this->handle();
        return 0;
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    abstract function handle(): void;
}
