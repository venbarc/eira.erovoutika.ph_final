<?php 
session_start();
include "connect.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha383-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha383-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp3YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.css">
  <title>Document</title>

  <?php include "include/head_links.php"; ?>
</head>
<style>
img{
	max-width: 100%;
	max-height: 100%;
}
.task {
  padding: 30px 20px 60px;
  border-radius: 10px;
  background: #ffffff;
  position: relative;
  border: 3px blue solid;
}

/*.task.milestone {
  background: #D7D0ED;
}
*/
.task h2,
.task strong {
  color: #1D3461;
}

.task em {
  font-style: normal;
  border-bottom: 1px solid #aaa;
}

.task .read-more {
  position: absolute;
  bottom: 20px;
  right: 20px;
}

.task code {
  color: #1CAF96;
}
.notes{
	color: black;
}
.wrapper img{
	margin-top: 2%;
	max-width: 170px;
	align-items: center;
}
.wrapper h1{
	font-size: 40px;
	color: black;
}
.content blockquote{
	background-color: wheat;
}
.has-background-custom{
  padding: 30px 20px 10px;
  border-radius: 10px;
  background: #ffffff;
  position: relative;
  border: 3px blue solid;
}
.no-bullets{
	list-style-type: none;
}
.lits{
	background-color: wheat;
	border-radius: 10px;
}
.lits li{
	list-style-type: none;
}
.lits a{
	color: black;
	font-weight: bolder;
}
.is-hoverable a:hover{
	background-color: lightblue;
}
.TBC{
background-color: #0F3695;
border-radius: 5px;
height: 40px;
}
.TBC h1{
	color: white;
}
.pages .task{
	padding: 30px 20px 25px;
}
</style>

<script>
window.onscroll=function(){
	var scrollPos = window.scrollY;
	var button1 = document.querySelectorAll(".mybutton");
	for(var i=0; i<button1.length; i++){
		if(scrollPos > 500){
			button1[i].style.display="block";
		}else{
			button1[i].style.display="none";
		}
	}
};

function Top(){
	window.scrollTo(0,0);
}
</script>

<body>

<?php include_once(__DIR__."/include/navbar.php")?>
<?php include_once(__DIR__."/include/hero.php")?>

<div class = "wrapper">
	<div class="d-flex justify-content-center align-items-center">
		<img src = "assets/img/learn/html_logo.png" alt ="HTML" class ="img-fluid">
		<h1 style="font-weight: bold;"> HTML Tutorial </h1>
	</div>
	<br>
</div>

<section class="section"  style="padding-bottom: 0;">
	<div class="container">
		<a class="btn btn-primary" href="code_editor.php">Live Code Editor</a>
		<span> Try out our code editor! </span>
	</div>
</section>

<section class="section" style="padding-top: 10px;">
	<div class="container">
		<div class="tile is-ancestor">
			<div class=" pages tile is-parent">
				<article class="tile is-child content task">
					<div class="TBC">
						<h1 class="text-center is-light" id="contents">Table Of Contents</h1>
						</div>
							<div class ="lits is-responsive text-center">
								<ul class="lits is-hoverable">
								<li><a href ="#tutorial" >HTML Tutorial</a></li>
								<li><a href ="#definition">What is HTML</a></li>
								<li><a href ="#editors"> HTML Text Editors </a></li>
								<li><a href ="#building">Building Blocks of HTML</a></li>
								<li><a href ="#attribute">HTML Attribute</a></li>
								<li><a href ="#format"> HTML Formatting </a></li>
								<li><a href ="#element">HTML Element</a></li>
								<li><a href ="#heading">HTML Heading</a></li>
								<li><a href ="#paragraph"> HTML Paragraph</a></li>
								<li><a href ="#tag">HTML Phrase Tag</a></li>
								<li><a href ="#anchor">HTML Anchor</a></li>
								<li><a href ="#image">HTML Image </a></li>
								<li><a href ="#list">Lists </a></li>
								<li><a href ="#tasks">Tasks </a></li>
								</ul>
							</div>
				</article>
			</div>
	</div>
		<div class="tile is-ancestor">
			<div class="tile is-parent">
			<article class="tile is-child content task">
				<p><a href="" class="tag is-dark">1 min read</a>
					<a href="#contents" class="tag is-link is-pulled-right">Return to Top</a></p>
					<h2 class="title" id="tutorial">HTML Tutorial</h2>
					<p class="description">If you are new in learning HTML, then you can learn HTML from basic to a professional level and after learning HTML with CSS and Javascript you will be able to create your own interactive and dynamic website. But Now We Will focus on HTML only in this tutorial.</p><br>
					<blockquote>
					<p class="notes"><strong>Major Points of HTML</strong><ul>
						<li>HTML stands for <strong>HyperText Markup Language</strong>.</li>
						<li>HTML is used to create web pages and web applications.</li>
						<li>HTML is widely used language on the web.</li>
						<li>We can create a static website by HTML only.</li>
						<li>Technically, HTML is Markup language rather than a programming language.</li>
					</ul></p></blockquote>
					<form method = "get" action = "code_editor.php">
						<input type = "hidden" name = "learn_html" value = "8"> <!--This holds the sample's id value -->
						<button class="button is-link read-more">View Example</a>
					</form>
				</article>
			</div>
		</div>
		<div class ="tile is-ancestor">
			<div class="tile is-6 is-parent ">
				<article class="tile is-child content task">
					<p><a href="" class="tag is-dark">2 min read</a>
					<a href="#contents" class="tag is-link is-pulled-right">Return to Top</a></p>
					<h2 class="title" id="definition">What is HTML</h2>
					
					<blockquote>HTML is an acronym which stands for<strong> Hyper Text Markup Language</strong>
					<br><br>
					<strong>Hyper Text:</strong> Hypertext simply means "Text within Text." A text has a link within it, is a hypertext. Whenever you click on a link which brings you to a new webpage, you have clicked on a hypertext. Hypertext is a way to link two or more web pages (HTML documents) with each other. <br><br>
					<strong>Markup language:</strong> A markup language is a computer language that is used to apply layout and formatting that is used to apply layout and formatting conventions to a text document. Markup language makes text more interactive and dynamic. It can turn to text into images, tables, links, etc. <br><br>
					<strong>Web Page:</strong> A web page is a document which is commonly written in HTML and translated by a web browser. A web page can be identified by entering URL. A web page can be static or dynamic type. <strong>With the help of HTML only, we can create static web pages.</strong>	</blockquote>
					
					<form method = "get" action = "code_editor.php">
						<input type = "hidden" name = "learn_html" value = "9">
						<button class="button is-link read-more">View Example</button>
					</form>
			</div>
			<div class="tile is-parent">
			<article class="tile is-child content task">
					<p><a href="" class="tag is-dark">2 min read</a>
					<a href="#contents" class="tag is-link is-pulled-right">Return to Top</a></p>
					<h2 class="title" id ="editors">HTML Text Editors</h2>
					<blockquote><p class="notes">
						<ul>
							<li>An HTML file is a text file, so to create an HTML file we can use any text editors</li>
							<li>Text editors are the programs which allow editing in a written, text, hence to create a web page we need to write our code in some text editor.</li>
							<li>There are various types of text editors available which you can directly download, but for a beginner, the best text editor is Notepad (Window) or Text Edit (Mac)</li>
							<li>After learning the basic, you can easily use other professional text editors which are,<strong> Notepad++, Sublime Text, VS Code, etc.</strong></li>
						</ul>
					</p></blockquote>
					<br><br>
					<p class="notes"><strong>Notes:</strong><br> Notepad is a simple text editor and suitable for beginners to learn HTML. It is available in all versions of Windows, from where you easily access it.</p>
					
					<form method = "get" action = "code_editor.php">
						<input type = "hidden" name = "learn_html" value = "10">
						<button class="button is-link read-more">View Example</button>
					</form>
					</article>     
			</div>
		</div>
		<div class="tile is-ancestor">
			<div class="tile is-12 is-parent">
				<article class="tile is-child content task">
						<p><a href="" class="tag is-dark">1 min read</a>
						<a href="#contents" class="tag is-link is-pulled-right">Return to Top</a></p>
							<h2 class="title" id="building">Building Blocks of HTML</h2>
							<p class="description">An HTML document consist of its basic building blocks which are:</p>
							<blockquote>
								<ul>
									<li><strong>Tags:</strong> An HTML tag surrounds the content and apply meaning to it. It is written between < and > brackets.</li>
									<li><strong>Attribute:</strong> An attribute in HTML provides extra information about the element, amd it is applied about the element and it is applied within the start tag. An HTML attribute contains two fields: name & value.</li>
									<li><strong>Elements</strong> An HTML element is an individual component of an HTML file. I an HTML file, everything written within tags are termed as HTML elements.</li>
									<center><img src="images/Example1.jpg" alt="Example1"></center>
								</ul>
							</blockquote>
							</p>
						<form method = "get" action = "code_editor.php">
							<input type= "hidden" name = "learn_html" value = "0">
							<button class="button is-link read-more">View Example</button>
							<!--<a href = "code_editor.php?id=0"><button class="button is-link read-more">View Example</button></a>-->
						</form>
				</article>
			</div>
		</div>
		<div class="tile is-ancestor">
			<div class="tile is-4 is-parent">
			<article class="tile is-child content task">
					<p><a href="" class="tag is-dark">2 min read</a>
					<a href="#contents" class="tag is-link is-pulled-right">Return to Top</a></p>
						<h2 class="title" id="attribute">HTML Attribute</h2>
						<p class="description">HTML attribute are special words which provide additional information about the elements.</p>
						<blockquote>
						<strong>The title attribute in HTML</strong><br>
						<strong>Description:</strong> The attribute is used as text tooltip in most of the browsers. It display its text when user move the cursor over a link or any text. You can use it with any text or link to show the description about that link or text. <br><br>
						<strong>The href attribute in HTML</strong><br>
						<strong>Description:</strong> The href attribute is the main attribute of < a > anchor tag. This attribute gives the link address which is specified in that link. <strong>The href attribute provides the hyperlink, and if it is blank, then it will remain in same page.</strong><br><br>
						<strong>The src Attribute</strong><br>
						The <strong>src</strong> attribute is one of the important and required attribute of <code>< img ></code> element. It is source for the image which is required to display on browser. This attribute can contain image in same directory or another directory. The image name or source should be correct else browser will not display image.
						</blockquote>
						<br>
						<form method = "get" action = "code_editor.php">
							<input type= "hidden" name = "learn_html" value = "1">
							<button class="button is-link read-more">View Example</button>
						</form>
					</article>
			</div>
		
		<div class="tile is-parent">
		<article class="tile is-child content task">
					<p><a href="" class="tag is-dark">4 min read</a>
					<a href="#contents" class="tag is-link is-pulled-right">Return to Top</a></p></p>
						<h2 class="title" id="format">HTML Formatting</h2>
						<p class="description"><strong>HTML Formatting</strong> is a process of formatting text for better look and feel HTML provides us ability to format text without using CSS. There are many formatting tags in HTML. These tags are used to make text bold, italicized, or underlined</p>
						<blockquote>
							In HTML the formatting tags are divided in two categories:
							<ul>
								<li><strong>Physical tag:</strong> These tags are used to provide the visual appearance to the text</li>
								<li><strong>Logical tag:</strong> These tags are used to add some logical or semantic value to the text.</li>
							</ul>
							</blockquote>
						<p class="notes"><strong>List of HTML Formatting text</strong></p>
						<blockquote>
							<ol>
								<li><strong>Bold Text </strong>- The HTML <code>< b ></code> element is a physical tag which display text in bold font, without any logical importance. </li>
								<li><strong>Italic Text </strong>- The HTML <code>< i ></code> element is a physical element, which display the enclosed content in italic font, without any added importance.</li> 
								<li><strong>HTML Marked formatting</strong> - If you want or highlight a text, should write the content within <code>< mark > . . . < /mark ></code></li>
								<li><strong>Underlined Text</strong>- If you write anything within <code>< u > . . . < /u > </code> element, is shown in underlined text.</li> 
								<li><strong>Strike Text</strong> - Anything written within <code>< strike > . . . < /strike ></code> elements displayed with strikethrough. It is a thin line which cross the statement.</li>
								<li><strong>Monospaced Font</strong> - If you want that each letter has the same width then you should write the content within <code>< tt > . . . < /tt ></code> element.</li>
								<li><strong>Superscript Text</strong> - If you put the content within <code>< sup > . . . < /sup ></code> element : means it displayed half a character's height above the other characters.</li>
								<li><strong>Subscript Text</strong> - If you put the content within <code>< sub > . . . < /sub ></code> element : means it displayed half a character's height below the other characters.</li>
								<li><strong>Inserted Text</strong> - Anything that puts within <code>< ins > . . . < /ins ></code> is displayed as inserted text.</li>
								<li><strong>Larger Text</strong> - If you want to put your font size larger than the rest of the text then put the content within <code>< big > . . . < /big ></code>. It increase one font size larger than the previous one.</li>
								<li><strong>Smaller Text</strong> - If you want to put your font size smaller than the rest of the text then put the content within <code>< small > . . . < /small ></code>. It increase one font size smaller than the previous one.</li>
							</ol></blockquote>
							<form method = "get" action = "code_editor.php">
								<input type= "hidden" name = "learn_html" value = "2">
								<button class="button is-link read-more">View Example</button>
							</form>
					</article>

			</div>
		</div>
		<div class ="tile is-ancestor">
			<div class="tile is-6 is-parent ">
			<article class="tile is-child content task">
					<p><a href="" class="tag is-dark">2 min read</a>
					<a href="#contents" class="tag is-link is-pulled-right">Return to Top</a></p></p>
						<h2 class="title" id="element">HTML Element</h2>
						<p class="description">An HTML file is made of elements. These elements are responsible for creating web pages and define content in that webpage. AM element in HTML usually consist of a start tag  <code>< tagname ></code>, close tag <code>< /tagname > </code>and content inserted between them. <strong>Technically, an element is a collection of start tag, attributes, end tag, content between them.</strong>
						<blockquote>
							<strong>Block-level element:</strong><br>
							<br>
							<li>These are the elements, which structure main part of web page, by dividing a page into coherent blocks.</li>
							<li>A block-level elements always start with new line and takes the full width of web page, from left to right.</li>
							<li>These elements can contain block-level as well as inline elements.</li><br>
							<br>
							<strong>Inline elements:</strong>
							<ul>
								<li>Inline elements are those elements, which diffrentiate the part of a given text and provide it a particular function.</li>
								<li>These elements does not start with new line and take width as per requirement</li>
								<li>The inline elements are ,mostly used with other elements.</li>
							</ul>
						</blockquote>

						<form method = "get" action = "code_editor.php">
							<input type = "hidden" name = "learn_html" value = "11">
							<button class="button is-link read-more">View Example</button>
						</form>
					</article>
			</div>
			<div class="tile is-6 is-parent is-vertical">
			<article class="tile is-child content task">
					<p><a href="" class="tag is-dark">1 min read</a>
						<a href="#contents" class="tag is-link is-pulled-right">Return to Top</a>
					</p>
						<h2 class="title" id="heading">HTML Heading</h2>
						<p class="description">A HTML heading or Html h tag can be defined as a title or a subtitle which you want to display on the webpage. When you place the text within the heading tags <code>< h1 > . . . < /h1 ></code>, it is displayed on the browser in the bold format and size of the text depends on the number of heading. <br><br>
						There are six different HTML headings which defined with the <code>< h1 ></code> to <code>< h6 ></code>, from highest level h1 (main heading) to the least level h6 (least important heading). <br><br>
						h1 is the largest heading tag and h6 is the smallest one. So h1 is used for most important heading and h6 is used for least important.</p>
					<form method = "get" action = "code_editor.php">
						<input type= "hidden" name = "learn_html" value = "3">
						<button class="button is-link read-more">View Example</button>
					</form>
					</article>
			<article class="tile is-child content task">
						<p><a href="" class="tag is-dark">form</a> <a href="" class="tag is-dark">textarea</a>
						<a href="#contents" class="tag is-link is-pulled-right">Return to Top</a></p></p>
						<h2 class="title"id="image">HTML Image</h2>
						<p class="description"><strong>Description:</strong> A simple form with four inputs and one textarea. Custom close button is made with CSS pseudo-elements.</p>
						<p class="notes"><strong>Notes:</strong> The challenge of this task was to make a form container to shrink, when a user stretches the textarea field. The solution was not to set <code>height</code> for the form tab.
						</p>
						<form method = "get" action = "code_editor.php">
							<input type= "hidden" name = "learn_html" value = "4">
							<button class="button is-link read-more">View Code</button>
						</form>
						<!-- former link: https://github.com/ni4yja/frontloops/tree/master/task-12-->
					</article>
			</div>
		</div>
			<div class="tile is-ancestor">
					<article class="tile is-parent is-5">
						<div class="tile is-child content task">
							<p><a href="" class="tag is-dark">button</a> <a href="" class="tag is-dark">web accessibility</a> <a href="" class="tag is-dark">scroll</a> <a href="" class="tag is-dark">scss</a> 
							<a href="#contents" class="tag is-link is-pulled-right">Return to Top</a></p></p>
							<h2 class="title" id="paragraph">HTML Paragraph</h2>
							<p class="description">HTML paragraph or HTML p tag is used to define a paragraph in a webpage. Let's take a simple example to see how it work. It is a notable point that a browser itself add an empty line before and after a paragraph. An HTML <code>< p ></code> tag indicates starting of new paragraph.</p>
							<p class="notes"><strong>Notes:</strong> If we are using various <code>< p ></code> tags in one HTML file then the browser automatically adds a single blank line between the two paragraph </p><br>
							<blockquote>
								<strong>Space inside HTML Paragraph</strong><br><br>
								If you put a lot of spaces inside the HTML p tag, browser removes extra spaces and extra line while displaying the page. The browser counts number of spaces and lines as a single one.
							</blockquote>
							<blockquote>
								<strong>How to Use <code> < br ></code> and <code>< hr ></code> tag with paragraph ?</strong><br><br>
								An HTML <code>< br ></code> tag is used for line break and it can be used with paragraph elements. <br><br>
								An HTML <code>< hr ></code> tag is used to apply a horizontal line between two statements or two paragraphs.
							</blockquote><br>
							<strong>HTML Display</strong><br>
							<p>You cannot be sure how HTML will be displayed.
							Large or small screens, and resized windows will create different results.
							With HTML, you cannot change the display by adding extra spaces or extra lines in your HTML code.
							The browser will automatically remove any extra spaces and lines when the page is displayed</p>
							<form method = "get" action = "code_editor.php">
								<input type= "hidden" name = "learn_html" value = "5">
								<button class="button is-link read-more">View Example</button>
							</form>
						</div>
					</article>
					<div class="tile is-parent is-7">
					<div class="tile is-child content task">
            <p><a href="" class="tag is-dark" id="tag">landing page</a> <a href="" class="tag is-dark">section</a> <a href="" class="tag is-dark">article</a> <a href="" class="tag is-dark">CSS pseudo-element</a>
			<a href="#contents" class="tag is-link is-pulled-right">Return to Top</a></p> </p>
						<h2 class="title">HTML Phrase Tag</h2>
						<p class="description">The HTML phrase tags are special purpose tags, which defines the structural meaning of a block of text or semantics of text.</p>
						<blockquote>
							<strong>List of Phrase Tag</strong><br>
							<ol>
								<li><strong>Text Abbreviation tag</strong><br>
								This <code>< abbr ></code>and <code>< /abbr ></code> tag is used to abbreviate a text.</li>
								<li><strong>Marked tag</strong><br>
								The content written between <code>< mark ></code> and <code>< /mark ></code> tag will show as yellow mark.</li>
								<li><strong>Strong text</strong><br>
								This <code>< strong ></code> and <code>< /strong ></code>tag is used to display the important text of the content.</li>
								<li><strong>Emphasized text</strong><br>
								This <code>< em ></code> and <code>< em ></code> tag is used to emphasize the text, and displayed the text in italic form.</li>
								<li><strong>Definition tag</strong><br>
								When you use the <code>< dfn ></code> and <code>< /dfn></code> tags, it allow to specify the keyword of the content.</li>
								<li><strong>Quoting text</strong><br>
								The HTML <code>< blockquote ></code> elemet shows that the enclosed content is quoted from another source.</li>
								<li><strong>Short Quotations</strong><br>
								An HTML <code>< q ></code> . . . <code>< /q ></code> element defines a short quotation, it will enclose the text in double quotes.</li>
								<li><strong>Code tags</strong><br>
								The HTML <code>< /code ></code> and <code>< /code ></code> element is used to display the part of computer code.</li>
								<li><strong>Keyboard Tag</strong><br>
								In HTML the keyboard tag, <code>< kbd ></code>, indicates that a section of content is a user input from keyboard.</li>
								<li><strong>Address tag</strong><br>
								An HTML <code>< address > </code>tag defines the contact information about the author of the content and it displayed in italic font.</li>
							</ol>
						</blockquote>
						<form method = "get" action = "code_editor.php">
							<input type= "hidden" name = "learn_html" value = "6">
							<button class="button is-link read-more">View Example</button>
						</form>
				</div>
			</div>
		</div>
		<div class="tile is-ancestor">
			<div class="tile is-8 is-parent">
			<article class="tile is-child content task">
						<p><a href="" class="tag is-dark">slider</a> <a href="" class="tag is-dark">transform</a> <a href="" class="tag is-dark">javascript</a>
						<a href="#contents" class="tag is-link is-pulled-right">Return to Top</a></p>
						<h2 class="title" id="anchor">HTML Anchor</h2>
						<p class="description">The <strong>HTML anchor tag</strong> defines <i>a hyperlink that links one page to another page.</i> It can create hyperlink to other web page as well as files, location, or any URL. The "href" attribute is the most important attribute of the HTML a tag. and which links to destination page or URL.</p>
						<blockquote><strong>href attribute of HTML anchor tag</strong><br><br>
						THe href attribute is used to define the address of the file to be linked. In other words, it points out the destination page. <br><br>
						The syntax of HTML anchor tag is given below. <br>
						<code>< a href = " . . . . . . . . . "> Link</code></blockquote>
						<blockquote><strong>Specify a location for Link using target attribute</strong><br>
						If we want to open that link to another page then we can use target attribute of <code>< a ></code> tag. With the help of this link will be open in next page.</blockquote>
						
						<form method = "get" action = "code_editor.php">
							<input type= "hidden" name = "learn_html" value = "7">
							<button class="button is-link read-more">View Code</button>
						</form>
						<!-- former link: https://github.com/ni4yja/frontloops/tree/master/task-11-->
					</article>
			</div>
			<div class="tile is-parent ">
				<article class="tile is-child content task">
						<p><a href="" class="tag is-dark">gradient</a> <a href="" class="tag is-dark">vuejs</a> <a href="" class="tag is-dark">transition</a>
						<a href="#contents" class="tag is-link is-pulled-right">Return to Top</a></p>
						<h2 class="title" id="list">Lists</h2>
						<p class="description"><strong>Description:</strong> A list of photos opens on arrow button click. A nice background is made with <a href="https://cssgradient.io/">css gradient generator</a>.</p>
						<p class="notes"><strong>Notes:</strong> Vue provides a variety of ways to apply transition effects when items are inserted, updated, or removed from the DOM. A <code>transition</code> wrapper component allows you to add entering/leaving transitions for any element or component.</p>
						<button class="button is-link read-more">View Code</button>
		
			</div>
		</div>
		
	</div>			
</section>

<?php include(__DIR__ . "/include/footer.php") ?>
<?php include(__DIR__ . "/include/foot_links.php") ?>

</body>
</html>