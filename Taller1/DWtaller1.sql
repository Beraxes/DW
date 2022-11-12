CREATE SCHEMA IF NOT EXISTS `DWtaller1` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci ;
USE `DWtaller1` ;

DROP TABLE IF EXISTS `DWtaller1`.`Categorias`;

CREATE TABLE IF NOT EXISTS `DWtaller1`.`Categorias` (
  `idCategoria` INT(2) NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(45) NULL,
  `funcion` VARCHAR(255) NULL,
  `estado` VARCHAR(45) CHARACTER SET 'ascii' NULL,
  PRIMARY KEY (`idCategoria`))
ENGINE = InnoDB;

DROP TABLE IF EXISTS `DWtaller1`.`Persona`;
CREATE TABLE IF NOT EXISTS `DWtaller1`.`Persona` (
  `idPersona` INT(8) NOT NULL AUTO_INCREMENT,
  `idCategoria` INT(2) NOT NULL,
  `nombre` VARCHAR(45) NULL,
  `apellido` VARCHAR(45) NULL,
  `fechaHoraRegistro` DATETIME NULL,
  `fecha` DATE NULL,
  `estatura` FLOAT NULL,
  `email` VARCHAR(85) NULL,
  PRIMARY KEY (`idPersona`, `idCategoria`),
  INDEX `fk_Categorias_idx` (`idCategoria` ASC),
  CONSTRAINT `fk_Categorias`
    FOREIGN KEY (`idCategoria`)
    REFERENCES `DWtaller1`.`Categorias` (`idCategoria`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;
