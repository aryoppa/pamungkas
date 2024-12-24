<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\UserBalance;
use Carbon\Carbon;

class UpdatePremiumStatus extends Command
{
    protected $signature = 'premium:update';
    protected $description = 'Update is_premium status based on expired_date';

    public function handle()
    {
        $userBalances = UserBalance::all();

        foreach ($userBalances as $userBalance) {
            if ($userBalance->expired_date && Carbon::now() >= $userBalance->expired_date) {
                $userBalance->update(['is_premium' => 0]);
            }
        }

        $this->info('Premium status updated successfully.');
    }
}

