<?php
	
	namespace tests;
	
	use pf\page\Page;
	
	/**
	 * Created By pfinal-page.
	 * User: pfinal
	 * Date: 2019/9/27
	 * Time: 下午1:23
	 * ----------------------------------------
	 *
	 */
	class BaseTest extends \PHPUnit\Framework\TestCase
	{
		public function setUp()
		{
			parent::setUp();
			Page::row(3)->make(10);
			
		}
		
		public function testTotalPage()
		{
			$this->assertEquals(4, Page::getTotalPage());
		}
		
		public function testLimit()
		{
			$this->assertEquals('0,3', Page::limit());
		}
		
		public function testTotalRow()
		{
			$this->assertEquals(10, Page::totalRow());
		}
		
		public function testCount()
		{
			$this->assertStringEndsWith('<span class=\'count\'>[共4页] [10条记录]</span>', Page::count());
		}
		
		public function testLinks()
		{
			//<nav><ul class="pagination"><li class='disabled'><span>上一页</span></li><li class='active'><a page='1' href=''>1</a></li><li><a page='2' href='?page=2'>2</a></li><li><a page='3' href='?page=3'>3</a></li><li><a page='4' href='?page=4'>4</a></li><li><a page='2' href='?page=2' class='next'>下一页</a></li></ul></nav>
			$this->assertStringEndsWith(
				'<nav><ul class="pagination"><li class=\'disabled\'><span>上一页</span></li><li class=\'active\'><a page=\'1\' href=\'\'>1</a></li><li><a page=\'2\' href=\'?page=2\'>2</a></li><li><a page=\'3\' href=\'?page=3\'>3</a></li><li><a page=\'4\' href=\'?page=4\'>4</a></li><li><a page=\'2\' href=\'?page=2\' class=\'next\'>下一页</a></li></ul></nav>',
				Page::links()
			);
		}
	}