<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace amylian\yii\doctrine\cache;

/**
 * Description of ArrayCache
 *
 * @author andreas
 */
class ArrayCache extends \Doctrine\Common\Cache\ArrayCache implements ConfigurableCacheInterface
{
    use \amylian\yii\doctrine\base\common\ConfigurableDoctrineTrait;
    
    public function __construct(array $configArray = [])
    {
        parent::__construct();
        $this->assignConfigurationAttributesFromArray($configArray);
    }
    
}
