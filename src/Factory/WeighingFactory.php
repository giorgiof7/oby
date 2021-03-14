<?php

namespace App\Factory;

use App\Entity\Weighing;
use App\Repository\WeighingRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @method static Weighing|Proxy createOne(array $attributes = [])
 * @method static Weighing[]|Proxy[] createMany(int $number, $attributes = [])
 * @method static Weighing|Proxy find($criteria)
 * @method static Weighing|Proxy findOrCreate(array $attributes)
 * @method static Weighing|Proxy first(string $sortedField = 'id')
 * @method static Weighing|Proxy last(string $sortedField = 'id')
 * @method static Weighing|Proxy random(array $attributes = [])
 * @method static Weighing|Proxy randomOrCreate(array $attributes = [])
 * @method static Weighing[]|Proxy[] all()
 * @method static Weighing[]|Proxy[] findBy(array $attributes)
 * @method static Weighing[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Weighing[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static WeighingRepository|RepositoryProxy repository()
 * @method Weighing|Proxy create($attributes = [])
 */
final class WeighingFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();
    }

    public function firstMeasurement() :self
    {
         return $this->addState([
            'registeredAt' => self::faker()->dateTime('-31 days'),
            'isInitialDate' => true
         ]);
    }

    protected function getDefaults(): array
    {
        return [
            'registeredAt' => self::faker()->dateTimeBetween('-30 days', '-1 minute'),
            'armCircumference' => self::faker()->numberBetween(150, 100),
            'chestCircumference' => self::faker()->numberBetween(150, 100),
            'hipsCircumference' => self::faker()->numberBetween(150, 100),
            'thighCircumference' => self::faker()->numberBetween(150, 100),
            'waistCircumference' => self::faker()->numberBetween(150, 100),
            'weight' => self::faker()->randomFloat(1, 90, 100),
            'isMilestone' => self::faker()->boolean(30),
            'isInitialDate' => false
        ];
    }

    protected function initialize(): self
    {
        // see https://github.com/zenstruck/foundry#initialization
        return $this
            // ->afterInstantiate(function(Weighing $weighing) {})
        ;
    }

    protected static function getClass(): string
    {
        return Weighing::class;
    }
}
