<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;
use Faker\Factory;
use Random\RandomException;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250518194325 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    /**
     * @throws RandomException
     * @throws \DateMalformedStringException
     */
    public function up(Schema $schema): void
    {
        $faker = Factory::create();
        for ($i=0; $i < 1000; $i++) {
            $title = $faker->unique()->sentence();
            $slug = strtolower(str_replace(' ', '-', $title));

            $countViews = $i < 10
                ? $faker->numberBetween(10, 1000)
                : $faker->numberBetween(10, 3000) * ($i + 1)
            ;

            $isEnabled = random_int(1, 100) > 10 ? 1 : 0;
            $description = $faker->paragraphs(random_int(3, 10), true);

            $createdAt = (new \DateTimeImmutable(sprintf('- %d days', random_int(1, 100))))
                ->setTime(rand(0, 23), rand(0, 59), rand(0, 59));

            $this->addSql(
                'INSERT INTO article (title, slug, is_enabled, count_views, description, created_at)
                        VALUES (?,?,?,?,?,?)
                    ',
                [
                    $title,
                    $slug,
                    $isEnabled,
                    $countViews,
                    $description,
                    $createdAt->format('Y-m-d H:i:s'),
                ]
            );
        }
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('TRUNCATE table article');
    }
}
