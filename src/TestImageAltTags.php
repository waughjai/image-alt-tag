<?php

declare( strict_types = 1 );
namespace WaughJ\TestImageAltTags
{
	class TestImageAltTags
	{
		public function __construct( string $html )
		{
		}

		public function hasImages() : bool
		{
			return false;
		}
	}
}
