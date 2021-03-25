<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210325103659 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE produccion (id INT AUTO_INCREMENT NOT NULL, id_usuario_id INT NOT NULL, id_cliente_id INT DEFAULT NULL, embalaje VARCHAR(255) DEFAULT NULL, laminas VARCHAR(255) DEFAULT NULL, mecanica VARCHAR(255) DEFAULT NULL, transporte VARCHAR(255) DEFAULT NULL, referencia VARCHAR(255) DEFAULT NULL, fecha_creacion DATE NOT NULL, hora_creacion TIME NOT NULL, fecha_fin DATE DEFAULT NULL, hora_fin TIME DEFAULT NULL, tiempo_total INT DEFAULT NULL, fecha_inicio_mecanica DATE DEFAULT NULL, hora_inicio_mecanica TIME DEFAULT NULL, fecha_fin_mecanica DATE DEFAULT NULL, hora_fin_mecanica TIME DEFAULT NULL, fecha_inicio_laminas DATE DEFAULT NULL, hora_inicio_laminas TIME DEFAULT NULL, fecha_fin_laminas DATE DEFAULT NULL, hora_fin_laminas TIME DEFAULT NULL, fecha_inicio_embalaje DATE DEFAULT NULL, hora_incio_embalaje TIME DEFAULT NULL, fecha_fin_embalaje DATE DEFAULT NULL, hora_fin_embalaje TIME DEFAULT NULL, fecha_inicio_transporte DATE DEFAULT NULL, hora_inicio_transporte TIME DEFAULT NULL, fecha_fin_transporte DATE DEFAULT NULL, hora_fin_transporte TIME DEFAULT NULL, tiempo_mecanica VARCHAR(255) DEFAULT NULL, tiempo_laminas VARCHAR(255) DEFAULT NULL, tiempo_embalaje VARCHAR(255) DEFAULT NULL, tiempo_transporte VARCHAR(255) DEFAULT NULL, INDEX IDX_1E23DEC67EB2C349 (id_usuario_id), INDEX IDX_1E23DEC67BF9CE86 (id_cliente_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE produccion ADD CONSTRAINT FK_1E23DEC67EB2C349 FOREIGN KEY (id_usuario_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE produccion ADD CONSTRAINT FK_1E23DEC67BF9CE86 FOREIGN KEY (id_cliente_id) REFERENCES cliente (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE produccion');
    }
}
