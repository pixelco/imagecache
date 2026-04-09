<?php

namespace Pixelco\Image\Test;

use Pixelco\Image\AbstractDriver;
use Pixelco\Image\CachedImage;
use Pixelco\Image\Image;
use PHPUnit\Framework\TestCase;

class CachedImageTest extends TestCase
{
    public function testSetFromOriginal()
    {
        $image = $this->getTestImage();
        $cachedImage = new CachedImage();
        $cachedImage->setFromOriginal($image, 'foo-key');

        $this->assertInstanceOf(AbstractDriver::class, $cachedImage->getDriver());
        $this->assertEquals('mock', $cachedImage->getCore());
        $this->assertEquals('image/png', $cachedImage->mime);
        $this->assertEquals('./tmp', $cachedImage->dirname);
        $this->assertEquals('foo.png', $cachedImage->basename);
        $this->assertEquals('png', $cachedImage->extension);
        $this->assertEquals('foo', $cachedImage->filename);
        $this->assertEquals([], $cachedImage->getBackups());
        $this->assertEquals('', $cachedImage->encoded);
        $this->assertEquals('foo-key', $cachedImage->cachekey);
    }

    private function getTestImage()
    {
        $driver = $this->getMockForAbstractClass(AbstractDriver::class);
        $image = new Image($driver, 'mock');
        $image->mime = 'image/png';
        $image->dirname = './tmp';
        $image->basename = 'foo.png';
        $image->extension = 'png';
        $image->filename = 'foo';

        return $image;
    }
}
