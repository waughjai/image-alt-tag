<?php

declare( strict_types = 1 );
namespace WaughJ\ImageAltTag
{
	class ImageAltTag
	{
		public function __construct( string $src, $value )
		{
			$this->src = $src;
			$this->value = $value;
		}

		public function getSrc() : string
		{
			return $this->src;
		}

		public function getValue()
		{
			return $this->value;
		}

		public function testIsValid() : bool
		{
			return $this->value !== null;
		}
	}
}
