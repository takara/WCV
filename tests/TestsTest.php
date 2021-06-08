<?php

namespace Tests;

class TestsTest extends TestCase
{
    public function test_”z—ñ‘€ì()
    {
        $data = [
            "a" => 1,
            "b" => 2,
            "c" => 3,
        ];
        $res = $this->extract($data, "(a|c)");
        $this->assertEquals([1,3], $res);
    }

    public function test_‚mŒ”z—ñ‘€ì()
    {
        $data = [
            [
                'name' => 'Hoge',
                'age'  => 18,
                'str'  => 100,
            ], [
                'name' => 'Fuga',
                'age'  => 20,
                'str'  => 80,
            ]
        ];
        $res = $this->extract($data, "1.name");
        $this->assertEquals('Fuga', $res);
        $res = $this->extract($data, "0.str");
        $this->assertEquals(100, $res);
        $res = $this->extract($data, "1.(name|str)");
        $this->assertEquals(['Fuga', 80], $res);
        $res = $this->extract($data, "{n}.name");
        $this->assertEquals(['Hoge', "Fuga"], $res);
        $res = $this->extract($data, "{n}.(name|str)");
        $this->assertEquals([['Hoge', 100], ["Fuga", 80]], $res);
    }
}
