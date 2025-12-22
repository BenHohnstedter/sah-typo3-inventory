<?php

namespace benh\sahiv\Service;


use benh\sahiv\Domain\Repository\PearlRepository;
use benh\sahiv\Domain\Repository\CharmRepository;
use benh\sahiv\Domain\Repository\AccessoryRepository;
use benh\sahiv\Domain\Repository\ProductRepository;
use TYPO3\CMS\Core\Resource\DuplicationBehavior;
use TYPO3\CMS\Core\Resource\FileRepository;
use TYPO3\CMS\Core\Resource\ResourceFactory;
use TYPO3\CMS\Core\Resource\StorageRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\StringUtility;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;

class ImageService
{
    const TYPE_PRODUCT = 'Product';
    const TYPE_PEARL = 'Pearl';
    const TYPE_CHARM = 'Charm';
    const TYPE_ACCESSORIE = 'Accessorie';

    public function __construct(
        protected ProductRepository $productRepository,
        protected PearlRepository $pearlRepository,
        protected CharmRepository $charmRepository,
        protected AccessoryRepository $accessoryRepository,
        protected ResourceFactory $resourceFactory,
        protected FileRepository $fileRepository,
        protected StorageRepository $storageRepository,
    ) {
    }
    public function attachFileUpload(object $object, array $file, $type): void
    {
        if (empty($file)) {
            return;
        }

        $falIdentifier = '1:/Images/' . $type . 's';
        $image = $file['image'];

        // Attach the file to the wanted storage
        $falFolder = $this->resourceFactory->retrieveFileOrFolderObject($falIdentifier);
        $fileObject = $falFolder->addFile(
            $image->getTemporaryFileName(),
            $image->getClientFilename(),
            DuplicationBehavior::REPLACE,
        );

        // Initialize a new storage object
        $newObject = [
            'uid_local' => $fileObject->getUid(),
            'uid_foreign' => StringUtility::getUniqueId('NEW'),
            'uid' => StringUtility::getUniqueId('NEW'),
            'crop' => null,
        ];

        // Create the FileReference Object
        $fileReference = $this->resourceFactory->createFileReferenceObject($newObject);

        // Port the FileReference Object to an Extbase FileReference
        $fileReferenceObject = GeneralUtility::makeInstance(FileReference::class);
        $fileReferenceObject->setOriginalResource($fileReference);

        // Persist the created file reference object to our Blog model
        $object->setImages($fileReferenceObject);

        switch ($type) {
            case self::TYPE_PRODUCT:
                $this->productRepository->add($object);
                break;
            case self::TYPE_PEARL:
                $this->pearlRepository->add($object);
                break;
            case self::TYPE_CHARM:
                $this->charmRepository->add($object);
                break;
            case self::TYPE_ACCESSORIE:
                $this->accessoryRepository->add($object);
                break;
        }

        // Note: For multiple files, a wrapping ObjectStorage would be needed
    }

    public function removeFileUpload($object, $file): void
    {
        if (!empty($object->getImages() && !empty($file))) {
            /** @var FileReference $image */
            foreach ($object->getImages() as $image) {
                $image->getOriginalResource()->delete();
            }
        }
    }
}
