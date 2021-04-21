<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $table = 'CCSJ_PROD.CO_ACTIV_CODE';
    protected $primaryKey = 'ACTI_ID';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    public function student_terms()
    {
        return $this->belongsToMany(StudentTerm::class, 'CCSJ_PROD_SR_STUD_TERM_ACT');
    }
}
