<?php
namespace App\Facades;

use Illuminate\Support\Facades\Facade;
use App\Facades\StorageHelper as StorageHelperInstance;

class StorageHelper extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return StorageHelperInstance::class;
    }
}
