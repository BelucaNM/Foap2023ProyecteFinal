-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

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
  `mun_id` INT NOT NULL AUTO_INCREMENT,
  `mun_codpos` VARCHAR(5) NOT NULL,
  `mun_nombre` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`mun_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tienda`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tienda`.`usuarios` (
  `usu_id` INT(4) NOT NULL AUTO_INCREMENT,
  `usu_username` VARCHAR(45) NOT NULL,
  `usu_password` LONGTEXT NOT NULL,
  `usu_email` VARCHAR(45) NOT NULL,
  `usu_apellido` VARCHAR(45) NULL,
  `usu_nombre` VARCHAR(45) NULL,
  `usu_dni` CHAR(9) NULL,
  `usu_direccion` VARCHAR(50) NULL,
  `municipios_mun_id` INT NULL,
  `usu_token` VARCHAR(45) NULL,
  `usu_cuentaActiva` TINYINT(1) NULL,
  PRIMARY KEY (`usu_id`),
  UNIQUE INDEX `usu_nombre_UNIQUE` (`usu_username` ASC) ,
  INDEX `fk_usuarios_municipios1_idx` (`municipios_mun_id` ASC) ,
  CONSTRAINT `fk_usuarios_municipios1`
    FOREIGN KEY (`municipios_mun_id`)
    REFERENCES `tienda`.`municipios` (`mun_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tienda`.`productos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tienda`.`productos` (
  `pro_id` INT UNSIGNED NOT NULL,
  `pro_nombre` VARCHAR(45) NOT NULL,
  `pro_descripcion` VARCHAR(300) NOT NULL,
  `pro_URLFoto` VARCHAR(45) NOT NULL,
  `pro_ALTFoto` VARCHAR(45) NOT NULL,
  `pro_precioUnitario` DECIMAL(7,2) NOT NULL,
  PRIMARY KEY (`pro_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tienda`.`tiendas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tienda`.`tiendas` (
  `tie_id` INT NOT NULL AUTO_INCREMENT,
  `tie_nombre` VARCHAR(45) NOT NULL,
  `tie_direccion` VARCHAR(45) NULL,
  `tie_fotoURL` VARCHAR(45) NULL,
  `tie_fotoALT` VARCHAR(45) NULL,
  `tie_contacto` VARCHAR(45) NULL,
  `tie_telefono` VARCHAR(11) NULL,
  `municipios_mun_id` INT NOT NULL,
  PRIMARY KEY (`tie_id`),
  INDEX `fk_tiendas_municipios_idx` (`municipios_mun_id` ASC) ,
  CONSTRAINT `fk_tiendas_municipios`
    FOREIGN KEY (`municipios_mun_id`)
    REFERENCES `tienda`.`municipios` (`mun_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tienda`.`existencias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tienda`.`existencias` (
  `exi_id` INT NOT NULL AUTO_INCREMENT,
  `productos_pro_id` INT UNSIGNED NOT NULL,
  `tiendas_tie_id` INT NOT NULL,
  PRIMARY KEY (`exi_id`),
  INDEX `fk_existencias_productos1_idx` (`productos_pro_id` ASC) ,
  INDEX `fk_existencias_tiendas1_idx` (`tiendas_tie_id` ASC) ,
  CONSTRAINT `fk_existencias_productos1`
    FOREIGN KEY (`productos_pro_id`)
    REFERENCES `tienda`.`productos` (`pro_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_existencias_tiendas1`
    FOREIGN KEY (`tiendas_tie_id`)
    REFERENCES `tienda`.`tiendas` (`tie_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tienda`.`pedidos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tienda`.`pedidos` (
  `ped_id` INT NOT NULL,
  `ped_fecha` VARCHAR(45) NULL,
  `usuarios_usu_id` INT(4) NOT NULL,
  `productos_pro_id` INT UNSIGNED NOT NULL,
  `usu_cantidad` VARCHAR(45) NULL,
  `usu_precioUnitario` DECIMAL(7,2) NULL,
  `pedidoscol` VARCHAR(45) NULL,
  PRIMARY KEY (`ped_id`),
  INDEX `fk_pedidos_usuarios1_idx` (`usuarios_usu_id` ASC) ,
  INDEX `fk_pedidos_productos1_idx` (`productos_pro_id` ASC) ,
  CONSTRAINT `fk_pedidos_usuarios1`
    FOREIGN KEY (`usuarios_usu_id`)
    REFERENCES `tienda`.`usuarios` (`usu_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pedidos_productos1`
    FOREIGN KEY (`productos_pro_id`)
    REFERENCES `tienda`.`productos` (`pro_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
