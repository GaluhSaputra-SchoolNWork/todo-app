<!DOCTYPE html>
<html>
<head>
    <title><?php echo isset($todo) ? 'Edit Task' : 'Tambah Task'; ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h1><?php echo isset($todo) ? 'Edit Task' : 'Tambah Task'; ?></h1>
    <form method="post">
        <label for="task">Task:</label><br>
        <input type="text" name="task" value="<?php echo isset($todo) ? htmlspecialchars($todo['task']) : ''; ?>" required><br><br>
        <?php if (isset($todo)) : ?>
            <input type="checkbox" name="completed" <?php echo $todo['completed'] ? 'checked' : ''; ?>>
            <label for="completed">Selesai</label>
            <br><br>
        <?php endif; ?>
        <button type="submit"><?php echo isset($todo) ? 'Simpan Perubahan' : 'Tambah'; ?></button>
        <a href="index.php">Batal</a>
    </form>
</body>
</html>