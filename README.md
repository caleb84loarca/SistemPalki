# SistemPalki
SISTEMA DE TESIS - UMG 2020

Es un proyecto de desarrollo, para llevar el control de pedidos.

Es programa es hecho con XAMPP como Servidor Local, PHP y conexion a base de datos SQL SERVER, asi mismo he agregado los driver 
necesarios para conexion al gestor de la base de datos.

Las extensiones deben de agregarse manualmente en el archivo "php.ini", del servidor apache, asi mismo dar los permisos necesarios al 
usuario que se conectara a la base de datos. a continuacion el lugar donde se colocaran manualmente las extensiones para PHP a SQL SERVER
segun la version que tengamos de PHP.

----------------------------------------
;extension=pdo_pgsql
extension=pdo_sqlite
;extension=pgsql
;extension=shmop


;extension=php_sqlsrv.dll

extension=php_sqlsrv_73_ts_x64.dll
extension=php_sqlsrv_73_nts_x64.dll

;extension=php_sqlsrv_73_ts_x86.dll



extension=php_pdo_sqlsrv_73_ts_x64.dll
extension=php_pdo_sqlsrv_73_nts_x64.dll

zend_extension = C:\xampp\php\ext\php_xdebug-2.9.8-7.3-vc15-x86_64.dll


; The MIBS data available in the PHP distribution must be installed.
; See http://www.php.net/manual/en/snmp.installation.php
;extension=snmp

;extension=soap
;extension=sockets
;extension=sodium
;extension=sqlite3
;extension=tidy
;extension=xmlrpc
;extension=xsl

;;;;;;;;;;;;;;;;;;;
; Module Settings ;
;;;;;;;;;;;;;;;;;;;
asp_tags=Off
display_startup_errors=On
track_errors=Off
y2k_compliance=On
allow_call_time_pass_reference=Off
safe_mode=Off
