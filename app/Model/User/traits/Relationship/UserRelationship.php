<?php


namespace App\Model\User\traits\Relationship;

use App\Model\Ranking\Ranking;

/**
 * Trait UserRelationship
 * @package App\Model\User\traits\Relationship
 */
trait UserRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * If needed all ranking records
     */
    public function rankings()
    {
        return $this->hasMany(Ranking::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     * get latest ranking
     */
    public function  ranking()
    {
        return $this->hasOne(Ranking::class)->latest();
    }
}
