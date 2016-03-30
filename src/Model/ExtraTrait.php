<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ExtraTrait
 *
 * @author lucas
 */

namespace App\Model;

trait ExtraTrait {

    //put your code here

    public function convertMoney($str) {
        if (!empty($str)) {
            if (stripos($str, ',') !== false) {
                $str = str_replace('.', '', $str);
                $str = str_replace(',', '.', $str);
            }
            return floatval($str);
        }
        return $str;
    }

}
