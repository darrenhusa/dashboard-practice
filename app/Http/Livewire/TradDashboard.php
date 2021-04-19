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
    
    public $top_majors;
    public $ft_trad_majors_total;

    public $term;
    public $date_timestamp;
    
    public function mount()
    {
        $this->getDashboardData();
    }

    public function getDashboardData()
    {
        $term = '20211';
        $this->term = $term;
        
        $this->getByEntryType($term);
        $this->getByClassDivision($term);
        $this->getByTopFirstMajors($term);
        
        // $now = now();                                        
        $this->date_timestamp = $this->date_convert(now(), 'UTC', 'America/Chicago', 'Y-m-d H:i A');

        $distinct_first_majors = StudentTerm::inTerm($term)->fullTime()->select('MAMI_ID_MJ1')->distinct()->pluck('MAMI_ID_MJ1');
        // dd($distinct_first_majors);

        // return $results;
    }

    public function getByEntryType($term)
    {

        $this->ft_trad_continuing = StudentTerm::inTerm($term)->fullTime()->continuing()->count();
        $this->ft_trad_firsttime = StudentTerm::inTerm($term)->fullTime()->firstTime()->count();
        $this->ft_trad_transfer = StudentTerm::inTerm($term)->fullTime()->transfer()->count();
        $this->ft_trad_total = StudentTerm::inTerm($term)->fullTime()->count();
        
        $this->pt_trad_continuing = StudentTerm::inTerm($term)->partTime()->continuing()->count();
        $this->pt_trad_firsttime = StudentTerm::inTerm($term)->partTime()->firstTime()->count();
        $this->pt_trad_transfer = StudentTerm::inTerm($term)->partTime()->transfer()->count();
        $this->pt_trad_total = StudentTerm::inTerm($term)->partTime()->count();

    }

    public function getByClassDivision($term)
    {
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

    }


    public function getByTopFirstMajors($term)
    {
        // $ft_trad_top_majors = StudentTerm::inTerm($term)->fullTime()->groupBy('MAMI_ID_MJ1')->get();
        $ft_trad_accounting = StudentTerm::inTerm($term)->fullTime()->inFirstMajor(['0105'])->count();
        $ft_trad_biomedical_science = StudentTerm::inTerm($term)->fullTime()->inFirstMajor(['4501'])->count();
        $ft_trad_criminal_justice = StudentTerm::inTerm($term)->fullTime()->inFirstMajor(['1005', 'A805'])->count();
        $ft_trad_business_management = StudentTerm::inTerm($term)->fullTime()->inFirstMajor(['2205', 'A205'])->count(); 
        $ft_trad_digital_and_studio_arts = StudentTerm::inTerm($term)->fullTime()->inFirstMajor(['5505'])->count();
        $ft_trad_elem_education = StudentTerm::inTerm($term)->fullTime()->inFirstMajor(['1205'])->count();
        $ft_trad_english = StudentTerm::inTerm($term)->fullTime()->inFirstMajor(['1309', '1308', '1307'])->count();
        $ft_trad_forensic_biotech = StudentTerm::inTerm($term)->fullTime()->inFirstMajor(['4502'])->count();
        $ft_trad_forensic_science = StudentTerm::inTerm($term)->fullTime()->inFirstMajor(['4504'])->count();
        $ft_trad_general_studies = StudentTerm::inTerm($term)->fullTime()->inFirstMajor(['1705'])->count();
        $ft_trad_health_sciences = StudentTerm::inTerm($term)->fullTime()->inFirstMajor(['D102'])->count();
        $ft_trad_human_services = StudentTerm::inTerm($term)->fullTime()->inFirstMajor(['4905'])->count();
        $ft_trad_kinesiology = StudentTerm::inTerm($term)->fullTime()->inFirstMajor(['4503'])->count();
        $ft_trad_psychology = StudentTerm::inTerm($term)->fullTime()->inFirstMajor(['2805'])->count();

        $this->ft_trad_majors_total = $ft_trad_accounting + $ft_trad_biomedical_science + $ft_trad_criminal_justice +
                                        $ft_trad_business_management + $ft_trad_digital_and_studio_arts + $ft_trad_elem_education +
                                        $ft_trad_english + $ft_trad_forensic_biotech + $ft_trad_forensic_science + $ft_trad_general_studies +
                                        $ft_trad_health_sciences + $ft_trad_human_services + $ft_trad_kinesiology + 
                                        $ft_trad_psychology;

        $first_majors = [
            'Accounting'    =>  $ft_trad_accounting,
            'Biomedical Science'    => $ft_trad_biomedical_science,
            'Criminal Justice'  => $ft_trad_criminal_justice,
            'Business Management'   => $ft_trad_business_management,
            'Digital & Studio Arts'   => $ft_trad_digital_and_studio_arts,
            'Elementary Education'   => $ft_trad_elem_education,
            'English'   => $ft_trad_english,
            'Forensic Biotechnology'   => $ft_trad_forensic_biotech,
            'Forensic Science'   => $ft_trad_forensic_science,
            'General Studies'   => $ft_trad_general_studies,
            'Health Sciences'   => $ft_trad_health_sciences,
            'Human Services'   => $ft_trad_human_services,
            'Kinesiology'   => $ft_trad_kinesiology,
            'Psychology'   => $ft_trad_psychology,
        ];

        $this->top_majors = collect($first_majors)->sort()->reverse();

        // dd($this->top_majors, );

    }

    public function render()
    {
        return view('livewire.trad-dashboard');
    }

    private function date_convert($time, $oldTZ, $newTZ, $format) {
        // create old time
        $d = new \DateTime($time, new \DateTimeZone($oldTZ));
        // convert to new tz
        $d->setTimezone(new \DateTimeZone($newTZ));
    
        // output with new format
        return $d->format($format);
    }

}
