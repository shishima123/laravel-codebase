<?php

namespace Tests\Feature;

use App\Facades\StorageHelper;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class StorageHelperTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_file_can_be_uploaded(): void
    {
        Storage::fake('photos');

        $result = StorageHelper::store(UploadedFile::fake()->image('photo.jpg'), '/', 'photos');

        // Assert one or more files were stored...
        Storage::disk('photos')->assertExists($result['name']);
    }

    public function test_file_can_be_deleted(): void
    {
        Storage::fake('photos');

        $result = StorageHelper::store(UploadedFile::fake()->image('photo.jpg'), '/', 'photos');

        // Assert one or more files were stored...
        Storage::disk('photos')->assertExists($result['name']);

        StorageHelper::delete($result['path'], $result['disk']);
        Storage::disk('photos')->assertMissing($result['name']);
    }

    public function test_file_can_be_copy(): void
    {
        Storage::fake('photos');

        $result = StorageHelper::store(UploadedFile::fake()->image('photo.jpg'), '/', 'photos');

        // Assert one or more files were stored...
        Storage::disk('photos')->assertExists($result['name']);

        $resultCopy = StorageHelper::copy($result['path'], '/', 'photos');
        Storage::disk('photos')->assertExists($resultCopy['name']);
    }

    public function test_file_can_be_move(): void
    {
        Storage::fake('photos');

        $result = StorageHelper::store(UploadedFile::fake()->image('photo.jpg'), '/', 'photos');

        // Assert one or more files were stored...
        Storage::disk('photos')->assertExists($result['name']);

        $resultMove = StorageHelper::move($result['path'], '/', 'photos');
        Storage::disk('photos')->assertMissing($result['name']);
        Storage::disk('photos')->assertExists($resultMove['name']);
    }
}
