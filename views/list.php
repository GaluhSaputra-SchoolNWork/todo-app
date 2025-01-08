<!DOCTYPE html>
<html>
<head>
    <title>To-Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h1>To-Do List</h1>
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
                <a href="index.php?action=edit&id=<?php echo $todo['id']; ?>" class="btn btn-outline-success">Edit</a>
                 | 
                <a href="index.php?action=delete&id=<?php echo $todo['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus tugas ini?')" class="btn btn-outline-danger">Hapus</a>
                <br>
                <span>
                    Dibuat Pada : <?php echo $todo['created_at']?>
                </span>
                 | 
                <span>
                    Diperbarui Pada : <?php echo $todo['updated_at']?>
                </span>
            </li>
        <?php endforeach; ?>
        <?php endif; ?>
    </ul>
</body>
</html>