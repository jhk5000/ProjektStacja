<?php
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 2018-05-16
 * Time: 19:44
 */

use PHPUnit\Framework\TestCase;
use Doctrine\ORM\EntityRepository;
require_once "bootstrap.php";
$stationRepository = $entityManager->getRepository('Stations');
$stations = $stationRepository->findAll();
class StationsTest extends TestCase
{
    private $stations;

    protected function setUp()
    {
        var_dump($this->getVoivodeship());
    }

    protected function tearDown()
    {
        $this->stations = NULL;
    }

    public function testGetVoivodeship()
    {
        //testowanie czy podane w bazie województwo nalezy do tablicy województw
        // tylko jak tu użyc entity manager lub zrobic to inaczej?

        $voivode = ['Podkarpackie', 'Małopolskie', 'Lubelskie'];

            $wojewodztwo = 'd';
            $this->assertContains($wojewodztwo, $voivode);
        }
    
}
