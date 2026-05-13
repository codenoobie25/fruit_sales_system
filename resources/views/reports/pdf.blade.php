    <html>
<head>
    <meta charset="utf-8">
    <title>Fruits Report</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background: #f1f1f1; }
    </style>
</head>
<body>
    <h2>Fruits Report</h2>

    <table>
        <thead>
            <tr>
                <th>Fruit Name</th>
                <th>Category</th>
                <th>Price per KG</th>
                <th>Stock</th>
                <th>Availability</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($fruits as $fruit)
                <tr>
                    <td>{{ $fruit->fruit_name }}</td>
                    <td>{{ ucwords($fruit->category) }}</td>
                    <td>{{ $fruit->price_per_kg }}</td>
                    <td>{{ $fruit->stock }}</td>
                    <td>{{ ucwords($fruit->availability) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No fruits found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>