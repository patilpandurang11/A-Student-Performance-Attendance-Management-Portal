(function () {
	'use strict';

	const chatbot = document.getElementById('chatbot');
	const toggle = document.getElementById('chatbotToggle');
	const close = document.getElementById('chatbotClose');
	const form = document.getElementById('chatbotForm');
	const input = document.getElementById('chatbotInput');
	const messages = document.getElementById('chatbotMessages');

	function addMessage(text, type) {
		const message = document.createElement('div');
		message.className = 'chat_message ' + type;
		message.textContent = text;
		messages.appendChild(message);
		messages.scrollTop = messages.scrollHeight;
	}

	function replyTo(text) {
		const query = text.toLowerCase();
		if (query.includes('login') || query.includes('sign')) {
			return 'Choose Student, Teacher or Admin from the home page, then enter your registered email and password.';
		}
		if (query.includes('student') || query.includes('feature') || query.includes('mark')) {
			return 'Students can review marks, attendance and performance charts from the Student Portal.';
		}
		if (query.includes('teacher')) {
			return 'Teachers can use their portal to manage student marks and attendance records.';
		}
		if (query.includes('contact') || query.includes('help')) {
			return 'Use the Contact Us form at the bottom of this page and our team will receive your message.';
		}
		return 'I can help with login, student features, teacher features or contacting the SmartTrack team.';
	}

	function send(text) {
		const value = text.trim();
		if (!value) return;
		addMessage(value, 'user');
		window.setTimeout(function () { addMessage(replyTo(value), 'bot'); }, 250);
	}

	toggle.addEventListener('click', function () {
		chatbot.hidden = false;
		toggle.hidden = true;
		input.focus();
	});
	close.addEventListener('click', function () {
		chatbot.hidden = true;
		toggle.hidden = false;
	});
	form.addEventListener('submit', function (event) {
		event.preventDefault();
		send(input.value);
		input.value = '';
	});
	document.querySelectorAll('[data-message]').forEach(function (button) {
		button.addEventListener('click', function () { send(button.dataset.message); });
	});
}());
