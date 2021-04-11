@foreach ($tradingPool->trades as $trade)
    <table>
        <thead>
        <tr>
            <th>Trade</th>
            <th>User</th>
            <th>Value</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{ $trade->id }}</td>
            <td>{{ $trade->user->name }}</td>
            <td>{{ $trade->value }}</td>
        </tr>
        </tbody>
    </table>
@endforeach
