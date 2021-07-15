<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FieldBombTest extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
         * The table associated with the model.
         *
         * @var string
         */
        public $table = 'field_bomb_tests';
    
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
            'hours',
            'minute',
            'accumulated',
            'instant_measurement',
            'water_column',
            'pressure_psi',
            'measured_from_edge',
            'temperature',
            'ph',
            'conduct',
            'ppm',
            'tds',
            'turbidity',
            'observation',
            'bomb_test_id',
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
