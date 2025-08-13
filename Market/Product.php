<?php

namespace Market;
use \Market\Product\ImageRepository;

/**
 * Represents a single product record stored in DB.
 */
class Product
{
    private ImageRepository $storage;

    private string $imageFileName;

    public function __construct(ImageRepository $fileStorageRepository)
    {
        $this->storage = $fileStorageRepository;
    }

    /**
     * Returns product image URL.
     */
    public function getImageUrl(): ?string
    {
        if ($this->storage->fileExists($this->imageFileName) !== true) {
            return null;
        }
        return $this->storage->getUrl($this->imageFileName);
    }

    /**
     * Returns whether image was successfully updated or not.
     */
    public function updateImage(): bool
    {
        /*...*/
        try {

            if ($this->storage->fileExists($this->imageFileName) !== true) {
                $this->storage->deleteFile($this->imageFileName);
            }
            $this->storage->saveFile($this->imageFileName);
        } catch (\Exception $exception) {
            /*...*/
            return false;
        }
        /*...*/
        return true;
    }
}
