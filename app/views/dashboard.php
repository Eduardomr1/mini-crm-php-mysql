<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mini CRM - Panel de Clientes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="index.php?ruta=dashboard">Mini CRM</a>
        <div class="navbar-nav ml-auto">
            <span class="navbar-text mr-3">Hola, <?= htmlspecialchars($_SESSION['usuario_nombre']) ?></span>
            <a class="btn btn-outline-light btn-sm" href="index.php?ruta=logout">Cerrar Sesion</a>
        </div>
    </div>
</nav>

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Listado de Prospectos & Clientes</h2>
        <a href="index.php?ruta=clientes/crear" class="btn btn-success">+ Nuevo Prospecto</a>
    </div>

    <div class="mb-3 btn-group">
        <a href="index.php?ruta=dashboard" class="btn btn-outline-secondary btn-sm">Todos</a>
        <a href="index.php?ruta=dashboard&estado=nuevo" class="btn btn-outline-secondary btn-sm">Nuevos</a>
        <a href="index.php?ruta=dashboard&estado=en_negociacion" class="btn btn-outline-secondary btn-sm">En Negociacion</a>
        <a href="index.php?ruta=dashboard&estado=ganado" class="btn btn-outline-secondary btn-sm">Ganados</a>
    </div>

    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="thead-light">
                    <tr>
                        <th>Nombre</th>
                        <th>Empresa</th>
                        <th>Email / Telefono</th>
                        <th>Estado</th>
                        <th>Valor Est.</th>
                        <th>Agente</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($clientes)): ?>
                        <tr><td colspan="7" class="text-center py-4 text-muted">No hay registros para mostrar.</td></tr>
                    <?php else: ?>
                        <?php foreach ($clientes as $c): ?>
                            <tr>
                                <td><strong><?= htmlspecialchars($c['nombre']) ?></strong></td>
                                <td><?= htmlspecialchars($c['empresa'] ?: '-') ?></td>
                                <td>
                                    <small><?= htmlspecialchars($c['email']) ?><br><?= htmlspecialchars($c['telefono'] ?: '-') ?></small>
                                </td>
                                <td><span class="badge badge-<?= $c['estado'] ?>"><?= strtoupper(str_replace('_', ' ', $c['estado'])) ?></span></td>
                                <td>$<?= number_format($c['valor_estimado'], 2) ?></td>
                                <td><small class="text-muted"><?= htmlspecialchars($c['agente_nombre']) ?></small></td>
                                <td>
                                    <a href="index.php?ruta=clientes/editar&id=<?= $c['id'] ?>" class="btn btn-sm btn-outline-primary">Editar</a>
                                    <a href="index.php?ruta=clientes/eliminar&id=<?= $c['id'] ?>" onclick="return confirm('¿Eliminar prospecto?');" class="btn btn-sm btn-outline-danger">Borrar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
