<?php

namespace App\Exceptions;

use Exception;

class FileStorageException extends Exception
{
    public static function fileNotFound(): static
    {
        return new static('File Not Found!');
    }

    public static function fileUploadNotSuccess(): static
    {
        return new static('File Upload Not Successfully!');
    }
}
