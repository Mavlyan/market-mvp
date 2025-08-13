<?php

namespace Market\Product\ImageRepository;

use \AwsS3\Client\AwsStorageInterface;

/**
 * Repository for AWS S3 storage.
 */
final class AwsS3StorageRepository implements StorageRepositoryInterface
{
    /**
     * Returns image URL or null.
     *
     * @param $fileName
     * @return string|null
     */
    public function getUrl($fileName): ?string
    {
        /*...*/
    }

    /**
     * Returns whether file exists or not.
     */
    public function fileExists(string $fileName): bool
    {
        /*...*/
    }

    /**
     * Deletes a file in the filesystem and throws an exception in case of errors.
     */
    public function deleteFile(string $fileName): void
    {
        /*...*/
    }

    /**
     * Saves a file in the filesystem and throws an exception in case of errors.
     */
    public function saveFile(string $fileName): void
    {
        /*...*/
    }
}
