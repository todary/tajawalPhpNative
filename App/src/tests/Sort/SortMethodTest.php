<?php

use App\Src\Service\SearchNameService;
use App\Src\Sort\ArraySort;

class SortMethodTest extends \PHPUnit\Framework\TestCase
{
    protected $arraySortObject;
    protected $nameServiceObject;


    public function setUp()
    {
        $hotels = '{"hotels":[{"name":"Media One Hotel","price":102.2,"city":"dubai","availability":[{"from":"10-10-2020","to":"15-10-2020"},{"from":"25-10-2020","to":"15-11-2020"},{"from":"10-12-2020","to":"15-12-2020"}]},{"name":"Rotana Hotel","price":80.6,"city":"cairo","availability":[{"from":"10-10-2020","to":"12-10-2020"},{"from":"25-10-2020","to":"10-11-2020"},{"from":"05-12-2020","to":"18-12-2020"}]},{"name":"Le Meridien","price":89.6,"city":"london","availability":[{"from":"01-10-2020","to":"12-10-2020"},{"from":"05-10-2020","to":"10-11-2020"},{"from":"05-12-2020","to":"28-12-2020"}]},{"name":"Golden Tulip","price":109.6,"city":"paris","availability":[{"from":"04-10-2020","to":"17-10-2020"},{"from":"16-10-2020","to":"11-11-2020"},{"from":"01-12-2020","to":"09-12-2020"}]},{"name":"Novotel Hotel","price":111,"city":"Vienna","availability":[{"from":"20-10-2020","to":"28-10-2020"},{"from":"04-11-2020","to":"20-11-2020"},{"from":"08-12-2020","to":"24-12-2020"}]},{"name":"Concorde Hotel","price":79.4,"city":"Manila","availability":[{"from":"10-10-2020","to":"19-10-2020"},{"from":"22-10-2020","to":"22-11-2020"},{"from":"03-12-2020","to":"20-12-2020"}]}]}';
        $hotels = json_decode($hotels, true);
        $data = $hotels['hotels']??[];
        $this->nameServiceObject = new SearchNameService($data, 'Media One Hotel');
        $this->nameServiceObject->search();
        $this->arraySortObject = new ArraySort($this->nameServiceObject);
    }

    public function testNameSort()
    {
        $this->assertEquals($this->arraySortObject->sort('name'), $this->nameServiceObject->getAfterSort());
    }

    public function testPriceSort()
    {
        $this->assertEquals($this->arraySortObject->sort('price'), $this->nameServiceObject->getAfterSort());
    }
}
