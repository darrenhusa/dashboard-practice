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

</div>