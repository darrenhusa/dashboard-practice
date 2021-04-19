<div wire:poll.60s="getDashboardData">
    <p>Last updated on <strong>{{ $date_timestamp }}</strong></p>
    <h1>TRAD Programs by Entry Type</h1>
    <table border=1>
    <tr>
    <thead>
    <th>Entry Type</th><th>FT N</th><th>PT N</th><th>FT Cr Hrs</th><th>PT Cr Hrs</th>
    </thead>
    </tr>
        <tr><td>Continuing</td><td>{{ $ft_trad_continuing }}</td><td>{{ $pt_trad_continuing }}</td><td>{{ $ft_trad_continuing_cr_hrs}}</td><td>{{ $pt_trad_continuing_cr_hrs}}</td>
    </tr>
    <tr><td>First-time</td><td>{{ $ft_trad_firsttime }}</td><td>{{ $pt_trad_firsttime }}</td><td>{{ $ft_trad_firsttime_cr_hrs}}</td><td>{{ $pt_trad_firsttime_cr_hrs}}</td>
    </tr>
    <tr><td>Transfer</td><td>{{ $ft_trad_transfer }}</td><td>{{ $pt_trad_transfer }}</td><td>{{ $ft_trad_transfer_cr_hrs}}</td><td>{{ $pt_trad_transfer_cr_hrs}}</td>
    </tr>
    <tr><td>Totals</td><td><strong>{{ $ft_trad_total }}</strong></td><td>{{ $pt_trad_total }}</td><td>{{ $ft_trad_total_cr_hrs}}</td><td>{{ $pt_trad_total_cr_hrs}}</td>
    </tr>
    </table>
    
    <h1>TRAD FullTime by Class Division</h1>
    <table>
    <tr>
        <thead>
            <th>Class</th>
            <th>Count</th>
        </thead>
    </tr>
    <tr>
        <td>F1</td>
        <td>{{ $ft_trad_f1}}</td>
    </tr>
    <tr>
        <td>F2</td>
        <td>{{ $ft_trad_f2}}</td>
    </tr>

    <tr>
        <td>SO</td>
        <td>{{ $ft_trad_so}}</td>
    </tr>

    <tr>
        <td>JR</td>
        <td>{{ $ft_trad_jr}}</td>
    </tr>

    <tr>
        <td>SR</td>
        <td>{{ $ft_trad_sr}}</td>
    </tr>

    <tr>
        <td>Other (N, SC, SD, SP)</td>
        <td>{{ $ft_trad_other}}</td>
    </tr>

    <tr>
        <td>TOTAL</td>
        <td><strong>{{ $ft_trad_cdiv_total}}</strong></td>
    </tr>

    </table>
</div>

<div>
<h1>TRAD FullTime By Top Majors</h1>
<table>
<thead>
<tr>
    <th>Major</th><th>Count</th>
</tr>
</thead>

    @foreach($top_majors as $key => $value)
    <tr>
        <td>{{ $key }}</td> <td>{{ $value }}</td>
    </tr>
    @endforeach
    <tr>
    <td>TOTAL</td><td><strong>{{ $ft_trad_majors_total }}</strong></td>
    </tr>
</table>
</div>