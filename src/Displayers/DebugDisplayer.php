<?php

/**
 * This file is part of Laravel Exceptions by Graham Campbell.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at http://bit.ly/UWsjkb.
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace GrahamCampbell\Exceptions\Displayers;

use Exception;
use Whoops\Handler\PrettyPageHandler as Handler;
use Whoops\Run as Whoops;

/**
 * This is the debug displayer class.
 *
 * @author    Graham Campbell <graham@mineuk.com>
 * @copyright 2014 Graham Campbell
 * @license   <https://github.com/GrahamCampbell/Laravel-Exceptions/blob/master/LICENSE.md> Apache 2.0
 */
class DebugDisplayer implements DisplayerInterface
{
    /**
     * Get the HTML content associated with the given exception.
     *
     * @param \Exception $exception
     * @param int        $code
     *
     * @return string
     */
    public function display(Exception $exception, $code)
    {
        return $this->whoops()->handleException($exception);
    }

    /**
     * Get the whoops instance.
     *
     * @return \Whoops\Run
     */
    protected function whoops()
    {
        $whoops = new Whoops();
        $whoops->allowQuit(false);
        $whoops->writeToOutput(false);
        $whoops->pushHandler(new Handler());

        return $whoops;
    }
}
