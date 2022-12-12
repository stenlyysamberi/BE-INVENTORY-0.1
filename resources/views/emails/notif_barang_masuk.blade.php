<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RCGN Whrs - In</title>

    <style>
        .styled-table {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            font-family: sans-serif;
            min-width: 400px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        .styled-table thead tr {
            background-color: #009879;
            color: #ffffff;
            text-align: left;
        }

        .styled-table th,
        .styled-table td {
        padding: 12px 15px;
        }

        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }

        .styled-table tbody tr.active-row {
            font-weight: bold;
            color: #009879;
        }
    </style>
</head>
<body>
    <h4>Dear All</h4>
    <p>Terlampir tabel Data Material masuk/In.</p>

    <table class="styled-table">
        <th>Name</th>
        <th>Serial Number</th>
        <th>Location</th>
        <th>Uom</th>
        <th>Total</th>
        <th>Date</th>
        <tbody>
            <tr>
                <td>{{$details['nama']}}</td>
                <td>{{$details['number']}}</td>
                <td>{{$details['container']}} - Container</td>
                <td>{{$details['uom']}}</td>
                <td>{{$details['total']}}</td>
                <td>{{$details['date']}}</td>
            </tr>
        </tbody>
    </table>

    <br><br>
    Salam,<br>
    <b>Team RCGN Whrs.</b>
</body>
</html>
{{-- 
'nama' => $email[0]->material_name,
'number'  => $email[0]->material_number,
'container' => $email[0]->container,
'uom' => $email[0]->uom,
'total' => request('total') --}}