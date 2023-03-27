<?php

namespace App\Helpers;

use App\Exceptions\FileStorageException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StorageHelper
{
    protected string|UploadedFile $file;

    protected string $fileName;

    protected string $originName;

    protected string $fileExtension;

    protected string $filePath;

    protected string $disk;

    /**
     * @throws FileStorageException
     */
    public function store($file, $externalPath = '/', $disk = null, array $customOptions = []): array
    {
        $this->setFile($file)
            ->preProcessing($externalPath, $disk);
        $result = $this->getResult();

        $options = [];
        $isPdfFile = $this->checkFileExtension('pdf');
        if ($isPdfFile) {
            $options['ContentType'] = "application/pdf";
        }
        $options = array_merge($options, $customOptions);

        Storage::disk($this->getDisk())->putFileAs($externalPath, $file, $this->getFileName(), $options);
        $result['url'] = Storage::disk($this->getDisk())->url($this->getFilePath());

        return $result;
    }

    public function delete(string $path, string $disk): void
    {
        Storage::disk($disk)->delete($path);
    }

    public function copy(string $currentPath, string $externalPath , string $disk = null): array
    {
        $this->file = $currentPath;
        $this->preProcessing($externalPath, $disk);
        $result = $this->getResult();

        Storage::disk($this->getDisk())->copy($currentPath, $this->getFilePath());
        $result['url'] = Storage::disk($this->getDisk())->url($this->getFilePath());
        return $result;
    }

    public function move(string $currentPath, string $externalPath , string $disk = null): array
    {
        $this->file = $currentPath;
        $this->preProcessing($externalPath, $disk);
        $result = $this->getResult();

        Storage::disk($this->getDisk())->move($currentPath, $this->getFilePath());
        $result['url'] = Storage::disk($this->getDisk())->url($this->getFilePath());
        return $result;
    }

    public function preProcessing($externalPath, $disk = null): static
    {
        $this
            ->setFileExtension($this->getFile())
            ->setFileOriginalName($this->getFile())
            ->setFileName()
            ->setFilePath($externalPath)
            ->setDisk($disk);

        return $this;
    }

    public function getResult(): array
    {
        return [
            'original_name' => $this->getFileOriginalName(),
            'name' => $this->getFileName(),
            'disk' => $this->getDisk(),
            'path' => $this->getFilePath(),
        ];
    }

    /**
     * @throws FileStorageException
     */
    public function setFile(string|UploadedFile $file): static
    {
        $fileFromRequest = true;
        if (empty($file)) {
            throw FileStorageException::fileNotFound();
        }

        if (is_string($file)) {
            $fileFromRequest = false;
            if (!file_exists($file)) {
                throw FileStorageException::fileNotFound();
            }
            $fileName = pathinfo($file, PATHINFO_BASENAME);
            $file = new UploadedFile($file, $fileName);
        }

        if (!($file instanceof UploadedFile)) {
            throw FileStorageException::fileNotFound();
        }

        if ($fileFromRequest && !$file->isValid()) {
            throw FileStorageException::fileUploadNotSuccess();
        }

        $this->file = $file;

        return $this;
    }

    public function getFile(): UploadedFile|string
    {
        return $this->file;
    }

    public function setFileExtension($file): static
    {
        $this->fileExtension = match (true) {
            $file instanceof UploadedFile => strtolower($this->getFile()->getClientOriginalExtension()),
            default => pathinfo($file, PATHINFO_EXTENSION),
        };

        return $this;
    }

    public function getFileExtension(): string
    {
        return $this->fileExtension;
    }

    public function setFileName(): static
    {
        $fileName = Str::of(pathinfo($this->getFileOriginalName(), PATHINFO_FILENAME))
            ->append('_')
            ->append(uniqid())
            ->append('.')
            ->append($this->getFileExtension())
            ->snake();

        $this->fileName = $fileName;
        return $this;
    }

    public function getFileName(): string
    {
        return $this->fileName;
    }

    public function setFileOriginalName($file): static
    {
        $this->originName = match (true) {
            $file instanceof UploadedFile => $this->getFile()->getClientOriginalName(),
            default => basename($file),
        };

        return $this;
    }

    public function getFileOriginalName(): string
    {
        return $this->originName;
    }

    public function checkFileExtension($type): bool
    {
        return $this->getFileExtension() == $type;
    }

    public function setFilePath($externalPath): static
    {
        $this->filePath = trim($externalPath.'/'.$this->getFileName(), '/');
        return $this;
    }

    public function getFilePath(): string
    {
        return $this->filePath;
    }

    public function setDisk($disk = null): static
    {
        $this->disk = $disk ?: config('filesystems.default');
        return $this;
    }

    public function getDisk(): string
    {
        return $this->disk;
    }
}
