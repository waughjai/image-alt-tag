<?php

use PHPUnit\Framework\TestCase;
use WaughJ\ImageAltTag\ImageAltTagList;
use WaughJ\ImageAltTag\ImageAltTag;

class ImageAltTagListTest extends TestCase
{
	public function testInvalidImageAlt()
	{
		$test1 = new ImageAltTagList( 'hdfghfghfghfghdfghdfghfdh' );
		$this->assertTrue( $test1->testAllImagesHaveAltTags() );
		$test1 = new ImageAltTagList( '<img src="something.png">' );
		$this->assertFalse( $test1->testAllImagesHaveAltTags() );
		$test2 = new ImageAltTagList( '<img src="something.png" alt="afdad">' );
		$this->assertTrue( $test2->testAllImagesHaveAltTags() );
		$test3 = new ImageAltTagList( '<img src="something.png" alt="">' );
		$this->assertTrue( $test3->testAllImagesHaveAltTags() );
		$test4 = new ImageAltTagList( '<img src="something.png" alt="afdad"><img src="something.png" alt="">' );
		$this->assertTrue( $test4->testAllImagesHaveAltTags() );
		$test5 = new ImageAltTagList( '<img src="something.png" alt="afdad"><img src="something.png">' );
		$this->assertFalse( $test5->testAllImagesHaveAltTags() );
	}

	public function testGetImageAlts()
	{
		$test1 = new ImageAltTagList( 'adgdfgadfga' );
		$this->assertEquals( [], $test1->getImageAltTags() );
		$test1 = new ImageAltTagList( '<img src="something.png">' );
		$this->assertEquals( [ new ImageAltTag( "something.png", null ) ], $test1->getImageAltTags() );
		$test2 = new ImageAltTagList( '<img src="something.png" alt="afdad">' );
		$this->assertEquals( [ new ImageAltTag( "something.png", "afdad" ) ], $test2->getImageAltTags() );
		$test3 = new ImageAltTagList( '<img src="something.png" alt="">' );
		$this->assertEquals( [ new ImageAltTag( "something.png", "" ) ], $test3->getImageAltTags() );
		$test4 = new ImageAltTagList( '<img src="something.png" alt="afdad"><img src="something.png" alt="">' );
		$this->assertEquals( [ new ImageAltTag( "something.png", "afdad" ), new ImageAltTag( "something.png", "" ) ], $test4->getImageAltTags() );
		$test5 = new ImageAltTagList( '<img src="something.png" alt="afdad"><img src="something.png">' );
		$this->assertEquals( [ new ImageAltTag( "something.png", "afdad" ), new ImageAltTag( "something.png", null ) ], $test5->getImageAltTags() );
	}
}
