<?php

namespace PHPCommons\Lang;

class StringUtilsTest extends \PHPUnit_Framework_TestCase
{
    /** @var StringUtils */
    private $stringUtils;

    public function setUp()
    {
        $this->stringUtils = new StringUtils();
    }

    public function tearDown()
    {
        $this->stringUtils = null;
    }

    public function testIsEmpty()
    {
        $this->assertTrue($this->stringUtils->isEmpty(null));
        $this->assertTrue($this->stringUtils->isEmpty(""));
        $this->assertFalse($this->stringUtils->isEmpty(" "));
        $this->assertFalse($this->stringUtils->isEmpty("bob"));
        $this->assertFalse($this->stringUtils->isEmpty("  bob  "));
    }

    /**
     * @expectedException PHPCommons\Exception\NotAStringException
     */
    public function testIsEmptyException()
    {
        $this->stringUtils->isEmpty(123);
        $this->stringUtils->isEmpty(array());
        $this->stringUtils->isEmpty(12323.323);
    }

    public function testIsNotEmpty()
    {
        $this->assertFalse($this->stringUtils->isNotEmpty(null));
        $this->assertFalse($this->stringUtils->isNotEmpty(""));
        $this->assertTrue($this->stringUtils->isNotEmpty(" "));
        $this->assertTrue($this->stringUtils->isNotEmpty("bob"));
        $this->assertTrue($this->stringUtils->isNotEmpty("  bob  "));
    }

    /**
     * @expectedException PHPCommons\Exception\NotAStringException
     */
    public function testIsNotEmptyException()
    {
        $this->stringUtils->isEmpty(123);
        $this->stringUtils->isEmpty(array());
        $this->stringUtils->isEmpty(12323.323);
    }

    public function testIsBlank()
    {
        $this->assertTrue($this->stringUtils->isBlank(null));
        $this->assertTrue($this->stringUtils->isBlank(""));
        $this->assertTrue($this->stringUtils->isBlank(" "));
        $this->assertFalse($this->stringUtils->isBlank("bob"));
        $this->assertFalse($this->stringUtils->isBlank("  bob  "));
    }

    /**
     * @expectedException PHPCommons\Exception\NotAStringException
     */
    public function testIsBlankException()
    {
        $this->stringUtils->isBlank(123);
        $this->stringUtils->isBlank(array());
        $this->stringUtils->isBlank(12323.323);
    }

    public function testIsNotBlank()
    {
        $this->assertFalse($this->stringUtils->isNotBlank(null));
        $this->assertFalse($this->stringUtils->isNotBlank(""));
        $this->assertFalse($this->stringUtils->isNotBlank(" "));
        $this->assertTrue($this->stringUtils->isNotBlank("bob"));
        $this->assertTrue($this->stringUtils->isNotBlank("  bob  "));
    }

    public function testTrim()
    {
        $this->assertNull($this->stringUtils->trim(null));
        $this->assertEquals("", $this->stringUtils->trim(""));
        $this->assertEquals("", $this->stringUtils->trim("     "));
        $this->assertEquals("abc", $this->stringUtils->trim("abc"));
        $this->assertEquals("abc", $this->stringUtils->trim("    abc    "));
    }

    public function testTrimToNull()
    {
        $this->assertNull($this->stringUtils->trimToNull(null));
        $this->assertNull($this->stringUtils->trimToNull(""));
        $this->assertNull($this->stringUtils->trimToNull("     "));
        $this->assertEquals("abc", $this->stringUtils->trimToNull("abc"));
        $this->assertEquals("abc", $this->stringUtils->trimToNull("    abc    "));
    }

    public function testTrimToEmpty()
    {
        $this->assertEquals("", $this->stringUtils->trimToEmpty(null));
        $this->assertEquals("", $this->stringUtils->trimToEmpty(""));
        $this->assertEquals("", $this->stringUtils->trimToEmpty("     "));
        $this->assertEquals("abc", $this->stringUtils->trimToEmpty("abc"));
        $this->assertEquals("abc", $this->stringUtils->trimToEmpty("    abc    "));
    }

    public function testStrip()
    {
        $this->assertNull($this->stringUtils->strip(null));
        $this->assertEquals("", $this->stringUtils->strip(""));
        $this->assertEquals("", $this->stringUtils->strip("   "));
        $this->assertEquals("abc", $this->stringUtils->strip("abc"));
        $this->assertEquals("abc", $this->stringUtils->strip("  abc"));
        $this->assertEquals("abc", $this->stringUtils->strip("abc  "));
        $this->assertEquals("abc", $this->stringUtils->strip(" abc "));
        $this->assertEquals("ab c", $this->stringUtils->strip(" ab c "));
    }

    public function testStripWithCharlist()
    {
        $this->assertEquals("  abc", $this->stringUtils->strip("  abcyx", "xyz"));
    }

    public function testStripToNull()
    {
        $this->assertNull($this->stringUtils->stripToNull(null));
        $this->assertNull($this->stringUtils->stripToNull(""));
        $this->assertNull($this->stringUtils->stripToNull("   "));
        $this->assertEquals("abc",  $this->stringUtils->stripToNull("abc"));
        $this->assertEquals("abc",  $this->stringUtils->stripToNull("  abc"));
        $this->assertEquals("abc",  $this->stringUtils->stripToNull("abc  "));
        $this->assertEquals("abc",  $this->stringUtils->stripToNull(" abc "));
        $this->assertEquals("ab c", $this->stringUtils->stripToNull(" ab c "));
    }

    public function testStripToEmpty()
    {
        $this->assertEquals("",     $this->stringUtils->stripToEmpty(null));
        $this->assertEquals("",     $this->stringUtils->stripToEmpty(null));
        $this->assertEquals("",     $this->stringUtils->stripToEmpty("   "));
        $this->assertEquals("abc",  $this->stringUtils->stripToEmpty("abc"));
        $this->assertEquals("abc",  $this->stringUtils->stripToEmpty("  abc"));
        $this->assertEquals("abc",  $this->stringUtils->stripToEmpty("abc  "));
        $this->assertEquals("abc",  $this->stringUtils->stripToEmpty(" abc "));
        $this->assertEquals("ab c", $this->stringUtils->stripToEmpty(" ab c "));
    }

    public function testStripStart()
    {
        $this->assertNull($this->stringUtils->stripStart(null));
        $this->assertEquals("",     $this->stringUtils->stripStart(""));
        $this->assertEquals("abc",  $this->stringUtils->stripStart("  abc"));
        $this->assertEquals("abc  ",$this->stringUtils->stripStart("yxabc  ", "xyz"));
    }

    public function testStripEnd()
    {
        $this->assertNull($this->stringUtils->stripEnd(null));
        $this->assertEquals("",     $this->stringUtils->stripEnd(""));
        $this->assertEquals("abc",  $this->stringUtils->stripEnd("abc  "));
        $this->assertEquals("  abc",$this->stringUtils->stripEnd("  abcxy", "xyz"));
        $this->assertEquals("12",   $this->stringUtils->stripEnd("120.00", ".0"));
    }

    public function testEquals()
    {
        $this->assertTrue($this->stringUtils->equals(null, null));
        $this->assertFalse($this->stringUtils->equals(null, "abc"));
        $this->assertFalse($this->stringUtils->equals("abc", null));
        $this->assertTrue($this->stringUtils->equals("abc", "abc"));
        $this->assertFalse($this->stringUtils->equals("abc", "ABC"));
    }

    public function testEqualsIgnoreCase()
    {
        $this->assertTrue($this->stringUtils->equalsIgnoreCase(null, null));
        $this->assertFalse($this->stringUtils->equalsIgnoreCase(null, "abc"));
        $this->assertFalse($this->stringUtils->equalsIgnoreCase("abc", null));
        $this->assertTrue($this->stringUtils->equalsIgnoreCase("abc", "abc"));
        $this->assertTrue($this->stringUtils->equalsIgnoreCase("abc", "ABC"));
    }

    public function testIndexOf()
    {
        $this->assertEquals(-1, $this->stringUtils->indexOf(null, null));
        $this->assertEquals(-1, $this->stringUtils->indexOf("", null));
        $this->assertEquals(0,  $this->stringUtils->indexOf("", ""));
        $this->assertEquals(0,  $this->stringUtils->indexOf("aabaabaa", 'a'));
        $this->assertEquals(2,  $this->stringUtils->indexOf("aabaabaa", 'b'));

        $this->assertEquals(-1, $this->stringUtils->indexOf(null, null, null));
        $this->assertEquals(-1, $this->stringUtils->indexOf("", null, null));
        $this->assertEquals(2,  $this->stringUtils->indexOf("aabaabaa", 'b', 0));
        $this->assertEquals(5,  $this->stringUtils->indexOf("aabaabaa", 'b', 3));
        $this->assertEquals(-1, $this->stringUtils->indexOf("aabaabaa", 'b', 9));
        $this->assertEquals(2,  $this->stringUtils->indexOf("aabaabaa", 'b', -1));

        $this->assertEquals(2,  $this->stringUtils->indexOf("aabaabaa", 'b', 'b'));
    }

    public function testOrdinalIndexOf()
    {
        $this->assertEquals(-1, $this->stringUtils->ordinalIndexOf(null, null, null));
        $this->assertEquals(0,  $this->stringUtils->ordinalIndexOf("", "", null));
        $this->assertEquals(0,  $this->stringUtils->ordinalIndexOf("aabaabaa", "a", 1));
        $this->assertEquals(1,  $this->stringUtils->ordinalIndexOf("aabaabaa", "a", 2));
        $this->assertEquals(2,  $this->stringUtils->ordinalIndexOf("aabaabaa", "b", 1));
        $this->assertEquals(5,  $this->stringUtils->ordinalIndexOf("aabaabaa", "b", 2));
        $this->assertEquals(1,  $this->stringUtils->ordinalIndexOf("aabaabaa", "ab", 1));
        $this->assertEquals(4,  $this->stringUtils->ordinalIndexOf("aabaabaa", "ab", 2));
        $this->assertEquals(0,  $this->stringUtils->ordinalIndexOf("aabaabaa", "", 1));
        $this->assertEquals(0,  $this->stringUtils->ordinalIndexOf("aabaabaa", "", 2));
    }

    public function testIndexOfIgnoreCase()
    {
        $this->assertEquals(-1, $this->stringUtils->indexOfIgnoreCase(null, null));
        $this->assertEquals(0,  $this->stringUtils->indexOfIgnoreCase("", ""));
        $this->assertEquals(0,  $this->stringUtils->indexOfIgnoreCase("aabaabaa", "a"));
        $this->assertEquals(2,  $this->stringUtils->indexOfIgnoreCase("aabaabaa", "b"));
        $this->assertEquals(1,  $this->stringUtils->indexOfIgnoreCase("aabaabaa", "ab"));

        $this->assertEquals(0,  $this->stringUtils->indexOfIgnoreCase("aabaabaa", "A", 0));
        $this->assertEquals(2,  $this->stringUtils->indexOfIgnoreCase("aabaabaa", "B", 0));
        $this->assertEquals(1,  $this->stringUtils->indexOfIgnoreCase("aabaabaa", "AB", 0));
        $this->assertEquals(5,  $this->stringUtils->indexOfIgnoreCase("aabaabaa", "B", 3));
        $this->assertEquals(-1, $this->stringUtils->indexOfIgnoreCase("aabaabaa", "B", 9));
        $this->assertEquals(2,  $this->stringUtils->indexOfIgnoreCase("aabaabaa", "B", -1));
        $this->assertEquals(0,  $this->stringUtils->indexOfIgnoreCase("aabaabaa", "", 2));
        $this->assertEquals(-1,  $this->stringUtils->indexOfIgnoreCase("abc", "", 9));
    }

    public function testLastIndexOf()
    {
        $this->assertEquals(-1, $this->stringUtils->lastIndexOf(null, null));
        $this->assertEquals(-1, $this->stringUtils->lastIndexOf("", null));
        $this->assertEquals(7,  $this->stringUtils->lastIndexOf("aabaabaa", 'a'));
        $this->assertEquals(5,  $this->stringUtils->lastIndexOf("aabaabaa", 'b'));

        $this->assertEquals(5,  $this->stringUtils->lastIndexOf("aabaabaa", 'b', 8));
        $this->assertEquals(1,  $this->stringUtils->lastIndexOf("aabaabaa", 'b', 4));
        $this->assertEquals(5, $this->stringUtils->lastIndexOf("aabaabaa", 'b', 0));
        $this->assertEquals(5,  $this->stringUtils->lastIndexOf("aabaabaa", 'b', 9));
        $this->assertEquals(-1, $this->stringUtils->lastIndexOf("aabaabaa", 'b', -1));
        $this->assertEquals(7,  $this->stringUtils->lastIndexOf("aabaabaa", 'a', 0));

        $this->assertEquals(7, $this->stringUtils->lastIndexOf("aabaabaa", "a"));
        $this->assertEquals(5, $this->stringUtils->lastIndexOf("aabaabaa", "b"));
        $this->assertEquals(4, $this->stringUtils->lastIndexOf("aabaabaa", "ab"));
        $this->assertEquals(-1, $this->stringUtils->lastIndexOf("aabaabaa", ""));
    }

    public function testLastOrdinalIndexOf()
    {
        $this->assertEquals(-1, $this->stringUtils->lastOrdinalIndexOf(null, null, null));
        $this->assertEquals(-1, $this->stringUtils->lastOrdinalIndexOf("", "", null));
        $this->assertEquals(7,  $this->stringUtils->lastOrdinalIndexOf("aabaabaa", "a", 1));
        $this->assertEquals(6,  $this->stringUtils->lastOrdinalIndexOf("aabaabaa", "a", 2));
        $this->assertEquals(5,  $this->stringUtils->lastOrdinalIndexOf("aabaabaa", "b", 1));
        $this->assertEquals(2,  $this->stringUtils->lastOrdinalIndexOf("aabaabaa", "b", 2));
        $this->assertEquals(4,  $this->stringUtils->lastOrdinalIndexOf("aabaabaa", "ab", 1));
        $this->assertEquals(1,  $this->stringUtils->lastOrdinalIndexOf("aabaabaa", "ab", 2));
        $this->assertEquals(-1, $this->stringUtils->lastOrdinalIndexOf("aabaabaa", "", 1));
    }

    public function testLastIndexOfIgnoreCase()
    {
        $this->assertEquals(-1, $this->stringUtils->lastIndexOfIgnoreCase(null, null));
        $this->assertEquals(7,  $this->stringUtils->lastIndexOfIgnoreCase("aabaabaa", "A"));
        $this->assertEquals(5,  $this->stringUtils->lastIndexOfIgnoreCase("aabaabaa", "B"));
        $this->assertEquals(4,  $this->stringUtils->lastIndexOfIgnoreCase("aabaabaa", "AB"));

        $this->assertEquals(7,  $this->stringUtils->lastIndexOfIgnoreCase("aabaabaa", "A", 8));
        $this->assertEquals(5,  $this->stringUtils->lastIndexOfIgnoreCase("aabaabaa", "B", 8));
        $this->assertEquals(4,  $this->stringUtils->lastIndexOfIgnoreCase("aabaabaa", "AB", 8));
        $this->assertEquals(5,  $this->stringUtils->lastIndexOfIgnoreCase("aabaabaa", "B", 9));
        $this->assertEquals(-1, $this->stringUtils->lastIndexOfIgnoreCase("aabaabaa", "B", -1));
        $this->assertEquals(7,  $this->stringUtils->lastIndexOfIgnoreCase("aabaabaa", "A", 0));
        $this->assertEquals(5, $this->stringUtils->lastIndexOfIgnoreCase("aabaabaa", "B", 0));
    }

    public function testContains()
    {
        $this->assertFalse($this->stringUtils->contains(null,  null));
        $this->assertFalse($this->stringUtils->contains("",    null));
        $this->assertFalse($this->stringUtils->contains("abc", 'z'));
        $this->assertTrue($this->stringUtils->contains("abc",  'a'));

        $this->assertTrue($this->stringUtils->contains("abc", ""));
        $this->assertTrue($this->stringUtils->contains("abc", "a"));
        $this->assertFalse($this->stringUtils->contains("abc", "z"));
    }

    public function testContainsIgnoreCase()
    {
        $this->assertFalse($this->stringUtils->containsIgnoreCase(null, null));
        $this->assertFalse($this->stringUtils->containsIgnoreCase("abc", "z"));
        $this->assertFalse($this->stringUtils->containsIgnoreCase("abc", "Z"));
        $this->assertTrue($this->stringUtils->containsIgnoreCase("", ""));
        $this->assertTrue($this->stringUtils->containsIgnoreCase("abc", ""));
        $this->assertTrue($this->stringUtils->containsIgnoreCase("abc", "a"));
        $this->assertTrue($this->stringUtils->containsIgnoreCase("abc", "A"));
    }

    public function testIndexOfAny()
    {
        $this->assertEquals(-1, $this->stringUtils->indexOfAny(null, null));
        $this->assertEquals(-1, $this->stringUtils->indexOfAny("", null));
        $this->assertEquals(-1, $this->stringUtils->indexOfAny(null, array()));
        $this->assertEquals(-1, $this->stringUtils->indexOfAny("aba", array('z')));
        $this->assertEquals(0,  $this->stringUtils->indexOfAny("zzabyycdxx",array('z','a')));
        $this->assertEquals(3,  $this->stringUtils->indexOfAny("zzabyycdxx",array('b','y')));
    }

    public function testLastIndexOfAny()
    {
        $this->assertEquals(-1, $this->stringUtils->lastIndexOfAny(null, array()));
        $this->assertEquals(-1, $this->stringUtils->lastIndexOfAny(null, null));
        $this->assertEquals(6,  $this->stringUtils->lastIndexOfAny("zzabyycdxx", array("b","c")));
        $this->assertEquals(6,  $this->stringUtils->lastIndexOfAny("zzabyycdxx", array("c","a")));
        $this->assertEquals(-1, $this->stringUtils->lastIndexOfAny("zzabyycdxx", array("n","p")));
    }
}
