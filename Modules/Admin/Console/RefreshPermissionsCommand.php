<?php

namespace Modules\Admin\Console;

use Illuminate\Console\Command;
use Modules\Admin\Entities\Permission;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Spatie\Permission\PermissionRegistrar;

class RefreshPermissionsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'Admin:refresh-permissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description.';

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
            // Reset cached roles and permissions
            app()[PermissionRegistrar::class]->forgetCachedPermissions();
            $this->info("Start Refresh permissions");

            // list permissions
            $permissions = config('permission.list' , []);
            // create permissions
            foreach ($permissions as $model => $actions) {
                foreach ($actions as  $action) {
                    $this->line('Make ' . $action.' '.$model . ' Permission');

                    Permission::updateOrCreate(['name' => $action.'-'.$model],['title' =>  $action , 'group' => $model ,  'guard_name' => 'admin']);
                }
            }

            $this->info("Done Refresh permissions");
    }


}
