<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class StudentTerm extends Model
{
    use HasFactory;

 
    protected $table = 'CCSJ_PROD.SR_STUDENT_TERM';
    protected $primaryKey = 'NAME_ID';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;


    protected static function booted()
    {
        static::addGlobalScope('trad', function (Builder $builder) {
            $builder->whereIn('CCSJ_PROD.SR_STUDENT_TERM.STUD_STATUS', ['A', 'W'])
                ->where('CCSJ_PROD.SR_STUDENT_TERM.PRGM_ID1', 'like', 'TR%')
                ->join('CCSJ_PROD.SR_ST_TERM_CRED', function ($join)  {
                    $join->on('CCSJ_PROD.SR_STUDENT_TERM.NAME_ID', '=', 'CCSJ_PROD.SR_ST_TERM_CRED.NAME_ID');
                    $join->on('CCSJ_PROD.SR_STUDENT_TERM.TERM_ID', '=', 'CCSJ_PROD.SR_ST_TERM_CRED.TERM_ID');
                });
            });
    }

    public function scopeInTerm($query, $term)
    {
        return $query->where('CCSJ_PROD.SR_STUDENT_TERM.TERM_ID', $term);
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
