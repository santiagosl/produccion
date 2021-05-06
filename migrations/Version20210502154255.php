<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210502154255 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE login CHANGE id_usuario_id id_usuario_id INT NOT NULL');
        $this->addSql('ALTER TABLE produccion ADD usuario_fin_laminas VARCHAR(3) NOT NULL, ADD usuario_fin_mecanica VARCHAR(3) NOT NULL, ADD usuario_fin_embalaje VARCHAR(3) NOT NULL, ADD usuario_fin_transporte VARCHAR(3) NOT NULL, CHANGE id_usuario_id id_usuario_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE login CHANGE id_usuario_id id_usuario_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produccion DROP usuario_fin_laminas, DROP usuario_fin_mecanica, DROP usuario_fin_embalaje, DROP usuario_fin_transporte, CHANGE id_usuario_id id_usuario_id INT NOT NULL');
    }
}
