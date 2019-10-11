<?php

namespace Wiledia\Backport\Console;

use Wiledia\Backport\Facades\Backport;
use Illuminate\Console\Command;

class MenuCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'admin:menu';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Show the admin menu';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $menu = Backport::menu();

        echo json_encode($menu, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE), "\r\n";
    }
}
