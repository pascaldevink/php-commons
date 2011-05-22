<?php

namespace nl\inpiggy\commons\lang;

require_once realpath(dirname(__FILE__)) . '/../../../../../../main/php/nl/inpiggy/commons/lang/StringUtils.php';
require_once realpath(dirname(__FILE__)) . '/../../../../../../main/php/nl/inpiggy/commons/exception/NotAStringException.php';

use nl\inpiggy\commons\lang\StringUtils;
use nl\inpiggy\commons\exception\NotAStringException;

/**
 *
 * @author pascaldevink
 */
class StringUtilsTest extends \PHPUnit_Framework_TestCase
{

    public function setUp()
    {

    }

    public function tearDown()
    {

    }

    public function testIsEmpty()
    {
        $this->assertTrue(StringUtils::isEmpty(null));
        $this->assertTrue(StringUtils::isEmpty(""));
        $this->assertFalse(StringUtils::isEmpty(" "));
        $this->assertFalse(StringUtils::isEmpty("bob"));
        $this->assertFalse(StringUtils::isEmpty("  bob  "));
    }

    /**
     * @expectedException nl\inpiggy\commons\exception\NotAStringException
     */
    public function testIsEmptyException()
    {
        StringUtils::isEmpty(123);
        StringUtils::isEmpty(array());
        StringUtils::isEmpty(12323.323);
    }

    public function testIsNotEmpty()
    {
        $this->assertFalse(StringUtils::isNotEmpty(null));
        $this->assertFalse(StringUtils::isNotEmpty(""));
        $this->assertTrue(StringUtils::isNotEmpty(" "));
        $this->assertTrue(StringUtils::isNotEmpty("bob"));
        $this->assertTrue(StringUtils::isNotEmpty("  bob  "));
    }

    /**
     * @expectedException nl\inpiggy\commons\exception\NotAStringException
     */
    public function testIsNotEmptyException()
    {
        StringUtils::isEmpty(123);
        StringUtils::isEmpty(array());
        StringUtils::isEmpty(12323.323);
    }

    public function testIsBlank()
    {
        $this->assertTrue(StringUtils::isBlank(null));
        $this->assertTrue(StringUtils::isBlank(""));
        $this->assertTrue(StringUtils::isBlank(" "));
        $this->assertFalse(StringUtils::isBlank("bob"));
        $this->assertFalse(StringUtils::isBlank("  bob  "));
    }

    /**
     * @expectedException nl\inpiggy\commons\exception\NotAStringException
     */
    public function testIsBlankException()
    {
        StringUtils::isBlank(123);
        StringUtils::isBlank(array());
        StringUtils::isBlank(12323.323);
    }

    public function testIsNotBlank()
    {
        $this->assertFalse(StringUtils::isNotBlank(null));
        $this->assertFalse(StringUtils::isNotBlank(""));
        $this->assertFalse(StringUtils::isNotBlank(" "));
        $this->assertTrue(StringUtils::isNotBlank("bob"));
        $this->assertTrue(StringUtils::isNotBlank("  bob  "));
    }

    public function testTrim()
    {
        $this->assertNull(StringUtils::trim(null));
        $this->assertEquals("", StringUtils::trim(""));
        $this->assertEquals("", StringUtils::trim("     "));
        $this->assertEquals("abc", StringUtils::trim("abc"));
        $this->assertEquals("abc", StringUtils::trim("    abc    "));
    }

    public function testTrimToNull()
    {
        $this->assertNull(StringUtils::trimToNull(null));
        $this->assertNull(StringUtils::trimToNull(""));
        $this->assertNull(StringUtils::trimToNull("     "));
        $this->assertEquals("abc", StringUtils::trimToNull("abc"));
        $this->assertEquals("abc", StringUtils::trimToNull("    abc    "));
    }

    public function testTrimToEmpty()
    {
        $this->assertEquals("", StringUtils::trimToEmpty(null));
        $this->assertEquals("", StringUtils::trimToEmpty(""));
        $this->assertEquals("", StringUtils::trimToEmpty("     "));
        $this->assertEquals("abc", StringUtils::trimToEmpty("abc"));
        $this->assertEquals("abc", StringUtils::trimToEmpty("    abc    "));
    }

    public function testStrip()
    {
        $this->assertNull(StringUtils::strip(null));
        $this->assertEquals("", StringUtils::strip(""));
        $this->assertEquals("", StringUtils::strip("   "));
        $this->assertEquals("abc", StringUtils::strip("abc"));
        $this->assertEquals("abc", StringUtils::strip("  abc"));
        $this->assertEquals("abc", StringUtils::strip("abc  "));
        $this->assertEquals("abc", StringUtils::strip(" abc "));
        $this->assertEquals("ab c", StringUtils::strip(" ab c "));
    }

    public function testStripWithCharlist()
    {
        $this->assertEquals("  abc", StringUtils::strip("  abcyx", "xyz"));
    }

    public function testStripToNull()
    {
        $this->assertNull(StringUtils::stripToNull(null));
        $this->assertNull(StringUtils::stripToNull(""));
        $this->assertNull(StringUtils::stripToNull("   "));
        $this->assertEquals("abc",  StringUtils::stripToNull("abc"));
        $this->assertEquals("abc",  StringUtils::stripToNull("  abc"));
        $this->assertEquals("abc",  StringUtils::stripToNull("abc  "));
        $this->assertEquals("abc",  StringUtils::stripToNull(" abc "));
        $this->assertEquals("ab c", StringUtils::stripToNull(" ab c "));
    }

    public function testStripToEmpty()
    {
        $this->assertEquals("",     StringUtils::stripToEmpty(null));
        $this->assertEquals("",     StringUtils::stripToEmpty(null));
        $this->assertEquals("",     StringUtils::stripToEmpty("   "));
        $this->assertEquals("abc",  StringUtils::stripToEmpty("abc"));
        $this->assertEquals("abc",  StringUtils::stripToEmpty("  abc"));
        $this->assertEquals("abc",  StringUtils::stripToEmpty("abc  "));
        $this->assertEquals("abc",  StringUtils::stripToEmpty(" abc "));
        $this->assertEquals("ab c", StringUtils::stripToEmpty(" ab c "));
    }

    public function testStripStart()
    {
        $this->assertNull(StringUtils::stripStart(null));
        $this->assertEquals("",     StringUtils::stripStart(""));
        $this->assertEquals("abc",  StringUtils::stripStart("  abc"));
        $this->assertEquals("abc  ",StringUtils::stripStart("yxabc  ", "xyz"));
    }

    public function testStripEnd()
    {
        $this->assertNull(StringUtils::stripEnd(null));
        $this->assertEquals("",     StringUtils::stripEnd(""));
        $this->assertEquals("abc",  StringUtils::stripEnd("abc  "));
        $this->assertEquals("  abc",StringUtils::stripEnd("  abcxy", "xyz"));
        $this->assertEquals("12",   StringUtils::stripEnd("120.00", ".0"));
    }

    public function testEquals()
    {
        $this->assertTrue(StringUtils::equals(null, null));
        $this->assertFalse(StringUtils::equals(null, "abc"));
        $this->assertFalse(StringUtils::equals("abc", null));
        $this->assertTrue(StringUtils::equals("abc", "abc"));
        $this->assertFalse(StringUtils::equals("abc", "ABC"));
    }

    public function testEqualsIgnoreCase()
    {
        $this->assertTrue(StringUtils::equalsIgnoreCase(null, null));
        $this->assertFalse(StringUtils::equalsIgnoreCase(null, "abc"));
        $this->assertFalse(StringUtils::equalsIgnoreCase("abc", null));
        $this->assertTrue(StringUtils::equalsIgnoreCase("abc", "abc"));
        $this->assertTrue(StringUtils::equalsIgnoreCase("abc", "ABC"));
    }

    public function testIndexOf()
    {
        $this->assertEquals(-1, StringUtils::indexOf(null, null));
        $this->assertEquals(-1, StringUtils::indexOf("", null));
        $this->assertEquals(0,  StringUtils::indexOf("aabaabaa", 'a'));
        $this->assertEquals(2,  StringUtils::indexOf("aabaabaa", 'b'));

        $this->assertEquals(-1, StringUtils::indexOf(null, null, null));
        $this->assertEquals(-1, StringUtils::indexOf("", null, null));
        $this->assertEquals(2,  StringUtils::indexOf("aabaabaa", 'b', 0));
        $this->assertEquals(5,  StringUtils::indexOf("aabaabaa", 'b', 3));
        $this->assertEquals(-1, StringUtils::indexOf("aabaabaa", 'b', 9));
        $this->assertEquals(2,  StringUtils::indexOf("aabaabaa", 'b', -1));

        $this->assertEquals(2,  StringUtils::indexOf("aabaabaa", 'b', 'b'));
    }

    public function testOrdinalIndexOf()
    {
        $this->assertEquals(-1, StringUtils::ordinalIndexOf(null, null, null));
        $this->assertEquals(0,  StringUtils::ordinalIndexOf("", "", null));
        $this->assertEquals(0,  StringUtils::ordinalIndexOf("aabaabaa", "a", 1));
        $this->assertEquals(1,  StringUtils::ordinalIndexOf("aabaabaa", "a", 2));
        $this->assertEquals(2,  StringUtils::ordinalIndexOf("aabaabaa", "b", 1));
        $this->assertEquals(5,  StringUtils::ordinalIndexOf("aabaabaa", "b", 2));
        $this->assertEquals(1,  StringUtils::ordinalIndexOf("aabaabaa", "ab", 1));
        $this->assertEquals(4,  StringUtils::ordinalIndexOf("aabaabaa", "ab", 2));
        $this->assertEquals(0,  StringUtils::ordinalIndexOf("aabaabaa", "", 1));
        $this->assertEquals(0,  StringUtils::ordinalIndexOf("aabaabaa", "", 2));
    }
}
