<?php
include ('fsession.php');
ini_set('memory_limit', '-1');

if(!isset($_SESSION['farmer_login_user'])){
header("location: ../index.php");} // Redirecting To Home Page
$query4 = "SELECT * from farmerlogin where email='$user_check'";
              $ses_sq4 = mysqli_query($conn, $query4);
              $row4 = mysqli_fetch_assoc($ses_sq4);
              $para1 = $row4['farmer_id'];
              $para2 = $row4['farmer_name'];
			  
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="icon" type="image/png" href="https://cdn-icons-png.flaticon.com/512/300/300221.png" />
	<title>Gemini</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
	<script src="https://cdn.staticfile.org/jquery/3.6.3/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/markdown-it/13.0.1/markdown-it.min.js"></script>
	<style>
	
		.chat-box {
		  height: calc(100vh - 238px); /* subtract the space occupied by the navbar and footer */
		  overflow-y: scroll;
		}
		
		@media only screen and (max-width: 480px) {
		  .chat-box {
			height: calc(100vh - 300px); /* adjust the height value as per your requirement */
			overflow-y: scroll;
		  }
		}
		
		.message {
			margin-bottom: 10px;
			padding: 10px;
			padding-bottom: 0;
			border-radius: 10px;
			display: inline-block;
			max-width: 85%;
			word-wrap: break-word;
			white-space: normal;
		}

		.left-side {
			background-color: lightgray;
			float: left;
		}

		.right-side {
			background-color: lightgreen;
			float: right;
		}	
		.popup {
			position: fixed;
			bottom: 30vh;
			left: 50%;
			transform: translateX(-50%);
			background-color: rgba(0, 0, 0, 0.6);
			color: white;
			border-radius: 5px;
			padding: 10px 20px;
			font-size: 16px;
			display: none;
		}
		
		/* Toggle Switch */

		.switch {
		  position: relative;
		  display: inline-block;
		  width: 60px;
		  height: 34px;
		}
		.switch input {
		  opacity: 0;
		  width: 0;
		  height: 0;
		}
		.slider {
		  position: absolute;
		  cursor: pointer;
		  top: 0;
		  left: 0;
		  right: 0;
		  bottom: 0;
		  background-color: #ccc;
		  transition: .4s;
		}
		.slider:before {
		  position: absolute;
		  content: "";
		  height: 26px;
		  width: 26px;
		  left: 4px;
		  bottom: 4px;
		  background-color: white;
		  transition: .4s;
		}
		input:checked + .slider {
		  background-color: #555261;
		}
		input:checked + .slider:before {
		  transform: translateX(26px);
		}
		.slider.round {
		  border-radius: 34px;
		}
		.slider.round:before {
		  border-radius: 50%;
		}


		/* Dark Theme */
		.dark-mode .dark-theme {
		  background-color: #333;
		  color: #fff;
		}

		.dark-mode .nav{
		  background-color: #333;
		  color: #fff;
		}

		.dark-mode .dark-text {
		  color: #fff;
		}

		.dark-mode .card {
		  background-color: #333;
		  color: #fff;
		}

		.dark-mode .popup {
		  background-color: #fff;
		  color: #333;
		}

		.dark-mode .fa-clipboard {
		  color: #212529;
		  background-color: #7cc;
		  border-color: #5bc2c2
		}

		.dark-mode .fa-clipboard:hover {
		  color: #212529;
		  background-color: #52bebe;
		  border-color: #8ad3d3
		}

		.bg-skyblue{
		background-color: #e3f2fd;
		}

</style>
</head>
<body class=" bg-secondary">
	<nav class="navbar navbar-expand-lg navbar-light sticky-top top-0 shadow py-0 bg-skyblue dark-theme">
		<a class="navbar-brand logo pl-4 dark-text" href="https://aistudio.google.com/app/apikey" target="blank" >
			 <h3><p style="color: #4285F4; display: inline;">G</p>
				<p style="color: #EA4335; display: inline;">O</p>
				<p style="color: #FBBC05; display: inline;">O</p>
				<p style="color: #34A853; display: inline;">G</p>
				<p style="color: #4285F4; display: inline;">L</p>
				<p style="color: #EA4335; display: inline;">E</p>
				</h3>
		</a>
		<a href="https://github.com/Nandha2536" target="blank" class="github-corner" aria-label="View source on GitHub">
		  <svg width="50" height="50" viewBox="0 0 250 250" style="fill:#151513; color:#fff; position: absolute; top: 0; border: 0; left: 0; transform: scale(-1, 1);" aria-hidden="true">
			<path d="M0,0 L115,115 L130,115 L142,142 L250,250 L250,0 Z"></path>
			<path d="M128.3,109.0 C113.8,99.7 119.0,89.6 119.0,89.6 C122.0,82.7 120.5,78.6 120.5,78.6 C119.2,72.0 123.4,76.3 123.4,76.3 C127.3,80.9 125.5,87.3 125.5,87.3 C122.9,97.6 130.6,101.9 134.4,103.2" fill="currentColor" style="transform-origin: 130px 106px;" class="octo-arm"></path>
			<path d="M115.0,115.0 C114.9,115.1 118.7,116.5 119.8,115.4 L133.7,101.6 C136.9,99.2 139.9,98.4 142.2,98.6 C133.8,88.0 127.5,74.4 143.8,58.0 C148.5,53.4 154.0,51.2 159.7,51.0 C160.3,49.4 163.2,43.6 171.4,40.1 C171.4,40.1 176.1,42.5 178.8,56.2 C183.1,58.6 187.2,61.8 190.9,65.4 C194.5,69.0 197.7,73.2 200.1,77.6 C213.8,80.2 216.3,84.9 216.3,84.9 C212.7,93.1 206.9,96.0 205.4,96.6 C205.1,102.4 203.0,107.8 198.3,112.5 C181.9,128.9 168.3,122.5 157.7,114.1 C157.9,116.9 156.7,120.9 152.7,124.9 L141.0,136.5 C139.8,137.7 141.6,141.9 141.8,141.8 Z" fill="currentColor" class="octo-body"></path>
		  </svg>
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse " id="navbarNav">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0 mb-1 ">
                 <li class="nav-item">
					<div class="d-flex align-items-center">
						<input type="text" id="apiKey" value="" class="form-control mr-1 dark-theme" size="55" placeholder="Paste your Google Gemini apiKey here...">
						<label class="switch mb-0 pl-5">
							<input type="checkbox" id="darkModeToggle" >
							<span class="slider round"></span>
						</label>
					</div>
				</li>
            </ul>
        </div>
	</nav>
	<div class="container-fluid">
		<div class="row ">
			<div class="col-md-12 mb-3">
				<div class="card mt-3">
					<div class="card-header row">
						<div class="col-6 ">
							<h3>Gemini</h3>						
						</div>					
						<div class="col-6 offset-md-3 col-md-3 text-right">	
							<a  type="button" onclick="window.print()" class="btn  btn-outline-info">Print</a>						
							<a  type="button" class="btn btn-outline-danger " onclick="clearContent()">Clear</a>
						</div>
					</div>
					<div class="card-body chat-box rounded p1" id="chatbox"><span id="copy-popup" class="popup">Copied!</span></div>
					<div class="card-footer">					
					<div class="form-group row">
						<div class="col-md-7 mb-1">
							<textarea id="userInput" rows="1" class="form-control dark-theme" placeholder="Type your message here..."></textarea>
						</div>
						<div class="col-md-3">
							<label for="userfile" class="btn btn-secondary btn-block ">
								<i class="bi bi-image "></i> <span id="fileLabel">Choose an Image to get its Details</span>
								<input type="file" name="file" id="userfile" accept="image/*" class="form-control" style="display: none;" onchange="updateFileLabel()">
								<img id="output" width="40" height="25" style="display: none;" class="float-right "/>
							</label>
						</div>
						<div class="col-md-2">
							<input id="sendButton" type="button" value="SUBMIT" class=" form-control btn btn-success btn-block " />
						</div>
					</div>						
					</div>
				</div>
			</div>
		</div>
	</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.js"></script>
<script>
    function updateFileLabel() {
        const fileInput = document.getElementById("userfile");
        const fileLabel = document.getElementById("fileLabel");
		const image = document.getElementById('output');
		const file = fileInput.files[0];
		
        if (fileInput.files.length > 0) {			
			const maxLength = 26; // Set your desired maximum length
			const fileName = file.name.length > maxLength ? file.name.substring(0, maxLength) + "..." : file.name;
 
            fileLabel.innerText = fileName;
			image.style.display = 'block';
			image.src = URL.createObjectURL(file);
        } else {
            fileLabel.innerText = "Choose an Image to get its Details";
			image.style.display = 'none';
        }
    }
</script>
<script>
const toggleSwitch = document.querySelector('#darkModeToggle');
toggleSwitch.addEventListener('change', switchTheme);

function switchTheme(event) {
  if (event.target.checked) {
    document.body.classList.add('dark-mode');
	document.nav.classList.remove('bg-skyblue');
  } else {
    document.body.classList.remove('dark-mode');
  }   
}
</script>	
<script>
function clearContent(){
    document.getElementById('chatbox').innerHTML = '';
}

const url = new URL(window.location.href);
const key = url.searchParams.get('key');
    if (key) {
            $("#apiKey").val(key);
            $("#apiKey").hide();
    }	
const chatbox = $("#chatbox");
const userInput = $("#userInput");
const file = $("#userfile");
const sendButton = $("#sendButton");
let contents = [];

userInput.on("keydown", (event) => {
    if (event.keyCode === 13 && !event.ctrlKey && !event.shiftKey) {
        event.preventDefault();
        sendButton.click();
    } else if (event.keyCode === 13 && (event.ctrlKey || event.shiftKey)) {
        event.preventDefault();
        const cursorPosition = userInput.prop("selectionStart");
        const currentValue = userInput.val();

        userInput.val(
            currentValue.slice(0, cursorPosition) +
            "\n" +
            currentValue.slice(cursorPosition)
        );
        userInput.prop("selectionStart", cursorPosition + 1);
        userInput.prop("selectionEnd", cursorPosition + 1);
    }
});

const getBase64Image = (file) => {
    const reader = new FileReader();
    reader.readAsDataURL(file);
    return new Promise((resolve, reject) => {
        reader.onload = () => resolve(reader.result.split(',')[1]);
        reader.onerror = (error) => reject(error);
    });
};


sendButton.on("click", () => {
    const input = document.getElementById("userfile");	
	const message = userInput.val();

	if (message === "" && input.files.length === 0) {
    alert("Please provide Text or Image input.");
    return; 
  }
if (input && input.files.length > 0) {
	const file = input.files[0];
	const imgsrc = URL.createObjectURL(file);

  getBase64Image(file).then((base64String) => {
  
  if (message === "") {
	let userMessageHtml = '<pre><div class="message right-side "  ><img class="img-thumbnail mb-2" width="400" src=" ' + imgsrc + ' "/></div></pre>';
	chatbox.append(userMessageHtml);  
    fetchreply(message, base64String);
	}
  else {
    const displaytext = window.markdownit().render(message);
	let userMessageHtml = '<pre><div class="message right-side "  >' + displaytext + '</div></pre>';
    chatbox.append(userMessageHtml);  
    fetchreply(message, base64String);
	}		
  });
}
else {
    if (message) {
        contents.push({
            "role": "user",
            "parts": [
                {
                    "text": message
                }
            ]
        });
const displaytext = window.markdownit().render(message); 
	let userMessageHtml = '<pre><div class="message right-side "  >' + displaytext + '</div></pre>';
	chatbox.append(userMessageHtml);      
        fetchMessages();
		}
	}
	chatbox.animate({ scrollTop: 20000000 }, "slow");
    userInput.val("");
    sendButton.val("Generating Response...");
    sendButton.prop("disabled", true); 
});


function fetchreply(message,base64String) {
		const apiKey = $("#apiKey").val();
		var settings = {
  "url": "https://generativelanguage.googleapis.com/v1beta/models/gemini-pro-vision:generateContent?key=" + apiKey,
  "method": "POST",
  "timeout": 0,
  "headers": {
    "Content-Type": "application/json"
  },
  "data": JSON.stringify({
			"contents": [
			  {
				"parts": [
				  {
					"text": message
				  },
				  {
					"inline_data": {
					  "mime_type": "image/jpeg",
					   "data": base64String
					}
				  }
				]
			  }
			]
			})
};
$.ajax(settings).done(function(response) { processAjaxResponse(response); })
		.fail(function(jqXHR, textStatus, errorThrown) { handleAjaxFailure(jqXHR);});
}
	
function fetchMessages() {
		const apiKey = $("#apiKey").val();
		var settings = {
			"url": "https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent?key=" + apiKey,
			"method": "POST",
			"timeout": 0,
			"headers": {
				"Content-Type": "application/json"
			},

			"data": JSON.stringify({
				"contents": contents
			})
		}; 
		$.ajax(settings).done(function(response) { processAjaxResponse(response); })
		.fail(function(jqXHR, textStatus, errorThrown) { handleAjaxFailure(jqXHR);});
}

function processAjaxResponse(response) {
    console.log(response);
    const reply = response.candidates[0].content;
    contents.push({
        "role": reply.role,
        "parts": [{
            "text": reply.parts[0].text
        }]
    });
    const htmlText = window.markdownit().render(reply.parts[0].text);
    const botMessageHtml = '<pre><div class="message left-side" id="' + CryptoJS.MD5(htmlText) + '">' + htmlText + '</div><i class="far fa-clipboard ml-1 btn btn-outline-dark" id="' + CryptoJS.MD5(htmlText) + '-copy"></i></pre>';

    chatbox.append(botMessageHtml);

    // Add event listener to the copy icon 
    var copyIcon = document.getElementById(CryptoJS.MD5(htmlText) + '-copy');
    var copyText = document.getElementById(CryptoJS.MD5(htmlText));

    copyIcon.addEventListener("click", function () {
        var tempTextarea = document.createElement("textarea");
        tempTextarea.value = copyText.textContent;
        document.body.appendChild(tempTextarea);
        tempTextarea.select();
        document.execCommand("copy");
        document.body.removeChild(tempTextarea);

        // Display "Copied!" popup
        var copyPopup = document.getElementById("copy-popup");
        copyPopup.style.display = "block";
        setTimeout(function () {
            copyPopup.style.display = "none";
        }, 1000); // Display for 1 second
    });

    chatbox.animate({
        scrollTop: 20000000
    }, "slow");
    sendButton.val("SUBMIT");
    sendButton.prop("disabled", false);
}

function handleAjaxFailure(jqXHR) {
    // Handle failure
    sendButton.val("Error");
    let errorText = "Error: " + jqXHR.responseJSON.error.message;
    let errorMessage = '<pre><div class="message left-side text-danger" >' + errorText + '</div></pre>';
    chatbox.append(errorMessage);
    chatbox.animate({
        scrollTop: 20000000
    }, "slow");
}   
</script>
</html>
