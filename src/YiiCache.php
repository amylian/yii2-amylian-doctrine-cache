<?php

/*
 * Copyright 2018 Andreas Prucha, Abexto - Helicon Software Development.
 */

namespace abexto\amylian\yii\doctrine\cache;

/**
 * Description of YiiCache
 *
 * @author Andreas Prucha, Abexto - Helicon Software Development
 */
class YiiCache extends AbstractCache
{

    /**
     *
     * @var string Class of the instance to wrap
     */
    public $instClass = doctrine\YiiCacheProvider::class;

    /**
     *
     * @var id or declaraion of the Yii Cache component
     */
    public $cache = 'cache';

    protected function getInstPropertyMappings()
    {
    return array_merge(parent::getInstPropertyMappings(), ['cache' => 'yiiCache']);
    }

    /**
     * Initializes the application component.
     */
    public function init()
    {
        parent::init();
        $this->cache = \abexto\amylian\yii\doctrine\base\InstanceManager::ensure($this->cache, '\yii\caching\CacheInterface');
        /*
        $this->inst->yiiCache = $this->cache;
        */
    }

}
