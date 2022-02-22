<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220222221720 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE plaza DROP FOREIGN KEY FK_E8703ECCCC58DC96');
        $this->addSql('ALTER TABLE reserva DROP FOREIGN KEY FK_188D2E3BCC58DC96');
        $this->addSql('DROP TABLE grupo');
        $this->addSql('ALTER TABLE curso ADD plazas INT NOT NULL');
        $this->addSql('DROP INDEX IDX_E8703ECCCC58DC96 ON plaza');
        $this->addSql('ALTER TABLE plaza CHANGE id_grupo_id id_curso_id INT NOT NULL');
        $this->addSql('ALTER TABLE plaza ADD CONSTRAINT FK_E8703ECCD710A68A FOREIGN KEY (id_curso_id) REFERENCES curso (id)');
        $this->addSql('CREATE INDEX IDX_E8703ECCD710A68A ON plaza (id_curso_id)');
        $this->addSql('DROP INDEX IDX_188D2E3BCC58DC96 ON reserva');
        $this->addSql('ALTER TABLE reserva DROP id_grupo_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE grupo (id INT AUTO_INCREMENT NOT NULL, curso_id INT NOT NULL, nombre VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, plazas INT NOT NULL, INDEX IDX_8C0E9BD387CB4A1F (curso_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE grupo ADD CONSTRAINT FK_8C0E9BD387CB4A1F FOREIGN KEY (curso_id) REFERENCES curso (id)');
        $this->addSql('ALTER TABLE aula CHANGE codigo codigo VARCHAR(5) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE caracteristicas caracteristicas LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE curso DROP plazas, CHANGE titulo titulo VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE contenido contenido LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE objetivos objetivos LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE requisitos requisitos LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE categoria categoria VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE descripcion descripcion LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE imagen imagen VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE messenger_messages CHANGE body body LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE headers headers LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE queue_name queue_name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE plaza DROP FOREIGN KEY FK_E8703ECCD710A68A');
        $this->addSql('DROP INDEX IDX_E8703ECCD710A68A ON plaza');
        $this->addSql('ALTER TABLE plaza CHANGE documentos documentos LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:array)\', CHANGE estado estado VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE id_curso_id id_grupo_id INT NOT NULL');
        $this->addSql('ALTER TABLE plaza ADD CONSTRAINT FK_E8703ECCCC58DC96 FOREIGN KEY (id_grupo_id) REFERENCES grupo (id)');
        $this->addSql('CREATE INDEX IDX_E8703ECCCC58DC96 ON plaza (id_grupo_id)');
        $this->addSql('ALTER TABLE reclamacion CHANGE comentario comentario LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE reserva ADD id_grupo_id INT NOT NULL');
        $this->addSql('ALTER TABLE reserva ADD CONSTRAINT FK_188D2E3BCC58DC96 FOREIGN KEY (id_grupo_id) REFERENCES grupo (id)');
        $this->addSql('CREATE INDEX IDX_188D2E3BCC58DC96 ON reserva (id_grupo_id)');
        $this->addSql('ALTER TABLE reset_password_request CHANGE selector selector VARCHAR(20) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE hashed_token hashed_token VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE dni dni VARCHAR(9) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nombre nombre VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE apellido1 apellido1 VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE apellido2 apellido2 VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE foto foto VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE telefono telefono VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE localidad localidad VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE genero genero VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
