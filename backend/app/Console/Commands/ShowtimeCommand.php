<?php

namespace App\Console\Commands;

use App\Models\Showtime;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Console\Command\Command as CommandAlias;

class ShowtimeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'showtime:status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $currentTime = Carbon::now()->toDateTimeString();
        //Update status of events that have start_time <= now to RUNNING
        Showtime::where('status', config('constants.SHOWTIME_STATUS.NOW_SHOWING'))
            ->where('end_time', '>=', $currentTime)
            ->where('start_time', '<=', $currentTime)
            ->update(['status' => config('constants.SHOWTIME_STATUS.NOW_SHOWING')]);
            
        // Update status of showtimes that have end_time <= now to CANCELLED
        Showtime::where('end_time', '<=', $currentTime)->update(['status' => config('constants.SHOWTIME_STATUS.CANCELLED')]);
        return CommandAlias::SUCCESS;
    }
}
