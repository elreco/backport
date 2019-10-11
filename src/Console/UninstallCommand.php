<?php

namespace Wiledia\Backport\Console;

use Illuminate\Console\Command;

class UninstallCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'admin:uninstall';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Uninstall the admin package';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        if (!$this->confirm('Are you sure to uninstall backport?')) {
            return;
        }

        $this->removeFilesAndDirectories();

        $this->line('<info>Uninstalling backport!</info>');
    }

    /**
     * Remove files and directories.
     *
     * @return void
     */
    protected function removeFilesAndDirectories()
    {
        $this->laravel['files']->deleteDirectory(config('backport.directory'));
        $this->laravel['files']->deleteDirectory(public_path('vendor/backport/'));
        $this->laravel['files']->delete(config_path('admin.php'));
    }
}
