<?php
declare(strict_types=1);

namespace Laventure\Component\Filesystem\File\Base64;

use Laventure\Component\Filesystem\File\Base64\Utils\Encoder\Base64Encoder;

/**
 * Base64File
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Filesystem\File\Base64
 */
class Base64File implements Base64FileInterface
{


    public function __construct(
        protected string $encodedString,
        protected string $extension = ''
    )
    {
    }


    /**
     * @inheritDoc
    */
    public function getSource(): string
    {
        return $this->encodedString;
    }




    /**
     * @inheritDoc
    */
    public function valid(): bool
    {
        $pattern = '/^(?:[data]{4}:(text|image|application)\/[a-z]*)/';

        return preg_match($pattern, $this->encodedString);
    }





    /**
     * @inheritDoc
    */
    public function decode(bool $strict = false): string
    {
        return Base64Encoder::decode($this->encodedString, $strict);
    }




    /**
     * @inheritDoc
    */
    public function getData(): string
    {
        $content = explode(';base64,', $this->encodedString, 2)[1] ?? '';

        if (! $content) {
            return '';
        };

        return Base64Encoder::decode($content);
    }




    /**
     * @inheritDoc
    */
    public function getExtension(): string
    {
        if ($this->extension) {
            return $this->extension;
        }

        return explode('/', $this->getClientMimeType(), 2)[1] ?? '';
    }




    /**
     * @inheritDoc
    */
    public function getSize(): array|bool
    {
       return getimagesize($this->encodedString);
    }




    /**
     * @inheritDoc
    */
    public function getClientMimeType(): string
    {
        return strval(mime_content_type($this->encodedString));
    }
}