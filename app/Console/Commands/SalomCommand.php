<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class SalomCommand extends Command
{
    protected $signature = 'salom:ekranga';
    protected $description = 'Har 2 daqiqada ekranga salom chiqaradi';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        echo "salom\n";
        Log::info('salom');
    }
}
