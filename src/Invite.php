<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Models\SleepingOwlModel;

class Invite extends SleepingOwlModel
{
    protected $table = 'invites';

    protected $fillable = ['code', 'count'];


    public function getByCode($code)
    {
        $inv = $this->Code($code)->first();
        $count = $inv->count;
        if ($count != 0) {
            $this->Code($code)->first()->update(['count' => $count-1]);
            return true;
        }
        return false;
    }

    public function scopeCode($query, $code)
    {
        $query->where(['code'=>$code]);
    }

}
