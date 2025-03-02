<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mini CRM - Iniciar Sesion</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body class="bg-light">
<div class="container" style="max-width: 420px; margin-top: 100px;">
    <div class="card shadow-sm">
        <div class="card-body">
            <h4 class="card-title text-center mb-4">Acceso Mini CRM</h4>
            <?php if (isset($error)): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>
            <form action="index.php?ruta=login" method="POST">
                <div class="form-group">
                    <label>Correo electronico</label>
                    <input type="email" name="email" class="form-control" required autofocus placeholder="admin@crm.local">
                </div>
                <div class="form-group">
                    <label>Contrasena</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
