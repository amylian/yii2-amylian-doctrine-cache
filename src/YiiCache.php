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
    public $instClass = doctrine\YiiCache::class;

    /**
     *
     * @var id or declaraion of the Yii Cache component
     */
    public $cache = 'cache';

    protected function getInstPropertyMatchings()
    {
        return array_merge(parent::getInstPropertyMatchings(), ['cache' => 'yiiCache']);
    }

    /**
     * Initializes the application component.
     */
    public function init()
    {
        parent::init();
        $this->cache = \yii\di\Instance::ensure($this->cache, '\yii\caching\CacheInterface');
    }

}
