<?php

namespace App\Console\Commands;

use App\Helpers\FibonacciHelper;
use Illuminate\Console\Command;

class ConsoleApp extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'consoleapp -n {number}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This console command displays Fibonacci sequence in Multiplication table';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle() {
        $userNumber = $this->argument('number');

        $this->info('Representation of Fibonacci Sequence in Multiplication Table for given number: ' . $userNumber);

        $multiplicationTable = FibonacciHelper::generateMultiplicationTable($userNumber);

        $lastRowIndex = count($multiplicationTable) - 1;
        $lastRow = $multiplicationTable[$lastRowIndex];

        $lastRowLastColIndex = count($lastRow) - 1;
        $lastRowLastCol = $lastRow[$lastRowLastColIndex];

        $longestNumberLength = strlen($lastRowLastCol . '') * 2;
        $separator = str_repeat(' ', $longestNumberLength);

        foreach($multiplicationTable as $row) {
            $multiplicationRowDisplay = '';

            foreach($row as $col) {
                if(!is_numeric($col)) {
                    $multiplicationRowDisplay = substr($separator . 'X', -$longestNumberLength);

                    continue;
                }

                $numberDisplay = $separator . $col;

                $multiplicationRowDisplay .= substr($numberDisplay, -$longestNumberLength);
            }

            $this->line($multiplicationRowDisplay);
        }
    }
}
