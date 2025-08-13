<?php

namespace Market;
use \Market\Product\ImageRepository;

/**
 * Represents a single product record stored in DB.
 */
class Product
{
    private ImageRepository $storage;

    private string $mainImageFileName;

    private array $additionalImagesFileNames;

    public function __construct(ImageRepository $fileStorageRepository)
    {
        $this->storage = $fileStorageRepository;
    }

    /**
     * Returns product image URL.
     */
    public function getMainImageUrl(): ?string
    {
        return $this->storage->getUrl($this->mainImageFileName);
    }

    /**
     * Returns product image URL.
     */
    public function getAdditionalImagesUrls(): array
    {
        $urls = [];
        foreach ($this->additionalImagesFileNames as $fileName) {
            $urls[] = $this->storage->getUrl($fileName);
        }

        return array_filter($urls);
    }

    /**
     * Returns whether main image was successfully updated or not.
     */
    public function updateMainImage(): bool
    {
        /*...*/
        try {
            $this->storage->deleteFile($this->mainImageFileName);
            $this->storage->saveFile($this->mainImageFileName);
        } catch (\Exception) {
            /*...*/
            return false;
        }
        /*...*/
        return true;
    }

    /**
     * Returns whether additional images were successfully updated or not.
     */
    public function updateAdditionalImages(): bool
    {
        /*...*/
        foreach ($this->additionalImagesFileNames as $fileName) {
            try {
                $this->storage->deleteFile($fileName);
                $this->storage->saveFile($fileName);
            } catch (\Exception) {
                /*...*/
                return false;
            }
        }

        /*...*/
        return true;
    }
}
