-- Datos semilla de prueba
INSERT INTO usuarios (nombre, email, password_hash, rol) VALUES
('Administrador', 'admin@crm.local', '$2y$10$w0f5u4yq0x3B6qT3B9w7uO91JgOQ1f7zW6N2jK1yF6H7e9K3Y2Z0u', 'admin'),
('Carlos Vendedor', 'carlos@crm.local', '$2y$10$w0f5u4yq0x3B6qT3B9w7uO91JgOQ1f7zW6N2jK1yF6H7e9K3Y2Z0u', 'agente');

INSERT INTO clientes (nombre, empresa, telefono, email, estado, valor_estimado, creado_por) VALUES
('Roberto Martinez', 'Logistica del Norte', '6621234567', 'roberto@logistica.com', 'ganado', 15000.00, 1),
('Ana Lucia Gomez', 'Comercializadora MX', '6629876543', 'ana@comercializadora.com', 'en_negociacion', 8500.00, 2),
('Hector Valenzuela', 'Consultoria TI', '6625551234', 'hector@consultoriati.com', 'nuevo', 4200.00, 1);
