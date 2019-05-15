<?php
/**
 * Created by PhpStorm.
 * User: bondie
 * Date: 2019-05-14
 * Time: 14:41
 */

namespace App\Service;


use Oxyshop\SkeletonBundle\Entity\ExampleEntity;
use Oxyshop\SkeletonBundle\Service\ExampleService;

class DecoratingExampleService
{
    /** @var ExampleService */
    private $originalExampleService;

    /**
     * @param ExampleService $originalExampleService
     */
    public function __construct(ExampleService $originalExampleService)
    {
        $this->originalExampleService = $originalExampleService;
    }

    /**
     * @param string $name
     * @return ExampleEntity|null
     */
    public function getExampleValueByName(string $name): ?ExampleEntity
    {
        $entity = $this->originalExampleService->getExampleValueByName($name);

        return isset($entity[0]) ? $entity[0] : null;
    }
}
