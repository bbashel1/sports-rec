<?php

namespace App\Repositories;

use App\Model\Ranking\Ranking;
use App\User;

/**
 * Class RankingRepository
 * @package App\Repositories
 */
class RankingRepository
{
    /**
     * Associated Repository Model
     */
    const MODEL = Ranking::class;

    /**
     * RankingRepository constructor.
     */
    public function __construct()
    {

    }

    /**
     * @param User $user
     * @param null $newRanking
     * @return bool
     */
    public function create(User $user, $newRanking = null)
    {
        $ranking = self::MODEL;
        $ranking = new $ranking;
        $ranking->user_id = $user->id;
        $ranking->ranking = $newRanking ? (int) $newRanking : $user->ranking;
        if ($ranking->save()) {
            return true;
        }
        return false;
    }
}
