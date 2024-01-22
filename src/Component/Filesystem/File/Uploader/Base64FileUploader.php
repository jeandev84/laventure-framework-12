<?php
declare(strict_types=1);

namespace Laventure\Component\Filesystem\File\Uploader;

use Laventure\Component\Filesystem\File\Base64\Base64FileInterface;
use Laventure\Component\Filesystem\File\Uploader\Contract\Base64FileUploaderInterface;
use Laventure\Component\Filesystem\File\Writer\Contract\FileWriterInterface;

/**
 * Base64FileUploader
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Filesystem\File\Uploader
*/
class Base64FileUploader implements Base64FileUploaderInterface
{


    /**
     * @var Base64FileInterface
    */
    protected Base64FileInterface $file;



    /**
     * @var FileWriterInterface
    */
    protected FileWriterInterface $writer;



    /**
     * @param FileWriterInterface $writer
     *
     * @param Base64FileInterface $file
    */
    public function __construct(
        FileWriterInterface $writer,
        Base64FileInterface $file
    )
    {
        $this->writer = $writer;
        $this->file   = $file;
    }




    /**
     * @inheritDoc
    */
    public function getFileBase64(): Base64FileInterface
    {
        return $this->file;
    }




    /**
     * @inheritDoc
    */
    public function upload(): mixed
    {
         $data = $this->getFileBase64()->getData();

         return $this->writer->write($data);
    }
}