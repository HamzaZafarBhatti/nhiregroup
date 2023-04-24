<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ClearUserPointsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:clear-points';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear user points every 30 days';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        //
        $date = Carbon::now()->subDays(30);

        $users = User::where('clear_points_at', $date)->where('points', '>', 0)->get();

        foreach ($users as $user) {
            $user->points = 0;
            $user->save();
        }

        $this->info('User points cleared successfully!');
    }
}
