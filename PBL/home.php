<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartTrack | Student Performance Tracker</title>
    <link rel="stylesheet" href="h_style.css">
    <link rel="stylesheet" href="chatbot.css">
</head>
<body>
	<!--Welcome-->
    <div class="main_container" id="home">
	
	<div class="navbar">
		<div class="logo">
			<a href="#home">SmartTrack<span class="logo-dot">.</span></a>
		</div>
		<div class="navbar_items">
			<ul>
				<li><a href="#">Home</a></li>
				<li><a href="admin_login.php">Admin</a></li>
				<li><a href="stud_login.php">Student</a></li>
				<li><a href="teach_login.php">Teacher</a></li>
				<li><a href="#contactus">Contact Us</a></li>
			</ul>
		</div>
	</div>

	<div class="banner_image">
		<div class="banner_content">
			<p class="eyebrow">SMARTER INSIGHTS &bull; BETTER RESULTS</p>
			<h1>Student Performance Tracker</h1><br><h3>"Only you can change your life,<br>
			<span>No one can do it for you."</span></h3>
			<div class="hero_actions">
				<a class="hero_button primary" href="stud_login.php">Student Portal</a>
				<a class="hero_button secondary" href="#about">Explore SmartTrack</a>
			</div>
		</div>	
	</div>

	<div class="about" id="about">
		<h1 class="title">About Us</h1>
		<p><strong>SmartTrack is a web-based application for tracking academic attendance, marks and performance trends. Students can review their progress through clear dashboards and graphs, while teachers and administrators can keep records up to date.</strong></p>
		<div class="feature_grid">
			<article class="feature_card"><span class="feature_icon">▥</span><h2>Track progress</h2><p>See attendance and marks in one focused dashboard.</p></article>
			<article class="feature_card"><span class="feature_icon">↗</span><h2>Find trends</h2><p>Use visual reports to spot strengths and improvement areas.</p></article>
			<article class="feature_card"><span class="feature_icon">✓</span><h2>Stay informed</h2><p>Keep students, teachers and administrators connected.</p></article>
		</div>
	</div>
	<div class="contactus" id="contactus">
		<h1 class="title">contact us</h1>
		

		<form class="form" action="submit_form.php" method="post">
    <div class="form_input" style="margin-bottom: 15px;">
        <input type="text" name="email" placeholder="Email" required style="width: 250px; padding: 12px 20px; border: 1px solid #ccc;">
    </div>
    <div class="form_input" style="margin-bottom: 15px;">
        <input type="text" name="subject" placeholder="Subject" required style="width: 250px; padding: 12px 20px; border: 1px solid #ccc;">
    </div>
    <div class="form_input" style="margin-bottom: 15px;">
        <textarea name="message" placeholder="Message" required style="width: 250px; padding: 12px 20px; height: 80px; resize: none; border: 1px solid #ccc;"></textarea>
    </div>
    <div class="btn">
        <input type="submit" value="SUBMIT">
    </div>
</form>

	</div>

	<div class="footer">
		<a href="#">© SmartTrack 2024 &mdash; Student Performance Tracker</a>
	</div>

    <div class="arrow">
		<a href="#home"><img src="arrow.png" alt="up_arrow"></a>
	</div>
</div>	
<button class="chatbot_toggle" id="chatbotToggle" type="button" aria-label="Open SmartTrack assistant">?</button>
<section class="chatbot" id="chatbot" aria-label="SmartTrack assistant" hidden>
	<div class="chatbot_header">
		<div><strong>SmartTrack Assistant</strong><small>Usually replies instantly</small></div>
		<button id="chatbotClose" type="button" aria-label="Close assistant">&times;</button>
	</div>
	<div class="chatbot_messages" id="chatbotMessages" aria-live="polite">
		<div class="chat_message bot">Hi! I can help you find the student, teacher or admin portal.</div>
	</div>
	<div class="chatbot_quick_actions">
		<button type="button" data-message="How do I login?">Login help</button>
		<button type="button" data-message="What can students do?">Student features</button>
		<button type="button" data-message="How can I contact you?">Contact</button>
	</div>
	<form class="chatbot_form" id="chatbotForm">
		<label class="sr_only" for="chatbotInput">Message</label>
		<input id="chatbotInput" type="text" placeholder="Ask SmartTrack..." autocomplete="off">
		<button type="submit" aria-label="Send message">Send</button>
	</form>
</section>
<script src="chatbot.js"></script>
</body>
</html>