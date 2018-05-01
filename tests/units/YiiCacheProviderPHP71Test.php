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

namespace abexto\amylian\yii\doctrine\cache\tests\units;

require_once __DIR__.'/YiiCacheProviderTestTrait.php';

/**
 * Description of YiiCacheProviderTest
 *
 * @author Andreas Prucha, Abexto - Helicon Software Development
 */
class YiiCacheProviderPHP71Test extends \Doctrine\Tests\Common\Cache\CacheTest
{

    use YiiCacheProviderTestTrait;

    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();
    }
    protected function setUp()
    {
        parent::setUp();
        if (PHP_VERSION < 70100) {
            self::markTestSkipped('This is version '.PHP_VERSION.' Test does not apply');
        }
    }
    
    public function testFetchingANonExistingKeyShouldNeverCauseANoticeOrWarning(): void
    {
        $cache        = $this->_getCacheDriver();
        $errorHandler = function ($errno, $errstr, $errfile, $errline, $errcontext) {
            restore_error_handler();
            $this->fail('include failure captured: ' . $errstr);
        };
        set_error_handler($errorHandler);
        $cache->fetch('key');
        self::assertSame(
                $errorHandler, set_error_handler(function () {
                    
                }), 'The error handler is the one set by this test, and wasn\'t replaced'
        );
        restore_error_handler();
        restore_error_handler();
    }
    
    protected function _getCacheDriver()
    {
        return \Yii::createObject([
                    'class' => \abexto\amylian\yii\doctrine\cache\YiiCache::class
                ])->inst;
    }
    

}
