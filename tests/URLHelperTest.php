<?php
// PHPUNIT // -> Site
// vendor/bin/phpunit tests             -> Pour tester
use App\URLHelper;
use PHPUnit\Framework\TestCase;

class URLHelperTest extends TestCase {
    
    public function assserURLEquals(string $expected, string $url){
        $this->assertEquals($expected, urldecode($url));
    }

    public function testWithParam () {
        $url = URLHelper::withParam([], 'k', 3);
        $this->assserURLEquals("k=3", $url);
    }

    public function testWithParamWithArray () {
        $url = URLHelper::withParam([], 'k', [3,2,1]);
        $this->assserURLEquals("k=3,2,1", $url);
    }

    public function testWithParams () {
        $url = URLHelper::withParams(["a" => 3], ["a" => 5, "b" => 6]);
        $this->assserURLEquals("a=5&b=6", $url);
    }

    public function testWithParamsWithArray () {
        $url = URLHelper::withParams(["a" => 3], ["a" => [5,6], "b" => 6]);
        $this->assserURLEquals("a=5,6&b=6", $url);
    }
}