<?php

/*
 * Copyright 2018 Andreas Prucha, Abexto - Helicon Software Development.
 */

namespace abexto\amylian\yii\doctrine\cache\doctrine;

/**
 * Description of YiiCache
 *
 * @author Andreas Prucha, Abexto - Helicon Software Development
 */
class YiiCache extends \Doctrine\Common\Cache\CacheProvider
{

    /**
     * @var \yii\caching\Cache 
     */
    public $yiiCache = null;

    /**
     * @inheritDoc
     */
    protected function doContains($id): bool
    {
        return $this->yiiCache->exists($id);
    }

    protected function doDelete($id): bool
    {
        return $this->yiiCache->delete($id);
    }

    protected function doFetch($id)
    {
        return $this->yiiCache->get($id);
    }

    protected function doFlush(): bool
    {
        return $this->yiiCache->flush();
    }

    protected function doGetStats()
    {
        return [];
    }

    protected function doSave($id, $data, $lifeTime = 0): bool
    {
        return $this->yiiCache->set($id, $data, $lifeTime);
    }

}
