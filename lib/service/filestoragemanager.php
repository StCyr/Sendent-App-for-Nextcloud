<?php

namespace OCA\sendent\service;
use OCA\sendent\service\storageexception;

class filestoragemanager
{

    private $storage;

    public function __construct($storage)
    {
        $this->storage = $storage;
    }

    public function writeTxt($group, $key, $content)
    {
        // check if file exists and write to it if possible
        try {
            try {
                $file = $this->storage->get('/sendent/settings/' . 'settinggroupvaluefile' . $group . '_' . $key . '.txt');
            } catch (\OCP\Files\NotFoundException $e) {
                $this->storage->newFile('/sendent/settings/' . 'settinggroupvaluefile' . $group . '_' . $key . '.txt');
                $this->storage->touch('/sendent/settings/' . 'settinggroupvaluefile' . $group . '_' . $key . '.txt');
                $file = $this->storage->get('/sendent/settings/' . 'settinggroupvaluefile' . $group . '_' . $key . '.txt');
            }

            // the id can be accessed by $file->getId();
            $file->putContent($content);
            return '/sendent/settings/' . 'settinggroupvaluefile' . $group . '_' . $key . '.txt';
        } catch (\OCP\Files\NotPermittedException $e) {
            // you have to create this exception by yourself ;)
            $this->storage->newFolder('/sendent/settings');
            if($this->storage->nodeExists('/sendent/settings') !== false)
            {
                return $this->writeTxt($group, $key, $content);
            }
            else{
                throw new StorageException('Cant write to file');
            }
            return 'pleuris';
        }
    }
    public function fileExists($group, $key)
    {
        try {
            $file = $this->storage->get('/sendent/settings/' . 'settinggroupvaluefile' . $group . '_' . $key . '.txt');
            return true;
        } catch (\OCP\Files\NotFoundException $e) {
            return false;
        }
    }
    public function fileExsistsOld($filename)
    {
        try {
            $file = $this->storage->get('/sendent/settings/' . $filename);
            return true;
        } catch (\OCP\Files\NotFoundException $e) {
            return false;
        }
    }

    public function getContent($group, $key)
    {
        // check if file exists and read from it if possible
        try {
            $file = $this->storage->get('/sendent/settings/' . 'settinggroupvaluefile' . $group . '_' . $key . '.txt');
            if ($file instanceof \OCP\Files\File) {
                return $file->getContent();
            } else {
            }
        } catch (\OCP\Files\NotFoundException $e) {
            return 'error';
        }
    }
}
