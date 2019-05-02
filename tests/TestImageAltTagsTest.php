<?php

use PHPUnit\Framework\TestCase;
use WaughJ\TestImageAltTags\TestImageAltTags;

class TestImageAltTagsTest extends TestCase
{
	public function testObjectWorks()
	{
		$object = new TestImageAltTags();
		$this->assertTrue( is_object( $object ) );
	}
}
