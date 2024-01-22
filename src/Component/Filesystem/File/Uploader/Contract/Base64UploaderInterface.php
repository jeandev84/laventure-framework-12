<?php
declare(strict_types=1);

namespace Laventure\Component\Filesystem\File\Uploader\Contract;


use Laventure\Component\Filesystem\Contract\Uploader\UploaderInterface;
use Laventure\Component\Filesystem\File\Base64\Contract\HasBase64FileInterface;

/**
 * Base64UploaderInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Filesystem\File\Uploader\Contract
 */
interface Base64UploaderInterface extends UploaderInterface, HasBase64FileInterface
{
}