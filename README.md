# ProjectoWebsEM
Proyecto Webs Estacion Meteorológica

# Instalacion

### Apache y MySQL:
```sh
apt install apache2 mysql-server
```

### Modulos de php
```sh
apt install php libapache2-mod-php && apt install php-mysql
```

### Configuracio de la base de dades
```sh
sudo mysql -u root
```
Copiamos el codigo de "script.sql" dentro de la carpeta mysql, enter y ya tenemos la BBDD.
Recordar configurar en `etc/mysql/` el `bind-address =` es necesario tambien el puerto 


#### (Opcional) Usuario administrador para conectarse por phpmyadmin
```sql
CREATE USER 'usuario'@'%' IDENTIFIED BY 'contra';
GRANT ALL PRIVILEGES ON *.* TO 'usuario'@'%' WITH GRANT OPTION;
FLUSH PRIVILEGES;
```
#### (Opcional) Instalar phpmyadmin
```sh
apt install mysql-server && apt install phpmyadmin
```
dentro de la configuracion de phpmyadmin alfinal de todo ponemos esto:
```sh
$i++;
$cfg['Servers'][$i]['host'] = 'ip:puerto'; //ip y puerto
$cfg['Servers'][$i]['user'] = 'usuario'; //aqui obviamente el nombre de usuario
$cfg['Servers'][$i]['password'] = 'contra';
$cfg['Servers'][$i]['auth_type'] = 'config';
```
### Insertar al apache la pagina:
```sh
cd /var/www/
wget https://github.com/Cables123/ProjectoWebsEM/releases/download/release/html-webs-cables123.zip
rm -rf html/
unzip html-webs-cables123.zip
```

>Si queremos insertar dummydata dentro de la carpeta mysql y copiamos o descargamos el "dummydata.php" necesitaras un usuario administrador.