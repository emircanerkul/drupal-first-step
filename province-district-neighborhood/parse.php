<?php
/*
MIT License

Copyright (c) 2020 Emircan ERKUL

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
*/

$iller = json_decode(file_get_contents("./data/il.json"))[2]->data;
$ilceler = json_decode(file_get_contents("./data/ilce.json"))[2]->data;
$mahalleler = json_decode(file_get_contents("./data/mahalle.json"))[2]->data;
$csv = "";

foreach ($iller as $il) {
    $sehir_title = $il->sehir_title;
    $sehir_key = $il->sehir_key;
    $csv .= $sehir_title . ",,\n";
    foreach ($ilceler as $ilce) {
        $ilce_sehirkey = $ilce->ilce_sehirkey;
        if ($sehir_key == $ilce_sehirkey) {
            $ilce_title = $ilce->ilce_title;
            $ilce_key = $ilce->ilce_key;
            $csv .= "," . $ilce_title . ",\n";
            foreach ($mahalleler as $mahalle) {
                $mahalle_ilcekey = $mahalle->mahalle_ilcekey;
                if ($ilce_key == $mahalle_ilcekey) {
                    $mahalle_title = $mahalle->mahalle_title;
                    $mahalle_key = $mahalle->mahalle_key;
                    $csv .= ",," . $mahalle_title . "\n";
                }
            }
        }
    }
}

file_put_contents("./output.csv", $csv);
