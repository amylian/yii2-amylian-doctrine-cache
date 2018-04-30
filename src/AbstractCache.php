<?php

/*
 * Copyright 2018 Andreas Prucha, Abexto - Helicon Software Development.
 */

namespace abexto\amylian\yii\doctrine\cache;

/**
 * Description of AbstractCache
 *
 * @author Andreas Prucha, Abexto - Helicon Software Development
 * 
 * @property \Doctrine\Common\Cache\CacheProvider $inst Instance of the wrapped Docrtrine CacheProvider
 */
class AbstractCache extends \abexto\amylian\yii\doctrine\base\AbstractDoctrineInstWrapperComponent
{

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
