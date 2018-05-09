<?php

/*
 * Copyright 2018 Andreas Prucha, Abexto - Helicon Software Development.
 */

namespace amylian\yii\doctrine\cache;

/**
 * Description of AbstractCache
 *
 * @author Andreas Prucha, Abexto - Helicon Software Development
 * 
 * @property \Doctrine\Common\Cache\CacheProvider $inst Instance of the wrapped Docrtrine CacheProvider
 */
class BaseCache extends \amylian\yii\doctrine\base\BaseDoctrineComponent implements BaseCacheInterface
{
    const DEFAULT_REF = Consts::DEFAULT_CACHE_REF;
    const DEFAULT_CLASS = Consts::DEFAULT_CACHE_CLASS;

    /**
     * @var string Namespace Cache Namespace
     */
    public $namespace = null;

    protected function getInstPropertyMappings()
    {
        return array_merge(parent::getInstPropertyMappings(), [
            'namespace' => 'namespace'
        ]);
    }

}
