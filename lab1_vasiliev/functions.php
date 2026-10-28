<?php
function obshchayaSumma($arr) {
            $sum = 0;
            foreach($arr as $el) {
                $sum += $el["summa"];
            }
            return $sum;
        }

        function summaNaCheloveka($t, $p) {
            return $t/$p;
        }

        function statusByudzheta($b, $t) {
            if ($t < $b) {
                return "Бюджета достаточно, остаток " . $b - $t . " " . VALYUTA;
            } elseif ($t === $b) {
                return "Бюджет использован полностью";
            } else {
                return "Бюджет превышен, не хватает " . $t - $b . " " . VALYUTA;
            }
        }