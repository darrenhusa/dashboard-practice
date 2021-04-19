<?php

namespace App\Http\Livewire;

use App\Models\StudentTerm;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class TradDashboard extends Component
{
    public $ft_trad_continuing;
    public $ft_trad_firsttime;
    public $ft_trad_transfer;
    public $ft_trad_total;
    public $pt_trad_continuing;
    public $pt_trad_firsttime;
    public $pt_trad_transfer;
    public $pt_trad_total;

    public $ft_trad_f1;
    public $ft_trad_f2;
    public $ft_trad_so;
    public $ft_trad_jr;
    public $ft_trad_sr;
    public $ft_trad_other;
    public $ft_trad_cdiv_total;

    public $date_timestamp;
    
    public function mount()
    {
        $this->getDashboardData();
    }

    public function getDashboardData()
    {
        $term = '20211';
        
        $this->ft_trad_continuing = StudentTerm::inTerm($term)->fullTime()->continuing()->count();
        $this->ft_trad_firsttime = StudentTerm::inTerm($term)->fullTime()->firstTime()->count();
        $this->ft_trad_transfer = StudentTerm::inTerm($term)->fullTime()->transfer()->count();
        $this->ft_trad_total = StudentTerm::inTerm($term)->fullTime()->count();
        
        $this->pt_trad_continuing = StudentTerm::inTerm($term)->partTime()->continuing()->count();
        $this->pt_trad_firsttime = StudentTerm::inTerm($term)->partTime()->firstTime()->count();
        $this->pt_trad_transfer = StudentTerm::inTerm($term)->partTime()->transfer()->count();
        $this->pt_trad_total = StudentTerm::inTerm($term)->partTime()->count();
        
        $this->ft_trad_f1 = StudentTerm::inTerm($term)->fullTime()->inClass('F1')->count();
        $this->ft_trad_f2 = StudentTerm::inTerm($term)->fullTime()->inClass('F2')->count();
        $this->ft_trad_so = StudentTerm::inTerm($term)->fullTime()->inClass('SO')->count();
        $this->ft_trad_jr = StudentTerm::inTerm($term)->fullTime()->inClass('JR')->count();
        $this->ft_trad_sr = StudentTerm::inTerm($term)->fullTime()->inClass('SR')->count();

        //calculate other = N, SC, SD, SP
        $this->ft_trad_other = StudentTerm::inTerm($term)->fullTime()->inClass('N')->count() +
                                StudentTerm::inTerm($term)->fullTime()->inClass('SC')->count() +
                                StudentTerm::inTerm($term)->fullTime()->inClass('SD')->count() +
                                StudentTerm::inTerm($term)->fullTime()->inClass('SP')->count();

        $this->ft_trad_cdiv_total = $this->ft_trad_f1 +
                                    $this->ft_trad_f2 +
                                    $this->ft_trad_so +
                                    $this->ft_trad_jr +
                                    $this->ft_trad_sr +
                                    $this->ft_trad_other;

        $this->date_timestamp = now();

        // return $results;
    }

    public function render()
    {
        return view('livewire.trad-dashboard');
    }
}
