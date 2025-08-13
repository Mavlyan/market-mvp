<?php

namespace Market\Product;

use Market\Product\ImageRepository\AwsS3StorageRepository;
use Market\Product\ImageRepository\FileStorageRepository;

/**
 * Class ImageRepository
 *
 * @package Market\Product
 * @author Ruslan Mavlyanov <r.v.mavlyanov@gmail.com>
 */
class ImageRepository
{
    public function __construct(
        private readonly AwsS3StorageRepository $awsS3StorageRepository,
        private readonly FileStorageRepository  $fileStorageRepository
    )
    {
    }

    /**
     * Returns image URL or null.
     */
    public function getUrl($fileName): ?string
    {
        if ($this->awsS3StorageRepository->fileExists($fileName)) {
            return $this->awsS3StorageRepository->getUrl($fileName);
        }

        if ($this->fileStorageRepository->fileExists($fileName)) {
            return $this->fileStorageRepository->getUrl($fileName);
        }

       return null;
    }

    /**
     * Deletes a file and throws an exception in case of errors.
     */
    public function deleteFile(string $fileName): void
    {
        if ($this->awsS3StorageRepository->fileExists($fileName)) {
            $this->awsS3StorageRepository->deleteFile($fileName);
        }

        if ($this->fileStorageRepository->fileExists($fileName)) {
            $this->fileStorageRepository->deleteFile($fileName);
        }
    }

    /**
     * Saves a file and throws an exception in case of errors.
     */
    public function saveFile(string $fileName): void
    {
        /*...*/
    }
}