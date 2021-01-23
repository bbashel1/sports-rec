<?php

namespace App\Model\Ranking;

use App\Model\Ranking\traits\Relationship\RankingRelationship;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Ranking
 * @package App\Model
 */
class Ranking extends Model
{
    use RankingRelationship;

    /**
     * @var string
     */
    protected $table;

    /**
     * @var string[]
     */
    protected $fillable = ['user_id', 'ranking'];

    /**
     * Ranking constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'rankings';
    }
}
