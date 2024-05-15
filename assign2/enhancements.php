<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="description" content="JNNR Software Development Company" />
  <meta name="keywords" content="HTML5, CSS layout" />
  <meta name="author" content="Nitesh Gurung"/>
  <title>Enhancements</title>
  <!--linking to css and html-->
  <link href="styles/style.css" rel="stylesheet">
  <!--end of linking-->
  <meta name="viewport" content="width=device-width, initial-scale=0.4" />
  <style>
  </style>
</head>

<body>
<?php 
include("header.inc");
include("menu.inc");
?>

    <div class="container">
        <div class="intro">
            <h1>Code Enhancements</h1>
            
        </div>
        <div class="content1a">
            <h2>Linear Gradient</h2>
            <img src="images/enhancement_pic.png" >
            <h3>"Background-image: linear-gradient(black,white)"</h3>
              <p>To create a linear gradient you must define at least two color stops.
                 Color stops are the colors you want to render smooth transitions among. 
                 You can also set a starting point and a direction (or an angle) along with 
                 the gradient effect.The following code sets the background image of the container 
                fade one color to another.For example, White fading to Red color in a vertical manner.The original background image usually gives one color background but "linear-gradient" allows for two colors to be the background image. </p>
	    <h3>How does this boost user's experience?</h3>
		<p>Colors play a huge amount of role in human's feeling towards a certain media.Like,when big bold red 
		is presented to a person,they will feel a sense of urgency or something important.Here, we integrated 
		a color gradient to ease the eyes of users and make users feel ease with fading in neutral colors in which our case is black,white and grey.
		</p>
                <a href="https://www.w3schools.com/css/css3_gradients.asp">Source</a>
                <h2>Example of linear-gradient</h2>
                <img src="images/enhancement_pic2.png">

            <h2>Embedded youtube video</h2>
            <p>The 'iframe' tag specifies an inline frame which means it will load another HTML file within the documment.
		   This allows for advertisements, web analytics, interactive website and in our case a embedded
		    video.A embedded video can be put into an inline frame which means it embeds an frame directly
		    inline with other elements of a webpage.
            </p>
            <p>
	        Using 'iframe' tag involves specifying a height and width of the inline frame to be put in the webpage.
		The width will change the frame's horizontal length while the height defines the vertical length of the
	        inline frame ultimately, the embedded youtube video. The hyperlink of the youtube video should be included in the src definition
		which will allow the user to click the the link and get sent to the video's website.	
	        
            </p>
	    <p>
		This embedded video enhances the user's experience in the website by allowing the user to
		preview the content of the youtube video with the thumbnail and also give an option to the user
		to go and watch the youtube video by clicking on it.Videos are a media
		that is usually engaging to users and better form of content as they are more digestable than just
	        plain text which also enhances the user's overall experience in the website.It also gives a promotional value to the company 
		as it provides an free advertisement for their videos or other videos.
	    </p>
            <a href="https://www.w3schools.com/tags/tag_iframe.ASP">Source</a>
        </div>
    </div>
<?php
include("footer.inc");
?>
</body>
