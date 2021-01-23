<?php

namespace App\Console\Ranking;

use App\Repositories\RankingRepository;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

/**
 * Class MoveUserRanking
 * @package App\Console\Ranking
 */
class MoveUserRanking extends Command
{
    /**
     * @var string
     */
    protected $signature = 'ranking:moveUserRanking';

    /**
     * @var string
     */
    protected $description = 'Move User Ranking';

    /**
     * @var RankingRepository
     */
    protected $rankings;

    /**
     * MoveUserRanking constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->rankings = new RankingRepository();
    }

    /**
     * Job Handle
     */
    public function handle()
    {
        $users = User::all();
        foreach ($users as $user) {
            $this->rankings->create($user);
        }
        Artisan::call('migrate', array('--path' => 'Database/migrations/2021_01_19_232042_drop_ranking_column_from_user_table.php'));
    }
}
