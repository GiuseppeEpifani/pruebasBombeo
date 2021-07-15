<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BombTest extends Model
{
    use HasFactory;
    use SoftDeletes;

/**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = 'bomb_tests';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'status',
        'hours_init',
        'well_depth',
        'water_well',
        'client',
        'ubication',
        'well_diameter',
        'proof',
        'flow',
        'supervisor',
        'tube_aforo',
        'disk_aforo',
        'meters_well',
        'latitude',
        'logitude',
        'pump_model',
        'suction_distance',
        'user_id',
    ];

        /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

        /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
