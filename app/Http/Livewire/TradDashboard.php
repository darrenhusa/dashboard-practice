<?php

namespace App\Http\Livewire;

use App\Models\StudentTerm;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class TradDashboard extends Component
{
    // public $ft_continuing;
    // public $ft_first_time;
    // public $ft_transfer;
    public $ft_total;
    // public $pt_continuing;
    // public $pt_first_time;
    // public $pt_transfer;
    public $pt_total;
    public $date_timestamp;
    
    public function mount()
    {
        $this->getDashboardData();
    }

    // public function getDashboardData()
    // {
    //    $this->getData();
       
        // $this->ft_continuing = $results['ft_continuing'];
        // $this->ft_first_time = $results['ft_first_time'];
        // $this->ft_transfer = $results['ft_transfer'];
        // $this->ft_total = $results['ft_total'];
 
        // $this->pt_continuing = $results['pt_continuing'];
        // $this->pt_first_time = $results['pt_first_time'];
        // $this->pt_transfer = $results['pt_transfer'];
        // $this->pt_total = $results['pt_total'];
    //     $this->date_timestamp = now();
    // }

    public function getDashboardData()
    {
        $term = '20211';

        $trad_total = StudentTerm::inTerm('20211')->count();
                    
        // $ft_query = DB::table('CCSJ_PROD.SR_STUDENT_TERM')
        //     ->where('CCSJ_PROD.SR_STUDENT_TERM.TERM_ID', $term)
        //     ->whereIn('CCSJ_PROD.SR_STUDENT_TERM.STUD_STATUS', ['A', 'W'])
        //     ->where('CCSJ_PROD.SR_STUDENT_TERM.PRGM_ID1', 'like', 'TR%')
        //     ->join('CCSJ_PROD.SR_ST_TERM_CRED', function ($join)  {
        //         $join->on('CCSJ_PROD.SR_STUDENT_TERM.NAME_ID', '=', 'CCSJ_PROD.SR_ST_TERM_CRED.NAME_ID');
        //         $join->on('CCSJ_PROD.SR_STUDENT_TERM.TERM_ID', '=', 'CCSJ_PROD.SR_ST_TERM_CRED.TERM_ID');
        //     })
        //     ->where('CCSJ_PROD.SR_ST_TERM_CRED.TU_CREDIT_ENRL', '>=', 12);
        


        
        // $pt_query = DB::table('CCSJ_PROD.SR_STUDENT_TERM')
        //     ->where('CCSJ_PROD.SR_STUDENT_TERM.TERM_ID', $term)
        //     ->whereIn('CCSJ_PROD.SR_STUDENT_TERM.STUD_STATUS', ['A', 'W'])
        //     ->where('CCSJ_PROD.SR_STUDENT_TERM.PRGM_ID1', 'like', 'TR%')
        //     ->join('CCSJ_PROD.SR_ST_TERM_CRED', function ($join)  {
        //         $join->on('CCSJ_PROD.SR_STUDENT_TERM.NAME_ID', '=', 'CCSJ_PROD.SR_ST_TERM_CRED.NAME_ID');
        //         $join->on('CCSJ_PROD.SR_STUDENT_TERM.TERM_ID', '=', 'CCSJ_PROD.SR_ST_TERM_CRED.TERM_ID');
        //     })
        //     ->where('CCSJ_PROD.SR_ST_TERM_CRED.TU_CREDIT_ENRL', '<', 12);
        
        // $total = $trad_query->count(); 
        // $ft_total = $ft_query->count(); 
        // $pt_total = $pt_query->count(); 
        
        // ddd([$trad_query, $ft_query, $total]);
        // ddd([$trad_query, $ft_query, $pt_query, $total]);
        // dd([$ft_total, $pt_total]);
        // dd([$total, $ft_total, $pt_total]);
        dd($trad_total);

        // $this->ft_continuing = $ft_query->whereIn($sr_term . '.ETYP_ID', ['CS'])->count();
        // $this->ft_first_time = $ft_query->whereIn($sr_term . '.ETYP_ID', ['AH', 'HS', 'GE'])->count();
        // $this->ft_transfer = $ft_query->whereIn($sr_term . '.ETYP_ID', ['TR'])->count();

        // $this->pt_continuing = $pt_query->whereIn($sr_term . '.ETYP_ID', ['CS'])->count();
        // $this->pt_first_time = $pt_query->whereIn($sr_term . '.ETYP_ID', ['AH', 'HS', 'GE'])->count();
        // $this->pt_transfer = $pt_query->whereIn($sr_term . '.ETYP_ID', ['TR'])->count();

        // $ft_total = $ft_query->count(); 
        // $pt_total = $pt_query->count(); 

        $this->date_timestamp = now();

        // $results = [
        //     'ft_continuing' => $ft_continuing,
        //     'ft_first_time' => $ft_first_time,
        //     'ft_transfer' => $ft_transfer,
        //     'ft_total' => $ft_total,
        //     'pt_continuing' => $pt_continuing,
        //     'pt_first_time' => $pt_first_time,
        //     'pt_transfer' => $pt_transfer,
        //     'pt_total' => $pt_total,
        // ];
        // dd($pt_total);
        // dd($pt_query);
        // dd($ft_total);

        // return $results;
    }

    public function scopeFullTime($query)
    {
        $sr_term_credits = 'CCSJ_PROD.SR_ST_TERM_CRED';

        return $query->where($sr_term_credits.'.TU_CREDIT_ENRL', '>=', 12);
    }
    
    public function scopePartTime($query)
    {
        $sr_term_credits = 'CCSJ_PROD.SR_ST_TERM_CRED';

        return $query->where($sr_term_credits.'.TU_CREDIT_ENRL', '<', 12);
    }


    // public function getContinuing()
    // {
    //     $term = '20211';
    //     $sr_term = 'CCSJ_PROD.SR_STUDENT_TERM';
    //     $sr_term_credits = 'CCSJ_PROD.SR_ST_TERM_CRED';
    //     $name = 'CCSJ_PROD.CCSJ_CO_V_NAME';

    //     $count = DB::connection('odbc')->table($sr_term)
    //         ->where($sr_term. '.TERM_ID', $term)
    //         ->whereIn($sr_term . '.STUD_STATUS', ['A', 'W'])
    //         ->whereIn($sr_term . '.ETYP_ID', ['CS'])
    //         ->where($sr_term . '.PRGM_ID1', 'like', 'TR%')
    //         //    ->join($name, $sr_term. '.NAME_ID', '=', $name . '.NAME_ID')
    //         ->join($sr_term_credits, function ($join) use ($sr_term, $sr_term_credits) {
    //                 $join->on($sr_term.'.NAME_ID', '=', $sr_term_credits.'.NAME_ID');
    //                 $join->on($sr_term.'.TERM_ID', '=', $sr_term_credits.'.TERM_ID');
    //         })
    //         ->where($sr_term_credits.'.TU_CREDIT_ENRL', '>=', 12)
    //         ->count();
            
    //     return $count;
    // }

    // public function getTransfer()
    // {
    //     $term = '20211';
    //     $sr_term = 'CCSJ_PROD.SR_STUDENT_TERM';
    //     $sr_term_credits = 'CCSJ_PROD.SR_ST_TERM_CRED';
    //     $name = 'CCSJ_PROD.CCSJ_CO_V_NAME';

    //     $count = DB::connection('odbc')->table($sr_term)
    //         ->where($sr_term. '.TERM_ID', $term)
    //         ->whereIn($sr_term . '.STUD_STATUS', ['A', 'W'])
    //         ->whereIn($sr_term . '.ETYP_ID', ['TR'])
    //         ->where($sr_term . '.PRGM_ID1', 'like', 'TR%')
    //         //    ->join($name, $sr_term. '.NAME_ID', '=', $name . '.NAME_ID')
    //         ->join($sr_term_credits, function ($join) use ($sr_term, $sr_term_credits) {
    //                 $join->on($sr_term.'.NAME_ID', '=', $sr_term_credits.'.NAME_ID');
    //                 $join->on($sr_term.'.TERM_ID', '=', $sr_term_credits.'.TERM_ID');
    //         })
    //         ->where($sr_term_credits.'.TU_CREDIT_ENRL', '>=', 12)
    //         ->count();
    
    //     return $count;
    // }

    // public function getFirstTime()
    // {
    //     $term = '20211';
    //     $sr_term = 'CCSJ_PROD.SR_STUDENT_TERM';
    //     $sr_term_credits = 'CCSJ_PROD.SR_ST_TERM_CRED';
    //     $name = 'CCSJ_PROD.CCSJ_CO_V_NAME';

    //     $count = DB::connection('odbc')->table($sr_term)
    //         ->where($sr_term. '.TERM_ID', $term)
    //         ->whereIn($sr_term . '.STUD_STATUS', ['A', 'W'])
    //         ->whereIn($sr_term . '.ETYP_ID', ['AH', 'HS', 'GE'])
    //         ->where($sr_term . '.PRGM_ID1', 'like', 'TR%')
    //         //    ->join($name, $sr_term. '.NAME_ID', '=', $name . '.NAME_ID')
    //         ->join($sr_term_credits, function ($join) use ($sr_term, $sr_term_credits) {
    //                 $join->on($sr_term.'.NAME_ID', '=', $sr_term_credits.'.NAME_ID');
    //                 $join->on($sr_term.'.TERM_ID', '=', $sr_term_credits.'.TERM_ID');
    //         })
    //         ->where($sr_term_credits.'.TU_CREDIT_ENRL', '>=', 12)
    //         ->count();
    
    //     return $count;
    // }

    public function render()
    {
        return view('livewire.trad-dashboard');
    }
}
