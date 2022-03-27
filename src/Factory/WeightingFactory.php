<?php

namespace App\Factory;

use App\Entity\Weighting;
use App\Repository\WeightingRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @method static Weighting|Proxy createOne(array $attributes = [])
 * @method static Weighting[]|Proxy[] createMany(int $number, $attributes = [])
 * @method static Weighting|Proxy find($criteria)
 * @method static Weighting|Proxy findOrCreate(array $attributes)
 * @method static Weighting|Proxy first(string $sortedField = 'id')
 * @method static Weighting|Proxy last(string $sortedField = 'id')
 * @method static Weighting|Proxy random(array $attributes = [])
 * @method static Weighting|Proxy randomOrCreate(array $attributes = [])
 * @method static Weighting[]|Proxy[] all()
 * @method static Weighting[]|Proxy[] findBy(array $attributes)
 * @method static Weighting[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Weighting[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static WeightingRepository|RepositoryProxy repository()
 * @method Weighting|Proxy create($attributes = [])
 */
final class WeightingFactory extends ModelFactory
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
            // ->afterInstantiate(function(Weighting $weighting) {})
        ;
    }

    protected static function getClass(): string
    {
        return Weighting::class;
    }
}
