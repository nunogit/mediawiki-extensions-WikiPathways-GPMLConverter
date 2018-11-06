<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use WikiPathways\GPML\Converter;

# TODO: how should we do this properly?
if ( !function_exists("wfDebugLog") ) {
	function wfDebugLog( $msg ) {
		echo $msg;
	}
}


final class GPMLConverterTest extends TestCase
{

    public function testInstantiateClass()
    {
        $this->assertInstanceOf(
            Converter::class,
	    new Converter( "WP4" )
        );
    }

    public function testGPML2PVJSON()
    {
	$identifier="WP4";
	$input=file_get_contents(__DIR__."/../data/minimal.gpml");
	$expected=file_get_contents(__DIR__."/../data/minimal.json");
	$this->converted = (new Converter( $identifier ))->gpml2pvjson(
		$input,
		[ "identifier" => $identifier,
		  "version" => "0",
		  "organism" => "Human" ]
	);
	#file_put_contents(__DIR__."/../data/minimal.json", $this->converted);
        $this->assertEquals(
	    $expected,
	    $this->converted
        );
    }

    public function testJSON2SVG()
    {
	$identifier="WP4";
	$input=file_get_contents(__DIR__."/../data/minimal.json");
	$expected=file_get_contents(__DIR__."/../data/minimal.svg");
	$this->converted = (new Converter( $identifier ))->getPvjson2svg(
	    $input,
	    []
	);
	#file_put_contents(__DIR__."/../data/minimal.svg", $this->converted);
        $this->assertEquals(
            $expected,
	    $this->converted
        );
    }

}
