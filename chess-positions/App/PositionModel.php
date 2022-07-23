<?php

namespace App;


class PositionModel extends AbstractModel
{
    /**
     * @var string
     */
    protected static $table = 'position';

    /**
     * @var array
     */
    protected static $fenArray = [];

    /**
     * @param array $positionRow
     * @throws \Exception
     */
    public function __construct(array $positionRow)
    {
        parent::__construct($positionRow);

        $fenString = $this->getFenString();

        if (!preg_match(
            '/^([rnbqkp1-8]+\/){7}([rnbqkp1-8]+)\s[bw]\s(-|K?Q?k?q?)\s(-|[a-h][36])\s(\d{1,3})\s(\d{1,3})$/i',
            $fenString)
        ) throw new \Exception('Неправильный формат FEN строки');

        static::$fenArray = explode(' ', $fenString);
    }

    /**
     * @return array
     */
    public function generateChessBoardArray(): array
    {
        $chessBoard = [];
        $curIndex = 0;

        foreach (explode('/', $this->getPositionsString()) as $row) {
            $rowArray = str_split($row);

            foreach ($rowArray as $symbol) {
                if ((int)$symbol > 0) {
                    for ($i = 0; $i < $symbol; $i++) {
                        $chessBoard[$curIndex] = '';
                        $curIndex++;
                    }
                    continue;
                }
                $chessBoard[$curIndex] = $symbol;
                $curIndex++;
            }
        }

        return array_chunk($chessBoard, 8);
    }

    /**
     * @return string
     */
    public function getFenString(): string
    {
        return $this->getField('fen_string');
    }

    /**
     * @return mixed
     */
    public function getPositionsString()
    {
        return static::$fenArray[0];
    }

    /**
     * @return mixed
     */
    public function getNextStep()
    {
        return static::$fenArray[1];
    }

    /**
     * @return mixed
     */
    public function getCastling()
    {
        return static::$fenArray[2];
    }

    /**
     * @return mixed
     */
    public function getPrevStep()
    {
        return static::$fenArray[3];
    }

    /**
     * @return mixed
     */
    public function getLastStep()
    {
        return static::$fenArray[4];
    }

    /**
     * @return mixed
     */
    public function getStepNumber()
    {
        return static::$fenArray[5];
    }
}