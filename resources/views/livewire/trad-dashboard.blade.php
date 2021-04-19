<div wire:poll.5s="getDashboardData">
    <p>{{ $date_timestamp }}</p>
    <ul>
        <li>continiung {{ $ft_continuing }}</li>
        <li>first time {{ $ft_first_time }}</li>
        <li>transfer {{ $ft_transfer }}</li>
        <li>FT TRAD TOTAL {{ $ft_total }}</li>
    </ul>
</div>