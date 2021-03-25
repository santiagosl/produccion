<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210325082549 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produccion ADD fecha_fin_mecanica DATE DEFAULT NULL, ADD hora_fin_mecanica TIME DEFAULT NULL, ADD fecha_inicio_laminas DATE DEFAULT NULL, ADD hora_inicio_laminas TIME DEFAULT NULL, ADD fecha_fin_laminas DATE DEFAULT NULL, ADD hora_fin_laminas TIME DEFAULT NULL, ADD fecha_inicio_embalaje DATE DEFAULT NULL, ADD hora_incio_embalaje TIME DEFAULT NULL, ADD fecha_fin_embalaje DATE DEFAULT NULL, ADD hora_fin_embalaje TIME DEFAULT NULL, ADD fecha_incio_transporte DATE NOT NULL, ADD hora_inicio_transporte TIME DEFAULT NULL, ADD fecha_fin_transporte DATE DEFAULT NULL, ADD hora_fin_transporte TIME DEFAULT NULL, ADD tiempo_mecanica VARCHAR(255) DEFAULT NULL, ADD tiempo_laminas VARCHAR(255) DEFAULT NULL, ADD tiempo_embalaje VARCHAR(255) DEFAULT NULL, ADD tiempo_transporte VARCHAR(255) DEFAULT NULL, CHANGE id_usuario_id id_usuario_id INT NOT NULL, CHANGE embalaje embalaje VARCHAR(255) NOT NULL, CHANGE laminas laminas VARCHAR(255) NOT NULL, CHANGE mecanica mecanica VARCHAR(255) NOT NULL, CHANGE transporte transporte VARCHAR(255) NOT NULL, CHANGE referencia referencia VARCHAR(20) NOT NULL, CHANGE fecha_fin fecha_fin DATE NOT NULL, CHANGE hora_fin hora_fin TIME NOT NULL, CHANGE tiempo_total tiempo_total INT NOT NULL, CHANGE fecha_inicio fecha_inicio_mecanica DATE DEFAULT NULL, CHANGE hora_inicio hora_inicio_mecanica TIME DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produccion ADD fecha_inicio DATE DEFAULT NULL, ADD hora_inicio TIME DEFAULT NULL, DROP fecha_inicio_mecanica, DROP hora_inicio_mecanica, DROP fecha_fin_mecanica, DROP hora_fin_mecanica, DROP fecha_inicio_laminas, DROP hora_inicio_laminas, DROP fecha_fin_laminas, DROP hora_fin_laminas, DROP fecha_inicio_embalaje, DROP hora_incio_embalaje, DROP fecha_fin_embalaje, DROP hora_fin_embalaje, DROP fecha_incio_transporte, DROP hora_inicio_transporte, DROP fecha_fin_transporte, DROP hora_fin_transporte, DROP tiempo_mecanica, DROP tiempo_laminas, DROP tiempo_embalaje, DROP tiempo_transporte, CHANGE id_usuario_id id_usuario_id INT DEFAULT NULL, CHANGE embalaje embalaje VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE laminas laminas VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE mecanica mecanica VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE transporte transporte VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE referencia referencia VARCHAR(20) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE fecha_fin fecha_fin DATE DEFAULT NULL, CHANGE hora_fin hora_fin TIME DEFAULT NULL, CHANGE tiempo_total tiempo_total INT DEFAULT NULL');
    }
}
