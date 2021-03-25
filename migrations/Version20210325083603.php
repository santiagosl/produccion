<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210325083603 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produccion CHANGE id_cliente_id id_cliente_id INT DEFAULT NULL, CHANGE referencia referencia VARCHAR(255) DEFAULT NULL, CHANGE fecha_creacion fecha_creacion DATE NOT NULL, CHANGE hora_creacion hora_creacion TIME NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produccion CHANGE id_cliente_id id_cliente_id INT NOT NULL, CHANGE referencia referencia VARCHAR(20) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE fecha_creacion fecha_creacion DATE DEFAULT NULL, CHANGE hora_creacion hora_creacion TIME DEFAULT NULL');
    }
}
