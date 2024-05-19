<?php

use App\TagParser;
use PHPUnit\Framework\TestCase;

class TagParserTest extends TestCase
{
    public function test_it_a_single_tag()
    {
        $parser = new TagParser();

        $result = $parser->parse('personal');
        $expected = ['personal'];

        $this->assertEquals($expected, $result);
    }

    public function test_it_parsers_a_comma_separated_list_of_tags()
    {
        $parser = new TagParser();

        $result = $parser->parse('personal, money, food');
        $expected = ['personal', 'money', 'food'];

        $this->assertSame($expected, $result);
    }

    public function test_it_spaces_optional()
    {
        $parser = new TagParser();

        $result = $parser->parse('personal,money,food');
        $expected = ['personal', 'money', 'food'];
        $this->assertSame($expected, $result);

        $result = $parser->parse('personal|money|food');
        $expected = ['personal', 'money', 'food'];
        $this->assertSame($expected, $result);
    }

    public function test_it_parsers_a_pipe_separted_list_of_tags()
    {
        $parser = new TagParser();

        $result = $parser->parse('personal | money | food');
        $expected = ['personal', 'money', 'food'];

        $this->assertSame($expected, $result);
    }

}
