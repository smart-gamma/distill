<?php

/*
 * This file is part of the Distill package.
 *
 * (c) Raul Fraile <raulfraile@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Distill\Exception\IO\Output;

use Distill\Exception\IO\Exception as IOException;

class TargetDirectoryNotWritableException extends IOException
{

    /**
     * Filename.
     * @var string
     */
    protected $filename;

    /**
     * Constructor
     * @param string     $filename  Filename
     * @param int        $code      Exception code
     * @param \Exception $previous  Previous exception
     */
    public function __construct($filename, $code = 0, \Exception $previous = null)
    {
        $this->filename = $filename;

        $message = sprintf('Target directory "%s" is not writable', $filename);

        parent::__construct($message, $code, $previous);
    }

    /**
     * Gets the non-readable filename.
     *
     * @return string Filename.
     */
    public function getFilename()
    {
        return $this->filename;
    }

}
