<?php

namespace Market\Product;

/**
 * Class ImageRepository
 *
 * @package Market\Product
 * @author Ruslan Mavlyanov <r.v.mavlyanov@gmail.com>
 */
class ImageRepository
{
    /**
     * Returns image URL or null.
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