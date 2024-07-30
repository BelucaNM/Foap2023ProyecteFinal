-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema tienda
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema tienda
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `tienda` DEFAULT CHARACTER SET utf8 ;
USE `tienda` ;

-- -----------------------------------------------------
-- Table `tienda`.`municipios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tienda`.`municipios` (
  `mun_id` INT(11) NOT NULL AUTO_INCREMENT,
  `mun_codpos` VARCHAR(5) NOT NULL,
  `mun_nombre` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`mun_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 14177
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tienda`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tienda`.`usuarios` (
  `usu_id` INT(4) NOT NULL AUTO_INCREMENT,
  `usu_username` VARCHAR(45) NOT NULL,
  `usu_password` LONGTEXT NOT NULL,
  `usu_email` VARCHAR(45) NOT NULL,
  `usu_apellido` VARCHAR(45) NULL DEFAULT NULL,
  `usu_nombre` VARCHAR(45) NULL DEFAULT NULL,
  `usu_dni` CHAR(9) NULL DEFAULT NULL,
  `usu_direccion` VARCHAR(50) NULL DEFAULT NULL,
  `municipios_mun_id` INT(11) NULL DEFAULT NULL,
  `usu_token` VARCHAR(45) NULL DEFAULT NULL,
  `usu_deadLine` DATETIME NULL DEFAULT CURRENT_TIMESTAMP(),
  `usu_cuentaActiva` TINYINT(1) NULL DEFAULT 0,
  PRIMARY KEY (`usu_id`),
  UNIQUE INDEX `usu_nombre_UNIQUE` (`usu_username` ASC) ,
  INDEX `fk_usuarios_municipios1_idx` (`municipios_mun_id` ASC) ,
  CONSTRAINT `fk_usuarios_municipios1`
    FOREIGN KEY (`municipios_mun_id`)
    REFERENCES `tienda`.`municipios` (`mun_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 10
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tienda`.`carritos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tienda`.`carritos` (
  `car_id` INT(11) NOT NULL AUTO_INCREMENT,
  `car_fecha` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  `usuarios_usu_id` INT(4) NOT NULL,
  PRIMARY KEY (`car_id`),
  UNIQUE INDEX `fk_carritos_usuarios1_idx` (`usuarios_usu_id` ASC) ,
  CONSTRAINT `fk_carritos_usuarios1`
    FOREIGN KEY (`usuarios_usu_id`)
    REFERENCES `tienda`.`usuarios` (`usu_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 10
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tienda`.`categoriasproductos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tienda`.`categoriasproductos` (
  `cat_id` INT(11) NOT NULL AUTO_INCREMENT,
  `cat_nombre` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`cat_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 12
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tienda`.`productos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tienda`.`productos` (
  `pro_id` INT(10) NOT NULL AUTO_INCREMENT,
  `pro_nombre` VARCHAR(45) NOT NULL,
  `pro_descripcion` VARCHAR(300) NOT NULL,
  `pro_URLFoto` VARCHAR(300) NOT NULL,
  `pro_ALTFoto` VARCHAR(45) NOT NULL,
  `pro_precioUnitario` DECIMAL(7,2) NOT NULL,
  `categoriasProductos_cat_id` INT(11) NOT NULL,
  `pro_fecha` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  PRIMARY KEY (`pro_id`),
  INDEX `fk_productos_categoriasProductos1_idx` (`categoriasProductos_cat_id` ASC) ,
  CONSTRAINT `fk_productos_categoriasProductos1`
    FOREIGN KEY (`categoriasProductos_cat_id`)
    REFERENCES `tienda`.`categoriasproductos` (`cat_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 10
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tienda`.`carritolineas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tienda`.`carritolineas` (
  `lincar_id` INT(11) NOT NULL AUTO_INCREMENT,
  `carritos_car_id` INT(11) NULL DEFAULT NULL,
  `lincar_cantidad` INT(11) NOT NULL,
  `lincar_precioUnitario` DECIMAL(4,2) NOT NULL,
  `productos_pro_id` INT(10) NOT NULL,
  PRIMARY KEY (`lincar_id`),
  INDEX `fk_carritoLineas_productos1_idx` USING BTREE (`productos_pro_id`) ,
  INDEX `fk_carritoLineas_carritos1_idx` USING BTREE (`carritos_car_id`) ,
  CONSTRAINT `fk_carritoLineas_carritos1`
    FOREIGN KEY (`carritos_car_id`)
    REFERENCES `tienda`.`carritos` (`car_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_carritoLineas_productos1`
    FOREIGN KEY (`productos_pro_id`)
    REFERENCES `tienda`.`productos` (`categoriasProductos_cat_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 26
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tienda`.`vendedores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tienda`.`vendedores` (
  `ven_id` INT(5) NOT NULL AUTO_INCREMENT,
  `ven_username` VARCHAR(45) NOT NULL,
  `ven_password` LONGTEXT NOT NULL,
  `ven_email` VARCHAR(45) NOT NULL,
  `ven_telefono` VARCHAR(11) NOT NULL,
  PRIMARY KEY (`ven_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tienda`.`tiendas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tienda`.`tiendas` (
  `tie_id` INT(11) NOT NULL AUTO_INCREMENT,
  `tie_nombre` VARCHAR(45) NOT NULL,
  `tie_direccion` VARCHAR(45) NULL DEFAULT NULL,
  `tie_fotoURL` VARCHAR(45) NULL DEFAULT NULL,
  `tie_fotoALT` VARCHAR(45) NULL DEFAULT NULL,
  `tie_telefono` VARCHAR(11) NULL DEFAULT NULL,
  `municipios_mun_id` INT(11) NOT NULL,
  `vendedores_ven_id` INT(5) NOT NULL,
  PRIMARY KEY (`tie_id`),
  INDEX `fk_tiendas_municipios_idx` (`municipios_mun_id` ASC) ,
  INDEX `fk_tiendas_vendedores1_idx` (`vendedores_ven_id` ASC) ,
  CONSTRAINT `fk_tiendas_municipios`
    FOREIGN KEY (`municipios_mun_id`)
    REFERENCES `tienda`.`municipios` (`mun_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tiendas_vendedores1`
    FOREIGN KEY (`vendedores_ven_id`)
    REFERENCES `tienda`.`vendedores` (`ven_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tienda`.`existencias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tienda`.`existencias` (
  `exi_id` INT(11) NOT NULL AUTO_INCREMENT,
  `productos_pro_id` INT(10) NOT NULL,
  `tiendas_tie_id` INT(11) NOT NULL,
  `exi_cantidad` INT(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`exi_id`),
  INDEX `fk_existencias_productos1_idx` (`productos_pro_id` ASC) ,
  INDEX `fk_existencias_tiendas1_idx` (`tiendas_tie_id` ASC) ,
  CONSTRAINT `fk_existencias_productos1`
    FOREIGN KEY (`productos_pro_id`)
    REFERENCES `tienda`.`productos` (`pro_id`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  CONSTRAINT `fk_existencias_tiendas1`
    FOREIGN KEY (`tiendas_tie_id`)
    REFERENCES `tienda`.`tiendas` (`tie_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tienda`.`pedidos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tienda`.`pedidos` (
  `ped_id` INT(11) NOT NULL AUTO_INCREMENT,
  `ped_fecha` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  `usuarios_usu_id` INT(4) NOT NULL,
  PRIMARY KEY (`ped_id`),
  INDEX `fk_pedidos_usuarios1_idx` (`usuarios_usu_id` ASC) ,
  CONSTRAINT `fk_pedidos_usuarios1`
    FOREIGN KEY (`usuarios_usu_id`)
    REFERENCES `tienda`.`usuarios` (`usu_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tienda`.`pedidolineas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tienda`.`pedidolineas` (
  `lin_id` INT(11) NOT NULL AUTO_INCREMENT,
  `lin_cantidad` INT(11) NOT NULL,
  `lin_importe` DECIMAL(10,2) NOT NULL,
  `pedidos_ped_id` INT(11) NOT NULL,
  `productos_pro_id` INT(10) NOT NULL,
  PRIMARY KEY (`lin_id`),
  INDEX `fk_pedidoLineas_pedidos1_idx` (`pedidos_ped_id` ASC) ,
  INDEX `fk_pedidoLineas_productos1_idx` (`productos_pro_id` ASC) ,
  CONSTRAINT `fk_pedidoLineas_pedidos1`
    FOREIGN KEY (`pedidos_ped_id`)
    REFERENCES `tienda`.`pedidos` (`ped_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pedidoLineas_productos1`
    FOREIGN KEY (`productos_pro_id`)
    REFERENCES `tienda`.`productos` (`pro_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
