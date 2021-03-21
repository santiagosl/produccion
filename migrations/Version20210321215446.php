<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210321215446 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cliente (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(50) NOT NULL, direccion VARCHAR(100) NOT NULL, cp INT NOT NULL, cif VARCHAR(20) NOT NULL, mail VARCHAR(50) NOT NULL, web VARCHAR(50) NOT NULL, poblacion VARCHAR(50) NOT NULL, provincia VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE login (id INT AUTO_INCREMENT NOT NULL, id_usuario_id INT NOT NULL, nombre_usuario VARCHAR(50) NOT NULL, fecha DATE NOT NULL, hora TIME NOT NULL, INDEX IDX_AA08CB107EB2C349 (id_usuario_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produccion (id INT AUTO_INCREMENT NOT NULL, id_usuario_id INT NOT NULL, id_cliente_id INT NOT NULL, embalaje VARCHAR(255) NOT NULL, laminas VARCHAR(255) NOT NULL, mecanica VARCHAR(255) NOT NULL, transporte VARCHAR(255) NOT NULL, referencia VARCHAR(20) NOT NULL, fecha_creacion DATE NOT NULL, hora_creacion TIME NOT NULL, fecha_inicio DATE NOT NULL, hora_inicio TIME NOT NULL, fecha_fin DATE NOT NULL, hora_fin TIME NOT NULL, tiempo_total INT NOT NULL, INDEX IDX_1E23DEC67EB2C349 (id_usuario_id), INDEX IDX_1E23DEC67BF9CE86 (id_cliente_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usuario (id INT AUTO_INCREMENT NOT NULL, id_usuario_id INT DEFAULT NULL, nombre VARCHAR(50) NOT NULL, apellidos VARCHAR(50) NOT NULL, rol VARCHAR(10) NOT NULL, password VARCHAR(20) NOT NULL, INDEX IDX_2265B05D7EB2C349 (id_usuario_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE login ADD CONSTRAINT FK_AA08CB107EB2C349 FOREIGN KEY (id_usuario_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE produccion ADD CONSTRAINT FK_1E23DEC67EB2C349 FOREIGN KEY (id_usuario_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE produccion ADD CONSTRAINT FK_1E23DEC67BF9CE86 FOREIGN KEY (id_cliente_id) REFERENCES cliente (id)');
        $this->addSql('ALTER TABLE usuario ADD CONSTRAINT FK_2265B05D7EB2C349 FOREIGN KEY (id_usuario_id) REFERENCES usuario (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produccion DROP FOREIGN KEY FK_1E23DEC67BF9CE86');
        $this->addSql('ALTER TABLE login DROP FOREIGN KEY FK_AA08CB107EB2C349');
        $this->addSql('ALTER TABLE produccion DROP FOREIGN KEY FK_1E23DEC67EB2C349');
        $this->addSql('ALTER TABLE usuario DROP FOREIGN KEY FK_2265B05D7EB2C349');
        $this->addSql('DROP TABLE cliente');
        $this->addSql('DROP TABLE login');
        $this->addSql('DROP TABLE produccion');
        $this->addSql('DROP TABLE usuario');
    }
}
