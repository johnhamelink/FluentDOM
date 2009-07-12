<?php
/**
* XML file loader test for FluentDOM
*
* @version $Id$
* @license http://www.opensource.org/licenses/mit-license.php The MIT License
* @copyright Copyright (c) 2009 Bastian Feder, Thomas Weinert
*
* @package FluentDOMLoader
* @subpackage unitTests
*/

/**
* load necessary files
*/
require_once 'PHPUnit/Framework.php';
require_once dirname(__FILE__).'/../../Loader/FileXML.php';

PHPUnit_Util_Filter::addFileToFilter(__FILE__);

/**
* Test class for FluentDOMLoaderFileXMLTest.
*
* @package FluentDOM
* @subpackage unitTests
*/
class FluentDOMLoaderFileXMLTest extends PHPUnit_Framework_TestCase {

  public function testLoad() {
    $loader = new FluentDOMLoaderFileXML();
    $fd = $loader->load(
      dirname(__FILE__).'/data/fileXML.src.xml',
      'xml'
    );
    $this->assertTrue($fd instanceof DOMDocument);
    $this->assertEquals('html', $fd->documentElement->nodeName);
  }

  public function testLoadwithXMLFileInvalid() {
    $loader = new FluentDOMLoaderFileXML();
    $result = $loader->load('<invalidFileName />','xml');
    $this->assertFalse($result);
  }

  public function testLoadInvalid() {
    try {
      $loader = new FluentDOMLoaderFileXML();
      $result = $loader->load('invalidFileName','xml');
      $this->fail('An expected exception has not been raised.');
    } catch (InvalidArgumentException $e) {
    }
  }
}

?>