<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Answer extends Model
{
    protected $fillable = [
        'users_id',
        'words_id',
        'correct',
        'wrong',
    ];

        /**
     * [QueryScope] 通報済みユーザの除外
     * 
     * @param $query
     * @return mixed
     */
    public function scopeIgnoreFlagged($query)
    {
        return $query->where('flagged_at', null);
    }

        /**
     * 通報処理（flagged_at の更新）
     * 
     * @return bool
     */
    public function flag($correct,$wrong)
    {
        return $this->update( [ 'correct' => $correct , 'wrong' => $wrong] );
    }
}
