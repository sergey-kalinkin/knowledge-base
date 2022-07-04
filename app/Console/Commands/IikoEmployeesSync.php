<?php

namespace App\Console\Commands;

use App\Libraries\Iiko\Api\IikoLists;
use App\Models\Follower;
use Carbon\Carbon;
use Illuminate\Console\Command;

class IikoEmployeesSync extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'iiko:sync_employees';

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
     * @throws \Exception
     */
    public function handle()
    {
        $iiko = new IikoLists();
        $employees = $iiko->getEmptyEmployees();

        while($employee = $employees->createOne()) {
            $data = collect($employee->getValidData())->except(['id', 'login', 'pwHash']);
            $data = $data->merge([
                'uuid' => $employee->id,
                //'created_at' => '',
                'updated_at' => Carbon::now(),
            ]);
            $is_ok = Follower::updateOrInsert(['uuid' => $employee->id], $data->toArray());
        }

        $res = Follower::where('updated_at', '<', Carbon::now()->subDays(2))
            ->delete();
    }
}
