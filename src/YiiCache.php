<?php

/*
 * Copyright 2018 Andreas Prucha, Abexto - Helicon Software Development.
 */

namespace amylian\yii\doctrine\cache;

/**
 * Description of YiiCache
 *
 * @author Andreas Prucha, Abexto - Helicon Software Development
 */
class YiiCache extends \Doctrine\Common\Cache\CacheProvider implements \amylian\yii\doctrine\cache\ConfigurableCacheInterface
{

    use \amylian\yii\doctrine\base\common\ConfigurableDoctrineTrait;

    /**
     * @var \yii\caching\Cache 
     */
    protected $yiiCache = null;

    public function __construct(array $configArray = [])
    {
        $this->assignConfigurationAttributesFromArray($this->mergeDefaultConfigurationArray($configArray));
    }

    public function getDefaultConfigurationArray(): array
    {
        return
                [
                    'yiiCache' => \yii\di\Instance::of('cache')
        ];
    }

    public function setYiiCache(\yii\caching\Cache $cache)
    {
        $this->yiiCache = $cache;
    }

    public function getYiiCache(): \yii\caching\Cache
    {
        return $this->yiiCache;
    }

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
        return array(
            \Doctrine\Common\Cache\Cache::STATS_HITS => null,
            \Doctrine\Common\Cache\Cache::STATS_MISSES => null,
            \Doctrine\Common\Cache\Cache::STATS_UPTIME => null,
            \Doctrine\Common\Cache\Cache::STATS_MEMORY_USAGE => null,
            \Doctrine\Common\Cache\Cache::STATS_MEMORY_AVAILABLE => null,
        );
    }

    protected function doSave($id, $data, $lifeTime = 0): bool
    {
        return $this->yiiCache->set($id, $data, $lifeTime);
    }

}
