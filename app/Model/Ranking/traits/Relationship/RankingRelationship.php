<?php

namespace App\Model\Ranking\traits\Relationship;

use App\Model\User\User;

/**
 * Trait RankingRelationship
 * @package App\Model\Ranking\traits\Relationship
 */
trait RankingRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * inverse of hasMany
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
