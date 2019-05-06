<?php

use PHPUnit\Framework\TestCase;
use WaughJ\ImageAltTag\ImageAltTag;

class ImageAltTagTest extends TestCase
{
	public function testValidity()
	{
		$test1 = new ImageAltTag( 'something.png', null );
		$this->assertFalse( $test1->testIsValid() );
		$test2 = new ImageAltTag( 'something.png', "lkflkasnf" );
		$this->assertTrue( $test2->testIsValid() );
		$test3 = new ImageAltTag( 'something.png', "" );
		$this->assertTrue( $test3->testIsValid() );
	}
}
