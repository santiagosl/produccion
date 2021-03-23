<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210323142809 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produccion CHANGE id_usuario_id id_usuario_id INT NOT NULL, CHANGE id_cliente_id id_cliente_id INT NOT NULL, CHANGE embalaje embalaje VARCHAR(255) NOT NULL, CHANGE laminas laminas VARCHAR(255) NOT NULL, CHANGE mecanica mecanica VARCHAR(255) NOT NULL, CHANGE transporte transporte VARCHAR(255) NOT NULL, CHANGE referencia referencia VARCHAR(20) NOT NULL, CHANGE fecha_inicio fecha_inicio DATE NOT NULL, CHANGE hora_inicio hora_inicio TIME NOT NULL, CHANGE fecha_fin fecha_fin DATE NOT NULL, CHANGE hora_fin hora_fin TIME NOT NULL, CHANGE tiempo_total tiempo_total INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produccion CHANGE id_usuario_id id_usuario_id INT DEFAULT NULL, CHANGE id_cliente_id id_cliente_id INT DEFAULT NULL, CHANGE embalaje embalaje VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE laminas laminas VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE mecanica mecanica VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE transporte transporte VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE referencia referencia VARCHAR(20) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE fecha_inicio fecha_inicio DATE DEFAULT NULL, CHANGE hora_inicio hora_inicio TIME DEFAULT NULL, CHANGE fecha_fin fecha_fin DATE DEFAULT NULL, CHANGE hora_fin hora_fin TIME DEFAULT NULL, CHANGE tiempo_total tiempo_total INT DEFAULT NULL');
    }
}
