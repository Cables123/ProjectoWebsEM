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


CREATE USER 'intermerium'@'%' IDENTIFIED BY 'TuContraPixa';
GRANT SELECT ON meteorologia.datos TO 'intermerium'@'localhost';
FLUSH PRIVILEGES;