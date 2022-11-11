<?php

namespace App\Controller\Api;

use App\DataProvider\ClickHouseSqlDataProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: '/api')]
class DataController extends AbstractController
{
    #[Route(path: '/clickhouse', name: 'api_clickhouse', methods: ['GET'])]
    public function listClickhouse(ClickHouseSqlDataProvider $dataProvider): Response
    {
        $data = $dataProvider->getChartData();

        return new JsonResponse($data);
    }
}
