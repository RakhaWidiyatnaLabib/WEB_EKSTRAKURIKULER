<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 40px;
        }
        h1 {
            margin-bottom: 20px;
        }
        .table {
            margin-top: 20px;
        }
        .table th, .table td {
            padding: 10px; /* Memberikan jarak dalam setiap cell tabel */
        }
        .table thead th {
            background-color: #f8f9fa;
            color: #343a40;
            font-weight: bold;
        }
        .table tbody tr:nth-child(odd) {
            background-color: #f9f9f9;
        }
        .table tbody tr:hover {
            background-color: #e9ecef;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 >DATA SISWA YANG MENGIKUTI EKSKUL</h1>
        <table class="table table-bordered table-striped">
            <thead>
                <tr class="mb-3">
                    <th scope="col">NISN</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Ekskul</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Tempat Tanggal Lahir</th>
                    <th scope="col">Agama</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($siswa as $row): ?>
                    <tr >
                        <td><?php echo $row->nisn; ?></td>
                        <td><?php echo $row->nama; ?></td>
                        <td><?php echo $row->ekskul; ?></td>
                        <td><?php echo $row->kelas; ?></td>
                        <td><?php echo $row->tempat_lahir . ' - ' . date_format(date_create($row->tanggal_lahir), "d F Y"); ?></td>
                        <td><?php echo $row->agama; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
