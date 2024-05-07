<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shell in a Box and Exercises</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            overflow: hidden;
        }

        .container {
            display: flex;
            height: 100%;
        }

        #shell-container {
            width: 72%;
            height: 100%;
            border-right: 1px solid #ccc;
        }

        #exercises-container {
            width: 50%;
            height: 100%;
            overflow-y: scroll;
            padding: 20px;
            position: relative;
        }

        #timer {
            position: absolute;
            top: 10px;
            right: 10px;
            padding: 5px 10px;
            font-size: 16px;
            border-radius: 5px;
            color: white;
        }

        iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        .green {
            background-color: green;
        }

        .yellow {
            background-color: yellow;
        }

        .red {
            background-color: red;
        }

        .challenge-button {
            margin-top: 10px;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        .success {
            background-color: green;
            color: white;
        }

        .failure {
            background-color: red;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Shell in a Box -->
        <div id="shell-container">
            <iframe src="http://131.186.0.96:4602"></iframe>
            <!-- Replace "http://localhost:4200" with the URL of your Shell in a Box server -->
        </div>

        <!-- Exercises -->
        <div id="exercises-container">
            <h1>Linux Exercises</h1>
            <div id="timer">30:00</div> <!-- Timer added here -->
            <ul>
                <h4>Welcome to the Javascript Testcenter Challenge: <strong>Advance 1</strong></h4>
                <strong>Username:</strong> candidate <br>
                <strong>Password:</strong> candidate123 <br>

                <li><strong>Challenge 1:</strong><br>
                    Define a function named "<strong>HTTPrequest</strong>".<br>
                    Create a function called HTTPrequest in ./test.html.
                </li>
                <button id="challenge1Button" class="challenge-button" onclick="verifyChallenge(1)">Verify Challenge 1</button><br><br>

                <li><strong>Challenge 2:</strong><br>
                    TheSimulate an asynchronous HTTP request.<br>
                    Inside the HTTPRequest function, use setTimeout to simulate an asynchronous HTTP request that takes 2 seconds to complete.
                </li>
                <button id="challenge2Button" class="challenge-button" onclick="verifyChallenge(2)">Verify Challenge 2</button><br><br>

                <li><strong>Challenge 3:</strong><br>
                    Resolve or reject the promise.<br>
                    Within HTTPrequest, it resolves the promise successfully in 80% of the cases and rejects it with an error in 20% of the cases.
                </li>
                <button id="challenge2Button" class="challenge-button" onclick="verifyChallenge(2)">Verify Challenge 2</button><br><br>

                <li><strong>Challenge 4:</strong><br>
                    Manage the promise.<br>
                    It uses the then method to handle the success case of the promise and the catch method to handle any errors that may occur during its execution.
                </li>
                <button id="challenge2Button" class="challenge-button" onclick="verifyChallenge(2)">Verify Challenge 2</button><br><br>

                <br><strong> Wishing you the best of luck on your Javascript Challenge!</strong>
            </ul>
        </div>
    </div>

    <script>
        function updateColor(minutes) {
            const timer = document.getElementById('timer');

            if (minutes >= 15 && minutes <= 30) {
                timer.className = 'green';
            } else if (minutes >= 5 && minutes < 15) {
                timer.className = 'yellow';
            } else if (minutes >= 0 && minutes < 5) {
                timer.className = 'red';
            }
        }

        function startTimer() {
            let totalSeconds = 30 * 60;

            function update() {
                let minutes = Math.floor(totalSeconds / 60);
                let seconds = totalSeconds % 60;

                updateColor(minutes);

                if (totalSeconds > 0) {
                    document.getElementById('timer').innerText = pad(minutes) + ":" + pad(seconds);
                    totalSeconds--;
                    setTimeout(update, 1000); // Update every second (1000 milliseconds)
                }
            }

            update(); // Start the initial update
        }

        function pad(val) {
            const valString = val + "";
            if (valString.length < 2) {
                return "0" + valString;
            } else {
                return valString;
            }
        }

        function executeCommand(command) {
            // Execute the provided command
            alert("Executing command: " + command);
            // Implement your logic to execute the command here
        }

        function verifyChallenge(challengeNumber) {
            var buttonId = "challenge" + challengeNumber + "Button";
            var button = document.getElementById(buttonId);

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        if (xhr.responseText.trim() === 'success') {
                            if (button.classList.contains("failure")) { // Check if the button failed
                                // Reset the button after 2 seconds
                                setTimeout(function() {
                                    button.innerText = "Verify Challenge " + challengeNumber;
                                    button.classList.remove("failure");
                                    button.classList.remove("success");
                                }, 2000);
                            }
                            button.innerText = "Success";
                            button.classList.remove("failure");
                            button.classList.add("success");
                        } else {
                            button.innerText = "Failure"; // Update the button text to indicate failure
                            button.classList.remove("success");
                            button.classList.add("failure");

                            // Reset the button after 2 seconds
                            setTimeout(function() {
                                button.innerText = "Verify Challenge " + challengeNumber;
                                button.classList.remove("failure");
                                button.classList.remove("success");
                            }, 2000);
                        }
                    }
                }
            };
            xhr.open("GET", "/verify-challenge-med" + challengeNumber + ".php", true);
            xhr.send();
        }

        window.onload = startTimer;
    </script>
</body>
</html>
