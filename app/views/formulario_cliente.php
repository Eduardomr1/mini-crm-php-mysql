<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mini CRM - <?= $cliente ? 'Editar' : 'Nuevo' ?> Cliente</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container py-5" style="max-width: 600px;">
    <div class="card shadow-sm">
        <div class="card-header bg-white">
            <h5 class="mb-0"><?= $cliente ? 'Editar Prospecto' : 'Nuevo Prospecto' ?></h5>
        </div>
        <div class="card-body">
            <form action="index.php?ruta=<?= $cliente ? 'clientes/editar&id=' . $cliente['id'] : 'clientes/crear' ?>" method="POST">
                <div class="form-group">
                    <label>Nombre Completo *</label>
                    <input type="text" name="nombre" class="form-control" required value="<?= htmlspecialchars($cliente['nombre'] ?? '') ?>">
                </div>
                <div class="form-group">
                    <label>Empresa</label>
                    <input type="text" name="empresa" class="form-control" value="<?= htmlspecialchars($cliente['empresa'] ?? '') ?>">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Email *</label>
                        <input type="email" name="email" class="form-control" required value="<?= htmlspecialchars($cliente['email'] ?? '') ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Telefono</label>
                        <input type="text" name="telefono" class="form-control" value="<?= htmlspecialchars($cliente['telefono'] ?? '') ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Estado</label>
                        <select name="estado" class="form-control">
                            <?php $est = $cliente['estado'] ?? 'nuevo'; ?>
                            <option value="nuevo" <?= $est === 'nuevo' ? 'selected' : '' ?>>Nuevo</option>
                            <option value="contactado" <?= $est === 'contactado' ? 'selected' : '' ?>>Contactado</option>
                            <option value="en_negociacion" <?= $est === 'en_negociacion' ? 'selected' : '' ?>>En Negociacion</option>
                            <option value="ganado" <?= $est === 'ganado' ? 'selected' : '' ?>>Ganado</option>
                            <option value="perdido" <?= $est === 'perdido' ? 'selected' : '' ?>>Perdido</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Valor Estimado ($)</label>
                        <input type="number" step="0.01" name="valor" class="form-control" value="<?= htmlspecialchars($cliente['valor_estimado'] ?? '0.00') ?>">
                    </div>
                </div>
                <div class="d-flex justify-content-between mt-4">
                    <a href="index.php?ruta=dashboard" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Guardar Registro</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
