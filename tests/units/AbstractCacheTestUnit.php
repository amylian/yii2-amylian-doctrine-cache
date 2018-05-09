<?php

/*
 * BSD 3-Clause License
 * 
 * Copyright (c) 2018, Abexto - Helicon Software Development / Amylian Project
 * 
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 * 
 * * Redistributions of source code must retain the above copyright notice, this
 *   list of conditions and the following disclaimer.
 * 
 * * Redistributions in binary form must reproduce the above copyright notice,
 *   this list of conditions and the following disclaimer in the documentation
 *   and/or other materials provided with the distribution.
 * 
 * * Neither the name of the copyright holder nor the names of its
 *   contributors may be used to endorse or promote products derived from
 *   this software without specific prior written permission.
 * 
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 * DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE
 * FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL
 * DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
 * SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY,
 * OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 * 
 */

namespace amylian\yii\doctrine\cache\tests\units;

/**
 * Description of CoreDoctrineInstWrapperComponentTest
 *
 * @author Andreas Prucha, Abexto - Helicon Software Development
 */
abstract class AbstractCacheTestUnit extends \amylian\yii\phpunit\AbstractYiiTestCase
{

    /**
     * @return \Doctrine\Common\Cache\CacheProvider
     */
    protected function getCacheInst()
    {
        return \Yii::$app->dcCache->inst; 
    }
    
    public function testSave()
    {
        $this->getCacheInst()->save('amylian_test_key', 'amylian_test_data');
        $this->assertEquals('amylian_test_data', $this->getCacheInst()->fetch('amylian_test_key'));
    }
    
    public function testFlushAll()
    {
        $this->getCacheInst()->save('amylian_test_key', 'amylian_test_data');
        $this->getCacheInst()->flushAll();
        $this->assertFalse($this->getCacheInst()->fetch('amylian_test_key'));
    }
    
    public function testSaveMultiple()
    {
        $testData = [
            'amylian_test_key1' => 'amylian_test_data1',
            'amylian_test_key2' => 'amylian_test_data2',
        ];
        $this->getCacheInst()->flushAll();
        $this->getCacheInst()->saveMultiple($testData);
        $this->assertSame($testData, $this->getCacheInst()->fetchMultiple(array_keys($testData)));
    }
    
}
