<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Modules\TravelOrder\Enums\Status;
use Illuminate\Database\Eloquent\Builder;
use Carbon\CarbonImmutable ;

class TravelOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'applicant_name',
        'user_id',
        'destination',
        'departure_at',
        'return_at',
        'status'
    ];

    protected $casts = [
        'departure_at' => 'datetime',
        'return_at' => 'datetime',
    ];

    protected $attributes = [
        'status' => Status::Requested->value,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeByLoggedUser(Builder $query): Builder
    {
        //TODO: implement filter by logged user
        return $query;
    }

    public function scopeDatesStartAt(Builder $query, CarbonImmutable $date): Builder
    {
        return $query->where(function($query) use($date){
            $query->whereDate('departure_at', '>=', $date->format('Y-m-d'))
                ->orWhereDate('return_at', '>=', $date->format('Y-m-d'));
        });
    }

    public function scopeDatesEndAt(Builder $query, CarbonImmutable $date): Builder
    {
        return $query->where(function($query) use($date){
            $query->whereDate('departure_at', '<=', $date->format('Y-m-d'))
                ->orWhereDate('return_at', '<=', $date->format('Y-m-d'));
        });
    }
}
