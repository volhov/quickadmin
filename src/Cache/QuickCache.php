<?php

namespace Laraveldaily\Quickadmin\Cache;

use Illuminate\Filesystem\Filesystem;

class QuickCache
{
    /**
     * @var string
     */
    private $cacheDir;

    /**
     * @var Filesystem
     */
    private $files;

    /**
     * QuickCache constructor.
     */
    public function __construct()
    {
        $this->cacheDir = storage_path('framework' . DIRECTORY_SEPARATOR . 'cache' . DIRECTORY_SEPARATOR);
        $this->files = new Filesystem();
        if (!file_exists($this->cacheDir)) {
            mkdir($this->cacheDir);
        }
    }

    /**
     * Put information into cache file
     *
     * @param string $filename Filename
     * @param array  $content  Content
     *
     */
    public function put($filename, $content)
    {
        // Merge existing content to new content
        if (file_exists($this->cacheDir . $filename) && file_get_contents($this->cacheDir . $filename) != '') {
            $cachedContent = $this->get($filename);
            $content = array_merge($content, $cachedContent);
        }
        $this->files->put($this->cacheDir . $filename, json_encode($content));
    }

    /**
     * Get file contents
     *
     * @param string $filename Filename
     *
     * @return array
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function get($filename)
    {
        return (array)json_decode($this->files->get($this->cacheDir . $filename));
    }

    /**
     * Delete cache file
     *
     * @param string $filename Filename
     *
     * @return void
     */
    public function destroy($filename)
    {
        $this->files->delete($this->cacheDir . $filename);
    }
}