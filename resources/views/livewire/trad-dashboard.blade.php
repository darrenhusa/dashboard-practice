<div wire:poll.60s="getDashboardData">
    <p>{{ $date_timestamp }}</p>
    <ul>
        <li>continiung {{ $ft_trad_continuing }}</li>
        <li>first time {{ $ft_trad_firsttime }}</li>
        <li>transfer {{ $ft_trad_transfer }}</li>
        <li>FT TRAD TOTAL {{ $ft_trad_total }}</li>
    </ul>

    <ul>
        <li>continiung {{ $pt_trad_continuing }}</li>
        <li>first time {{ $pt_trad_firsttime }}</li>
        <li>transfer {{ $pt_trad_transfer }}</li>
        <li>PT TRAD TOTAL {{ $pt_trad_total }}</li>
    </ul>

    <h1>TRAD FullTime by Class Division</h1>
    <table>
    <tr>
        <thead>
            <td>Class</td>
            <td>Count</td>
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