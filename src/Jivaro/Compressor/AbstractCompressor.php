<?php

namespace Jivaro\Compressor;

abstract class AbstractCompressor implements CompressorInterface
{

    const TYPE_FILE = 1;
    const TYPE_STRING = 2;

    protected $currentData = '';

    protected $rootDir;

    /**
     * Adds a file to be compressed
     * @param string $path File path
     *
     * @throws \Jivaro\Exception\FileNotFoundException
     * @return CompressorInterface
     */
    public function addFile($path)
    {
        if (!file_exists($path)) {
            throw new \Jivaro\Exception\FileNotFoundException();
        }

        $this->currentData .= file_get_contents($path);

        return $this;
    }

    /**
     * Adds a string to be compressed
     * @param string $data Content
     *
     * @return CompressorInterface
     */
    public function addString($data)
    {
        $this->currentData .= $data;

        return $this;
    }

    /**
     * Gets the transformed contents
     *
     * @return string
     */
    public function getContents()
    {
        return $this->currentData;
    }

    protected function replace(array $matches)
    {
        $path = $this->rootDir . '/' . $matches[1];
        $mime = $this->getMimeType($path);

        return 'url(\'data:'.$mime.';base64,' . base64_encode(file_get_contents($path)) . '\')';
    }

    protected function getMimeType($path)
    {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);

        return finfo_file($finfo, $path);
    }

    /**
     * Minifies current data
     *
     * @return CompressorInterface
     */
    public function minify()
    {

    }

    /**
     * Embeds data URIs
     * @param string $rootDir Root dir
     *
     * @return CompressorInterface
     */
    public function embed($rootDir)
    {

    }


}