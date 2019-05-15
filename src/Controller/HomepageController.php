<?php
/**
 * Created by PhpStorm.
 * User: bondie
 * Date: 2019-05-14
 * Time: 14:04
 */

namespace App\Controller;

use App\Service\DecoratingExampleService;
use Oxyshop\SkeletonBundle\Service\ExampleService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class HomepageController
 * @package App\Controller
 */
class HomepageController extends AbstractController
{
    /** @var DecoratingExampleService */
    private $exampleService;

    /**
     * @param DecoratingExampleService $exampleService
     */
    public function __construct(DecoratingExampleService $exampleService)
    {
        $this->exampleService = $exampleService;
    }

    /**
     * @Route(path="/", name="index")
     */
    public function indexAction()
    {
        $entity = $this->exampleService->getExampleValueByName('john');

        return $this->render('homepage/index.html.twig', [
            'entity' => $entity,
        ]);
    }
}
