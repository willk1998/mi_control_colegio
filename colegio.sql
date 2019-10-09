/*
SQLyog Community v13.1.5  (64 bit)
MySQL - 10.1.40-MariaDB : Database - colegio
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`colegio` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `colegio`;

/*Table structure for table `asistencia` */

DROP TABLE IF EXISTS `asistencia`;

CREATE TABLE `asistencia` (
  `id_asistencia` int(18) NOT NULL AUTO_INCREMENT,
  `estado` varchar(50) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `id_estudiante` int(18) DEFAULT NULL,
  `id_curso` int(18) DEFAULT NULL,
  `id_materia` int(18) DEFAULT NULL,
  `id_profesor` int(18) DEFAULT NULL,
  PRIMARY KEY (`id_asistencia`),
  KEY `id_estudiante` (`id_estudiante`),
  KEY `id_curso` (`id_curso`),
  KEY `id_materia` (`id_materia`),
  KEY `id_profesor` (`id_profesor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `asistencia` */

/*Table structure for table `bimestre` */

DROP TABLE IF EXISTS `bimestre`;

CREATE TABLE `bimestre` (
  `id_bimestre` int(18) NOT NULL AUTO_INCREMENT,
  `bimestre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_bimestre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `bimestre` */

/*Table structure for table `curso` */

DROP TABLE IF EXISTS `curso`;

CREATE TABLE `curso` (
  `id_curso` int(18) NOT NULL AUTO_INCREMENT,
  `curso` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_curso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `curso` */

/*Table structure for table `estudiante` */

DROP TABLE IF EXISTS `estudiante`;

CREATE TABLE `estudiante` (
  `id_estudiante` int(18) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `ap_pt` varchar(100) DEFAULT NULL,
  `ap_mt` varchar(100) DEFAULT NULL,
  `cargo` varchar(100) DEFAULT NULL,
  `ci` int(18) DEFAULT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `celular` int(18) DEFAULT NULL,
  `id_padre` int(18) DEFAULT NULL,
  `id_profesor` int(18) DEFAULT NULL,
  `foto` blob,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id_estudiante`),
  KEY `id_padre` (`id_padre`),
  KEY `id_profesor` (`id_profesor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `estudiante` */

/*Table structure for table `materia` */

DROP TABLE IF EXISTS `materia`;

CREATE TABLE `materia` (
  `id_materia` int(18) NOT NULL AUTO_INCREMENT,
  `materia` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_materia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `materia` */

/*Table structure for table `notas` */

DROP TABLE IF EXISTS `notas`;

CREATE TABLE `notas` (
  `id_nota` int(18) NOT NULL AUTO_INCREMENT,
  `nota` int(18) DEFAULT NULL,
  `id_bimestre` int(18) DEFAULT NULL,
  `id_materia` int(18) DEFAULT NULL,
  `id_curso` int(18) DEFAULT NULL,
  `id_profesor` int(18) DEFAULT NULL,
  PRIMARY KEY (`id_nota`),
  KEY `id_bimestre` (`id_bimestre`),
  KEY `id_materia` (`id_materia`),
  KEY `id_curso` (`id_curso`),
  KEY `id_profesor` (`id_profesor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `notas` */

/*Table structure for table `padre_familia` */

DROP TABLE IF EXISTS `padre_familia`;

CREATE TABLE `padre_familia` (
  `id_padre` int(18) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `ap_pt` varchar(100) DEFAULT NULL,
  `ap_mt` varchar(100) DEFAULT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  `ci` int(18) DEFAULT NULL,
  `password` int(18) DEFAULT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `celular` int(18) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `foto` blob,
  PRIMARY KEY (`id_padre`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `padre_familia` */

insert  into `padre_familia`(`id_padre`,`nombre`,`ap_pt`,`ap_mt`,`cargo`,`ci`,`password`,`direccion`,`celular`,`fecha`,`foto`) values 
(1,'w','w','w','w',4,4,'e',4,'2019-10-09',NULL),
(2,'william','villca','sandoval','padre',8787,0,'av cbba',8999898,'0000-00-00',NULL),
(3,'william','villca','sandoval','padre',8787,0,'zxc',8999898,'0000-00-00',NULL);

/*Table structure for table `paralelo` */

DROP TABLE IF EXISTS `paralelo`;

CREATE TABLE `paralelo` (
  `id_paralelo` int(18) NOT NULL AUTO_INCREMENT,
  `paralelo` varchar(18) DEFAULT NULL,
  PRIMARY KEY (`id_paralelo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `paralelo` */

/*Table structure for table `prof_curso` */

DROP TABLE IF EXISTS `prof_curso`;

CREATE TABLE `prof_curso` (
  `id` int(18) NOT NULL AUTO_INCREMENT,
  `id_curso` int(18) DEFAULT NULL,
  `id_materia` int(18) DEFAULT NULL,
  `id_profesor` int(18) DEFAULT NULL,
  `id_paralelo` int(18) DEFAULT NULL,
  `id_estudiante` int(18) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_curso` (`id_curso`),
  KEY `id_materia` (`id_materia`),
  KEY `id_profesor` (`id_profesor`),
  KEY `id_paralelo` (`id_paralelo`),
  KEY `id_estudiante` (`id_estudiante`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `prof_curso` */

insert  into `prof_curso`(`id`,`id_curso`,`id_materia`,`id_profesor`,`id_paralelo`,`id_estudiante`) values 
(2,1,1,1,1,1),
(3,2,2,2,2,2),
(4,2,1,1,1,1),
(5,1,1,1,1,1);

/*Table structure for table `profesor` */

DROP TABLE IF EXISTS `profesor`;

CREATE TABLE `profesor` (
  `id_profesor` int(18) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `ap_pt` varchar(100) DEFAULT NULL,
  `ap_mt` varchar(100) DEFAULT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  `ci` int(18) DEFAULT NULL,
  `password` int(18) DEFAULT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `celular` int(18) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `foto` blob,
  PRIMARY KEY (`id_profesor`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `profesor` */

insert  into `profesor`(`id_profesor`,`nombre`,`ap_pt`,`ap_mt`,`cargo`,`ci`,`password`,`direccion`,`celular`,`fecha`,`foto`) values 
(1,'william','villca','sandoval','profesor',8837331,123456,'av. cochabamba',72781024,'2019-09-12',NULL);

/* Procedure structure for procedure `PA_BUSCARADMINISTRADOR` */

/*!50003 DROP PROCEDURE IF EXISTS  `PA_BUSCARADMINISTRADOR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `PA_BUSCARADMINISTRADOR`(IN `codigo` INT)
BEGIN
SELECT
personal.pers_nombres,
personal.pers_apellidoPate,
personal.pers_apellidoMate,
usuario.usu_foto,
usuario.cod_usuario,
personal.pers_email,
personal.pers_telefono,
personal.pers_movil,
usuario.usu_clave,
personal.pers_direccion,
personal.pers_fechaNacimiento,
personal.pers_dni,
personal.pers_sexo
FROM
usuario
INNER JOIN personal ON personal.usuario_cod = usuario.cod_usuario
where personal.personal_cod = codigo;
END */$$
DELIMITER ;

/* Procedure structure for procedure `PA_EDITARAREA` */

/*!50003 DROP PROCEDURE IF EXISTS  `PA_EDITARAREA` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `PA_EDITARAREA`(IN `CODIGO` INT, IN `AREA` VARCHAR(80), IN `ESTADO` VARCHAR(30))
BEGIN
UPDATE area SET
area_nombre = AREA,
area_estado = ESTADO
WHERE area_cod = CODIGO;
END */$$
DELIMITER ;

/* Procedure structure for procedure `PA_EDITARCIUDADANOTODOS` */

/*!50003 DROP PROCEDURE IF EXISTS  `PA_EDITARCIUDADANOTODOS` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `PA_EDITARCIUDADANOTODOS`(IN `codigo` INT, IN `nombre` VARCHAR(100), IN `apePat` VARCHAR(50), IN `apeMat` VARCHAR(50), IN `tipopersona` VARCHAR(20), IN `telefo` VARCHAR(9), IN `movil` VARCHAR(9), IN `direc` VARCHAR(300), IN `fecha` DATE, IN `nrodocume` CHAR(8), IN `email` VARCHAR(100))
BEGIN
UPDATE ciudadano SET
ciud_nombres = nombre,
ciud_apellidoPate = apePat,
ciud_apellidoMate = apeMat,
ciud_email = email,
ciud_telefono = telefo,
ciud_movil = movil,
ciud_direccion = direc,
ciud_fechaNacimiento = fecha,
ciud_dni = nrodocume,
ciud_tipo=tipopersona
WHERE ciudadano_cod = codigo;
END */$$
DELIMITER ;

/* Procedure structure for procedure `PA_EDITARINSTITUCION` */

/*!50003 DROP PROCEDURE IF EXISTS  `PA_EDITARINSTITUCION` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `PA_EDITARINSTITUCION`(IN `codigo` INT, IN `institucion` VARCHAR(150), IN `tipo` VARCHAR(50), IN `estado` VARCHAR(20))
BEGIN
UPDATE institucion SET
inst_nombre = institucion,
inst_tipoinstitucion=tipo,
inst_estado=estado
WHERE institucion_cod = codigo;
END */$$
DELIMITER ;

/* Procedure structure for procedure `PA_EDITARPERSONAL` */

/*!50003 DROP PROCEDURE IF EXISTS  `PA_EDITARPERSONAL` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `PA_EDITARPERSONAL`(IN `codigo` CHAR(10), IN `nombre` VARCHAR(100), IN `apePat` VARCHAR(50), IN `apeMat` VARCHAR(50), IN `email` VARCHAR(100), IN `telefo` CHAR(13), IN `movil` CHAR(13), IN `direc` VARCHAR(200), IN `fecha` VARCHAR(20), IN `dni` VARCHAR(13))
BEGIN
UPDATE personal SET
pers_nombres = nombre,
pers_apellidoPate = apePat,
pers_apellidoMate = apeMat,
pers_email = email,
pers_telefono = telefo,
pers_movil = movil,
pers_direccion = direc,
pers_fechaNacimiento = fecha,
pers_dni = dni
WHERE personal_cod = codigo;
END */$$
DELIMITER ;

/* Procedure structure for procedure `PA_EDITARPERSONALTODOS` */

/*!50003 DROP PROCEDURE IF EXISTS  `PA_EDITARPERSONALTODOS` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `PA_EDITARPERSONALTODOS`(IN `codigo` INT, IN `nombre` VARCHAR(100), IN `apePat` VARCHAR(50), IN `apeMat` VARCHAR(50), IN `telefo` VARCHAR(9), IN `movil` VARCHAR(9), IN `direc` VARCHAR(300), IN `fecha` DATE, IN `nrodocume` CHAR(8), IN `email` VARCHAR(100), IN `estado` VARCHAR(20))
BEGIN
UPDATE personal SET
pers_nombres = nombre,
pers_apellidoPate = apePat,
pers_apellidoMate = apeMat,
pers_email = email,
pers_telefono = telefo,
pers_movil = movil,
pers_direccion = direc,
pers_fechaNacimiento = fecha,
pers_dni = nrodocume,
pers_estado = estado 
WHERE personal_cod = codigo;
END */$$
DELIMITER ;

/* Procedure structure for procedure `PA_EDITARTIPODOCUMENTO` */

/*!50003 DROP PROCEDURE IF EXISTS  `PA_EDITARTIPODOCUMENTO` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `PA_EDITARTIPODOCUMENTO`(IN `CODIGO` INT, IN `NOMBRE` VARCHAR(250), IN `ESTADO` VARCHAR(20))
BEGIN
UPDATE tipo_documento 
SET
tipodo_descripcion = NOMBRE,
tipodo_estado = ESTADO
WHERE tipodocumento_cod = CODIGO;
END */$$
DELIMITER ;

/* Procedure structure for procedure `PA_EDITARUSUARIO` */

/*!50003 DROP PROCEDURE IF EXISTS  `PA_EDITARUSUARIO` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `PA_EDITARUSUARIO`(IN `usuario` VARCHAR(30), IN `actual` VARCHAR(30), IN `nueva` VARCHAR(30))
BEGIN
UPDATE usuario u
SET
u.usu_clave = nueva
WHERE u.usu_nombre = usuario AND u.usu_clave = actual;
END */$$
DELIMITER ;

/* Procedure structure for procedure `PA_REGISTRARAREA` */

/*!50003 DROP PROCEDURE IF EXISTS  `PA_REGISTRARAREA` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `PA_REGISTRARAREA`(IN `NOMBRE` VARCHAR(50))
BEGIN
INSERT INTO area (area_nombre,area_estado) VALUES(NOMBRE,'ACTIVO');
END */$$
DELIMITER ;

/* Procedure structure for procedure `PA_REGISTRARCIUDADANO` */

/*!50003 DROP PROCEDURE IF EXISTS  `PA_REGISTRARCIUDADANO` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `PA_REGISTRARCIUDADANO`(IN `nombre` VARCHAR(100), IN `apePat` VARCHAR(50), IN `apeMat` VARCHAR(50), IN `tipope` VARCHAR(50), IN `telefo` CHAR(9), IN `movil` CHAR(9), IN `direcc` VARCHAR(250), IN `fecnac` DATE, IN `dni` CHAR(8), IN `email` VARCHAR(30), IN `genero` CHAR(1))
BEGIN
INSERT INTO ciudadano(ciud_nombres,ciud_apellidoPate,ciud_apellidoMate,ciud_dni,ciud_sexo,ciud_fechaNacimiento,ciud_direccion,ciud_telefono,ciud_movil,ciud_email,ciud_estado,ciud_tipo) VALUES
(nombre,apePat,apeMat,dni,genero,fecnac,direcc,telefo,movil,email,'ACTIVO',tipope);
END */$$
DELIMITER ;

/* Procedure structure for procedure `PA_REGISTRARDOCUMENTO` */

/*!50003 DROP PROCEDURE IF EXISTS  `PA_REGISTRARDOCUMENTO` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `PA_REGISTRARDOCUMENTO`(IN `iddocumento` CHAR(13), IN `asunto` VARCHAR(150), IN `idtipodocu` INT, IN `idarea` INT, IN `idremitente` INT, IN `idusuario` INT, IN `opcion` VARCHAR(10))
BEGIN
INSERT INTO documento (documento_cod,doc_asunto,tipoDocumento_cod,area_cod,usu_cod,doc_estado,doc_tipo) VALUES
(iddocumento,asunto,idtipodocu,idarea,idusuario,'PENDIENTE',opcion);
IF opcion = 'C' THEN
INSERT INTO detalle_ciudadano (ciudadano_cod,documento_cod) VALUES (idremitente,iddocumento);
END IF;
IF opcion = 'I' THEN
INSERT INTO detalle_institucion(institucion_cod,documento_cod) VALUES (idremitente,iddocumento);
END IF;
END */$$
DELIMITER ;

/* Procedure structure for procedure `PA_REGISTRARDOCUMENTOARCHIVO` */

/*!50003 DROP PROCEDURE IF EXISTS  `PA_REGISTRARDOCUMENTOARCHIVO` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `PA_REGISTRARDOCUMENTOARCHIVO`(IN `iddocumento` CHAR(13), IN `asunto` VARCHAR(150), IN `idtipodocu` INT, IN `idarea` INT, IN `idremitente` INT, IN `idusuario` INT, IN `opcion` VARCHAR(10), IN `archivo` VARCHAR(350), IN `cont` INT)
BEGIN
IF cont = 0 THEN
	INSERT INTO documento (documento_cod,doc_asunto,tipoDocumento_cod,area_cod,usu_cod,doc_estado,doc_tipo) VALUES
(iddocumento,asunto,idtipodocu,idarea,idusuario,'PENDIENTE',opcion);
END IF;
IF cont = 1 THEN
	INSERT INTO documento (documento_cod,doc_asunto,tipoDocumento_cod,area_cod,usu_cod,doc_estado,doc_tipo,doc_documento) VALUES
(iddocumento,asunto,idtipodocu,idarea,idusuario,'PENDIENTE',opcion,archivo);
END IF;
IF opcion = 'C' THEN
		INSERT INTO detalle_ciudadano (ciudadano_cod,documento_cod) VALUES (idremitente,iddocumento);
END IF;
IF opcion = 'I' THEN
		INSERT INTO detalle_institucion(institucion_cod,documento_cod) VALUES (idremitente,iddocumento);
END IF;
END */$$
DELIMITER ;

/* Procedure structure for procedure `PA_REGISTRARINSTITUCION` */

/*!50003 DROP PROCEDURE IF EXISTS  `PA_REGISTRARINSTITUCION` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `PA_REGISTRARINSTITUCION`(IN `institucion` VARCHAR(150), IN `tipo` VARCHAR(50))
BEGIN
INSERT INTO institucion(inst_nombre,inst_tipoinstitucion,inst_estado) VALUES(institucion,tipo,'ACTIVO');
END */$$
DELIMITER ;

/* Procedure structure for procedure `PA_REGISTRARPERSONAL` */

/*!50003 DROP PROCEDURE IF EXISTS  `PA_REGISTRARPERSONAL` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `PA_REGISTRARPERSONAL`(IN `nombre` VARCHAR(100), IN `apePat` VARCHAR(50), IN `apeMat` VARCHAR(50), IN `telefo` CHAR(9), IN `movil` CHAR(9), IN `direcc` VARCHAR(250), IN `fecnac` DATE, IN `dni` CHAR(8), IN `email` VARCHAR(30), IN `genero` CHAR(1), IN `usuario` VARCHAR(50), IN `clave` VARCHAR(50), IN `tipousario` INT, IN `puesto` VARCHAR(30))
BEGIN
INSERT INTO usuario (usu_nombre,usu_clave,usu_estado,cod_tipousuario,usu_foto) VALUES(usuario,clave,'ACTIVO',tipousario,'Fotos/admin.png');
INSERT INTO personal(pers_nombres,pers_apellidoPate,pers_apellidoMate,pers_dni,pers_sexo,pers_fechaNacimiento,pers_direccion,pers_telefono,pers_movil,pers_email,pers_estado,usuario_cod,pers_puesto) VALUES
(nombre,apePat,apeMat,dni,genero,fecnac,direcc,telefo,movil,email,'ACTIVO',(SELECT MAX(cod_usuario) from usuario),puesto);
END */$$
DELIMITER ;

/* Procedure structure for procedure `PA_REGISTRARTIPODOCUMENTO` */

/*!50003 DROP PROCEDURE IF EXISTS  `PA_REGISTRARTIPODOCUMENTO` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `PA_REGISTRARTIPODOCUMENTO`(IN `NOMBRE` VARCHAR(250))
BEGIN
INSERT INTO tipo_documento (tipodo_descripcion,tipodo_estado) VALUES (NOMBRE,"ACTIVO");
END */$$
DELIMITER ;

/* Procedure structure for procedure `PA_VERIFICARUSUARIO` */

/*!50003 DROP PROCEDURE IF EXISTS  `PA_VERIFICARUSUARIO` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `PA_VERIFICARUSUARIO`(IN `_usu` VARCHAR(30), IN `_pass` VARCHAR(30))
SELECT
usuario.usu_nombre,
usuario.usu_clave,
CONCAT_WS(' ',personal.pers_nombres,personal.pers_apellidoPate,personal.pers_apellidoMate),
tipo_usuario.cod_tipousuario,
usuario.usu_foto,
personal.personal_cod,
tipo_usuario.tipusu_descripcion,
usuario.cod_usuario
FROM
personal
INNER JOIN usuario ON personal.usuario_cod = usuario.cod_usuario
INNER JOIN tipo_usuario ON usuario.cod_tipousuario = tipo_usuario.cod_tipousuario
WHERE usuario.usu_nombre = _usu AND usuario.usu_clave = _pass */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
