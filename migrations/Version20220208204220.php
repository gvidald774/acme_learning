<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220208204220 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE aula (id INT AUTO_INCREMENT NOT NULL, codigo VARCHAR(5) NOT NULL, capacidad INT NOT NULL, caracteristicas LONGTEXT NOT NULL, precio_tramo DOUBLE PRECISION NOT NULL, activa TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE curso (id INT AUTO_INCREMENT NOT NULL, profesor_id INT NOT NULL, titulo VARCHAR(255) NOT NULL, f_ini_inscripcion DATETIME NOT NULL, f_fin_inscripcion DATETIME NOT NULL, f_ini_reclamacion DATETIME NOT NULL, f_fin_reclamacion DATETIME NOT NULL, f_ini_baja DATETIME NOT NULL, f_fin_baja DATETIME NOT NULL, f_ini_curso DATETIME NOT NULL, f_fin_curso DATETIME NOT NULL, contenido LONGTEXT NOT NULL, objetivos LONGTEXT NOT NULL, requisitos LONGTEXT NOT NULL, categoria VARCHAR(255) NOT NULL, precio DOUBLE PRECISION NOT NULL, horas INT NOT NULL, documentos TINYINT(1) NOT NULL, INDEX IDX_CA3B40ECE52BD977 (profesor_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE grupo (id INT AUTO_INCREMENT NOT NULL, curso_id INT NOT NULL, nombre VARCHAR(255) NOT NULL, plazas INT NOT NULL, INDEX IDX_8C0E9BD387CB4A1F (curso_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plaza (id INT AUTO_INCREMENT NOT NULL, id_alumno_id INT NOT NULL, id_grupo_id INT NOT NULL, puesto INT DEFAULT NULL, valoracion INT DEFAULT NULL, documentos LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', estado VARCHAR(255) NOT NULL, INDEX IDX_E8703ECC7C1D59C9 (id_alumno_id), INDEX IDX_E8703ECCCC58DC96 (id_grupo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reclamacion (id INT AUTO_INCREMENT NOT NULL, id_plaza_id INT NOT NULL, comentario LONGTEXT DEFAULT NULL, documentos LONGBLOB DEFAULT NULL, valoracion INT DEFAULT NULL, INDEX IDX_3AE0B22BFEF2C28 (id_plaza_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reserva (id INT AUTO_INCREMENT NOT NULL, id_aula_id INT NOT NULL, id_grupo_id INT NOT NULL, id_tramo_id INT DEFAULT NULL, precio INT NOT NULL, INDEX IDX_188D2E3B7387BB25 (id_aula_id), INDEX IDX_188D2E3BCC58DC96 (id_grupo_id), INDEX IDX_188D2E3B3E5BF9E0 (id_tramo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tramo (id INT AUTO_INCREMENT NOT NULL, fecha DATE NOT NULL, hora TIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE curso ADD CONSTRAINT FK_CA3B40ECE52BD977 FOREIGN KEY (profesor_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE grupo ADD CONSTRAINT FK_8C0E9BD387CB4A1F FOREIGN KEY (curso_id) REFERENCES curso (id)');
        $this->addSql('ALTER TABLE plaza ADD CONSTRAINT FK_E8703ECC7C1D59C9 FOREIGN KEY (id_alumno_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE plaza ADD CONSTRAINT FK_E8703ECCCC58DC96 FOREIGN KEY (id_grupo_id) REFERENCES grupo (id)');
        $this->addSql('ALTER TABLE reclamacion ADD CONSTRAINT FK_3AE0B22BFEF2C28 FOREIGN KEY (id_plaza_id) REFERENCES plaza (id)');
        $this->addSql('ALTER TABLE reserva ADD CONSTRAINT FK_188D2E3B7387BB25 FOREIGN KEY (id_aula_id) REFERENCES aula (id)');
        $this->addSql('ALTER TABLE reserva ADD CONSTRAINT FK_188D2E3BCC58DC96 FOREIGN KEY (id_grupo_id) REFERENCES grupo (id)');
        $this->addSql('ALTER TABLE reserva ADD CONSTRAINT FK_188D2E3B3E5BF9E0 FOREIGN KEY (id_tramo_id) REFERENCES tramo (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reserva DROP FOREIGN KEY FK_188D2E3B7387BB25');
        $this->addSql('ALTER TABLE grupo DROP FOREIGN KEY FK_8C0E9BD387CB4A1F');
        $this->addSql('ALTER TABLE plaza DROP FOREIGN KEY FK_E8703ECCCC58DC96');
        $this->addSql('ALTER TABLE reserva DROP FOREIGN KEY FK_188D2E3BCC58DC96');
        $this->addSql('ALTER TABLE reclamacion DROP FOREIGN KEY FK_3AE0B22BFEF2C28');
        $this->addSql('ALTER TABLE reserva DROP FOREIGN KEY FK_188D2E3B3E5BF9E0');
        $this->addSql('DROP TABLE aula');
        $this->addSql('DROP TABLE curso');
        $this->addSql('DROP TABLE grupo');
        $this->addSql('DROP TABLE plaza');
        $this->addSql('DROP TABLE reclamacion');
        $this->addSql('DROP TABLE reserva');
        $this->addSql('DROP TABLE tramo');
        $this->addSql('ALTER TABLE messenger_messages CHANGE body body LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE headers headers LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE queue_name queue_name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE dni dni VARCHAR(9) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nombre nombre VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE apellido1 apellido1 VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE apellido2 apellido2 VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE telefono telefono VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE localidad localidad VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
