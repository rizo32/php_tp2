
-- -----------------------------------------------------
USE `ecolemagie` ;

-- -----------------------------------------------------
-- Table `ecolemagie`.`ecole`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecolemagie`.`ecole` (
  `ecoleId` INT NOT NULL AUTO_INCREMENT,
  `ecoleNom` VARCHAR(45) NOT NULL,
  `ecoleDateFondation` DATE NOT NULL,
  PRIMARY KEY (`ecoleId`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecolemagie`.`privilege`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecolemagie`.`privilege` (
  `privilegeId` INT NOT NULL,
  `privilege` VARCHAR(45),
  PRIMARY KEY (`privilegeId`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecolemagie`.`poste`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecolemagie`.`poste` (
  `posteId` INT NOT NULL AUTO_INCREMENT,
  `posteNom` VARCHAR(45) NOT NULL,
  `posteDescription` TEXT NULL,
  `postePrivilegeId` INT NOT NULL,
  INDEX `fk_poste_privilege1_idx` (`postePrivilegeId` ASC),
  CONSTRAINT `fk_poste_privilege1_idx`
    FOREIGN KEY (`postePrivilegeId`)
    REFERENCES `ecolemagie`.`privilege` (`privilegeId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  PRIMARY KEY (`posteId`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecolemagie`.`employe`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecolemagie`.`employe` (
  `employeId` INT NOT NULL AUTO_INCREMENT,
  `employeCourriel` VARCHAR(55) NOT NULL,
  `employeMotDePasse` VARCHAR(255) NOT NULL,
  `employeNom` VARCHAR(45) NOT NULL,
  `employePrenom` VARCHAR(45) NOT NULL,
  `employeDateEmbauche` DATE NOT NULL,
  `employeEcoleId` INT NOT NULL,
  `employePosteId` INT NOT NULL,
  PRIMARY KEY (`employeId`),
  INDEX `fk_employe_ecole de magie1_idx` (`employeEcoleId` ASC),
  INDEX `fk_employe_poste1_idx` (`employePosteId` ASC),
  CONSTRAINT `fk_employe_ecole_de_magie1`
    FOREIGN KEY (`employeEcoleId`)
    REFERENCES `ecolemagie`.`ecole` (`ecoleId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_employe_poste1`
    FOREIGN KEY (`employePosteId`)
    REFERENCES `ecolemagie`.`poste` (`posteId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecolemagie`.`log`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecolemagie`.`log` (
  `logId` INT NOT NULL AUTO_INCREMENT,
  `logAdresseIP` VARCHAR(30) NOT NULL,
  `logDate` DATETIME NOT NULL,
  `logEmployeId` INT,
  `logPage` VARCHAR(200),
  PRIMARY KEY (`logId`),
  INDEX `fk_log_employe1_idx` (`logEmployeId` ASC),
  CONSTRAINT `fk_log_employe1_idx`
    FOREIGN KEY (`logEmployeId`)
    REFERENCES `ecolemagie`.`employe` (`employeId`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecolemagie`.`cours`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecolemagie`.`cours` (
  `coursId` INT NOT NULL AUTO_INCREMENT,
  `coursNom` VARCHAR(45) NOT NULL,
  `coursDescription` TEXT NULL,
  `coursNiveau` INT NULL,
  `coursEmployeId` INT NULL,
  PRIMARY KEY (`coursId`),
  INDEX `fk_cours_employe1_idx` (`coursEmployeId` ASC),
  CONSTRAINT `fk_cours_employe1`
    FOREIGN KEY (`coursEmployeId`)
    REFERENCES `ecolemagie`.`employe` (`employeId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecolemagie`.`maison`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecolemagie`.`maison` (
  `maisonId` INT NOT NULL AUTO_INCREMENT,
  `maisonNom` VARCHAR(45) NOT NULL,
  `maisonEmployeResponsable` INT NOT NULL,
  `maisonEcoleId` INT NOT NULL,
  PRIMARY KEY (`maisonId`),
  INDEX `fk_Maison_Employé1_idx` (`maisonEmployeResponsable` ASC),
  INDEX `fk_Maison_École1_idx` (`maisonEcoleId` ASC),
  CONSTRAINT `fk_Maison_Employé1`
    FOREIGN KEY (`maisonEmployeResponsable`)
    REFERENCES `ecolemagie`.`employe` (`employeId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Maison_École1`
    FOREIGN KEY (`maisonEcoleId`)
    REFERENCES `ecolemagie`.`ecole` (`ecoleId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecolemagie`.`etudiants`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecolemagie`.`etudiants` (
  `etudiantId` INT NOT NULL AUTO_INCREMENT,
  `etudiantNom` VARCHAR(45) NOT NULL,
  `etudiantPrenom` VARCHAR(45) NOT NULL,
  `etudiantAnnee` INT NULL,
  `etudiantMaisonId` INT NOT NULL,
  `etudiantContactNom` VARCHAR(45) NULL,
  `etudiantContactPrenom` VARCHAR(45) NULL,
  `etudiantContactTelephone` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`etudiantId`),
  INDEX `fk_etudiants_maison1_idx` (`etudiantMaisonId` ASC),
  CONSTRAINT `fk_etudiants_maison1`
    FOREIGN KEY (`etudiantMaisonId`)
    REFERENCES `ecolemagie`.`maison` (`maisonId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecolemagie`.`inscription`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecolemagie`.`inscription` (
  `inscriptionEtudiantId` INT NOT NULL,
  `inscriptionCoursId` INT NOT NULL,
  `semestre` VARCHAR(5) NULL,
  PRIMARY KEY (`inscriptionEtudiantId`, `inscriptionCoursId`),
  INDEX `fk_etudiants_has_cours_cours1_idx` (`inscriptionCoursId` ASC),
  INDEX `fk_etudiants_has_cours_etudiants_idx` (`inscriptionEtudiantId` ASC),
  CONSTRAINT `fk_etudiants_has_cours_etudiants`
    FOREIGN KEY (`inscriptionEtudiantId`)
    REFERENCES `ecolemagie`.`etudiants` (`etudiantId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_etudiants_has_cours_cours1`
    FOREIGN KEY (`inscriptionCoursId`)
    REFERENCES `ecolemagie`.`cours` (`coursId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

INSERT into ecole (ecoleNom, ecoleDateFondation) VALUES ("Hogwarts School of Witchcraft and Wizardry", "956-06-17");
INSERT into ecole (ecoleNom, ecoleDateFondation) VALUES ("Beauxbatons Academy of Magic", "1456-10-05");
INSERT into ecole (ecoleNom, ecoleDateFondation) VALUES ("Castelobruxo", "1256-06-05");
INSERT into ecole (ecoleNom, ecoleDateFondation) VALUES ("Durmstrang Institute", "1436-06-25");
INSERT into ecole (ecoleNom, ecoleDateFondation) VALUES ("Ilvermorny", "1756-06-05");
INSERT into ecole (ecoleNom, ecoleDateFondation) VALUES ("Mahoutokoro School of Magic", "1956-06-07");
INSERT into ecole (ecoleNom, ecoleDateFondation) VALUES ("Uagadou School of Magic", "1566-09-05");
INSERT into ecole (ecoleNom, ecoleDateFondation) VALUES ("Koldovstoretz", "1896-08-05");

INSERT into privilege (privilegeId, privilege) VALUES (1, "Administrateur");
INSERT into privilege (privilegeId, privilege) VALUES (2, "Employe");
INSERT into privilege (privilegeId, privilege) VALUES (3, "Visiteur");

INSERT into poste (posteNom, posteDescription, postePrivilegeId) VALUES ("Directeur", "Aider Harry Potter à vaincre Voldemort, mais pas trop", 1);
INSERT into poste (posteNom, posteDescription, postePrivilegeId) VALUES ("Professeur", "Enseigner la magie aux enfants et si possible essayer de faire en sorte que la plupart survivent à leur cheminement académique", 2);
INSERT into poste (posteNom, posteDescription, postePrivilegeId) VALUES ("Aide-cuisinier", "Vous croyez que la bouffe de Poudlard se fait tout seul??", 2);

INSERT INTO employe (employeCourriel, employeMotDePasse, employeNom, employePrenom, employeDateEmbauche, employeEcoleId, employePosteId) VALUES ("adumb@me.com", "123", "Dumbledore", "Albus", "1952-04-02", 1, 1);

INSERT into cours (coursNom, coursDescription, coursNiveau) VALUES ("Défense contre les forces du mal 1", "Enseigner un ou deux sorts utile", 1);
INSERT into cours (coursNom, coursDescription, coursNiveau, coursEmployeId) VALUES ("Potion 3", "Préparer des potions, duh", 3, 1);

INSERT into maison (maisonNom, maisonEmployeResponsable, maisonEcoleId) VALUES ("Gryffindor", 1, 1);
INSERT into maison (maisonNom, maisonEmployeResponsable, maisonEcoleId) VALUES ("Hufflepuff", 1, 1);
INSERT into maison (maisonNom, maisonEmployeResponsable, maisonEcoleId) VALUES ("Ravenclaw", 1, 1);
INSERT into maison (maisonNom, maisonEmployeResponsable, maisonEcoleId) VALUES ("Slytherin", 1, 1);

INSERT into etudiants (etudiantNom, etudiantPrenom, etudiantAnnee, etudiantMaisonId, etudiantContactNom, etudiantContactTelephone) VALUES ("Potter", "Harry", 3, 1, "Molly Weasley", "458-7845-7845");
INSERT into etudiants (etudiantNom, etudiantPrenom, etudiantAnnee, etudiantMaisonId, etudiantContactNom, etudiantContactTelephone) VALUES ("Granger", "Hermione", 3, 1, "Molly Weasley", "458-7845-7845");

INSERT into inscription (inscriptionEtudiantId, inscriptionCoursId, semestre) VALUES (1, 1, "H2023");
INSERT into inscription (inscriptionEtudiantId, inscriptionCoursId, semestre) VALUES (1, 2, "H2023");
INSERT into inscription (inscriptionEtudiantId, inscriptionCoursId, semestre) VALUES (2, 1, "H2023");
INSERT into inscription (inscriptionEtudiantId, inscriptionCoursId, semestre) VALUES (2, 2, "H2023");