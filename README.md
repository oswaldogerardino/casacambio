# Descripción del Sistema Casa Cambio

Casa cambio es un sistema de mini facturación, que permite principalmente realizar un proceso de facturación de un único producto monetario, cuyo valor puede ser asignado en la configuración. Alrededor de esta funcionalidad se encuentra control de entidades bancarias, control de facturas, posibilidad de asignar varios puntos de ventas centralizados, control de ingresos diarios por puntos de ventas, control de clientes,etc.

## Caracteristicas
Este sistema está construido con las siguientes tecnologías:


* Larvel 5
* Mysql
* Jquery
* Css3
* Boostrap 3


## Módulos de funcionalidades
* Control de clientes: Permite listar y registrar los clientes que van a ser registrados en las facturaciones.
* Control de bancos: Permite registrar nombres de entidades bancarias.
* Cuentas bancarias: Permite asignar a los clientes registrados, información bancaria detallada, de esta manera al momento de facturar todos los datos cargan automaticamente.
* Control de Facturas: Permite clasificar las facturas entre pendientes, aprobadas y rechazadas, ayudando asi a organizar los procesos principales del sistema.
* Control de ingreso por dia: Esta funcionalidad, permite filtrar por fecha los movimientos que ese dia se realizaron, ya sea en todos los puntos de venta o en uno sólo.
* Estadisticas: Al igual que el ingreso por día, las estadísticas permiten mostar gráficamente según el año seleccionado, los movimientos por mes que se realizaron.
* Control de puestos: Puede registrar cuantos puestos quiera, los puestos permiten colocar un punto de venda individual en distintas areas comerciales, y tener control de ellos por medio de los ingresos diarios de manera centralizada.
* Roles: Permite al administrador crear nombres de nuevos roles para los usuarios.
* Usuarios: Permite crear usuarios y asignarlos a roles especificos, garantizando así un correcto control del personal.
* Permisos: Los permisos de roles, permiten asignar a cada rol funcionalidades distintas, restringuiendo o dando acceso a las distintas funcionalidades del sistema.
* Configuración: La configuración general permite al administrador, asignar el valor de la moneda que se usará de base para los cálculos, en base a esta moneda, se harán los cálculos internos necesarios para convertir la moneda principal en la moneda de su preferencia.

## Licencia
Este sistema es de código abierto, para libre uso, distribución por parte de la comunidad de usuarios.
