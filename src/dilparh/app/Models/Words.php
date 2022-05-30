<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Words extends Model
{
    public function previous()
    {
        return $this->where('id', '<', $this->id)->orderBy('id', 'desc')->first();
    }
    
    public function next()
    {
        return $this->where('id', '>', $this->id)->orderBy('id', 'asc')->first();
    }
}
