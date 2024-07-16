<?php

namespace One234ru;

class JSON
{
    public static function getFromFile(string $file) :int|string|bool|array
    {
        $contents = file_get_contents($file);
        $data = json_decode($contents, true);
        return $data;
    }

    public static function putToFile(
        string $file,
        int|string|bool|array $data,
        int $flags = -1
    ) :false|int
    {
        if ($flags < 0) {
            $flags = JSON_UNESCAPED_UNICODE
                | JSON_UNESCAPED_SLASHES
                | JSON_PRETTY_PRINT ;
        }
        $json = json_encode($data, $flags);
        return file_put_contents($file, $json);
    }
}