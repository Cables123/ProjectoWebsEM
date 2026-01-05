CREATE DATABASE meteorologia;

CREATE TABLE meteorologia.datos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fecha_hora DATETIME DEFAULT CURRENT_TIMESTAMP,
    utmx DECIMAL(10, 2),
    utmy DECIMAL(10, 2),
    temperatura FLOAT,
    humedad FLOAT,
    presion FLOAT,
    viento FLOAT
);

INSERT INTO registros (utmx, utmy, temperatura, humedad, presion, viento) 
VALUES (419234.5, 4582312.1, 18.5, 65.0, 1013.2, 12.5);