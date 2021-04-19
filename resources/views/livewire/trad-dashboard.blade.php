<div wire:poll.60s="getDashboardData">
    <p>Last updated on <strong>{{ $date_timestamp }}</strong></p>
    <h1>TRAD Programs by Entry Type</h1>
    <table>
    <tr>
    <thead>
    <th>Entry Type</th><th>FT</th><th>PT</th>
    </thead>
    </tr>
    <tr><td>continuing</td><td>{{ $ft_trad_continuing }}</td><td>{{ $pt_trad_continuing }}</td></tr>
    <tr><td>first-time</td><td>{{ $ft_trad_firsttime }}</td><td>{{ $pt_trad_firsttime }}</td></tr>
    <tr><td>transfer</td><td>{{ $ft_trad_transfer }}</td><td>{{ $pt_trad_transfer }}</td></tr>
    <tr><td>Totals</td><td>{{ $ft_trad_total }}</td><td>{{ $pt_trad_total }}</td><td></tr>
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
        <td>{{ $ft_trad_cdiv_total}}</td>
    </tr>

    </table>
</div>

<div>
<h1>TRAD Fulltime By Top Majors</h1>
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
    <td>TOTAL</td><td>{{ $ft_trad_majors_total }}</td>
    </tr>
</table>
</div>