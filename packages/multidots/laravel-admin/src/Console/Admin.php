<?php

namespace Multidots\Admin\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class Admin extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:make';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish the all the package required files.';

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
     * @return mixed
     */
    public function handle()
    {
        echo '<pre>';
        print_r('hello');
        $this->publishPackageRequireFiles();
        $code = Artisan::call('cache:clear');
        $this->info('command is run');
    }

    protected function publishPackageRequireFiles()
    {
        $this->info('publishPackageRequireFiles is run');
    }
}
