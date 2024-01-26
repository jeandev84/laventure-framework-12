<?php
declare(strict_types=1);

namespace Laventure\Utils\Parameter;

/**
 * InputParameter
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Utils\Parameter
*/
class InputParameter extends ArrayParameter
{

    /**
     * @param $id
     * @param int $default
     * @return int
    */
    public function integer($id, int $default = 0): int
    {
        return intval($this->get($id, $default));
    }





    /**
     * @param $id
     * @param string $default
     * @return string
    */
    public function string($id, string $default = ''): string
    {
        return strval($this->get($id, $default));
    }





    /**
     * @param $id
     * @param float $default
     * @return float
     */
    public function float($id, float $default = 0): float
    {
        return floatval($this->get($id, $default));
    }






    /**
     * @param $id
     * @param bool $default
     * @return bool
     */
    public function boolean($id, bool $default = false): bool
    {
        return boolval($this->get($id, $default));
    }




    /**
     * @param string $id
     *
     * @return string
     */
    public function toUpper(string $id): string
    {
        return strtoupper($this->string($id));
    }





    /**
     * @param string $id
     *
     * @return string
     */
    public function toLower(string $id): string
    {
        return strtolower($this->string($id));
    }







    /**
     * @param $id
     * @param string $search
     * @param string $replace
     * @return array|mixed|string|string[]
     */
    public function replace($id, string $search, string $replace): mixed
    {
        return str_replace($search, $replace, $this->get($id));
    }






    /**
     * @param $id
     * @param $value
     * @return bool
    */
    public function same($id, $value): bool
    {
        return $this->get($id) === $value;
    }
}