<!DOCTYPE html>
<html>
<head>
    <title>To-Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://unpkg.com/@phosphor-icons/web@2.1.1"></script>
</head>
<body>
    <h1>
        To-Do List
        <i class="ph ph-note-pencil"></i>
    </h1>
    <a href="index.php?action=create" class="btn btn-outline-primary">Tambah Tugas Baru</a>
    <hr>
    <ul>
        <?php if(empty($todos)): ?>
            <li>Tidak ada tugas</li>
        <?php else: ?>
        <?php foreach ($todos as $todo): ?>
            <li>
                <input type="checkbox" <?php echo $todo['completed'] ? 'checked' : ''; ?> onclick="window.location='index.php?action=edit&id=<?php echo $todo['id']; ?>'" >
                <span class="<?php echo $todo['completed'] ? 'completed' : ''; ?>">
                    <?php echo htmlspecialchars($todo['task']); ?>
                </span>
                <a href="index.php?action=edit&id=<?php echo $todo['id']; ?>" style="color:darkgreen; margin-right: 3px">Edit</a>
                 |
                <a href="index.php?action=delete&id=<?php echo $todo['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus tugas ini?')" style="color:red; margin-left: 3px">Hapus</a>
                <br>
                <span>
                    Dibuat Pada : <?php 
                        $date = new DateTime($todo['created_at']);
                        $bulan = [
                            1 => 'Januari',
                            2 => 'Februari',
                            3 => 'Maret',
                            4 => 'April',
                            5 => 'Mei',
                            6 => 'Juni',
                            7 => 'Juli',
                            8 => 'Agustus',
                            9 => 'September',
                            10 => 'Oktober',
                            11 => 'November',
                            12 => 'Desember'
                        ];
                        
                        $hari = $date->format('j');
                        $bulanIndo = $bulan[(int)$date->format('n')];
                        $tahun = $date->format('Y');
                        $jam = $date->format('H');
                        $menit = $date->format('i');

                        echo "$hari $bulanIndo $tahun, $jam:$menit";
                    ?>
                </span>
                 | 
                <span>
                    Diperbarui Pada : <?php 
                        $date = new DateTime($todo['created_at']);
                        $bulan = [
                            1 => 'Januari',
                            2 => 'Februari',
                            3 => 'Maret',
                            4 => 'April',
                            5 => 'Mei',
                            6 => 'Juni',
                            7 => 'Juli',
                            8 => 'Agustus',
                            9 => 'September',
                            10 => 'Oktober',
                            11 => 'November',
                            12 => 'Desember'
                        ];
                        
                        $hari = $date->format('j');
                        $bulanIndo = $bulan[(int)$date->format('n')];
                        $tahun = $date->format('Y');
                        $jam = $date->format('H');
                        $menit = $date->format('i');

                        echo "$hari $bulanIndo $tahun, $jam:$menit";
                    ?>
                </span>
            </li>
        <?php endforeach; ?>
        <?php endif; ?>
    </ul>
</body>
</html>