<?php

namespace Jivaro\Compressor;

use Jivaro\Operation\MinifyInterface;

interface CompressorInterface
{

    /**
     * Adds a file to be compressed
     * @param string $path File path
     *
     * @return CompressorInterface
     */
    public function addFile($path);

    /**
     * Adds a string to be compressed
     * @param string $data Content
     *
     * @return CompressorInterface
     */
    public function addString($data);

    /**
     * Minifies current data
     *
     * @return CompressorInterface
     */
    public function minify();

    /**
     * Embeds data URIs
     * @param string $rootDir Root dir
     *
     * @return CompressorInterface
     */
    public function embed($rootDir);

    /**
     * Gets the transformed contents
     *
     * @return string
     */
    public function getContents();
}