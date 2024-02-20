-- Base de datos suyachiy
CREATE DATABASE suyachiy;
USE suyachiy;

-- Tabla de Tipos de Usuario
CREATE TABLE tipos_usuario (
    id_tipo_usuario INT AUTO_INCREMENT PRIMARY KEY,
    tipo_usuario VARCHAR(50)
);

-- Tabla de Ubicaciones
CREATE TABLE ubicaciones (
    id_ubicacion INT AUTO_INCREMENT PRIMARY KEY,
    ubicacion VARCHAR(100)
);

-- Tabla de Usuarios
CREATE TABLE usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50),
    apellido VARCHAR(50),
    email VARCHAR(100) UNIQUE,
    contraseña VARCHAR(255),
    tipo_usuario_id INT,
    foto_perfil VARCHAR(255),
    ubicacion_id INT,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (tipo_usuario_id) REFERENCES tipos_usuario(id_tipo_usuario),
    FOREIGN KEY (ubicacion_id) REFERENCES ubicaciones(id_ubicacion)
);

-- Tabla de Viajes
CREATE TABLE viajes (
    id_viaje INT AUTO_INCREMENT PRIMARY KEY,
    conductor_id INT,
    origen_id INT,
    destino_id INT,
    fecha_salida DATETIME,
    fecha_llegada DATETIME,
    precio DECIMAL(10, 2),
    plazas_disponibles INT,
    FOREIGN KEY (conductor_id) REFERENCES usuarios(id_usuario),
    FOREIGN KEY (origen_id) REFERENCES ubicaciones(id_ubicacion),
    FOREIGN KEY (destino_id) REFERENCES ubicaciones(id_ubicacion)
);

-- Tabla de Reservas
CREATE TABLE reservas (
    id_reserva INT AUTO_INCREMENT PRIMARY KEY,
    pasajero_id INT,
    viaje_id INT,
    fecha_reserva TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    estado_reserva VARCHAR(20),
    FOREIGN KEY (pasajero_id) REFERENCES usuarios(id_usuario),
    FOREIGN KEY (viaje_id) REFERENCES viajes(id_viaje)
);

-- Tabla de Vehículos
CREATE TABLE vehiculos (
    id_vehiculo INT AUTO_INCREMENT PRIMARY KEY,
    conductor_id INT,
    marca VARCHAR(50),
    modelo VARCHAR(50),
    año INT,
    capacidad_pasajeros INT,
    foto_vehiculo VARCHAR(255),
    FOREIGN KEY (conductor_id) REFERENCES usuarios(id_usuario)
);

-- Tabla de Pagos
CREATE TABLE pagos (
    id_pago INT AUTO_INCREMENT PRIMARY KEY,
    reserva_id INT,
    monto DECIMAL(10, 2),
    metodo_pago VARCHAR(50),
    estado_pago VARCHAR(20),
    fecha_pago TIMESTAMP,
    FOREIGN KEY (reserva_id) REFERENCES reservas(id_reserva)
);

-- Tabla de Fotos de Viajes
CREATE TABLE fotos_viajes (
    id_foto_viaje INT AUTO_INCREMENT PRIMARY KEY,
    viaje_id INT,
    usuario_id INT,
    ruta_foto VARCHAR(255),
    FOREIGN KEY (viaje_id) REFERENCES viajes(id_viaje),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id_usuario)
);

-- Tabla de Empresas Asociadas
CREATE TABLE empresas_asociadas (
    id_empresa INT AUTO_INCREMENT PRIMARY KEY,
    nombre_empresa VARCHAR(100),
    ubicacion_id INT,
    contacto_empresa VARCHAR(100),
    logo_empresa VARCHAR(255),
    FOREIGN KEY (ubicacion_id) REFERENCES ubicaciones(id_ubicacion)
);

-- Tabla de Calificaciones de Viajes
CREATE TABLE calificaciones_viajes (
    id_calificacion_viaje INT AUTO_INCREMENT PRIMARY KEY,
    viaje_id INT,
    pasajero_id INT,
    calificacion_viaje INT,
    comentario_viaje TEXT,
    FOREIGN KEY (viaje_id) REFERENCES viajes(id_viaje),
    FOREIGN KEY (pasajero_id) REFERENCES usuarios(id_usuario)
);

-- Tabla de Calificaciones de Conductores
CREATE TABLE calificaciones_conductores (
    id_calificacion_conductor INT AUTO_INCREMENT PRIMARY KEY,
    conductor_id INT,
    pasajero_id INT,
    calificacion_conductor INT,
    comentario_conductor TEXT,
    FOREIGN KEY (conductor_id) REFERENCES usuarios(id_usuario),
    FOREIGN KEY (pasajero_id) REFERENCES usuarios(id_usuario)
);

-- Tabla de Preferencias de Usuarios
CREATE TABLE preferencias_usuarios (
    id_preferencia INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    preferencia VARCHAR(100),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id_usuario)
);

-- Tabla de Publicidad
CREATE TABLE publicidad (
    id_publicidad INT AUTO_INCREMENT PRIMARY KEY,
    contenido_publicitario TEXT,
    fecha_inicio DATE,
    fecha_fin DATE
);

-- Tabla de Socios Comerciales
CREATE TABLE socios_comerciales (
    id_socio INT AUTO_INCREMENT PRIMARY KEY,
    empresa_id INT,
    usuario_id INT,
    tipo_socio VARCHAR(50),
    FOREIGN KEY (empresa_id) REFERENCES empresas_asociadas(id_empresa),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id_usuario)
);

-- Tablas de Seguridad y Auditoría
CREATE TABLE sesiones (
    id_sesion INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    fecha_inicio DATETIME,
    fecha_fin DATETIME,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id_usuario)
);

CREATE TABLE registros_acceso (
    id_registro_acceso INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    fecha_acceso DATETIME,
    tipo_acceso VARCHAR(50),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id_usuario)
);

CREATE TABLE registros_modificaciones (
    id_registro_modificacion INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    fecha_modificacion DATETIME,
    tabla_modificada VARCHAR(50),
    tipo_modificacion VARCHAR(20)
);


-- Inserciones
-- Tabla de Tipos de Usuario
INSERT INTO tipos_usuario (tipo_usuario) VALUES
('Pasajero'),
('Conductor'),
('Administrador');

-- Tabla de Ubicaciones
INSERT INTO ubicaciones (ubicacion) VALUES
('Lima'),
('Cusco'),
('Arequipa');

-- Tabla de Usuarios
INSERT INTO usuarios (nombre, apellido, email, contraseña, tipo_usuario_id, foto_perfil, ubicacion_id) VALUES
('Juan', 'Perez', 'juan@gmail.com', 'hashedpassword1', 1, 'ruta_foto1.jpg', 1),
('Maria', 'Gomez', 'maria@gmail.com', 'hashedpassword2', 1, 'ruta_foto2.jpg', 2),
('Pedro', 'Ramirez', 'pedro@gmail.com', 'hashedpassword3', 2, 'ruta_foto3.jpg', 3);

-- Tabla de Viajes
INSERT INTO viajes (conductor_id, origen_id, destino_id, fecha_salida, fecha_llegada, precio, plazas_disponibles) VALUES
(2, 1, 2, '2024-02-25 08:00:00', '2024-02-25 15:00:00', 50.00, 10),
(3, 2, 1, '2024-02-26 10:00:00', '2024-02-26 18:00:00', 70.00, 8),
(2, 3, 1, '2024-02-27 12:00:00', '2024-02-27 20:00:00', 60.00, 12);

-- Tabla de Reservas
INSERT INTO reservas (pasajero_id, viaje_id, estado_reserva) VALUES
(1, 1, 'Confirmada'),
(2, 2, 'Pendiente'),
(3, 3, 'Confirmada');

-- Tabla de Vehículos
INSERT INTO vehiculos (conductor_id, marca, modelo, año, capacidad_pasajeros, foto_vehiculo) VALUES
(2, 'Toyota', 'Corolla', 2018, 4, 'ruta_foto1.jpg'),
(3, 'Hyundai', 'Tucson', 2019, 6, 'ruta_foto2.jpg'),
(2, 'Kia', 'Sportage', 2020, 5, 'ruta_foto3.jpg');

-- Tabla de Pagos
INSERT INTO pagos (reserva_id, monto, metodo_pago, estado_pago, fecha_pago) VALUES
(1, 50.00, 'Tarjeta de crédito', 'Completado', '2024-02-20 09:00:00'),
(2, 70.00, 'PayPal', 'Pendiente', '2024-02-21 10:00:00'),
(3, 60.00, 'Efectivo', 'Completado', '2024-02-22 11:00:00');

-- Tabla de Fotos de Viajes
INSERT INTO fotos_viajes (viaje_id, usuario_id, ruta_foto) VALUES
(1, 1, 'ruta_foto1.jpg'),
(2, 2, 'ruta_foto2.jpg'),
(3, 3, 'ruta_foto3.jpg');

-- Tabla de Empresas Asociadas
INSERT INTO empresas_asociadas (nombre_empresa, ubicacion_id, contacto_empresa, logo_empresa) VALUES
('Empresa1', 1, 'contacto1@gmail.com', 'ruta_logo1.jpg'),
('Empresa2', 2, 'contacto2@gmail.com', 'ruta_logo2.jpg'),
('Empresa3', 3, 'contacto3@gmail.com', 'ruta_logo3.jpg');

-- Tabla de Calificaciones de Viajes
INSERT INTO calificaciones_viajes (viaje_id, pasajero_id, calificacion_viaje, comentario_viaje) VALUES
(1, 1, 4, 'Buen viaje'),
(2, 2, 3, 'Conductor amable'),
(3, 3, 5, 'Excelente servicio');

-- Tabla de Preferencias de Usuarios
INSERT INTO preferencias_usuarios (usuario_id, preferencia) VALUES
(1, 'Asientos preferenciales'),
(2, 'Viajes largos'),
(3, 'Servicio de música');

-- Tabla de Publicidad
INSERT INTO publicidad (contenido_publicitario, fecha_inicio, fecha_fin) VALUES
('Oferta especial: 20% de descuento en todos los viajes', '2024-02-01', '2024-02-28'),
('Promoción: 2x1 en viajes durante el mes de marzo', '2024-03-01', '2024-03-31'),
('Nuevos destinos disponibles: ¡Planifica tu próximo viaje!', '2024-04-01', '2024-04-30');

-- Tabla de Socios Comerciales
INSERT INTO socios_comerciales (empresa_id, usuario_id, tipo_socio) VALUES
(1, 1, 'Afiliado'),
(2, 2, 'Afiliado'),
(3, 3, 'Afiliado');

-- Tablas de Seguridad y Auditoría
INSERT INTO sesiones (usuario_id, fecha_inicio, fecha_fin) VALUES
(1, '2024-02-20 08:00:00', '2024-02-20 10:00:00'),
(2, '2024-02-20 09:00:00', '2024-02-20 11:00:00'),
(3, '2024-02-20 10:00:00', '2024-02-20 12:00:00');

INSERT INTO registros_acceso (usuario_id, fecha_acceso, tipo_acceso) VALUES
(1, '2024-02-20 08:00:00', 'Inicio de sesión'),
(2, '2024-02-20 09:00:00', 'Inicio de sesión'),
(3, '2024-02-20 10:00:00', 'Inicio de sesión');

INSERT INTO registros_modificaciones (usuario_id, fecha_modificacion, tabla_modificada, tipo_modificacion) VALUES
(1, '2024-02-20 08:00:00', 'usuarios', 'Inserción'),
(2, '2024-02-20 09:00:00', 'usuarios', 'Inserción'),
(3, '2024-02-20 10:00:00', 'usuarios', 'Inserción');