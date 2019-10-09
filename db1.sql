/*
SQLyog Community v13.1.2 (64 bit)
MySQL - 10.1.33-MariaDB : Database - db1
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db1` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db1`;

/*Table structure for table `action_log` */

DROP TABLE IF EXISTS `action_log`;

CREATE TABLE `action_log` (
  `id_action` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_planta` int(11) DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL,
  `id_area` int(11) DEFAULT NULL,
  `id_tipo_action` varchar(11) DEFAULT NULL,
  `tor` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `id_creador` int(11) DEFAULT NULL,
  `url_avatar` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id_action`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `action_log` */

insert  into `action_log`(`id_action`,`nombre`,`fecha_inicio`,`fecha_fin`,`id_usuario`,`id_planta`,`id_estado`,`id_area`,`id_tipo_action`,`tor`,`id_creador`,`url_avatar`) values 
(6,'chato','2019-09-08','2019-09-04',2,2,7,2,'0','tttt',89,'sadsadsda'),
(7,'gabriel','2019-09-15','2019-09-28',2,1,8,1,'0','ssssss',1,'detector');

/*Table structure for table `alerta` */

DROP TABLE IF EXISTS `alerta`;

CREATE TABLE `alerta` (
  `id_alerta` int(11) NOT NULL AUTO_INCREMENT,
  `id_tarea` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `mensaje_alerta` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `visto` int(11) DEFAULT NULL,
  `fecha_visto` date DEFAULT NULL,
  `id_destinatario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_alerta`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `alerta` */

insert  into `alerta`(`id_alerta`,`id_tarea`,`fecha`,`mensaje_alerta`,`visto`,`fecha_visto`,`id_destinatario`) values 
(2,5,'2019-09-19','cuidado',50,'2019-09-28',2),
(3,1,'2019-09-13','alertasss',3,'2019-09-28',1);

/*Table structure for table `area` */

DROP TABLE IF EXISTS `area`;

CREATE TABLE `area` (
  `id_area` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `url_avatar` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id_area`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `area` */

insert  into `area`(`id_area`,`nombre`,`url_avatar`) values 
(1,'hola','saluda'),
(2,'jhon david','mecanico');

/*Table structure for table `configuracion` */

DROP TABLE IF EXISTS `configuracion`;

CREATE TABLE `configuracion` (
  `id_configuracion` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `tiempo_notificacion` int(11) DEFAULT NULL,
  `avatar` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `tipo_calendario` int(11) DEFAULT NULL,
  `max_num_notificaciones` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_configuracion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `configuracion` */

insert  into `configuracion`(`id_configuracion`,`id_usuario`,`tiempo_notificacion`,`avatar`,`tipo_calendario`,`max_num_notificaciones`) values 
(2,0,2,'marcosss',2,10),
(3,2,10,'letrinas',6,40);

/*Table structure for table `distribucion` */

DROP TABLE IF EXISTS `distribucion`;

CREATE TABLE `distribucion` (
  `id_distribucion` int(11) NOT NULL AUTO_INCREMENT,
  `id_action_log` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `fecha_distribucion` date DEFAULT NULL,
  PRIMARY KEY (`id_distribucion`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `distribucion` */

insert  into `distribucion`(`id_distribucion`,`id_action_log`,`id_usuario`,`fecha_distribucion`) values 
(4,6,2,'2019-09-28'),
(5,6,1,'2019-09-11');

/*Table structure for table `mensaje` */

DROP TABLE IF EXISTS `mensaje`;

CREATE TABLE `mensaje` (
  `id_mensaje` int(11) NOT NULL AUTO_INCREMENT,
  `mensaje` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `id_origen` int(11) DEFAULT NULL,
  `id_destino` int(11) DEFAULT NULL,
  `fecha_envio` date DEFAULT NULL,
  `fecha_visto` date DEFAULT NULL,
  `id_action` int(11) DEFAULT NULL,
  `visto` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_mensaje`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `mensaje` */

insert  into `mensaje`(`id_mensaje`,`mensaje`,`id_origen`,`id_destino`,`fecha_envio`,`fecha_visto`,`id_action`,`visto`) values 
(2,'menos peligroso',4,4,'2010-05-21','2019-09-21',6,4),
(3,'aletados',10,10,'2019-09-22','2019-09-28',7,20);

/*Table structure for table `notificacion` */

DROP TABLE IF EXISTS `notificacion`;

CREATE TABLE `notificacion` (
  `id_notificacion` int(11) NOT NULL AUTO_INCREMENT,
  `id_tarea` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `mensaje` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `id_usuario_origen` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `id_action_log` int(11) DEFAULT NULL,
  `fecha_visto` date DEFAULT NULL,
  `visto` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_notificacion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `notificacion` */

insert  into `notificacion`(`id_notificacion`,`id_tarea`,`id_usuario`,`mensaje`,`id_usuario_origen`,`fecha`,`id_action_log`,`fecha_visto`,`visto`) values 
(1,7,1,'fdfddfd',5,'2019-09-15',6,'2019-09-28',3),
(2,1,1,'ffff',3,'2019-09-07',7,'2019-09-28',1),
(3,5,2,'menos peligroso',5,'2019-09-15',6,'2019-09-29',2);

/*Table structure for table `participantes` */

DROP TABLE IF EXISTS `participantes`;

CREATE TABLE `participantes` (
  `id_participante` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `id_action_log` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_participante`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `participantes` */

insert  into `participantes`(`id_participante`,`id_usuario`,`id_action_log`) values 
(1,1,0),
(2,2,1),
(3,1,1),
(4,1,1),
(5,2,1),
(6,2,1);

/*Table structure for table `permiso_aplicado` */

DROP TABLE IF EXISTS `permiso_aplicado`;

CREATE TABLE `permiso_aplicado` (
  `id_permiso_aplicado` int(11) NOT NULL AUTO_INCREMENT,
  `id_permiso` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_grupo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_permiso_aplicado`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `permiso_aplicado` */

insert  into `permiso_aplicado`(`id_permiso_aplicado`,`id_permiso`,`id_usuario`,`id_grupo`) values 
(2,0,1,2),
(3,2,1,2);

/*Table structure for table `permiso_aplicado_action_log` */

DROP TABLE IF EXISTS `permiso_aplicado_action_log`;

CREATE TABLE `permiso_aplicado_action_log` (
  `id_permiso_aplicados` int(11) NOT NULL AUTO_INCREMENT,
  `id_action_log` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_permiso` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_permiso_aplicados`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `permiso_aplicado_action_log` */

insert  into `permiso_aplicado_action_log`(`id_permiso_aplicados`,`id_action_log`,`id_usuario`,`id_permiso`) values 
(1,0,12,0),
(2,4,4,4),
(4,1,1,0),
(5,1,1,3);

/*Table structure for table `permiso_aplicado_tarea` */

DROP TABLE IF EXISTS `permiso_aplicado_tarea`;

CREATE TABLE `permiso_aplicado_tarea` (
  `id_permiso_aplicadoss` int(11) NOT NULL AUTO_INCREMENT,
  `id_tarea` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_permiso` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_permiso_aplicadoss`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `permiso_aplicado_tarea` */

insert  into `permiso_aplicado_tarea`(`id_permiso_aplicadoss`,`id_tarea`,`id_usuario`,`id_permiso`) values 
(4,1,1,1),
(5,1,1,1),
(6,5,2,3);

/*Table structure for table `permisos` */

DROP TABLE IF EXISTS `permisos`;

CREATE TABLE `permisos` (
  `id_permiso` int(11) NOT NULL AUTO_INCREMENT,
  `permiso` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `tipo` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id_permiso`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `permisos` */

insert  into `permisos`(`id_permiso`,`permiso`,`tipo`) values 
(1,'detodsss','gggg'),
(3,'investigacion','plantas');

/*Table structure for table `planta` */

DROP TABLE IF EXISTS `planta`;

CREATE TABLE `planta` (
  `id_planta` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_planta` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `ciudad` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `avatar` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id_planta`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `planta` */

insert  into `planta`(`id_planta`,`nombre_planta`,`ciudad`,`avatar`) values 
(1,'ventas','bolivia','lancelo'),
(2,'disÃ±o','bolivia','taraaa');

/*Table structure for table `reporte_problema` */

DROP TABLE IF EXISTS `reporte_problema`;

CREATE TABLE `reporte_problema` (
  `id_reporte_problema` int(11) NOT NULL AUTO_INCREMENT,
  `id_tarea` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `problema` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id_reporte_problema`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `reporte_problema` */

insert  into `reporte_problema`(`id_reporte_problema`,`id_tarea`,`id_usuario`,`fecha`,`problema`) values 
(1,1,1,'2019-09-27','sdsdad'),
(2,1,1,'2019-09-25','modicficar');

/*Table structure for table `responsable` */

DROP TABLE IF EXISTS `responsable`;

CREATE TABLE `responsable` (
  `id_responsable` int(11) NOT NULL AUTO_INCREMENT,
  `id_tarea` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_responsable`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `responsable` */

insert  into `responsable`(`id_responsable`,`id_tarea`,`id_usuario`) values 
(11,2,2),
(12,1,2);

/*Table structure for table `revisar_tarea` */

DROP TABLE IF EXISTS `revisar_tarea`;

CREATE TABLE `revisar_tarea` (
  `id_revision` int(11) NOT NULL AUTO_INCREMENT,
  `id_tarea` int(11) DEFAULT NULL,
  `id_revisor` int(11) DEFAULT NULL,
  `id_participante` int(11) DEFAULT NULL,
  `comentario` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_revision`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `revisar_tarea` */

insert  into `revisar_tarea`(`id_revision`,`id_tarea`,`id_revisor`,`id_participante`,`comentario`,`fecha`,`estado`) values 
(2,1,4,5,'lolollololo','2019-09-21',1),
(3,1,10,3,'jjjjjjj','2019-09-28',5),
(4,5,1,4,'sadsad','2019-09-28',5);

/*Table structure for table `rol_usuario` */

DROP TABLE IF EXISTS `rol_usuario`;

CREATE TABLE `rol_usuario` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_rol` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `rol_usuario` */

insert  into `rol_usuario`(`id_rol`,`nombre_rol`) values 
(1,'coleccionista'),
(2,'teprador');

/*Table structure for table `tareas` */

DROP TABLE IF EXISTS `tareas`;

CREATE TABLE `tareas` (
  `id_tarea` int(11) NOT NULL AUTO_INCREMENT,
  `tarea` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `actions` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `comentario` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `fecha_inicio_actual` date DEFAULT NULL,
  `fecha_fin_actual` date DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL,
  `resultado` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `id_tipo` int(11) DEFAULT NULL,
  `id_action` int(11) DEFAULT NULL,
  `id_creador` int(11) DEFAULT NULL,
  `pasos` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id_tarea`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tareas` */

insert  into `tareas`(`id_tarea`,`tarea`,`actions`,`comentario`,`fecha_registro`,`fecha_inicio`,`fecha_fin`,`fecha_inicio_actual`,`fecha_fin_actual`,`id_estado`,`resultado`,`id_tipo`,`id_action`,`id_creador`,`pasos`) values 
(1,'carpinteria','ffefeffefefeef','hace madea','2019-09-21','2001-05-26','2001-08-15','2019-09-07','2002-02-05',1,'zcasad',1,0,1,'fgfgsgs'),
(5,'redes','dsdadsad','sssssssss','2019-09-22','2010-02-05','2019-09-28','2012-01-25','2012-06-07',1,'dsfsdfsf',4,0,4,'sdfghj'),
(7,'envios','envios de todo','esta bien','2019-09-27','2010-02-03','2019-09-07','2012-01-25','2019-09-09',8,'dsfsdfsf',4,0,2,'11111hgg');

/*Table structure for table `tipo_action_log` */

DROP TABLE IF EXISTS `tipo_action_log`;

CREATE TABLE `tipo_action_log` (
  `id_tipo_action` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_action` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id_tipo_action`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tipo_action_log` */

insert  into `tipo_action_log`(`id_tipo_action`,`tipo_action`) values 
(2,'madera'),
(3,'tablas');

/*Table structure for table `tipo_calendario` */

DROP TABLE IF EXISTS `tipo_calendario`;

CREATE TABLE `tipo_calendario` (
  `id_tipo_calendario` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_calendarios` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id_tipo_calendario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tipo_calendario` */

insert  into `tipo_calendario`(`id_tipo_calendario`,`tipo_calendarios`) values 
(1,'daadda'),
(3,'de idas');

/*Table structure for table `tipo_tarea` */

DROP TABLE IF EXISTS `tipo_tarea`;

CREATE TABLE `tipo_tarea` (
  `id_tipo_tarea` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_tareas` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id_tipo_tarea`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tipo_tarea` */

insert  into `tipo_tarea`(`id_tipo_tarea`,`tipo_tareas`) values 
(2,'limpieza'),
(3,'mantenimient');

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `apellido_pat` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `id_planta` int(11) DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `telf_movil` int(11) DEFAULT NULL,
  `url_avatar` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `apellido_mat` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `user_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `notificacion` int(11) DEFAULT NULL,
  `nombre_completo` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `usuario` */

insert  into `usuario`(`id_usuario`,`nombre`,`apellido_pat`,`password`,`id_planta`,`email`,`telf_movil`,`url_avatar`,`apellido_mat`,`user_name`,`notificacion`,`nombre_completo`) values 
(1,'juan','chambi','dddddd',4,'chambic555@gmail.com',57576576,'dwq','flores','sdsdsds',2,'adsdsadsad'),
(2,'lucas','velas','adrive456',0,'djjota@gmailcoc',6530304,'ssssss','rivera','51564',1,'adriana velasco rivera');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
