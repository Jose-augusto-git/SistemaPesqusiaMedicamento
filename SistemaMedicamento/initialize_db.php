<?php
$dbPath = __DIR__ . '/database.db';

try {
    $pdo = new PDO('sqlite:' . $dbPath);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Initialising database...\n";

    // Create 'sistema' table
    $pdo->exec("CREATE TABLE IF NOT EXISTS sistema (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        medicamentos TEXT NOT NULL,
        abreviacao TEXT,
        latim TEXT,
        fonte TEXT,
        principal TEXT
    )");
    echo "Table 'sistema' ready.\n";

    // Create 'usuarios' table
    $pdo->exec("CREATE TABLE IF NOT EXISTS usuarios (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nome TEXT NOT NULL,
        email TEXT NOT NULL UNIQUE,
        senha TEXT NOT NULL,
        adm INTEGER DEFAULT 0
    )");
    echo "Table 'usuarios' ready.\n";

    // Insert admin user if not exists
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM usuarios WHERE email = 'admin@admin.com'");
    $stmt->execute();
    if ($stmt->fetchColumn() == 0) {
        $pdo->exec("INSERT INTO usuarios (nome, email, senha, adm) VALUES ('Administrador', 'admin@admin.com', '123456', 1)");
        echo "Admin user created (admin@admin.com / 123456).\n";
    }

    echo "Database initialization complete.\n";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>
