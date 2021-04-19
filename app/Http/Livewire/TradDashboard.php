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
        

        $this->date_timestamp = now();

        // return $results;
    }

    public function render()
    {
        return view('livewire.trad-dashboard');
    }
}
