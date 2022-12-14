<?php

namespace App\Listener;

use App\Entity\Skills;
use App\Entity\Portfolio;
use Doctrine\Common\EventSubscriber;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Liip\ImagineBundle\Imagine\Cache\CacheManager;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Templating\Helper\UploaderHelper;

class ImageCacheSubscriber implements EventSubscriber
{
    /**
     * @var CacheManager
     */
    private $cacheManager;

    /**
     * @var UploaderHelper
     */
    private $uploaderHelper;

    public function __construct(CacheManager $cacheManager, UploaderHelper $uploaderHelper)
    {
        $this->cacheManager = $cacheManager;
        $this->uploaderHelper = $uploaderHelper;
    }

    public function getSubscribedEvents()
    {
        return [
            'preRemove',
            'preUpdate'
        ];
    }
    public function preRemove(LifecycleEventArgs $args)
    {
        $entity =  $args->getObject();
        if ($entity instanceof Skills){
            $this->cacheManager->remove($this->uploaderHelper->asset($entity, 'logoFile'));   
        }
        if ($entity instanceof Portfolio){
            $this->cacheManager->remove($this->uploaderHelper->asset($entity, 'imageFile'));
        }
        else{
            return;   
        }
    }

    public function preUpdate(PreUpdateEventArgs $args)
    {
        $entity =  $args->getEntity();
        if ($entity instanceof Skills){
            if ($entity->getLogoFile() instanceof UploadedFile){
                $this->cacheManager->remove($this->uploaderHelper->asset($entity, 'logoFile'));
            }
        }
        if ($entity instanceof Portfolio){
            if ($entity->getImageFile() instanceof Uploadedfile){
                $this->cacheManager->remove($this->uploaderHelper->asset($entity, 'imageFile'));
            }
        }
        else{
            return;
        }
    }
}