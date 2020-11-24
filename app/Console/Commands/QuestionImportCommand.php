<?php

namespace App\Console\Commands;

use App\Imports\QuestionsImport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class QuestionImportCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:questions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Excel::import(new QuestionsImport, public_path().DIRECTORY_SEPARATOR.'teste2.xlsx');
        return 0;
    }
}
