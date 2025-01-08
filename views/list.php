<!DOCTYPE html>
<html>
<head>
    <title>To-Do List</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h1>To-Do List</h1>
    <a href="index.php?action=create">Tambah Tugas Baru</a>
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
                <a href="index.php?action=edit&id=<?php echo $todo['id']; ?>">Edit</a>
                 | 
                <a href="index.php?action=delete&id=<?php echo $todo['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus tugas ini?')">Hapus</a>
            </li>
        <?php endforeach; ?>
        <?php endif; ?>
    </ul>
</body>
</html>