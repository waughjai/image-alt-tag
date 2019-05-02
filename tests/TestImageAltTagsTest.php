<?php

use PHPUnit\Framework\TestCase;
use WaughJ\TestImageAltTags\TestImageAltTags;

class TestImageAltTagsTest extends TestCase
{
	public function testImageRecognition()
	{
		$test = new TestImageAltTags( 'ajhsfhsdkfhsadkfh' );
		$this->assertFalse( $test->hasImages() );
		$test = new TestImageAltTags( '<img src="something.png">' );
		$this->assertTrue( $test->hasImages() );
	}
}
