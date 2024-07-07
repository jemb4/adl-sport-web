# ADL SPORT WEB
### GUÍA DE INSTALACIÓN LOCAL

#### BACK-END
1. Instalar el servidor local XAMPP.
2. Activamos con la opción "Start" Apache y MySQL
3. Implementar en XAMPP la base de datos, para ello dentro de http://localhost/phpmyadmin/ añadir las sentencias de SQL que se encuentran en el archivo \back-end\BBDD\BaseDatosADL.sql
4. Importar la carpeta completa llamada "back-end" dentro de \xampp\htdocs


#### FRONT-END
1. Abrimos en nuestro IDE la carpeta /front-end/
2. Nos aseguramos de tener node.js instalado en nuesro ordenador.
2. Con el proyecto abierto instalamos node.js:
```sh
cd /"nuestro proyecto"/
npm install
```
3. Desplegamos el proyecto de nuestra aplicación:
```sh
npm run dev
```
4. Cuando se hya desplegado el proyecto, pdoremos abrirlo usando el peurto por defecto [5173](http://localhost:5173/)

#### Extra
Para instalar node.js usar el siguiente enlace: [node](https://nodejs.org/en)