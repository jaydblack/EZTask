<?php

namespace AppBundle\Controller;

use eZ\Publish\API\Repository\ContentService;
use eZ\Publish\API\Repository\LocationService;
use eZ\Publish\API\Repository\SearchService;
use eZ\Publish\API\Repository\Values\Content\Location;
use eZ\Publish\API\Repository\Values\Content\LocationQuery;
use eZ\Publish\API\Repository\Values\Content\Query\Criterion;
use eZ\Publish\API\Repository\Values\Content\Query\SortClause;
use eZ\Publish\Core\MVC\Symfony\Controller\Controller;
use eZ\Publish\Core\Pagination\Pagerfanta\LocationSearchAdapter;
use Pagerfanta\Pagerfanta;
use Symfony\Component\HttpFoundation\Request;

class HomePageController extends Controller
{
    /** @var SearchService **/
    private $searchService;

    public function __construct(
        SearchService $searchService
    ) {
        $this->searchService = $searchService;
    }

    public function getLandingPageAction(Request $request, Location $location)
    {
       return $this->render(
            'full/landing_page.html.twig',
            [
                'landing_page' => $this->findLandingPage(),
                'location' => $location
            ]
        );
    }

    private function findLandingPage()
    {
        $criterion = new Criterion\LogicalAnd(
            [
                new Criterion\Visibility(Criterion\Visibility::VISIBLE),
                new Criterion\ContentTypeIdentifier(['landing_page']),
            ]
        );

        return $this->searchService->findSingle($criterion);
    }
}