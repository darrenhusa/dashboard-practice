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

    // $ft_query = $trad_query->where($sr_term_credits.'.TU_CREDIT_ENRL', '>=', 12);
    $pt_query = $trad_query->where($sr_term_credits.'.TU_CREDIT_ENRL', '<', 12);

    // $ft_total = $ft_query->count();
    $pt_total = $pt_query->count();

    // dd($ft_total);
    dd($pt_total);


    // $first_time_count = DB::connection('odbc')->table($sr_term)
    //    ->where($sr_term. '.TERM_ID', $term)
    //    ->whereIn($sr_term . '.STUD_STATUS', ['A', 'W'])
    //    ->whereIn($sr_term . '.ETYP_ID', ['HS', 'AH', 'GE'])
    //    ->where($sr_term . '.PRGM_ID1', 'like', 'TR%')
    // //    ->join($name, $sr_term. '.NAME_ID', '=', $name . '.NAME_ID')
    //    ->join($sr_term_credits, function ($join) use ($sr_term, $sr_term_credits) {
    //         $join->on($sr_term.'.NAME_ID', '=', $sr_term_credits.'.NAME_ID');
    //         $join->on($sr_term.'.TERM_ID', '=', $sr_term_credits.'.TERM_ID');
    //    })
    //    ->where($sr_term_credits.'.TU_CREDIT_ENRL', '>=', 12)
    //    ->count();

    // $transfer_count = DB::connection('odbc')->table($sr_term)
    //    ->where($sr_term. '.TERM_ID', $term)
    //    ->whereIn($sr_term . '.STUD_STATUS', ['A', 'W'])
    //    ->whereIn($sr_term . '.ETYP_ID', ['TR'])
    //    ->where($sr_term . '.PRGM_ID1', 'like', 'TR%')
    // //    ->join($name, $sr_term. '.NAME_ID', '=', $name . '.NAME_ID')
    //    ->join($sr_term_credits, function ($join) use ($sr_term, $sr_term_credits) {
    //         $join->on($sr_term.'.NAME_ID', '=', $sr_term_credits.'.NAME_ID');
    //         $join->on($sr_term.'.TERM_ID', '=', $sr_term_credits.'.TERM_ID');
    //    })
    //    ->where($sr_term_credits.'.TU_CREDIT_ENRL', '>=', 12)
    //    ->count();


    //    dd($first_time_count);

});

