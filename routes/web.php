<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// private function scopeTrad($query)
// {
//     $term = '20211';
//     $sr_term = 'CCSJ_PROD.SR_STUDENT_TERM';
//     $sr_term_credits = 'CCSJ_PROD.SR_ST_TERM_CRED';
//     $name = 'CCSJ_PROD.CCSJ_CO_V_NAME';

//     $query = DB::connection('odbc')->table($sr_term)
//        ->where($sr_term. '.TERM_ID', $term)
//        ->whereIn($sr_term . '.STUD_STATUS', ['A', 'W'])
//        ->where($sr_term . '.PRGM_ID1', 'like', 'TR%')
//        ->join($sr_term_credits, function ($join) use ($sr_term, $sr_term_credits) {
//             $join->on($sr_term.'.NAME_ID', '=', $sr_term_credits.'.NAME_ID');
//             $join->on($sr_term.'.TERM_ID', '=', $sr_term_credits.'.TERM_ID');
//        });

//     return $query;
// }

Route::get('/empower', function () {
    
    $term = '20211';
    $sr_term = 'CCSJ_PROD.SR_STUDENT_TERM';
    $sr_term_credits = 'CCSJ_PROD.SR_ST_TERM_CRED';
    $name = 'CCSJ_PROD.CCSJ_CO_V_NAME';

    $trad_query = DB::table($sr_term)
       ->where($sr_term. '.TERM_ID', $term)
       ->whereIn($sr_term . '.STUD_STATUS', ['A', 'W'])
       ->where($sr_term . '.PRGM_ID1', 'like', 'TR%')
       ->join($sr_term_credits, function ($join) use ($sr_term, $sr_term_credits) {
            $join->on($sr_term.'.NAME_ID', '=', $sr_term_credits.'.NAME_ID');
            $join->on($sr_term.'.TERM_ID', '=', $sr_term_credits.'.TERM_ID');
       });

    $ftftf1_query = clone $trad_query;
    // $ft_query = clone $trad_query;
    // $pt_query = clone $trad_query;
    
    $ftftf1_query = $ftftf1_query->whereIn($sr_term.'.ETYP_ID', ['AH', 'HS', 'GE'])
                            ->where($sr_term_credits.'.TU_CREDIT_ENRL', '>=', 12)       
                            ->where($sr_term.'.CDIV_ID', 'F1');

    // $ft_query = $ft_query->where($sr_term_credits.'.TU_CREDIT_ENRL', '>=', 12);
    // $ft_query = $trad_query->where($sr_term_credits.'.TU_CREDIT_ENRL', '>=', 12);
    // $pt_query = $pt_query->where($sr_term_credits.'.TU_CREDIT_ENRL', '<', 12);

    // $ftftf1_records = $ftftf1_query->select('DFLT_ID', 'LAST_NAME', 'FIRST_NAME')
    //                     ->selectRaw("count('DFLT_ID') as count")
    //                     ->join($name, $name.'.NAME_ID', $sr_term.'.NAME_ID')
    //                     ->groupBy('ETYP_ID')
    //                     ->orderBy('LAST_NAME')    
    //                     ->get();

    $ftftf1_by_entry_type = collect($ftftf1_query->selectRaw("ETYP_ID, count('NAME_ID') as entry_type_count")
                                    ->groupBy('ETYP_ID')
                                    // ->pluck('ETYP_ID', 'ENTRY_TYPE_COUNT'));
                                    ->pluck('ENTRY_TYPE_COUNT', 'ETYP_ID'));
                                    // ->get());

    
    // $ftftf1_total = $ftftf1_query->count();
    // $ft_total = $ft_query->count();
    // $pt_total = $pt_query->count();

    // dd($ft_total, $pt_total);
    dd($ftftf1_by_entry_type->keys(), $ftftf1_by_entry_type->values());
    // dd($ftftf1_total);
    // dd($ftftf1_records);

});

