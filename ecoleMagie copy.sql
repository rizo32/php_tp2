
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
-- Table `ecolemagie`.`poste`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecolemagie`.`poste` (
  `posteId` INT NOT NULL AUTO_INCREMENT,
  `posteNom` VARCHAR(45) NOT NULL,
  `posteDescription` TEXT NULL,
  PRIMARY KEY (`posteId`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecolemagie`.`employe`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecolemagie`.`employe` (
  `employeId` INT NOT NULL AUTO_INCREMENT,
  `employeNom` VARCHAR(45) NOT NULL,
  `employePrenom` VARCHAR(45) NOT NULL,
  `employeDateEmbauche` DATE NOT NULL,
  `employeEcoleId` INT NOT NULL,
  `employePosteId` INT NOT NULL,
  PRIMARY KEY (`employeId`),
  INDEX `fk_employe_ecole de magie1_idx` (`employeEcoleId` ASC),
  INDEX `fk_employe_poste1_idx` (`employeposteId` ASC),
  CONSTRAINT `fk_employe_ecole de magie1`
    FOREIGN KEY (`employeEcoleId`)
    REFERENCES `ecolemagie`.`ecole` (`ecoleId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_employe_poste1`
    FOREIGN KEY (`employeposteId`)
    REFERENCES `ecolemagie`.`poste` (`posteId`)
    ON DELETE NO ACTION
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
CREATE TABLE IF NOT EXISTS `ecolemagie`.`Maison` (
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
  `etudiantmaisonId` INT NOT NULL,
  `etudiantContactNom` VARCHAR(45) NULL,
  `etudiantContactPrenom` VARCHAR(45) NULL,
  `etudiantContactTelephone` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`etudiantId`),
  INDEX `fk_etudiants_maison1_idx` (`etudiantmaisonId` ASC),
  CONSTRAINT `fk_etudiants_maison1`
    FOREIGN KEY (`etudiantmaisonId`)
    REFERENCES `ecolemagie`.`maison` (`maisonId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecolemagie`.`inscription`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecolemagie`.`inscription` (
  `inscriptionEtudiantId` INT NOT NULL,
  `inscriptioncoursId` INT NOT NULL,
  `semestre` VARCHAR(5) NULL,
  PRIMARY KEY (`inscriptionEtudiantId`, `inscriptioncoursId`),
  INDEX `fk_etudiants_has_cours_cours1_idx` (`inscriptioncoursId` ASC),
  INDEX `fk_etudiants_has_cours_etudiants_idx` (`inscriptionEtudiantId` ASC),
  CONSTRAINT `fk_etudiants_has_cours_etudiants`
    FOREIGN KEY (`inscriptionEtudiantId`)
    REFERENCES `ecolemagie`.`etudiants` (`etudiantId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_etudiants_has_cours_cours1`
    FOREIGN KEY (`inscriptioncoursId`)
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

INSERT into poste (posteNom, posteDescription) VALUES ("Directeur", "Aider Harry Potter à vaincre Voldemort, mais pas trop");
INSERT into poste (posteNom, posteDescription) VALUES ("Professeur", "Enseigner la magie aux enfants et si possible essayer de faire en sorte que la plupart survivent à leur cheminement académique");
INSERT into poste (posteNom, posteDescription) VALUES ("Aide-cuisinier", "Vous croyez que la bouffe de Poudlard se fait tout seul??");

INSERT INTO employe (employeNom, employePrenom, employeDateEmbauche, employeEcoleId, employeposteId) VALUES ("Dumbledore", "Albus", "1952-04-02", 1, 1);

INSERT into cours (coursNom, coursDescription, coursNiveau) VALUES ("Défense contre les forces du mal 1", "Enseigner un ou deux sorts utile", 1);
INSERT into cours (coursNom, coursDescription, coursNiveau, coursEmployeId) VALUES ("Potion 3", "Préparer des potions, duh", 3, 1);

INSERT into maison (maisonNom, maisonEmployeResponsable, maisonEcoleId) VALUES ("Gryffindor", 1, 1);
INSERT into maison (maisonNom, maisonEmployeResponsable, maisonEcoleId) VALUES ("Hufflepuff", 1, 1);
INSERT into maison (maisonNom, maisonEmployeResponsable) VALUES ("Ravenclaw", 1, 1);
INSERT into maison (maisonNom, maisonEmployeResponsable) VALUES ("Slytherin", 1, 1);

INSERT into etudiants (etudiantNom, etudiantPrenom, etudiantAnnee, etudiantmaisonId, etudiantContactNom, etudiantContactTelephone) VALUES ("Potter", "Harry", 3, 1, "Molly Weasley", "458-7845-7845");
INSERT into etudiants (etudiantNom, etudiantPrenom, etudiantAnnee, etudiantmaisonId, etudiantContactNom, etudiantContactTelephone) VALUES ("Granger", "Hermione", 3, 1, "Molly Weasley", "458-7845-7845");

INSERT into inscription (inscriptionEtudiantId, inscriptioncoursId, semestre) VALUES (1, 1, "H2023");
INSERT into inscription (inscriptionEtudiantId, inscriptioncoursId, semestre) VALUES (1, 2, "H2023");
INSERT into inscription (inscriptionEtudiantId, inscriptioncoursId, semestre) VALUES (2, 1, "H2023");
INSERT into inscription (inscriptionEtudiantId, inscriptioncoursId, semestre) VALUES (2, 2, "H2023");