<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class StudentTerm extends Model
{
    use HasFactory;
    // use \LaravelTreats\Model\Traits\HasCompositePrimaryKey;

 
    protected $table = 'CCSJ_PROD.SR_STUDENT_TERM';
    protected $primaryKey = 'NAME_ID';
    // protected $primaryKey = ['NAME_ID', 'TERM_ID'];
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;


    protected static function booted()
    {
        static::addGlobalScope('trad', function (Builder $builder) {
            $builder->whereIn('CCSJ_PROD.SR_STUDENT_TERM.STUD_STATUS', ['A', 'W'])
                ->where('CCSJ_PROD.SR_STUDENT_TERM.PRGM_ID1', 'like', 'TR%')
                ->join('CCSJ_PROD.CCSJ_CO_V_NAME', 'CCSJ_PROD.SR_STUDENT_TERM.NAME_ID', '=', 'CCSJ_PROD.CCSJ_CO_V_NAME.NAME_ID')
                ->join('CCSJ_PROD.SR_ST_TERM_CRED', function ($join)  {
                    $join->on('CCSJ_PROD.SR_STUDENT_TERM.NAME_ID', '=', 'CCSJ_PROD.SR_ST_TERM_CRED.NAME_ID');
                    $join->on('CCSJ_PROD.SR_STUDENT_TERM.TERM_ID', '=', 'CCSJ_PROD.SR_ST_TERM_CRED.TERM_ID');
                });
            });
    }

    public function activities()
    {
        // return $this->belongsToMany('App\Models\Activity', 'CCSJ_PROD_SR_STUD_TERM_ACT');
        return $this->belongsToMany(Activity::class, 'CCSJ_PROD.SR_STUD_TERM_ACT', 'NAME_ID', 'ACTI_ID');
    }

    public function scopeInTerm($query, $term)
    {
        return $query->where('CCSJ_PROD.SR_STUDENT_TERM.TERM_ID', $term);
    }

    public function scopeInClass($query, $class)
    {
        return $query->where('CCSJ_PROD.SR_STUDENT_TERM.CDIV_ID', $class);
    }
    
    public function scopeInFirstMajorCode($query, $code)
    {
        return $query->where('CCSJ_PROD.SR_STUDENT_TERM.MAMI_ID_MJ1', $code);
    }

    public function scopeInFirstMajor($query, $array)
    {
        return $query->whereIn('CCSJ_PROD.SR_STUDENT_TERM.MAMI_ID_MJ1', $array);
    }

    public function scopeFullTime($query)
    {
        return $query->where('CCSJ_PROD.SR_ST_TERM_CRED.TU_CREDIT_ENRL', '>=', 12);
    }

    public function scopePartTime($query)
    {
        return $query->where('CCSJ_PROD.SR_ST_TERM_CRED.TU_CREDIT_ENRL', '<', 12);
    }

    public function scopeContinuing($query)
    {
        return $query->whereIn('CCSJ_PROD.SR_STUDENT_TERM.ETYP_ID', ['CS']);
    }

    public function scopeFirstTime($query)
    {
        return $query->whereIn('CCSJ_PROD.SR_STUDENT_TERM.ETYP_ID', ['AH', 'HS', 'GE']);
    }

    public function scopeTransfer($query)
    {
        return $query->whereIn('CCSJ_PROD.SR_STUDENT_TERM.ETYP_ID', ['TR', 'T2', 'T4']);
    }



}
