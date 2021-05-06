<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210502163030 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produccion ADD usuario_fin_laminas_id INT DEFAULT NULL, ADD usuario_fin_mecanica_id INT DEFAULT NULL, ADD usuario_fin_embalaje_id INT DEFAULT NULL, ADD usuario_fin_transporte_id INT DEFAULT NULL, DROP usuario_fin_laminas, DROP usuario_fin_mecanica, DROP usuario_fin_embalaje, DROP usuario_fin_transporte');
        $this->addSql('ALTER TABLE produccion ADD CONSTRAINT FK_1E23DEC6C45F5915 FOREIGN KEY (usuario_fin_laminas_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE produccion ADD CONSTRAINT FK_1E23DEC62F8933F1 FOREIGN KEY (usuario_fin_mecanica_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE produccion ADD CONSTRAINT FK_1E23DEC66858E061 FOREIGN KEY (usuario_fin_embalaje_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE produccion ADD CONSTRAINT FK_1E23DEC6475B8D85 FOREIGN KEY (usuario_fin_transporte_id) REFERENCES usuario (id)');
        $this->addSql('CREATE INDEX IDX_1E23DEC6C45F5915 ON produccion (usuario_fin_laminas_id)');
        $this->addSql('CREATE INDEX IDX_1E23DEC62F8933F1 ON produccion (usuario_fin_mecanica_id)');
        $this->addSql('CREATE INDEX IDX_1E23DEC66858E061 ON produccion (usuario_fin_embalaje_id)');
        $this->addSql('CREATE INDEX IDX_1E23DEC6475B8D85 ON produccion (usuario_fin_transporte_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produccion DROP FOREIGN KEY FK_1E23DEC6C45F5915');
        $this->addSql('ALTER TABLE produccion DROP FOREIGN KEY FK_1E23DEC62F8933F1');
        $this->addSql('ALTER TABLE produccion DROP FOREIGN KEY FK_1E23DEC66858E061');
        $this->addSql('ALTER TABLE produccion DROP FOREIGN KEY FK_1E23DEC6475B8D85');
        $this->addSql('DROP INDEX IDX_1E23DEC6C45F5915 ON produccion');
        $this->addSql('DROP INDEX IDX_1E23DEC62F8933F1 ON produccion');
        $this->addSql('DROP INDEX IDX_1E23DEC66858E061 ON produccion');
        $this->addSql('DROP INDEX IDX_1E23DEC6475B8D85 ON produccion');
        $this->addSql('ALTER TABLE produccion ADD usuario_fin_laminas VARCHAR(3) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD usuario_fin_mecanica VARCHAR(3) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD usuario_fin_embalaje VARCHAR(3) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD usuario_fin_transporte VARCHAR(3) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP usuario_fin_laminas_id, DROP usuario_fin_mecanica_id, DROP usuario_fin_embalaje_id, DROP usuario_fin_transporte_id');
    }
}
