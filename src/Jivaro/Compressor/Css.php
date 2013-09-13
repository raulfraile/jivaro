<?php

namespace Jivaro\Compressor;

use Jivaro\Operation\MinifyInterface;

class Css extends AbstractCompressor implements MinifyInterface
{

    /**
     * Minifies current data
     *
     * @return string
     */
    public function minify()
    {
        $data = $this->currentData;

        // strip comments
        $data = preg_replace('!/\*.*?\*/!s','', $data);
        $data = preg_replace('/\n\s*\n/',"\n", $data);

        // trailing semicolon
        $data = preg_replace('/;}/','}',$data);

        // minify
        $data = preg_replace('/[\n\r \t]/',' ', $data);
        $data = preg_replace('/ +/',' ', $data);
        $data = preg_replace('/ ?([,:;{}]) ?/','$1',$data);

        // update current data
        $this->currentData = $data;

        return $this;
    }

    /**
     * Embeds data URIs
     * @param string $rootDir Root dir
     *
     * @return CompressorInterface
     */
    public function embed($rootDir)
    {
        $this->rootDir = $rootDir;

        $this->currentData = preg_replace_callback('/url\(\s?[\"\']?([^\"\')]+)\s?[\"\']?\)/', array($this, 'replace'), $this->currentData);

        return $this;
    }

}