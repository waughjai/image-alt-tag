<?php

declare( strict_types = 1 );
namespace WaughJ\ImageAltTag
{
	use Symfony\Component\DomCrawler\Crawler;

	class ImageAltTagList
	{
		public function __construct( string $html )
		{
			$this->alt_tags = self::compileImageAltTags( self::getListOfImageObjects( $html ) );
		}

		public function getImageAltTags() : array
		{
			return $this->alt_tags;
		}

		public function testAllImagesHaveAltTags() : bool
		{
			foreach ( $this->alt_tags as $alt )
			{
				if ( !$alt->testIsValid() )
				{
					return false;
				}
			}
			return true;
		}

		private static function compileImageAltTags( array $images ) : array
		{
			$list = [];
			foreach ( $images as $image )
			{
				$list[] = new ImageAltTag( $image->getAttribute( 'src' ), ( $image->hasAttribute( 'alt' ) ) ? $image->getAttribute( 'alt' ) : null );
			}
			return $list;
		}

		private static function getListOfImageObjects( string $html ) : array
		{
			$crawler = new Crawler( $html );
			return $crawler->filter( 'img' )->each
			(
				function ( Crawler $node, $i )
				{
					return $node->getNode( 0 );
				}
			);
		}
	}
}
