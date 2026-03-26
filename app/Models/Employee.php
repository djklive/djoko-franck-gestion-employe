<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'hire_date',
        'department_id',
        'position_id'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function currentPosition()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }

    public function positionHistories()
    {
        return $this->hasMany(PositionHistory::class);
    }
}
