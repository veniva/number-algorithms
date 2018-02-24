<?php

namespace Classes\Output;

use Classes\Contracts\NumbersInterface;

class ToFile extends Table
{
    protected $fp;
    protected $numbers;

    /**
     * @param NumbersInterface $numbers
     * @param string $filePath
     * @throws \Exception
     */
    public function __construct(NumbersInterface $numbers, string $filePath = null)
    {
        parent::__construct($numbers);

        $this->fOpen($filePath);
    }

    public function getTHead()
    {
        $this->makeTHead();
    }

    public function getTBody()
    {
        $this->makeTBody();
    }

    public function toMedium(string $str = null)
    {
        $this->fWrite($str);
    }

    /**
     * @param string $fileName
     * @throws \Exception
     */
    public function fOpen(string $fileName = null)
    {
        $folder = './data/';
        if(!is_dir($folder)) mkdir($folder);

        $fileName .= !$fileName ? 'numbers-calculated.txt' : $fileName;

        $filePath = $folder.$fileName;

        $fp = fopen($filePath, 'w');
        if ($fp === false) {
            throw new \Exception('The file '.$filePath.' cannot be opened.');
        } else {
            $this->fp = $fp;
        }
    }

    public function fWrite(string $str)
    {
        fwrite($this->fp, $str);
    }

    /**
     * @param mixed $fp
     */
    public function setFp($fp)
    {
        $this->fp = $fp;
    }
}