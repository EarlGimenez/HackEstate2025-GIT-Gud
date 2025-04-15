<!DOCTYPE html>
<html>
<head>
    <title>Scan Facial Features</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #f8f9fa;
        }

        h2 {
            margin-bottom: 20px;
        }

        video {
            border: 4px solid #28a745;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(40, 167, 69, 0.2);
        }

        button {
            margin-top: 20px;
            padding: 12px 24px;
            font-size: 16px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background-color: #1e7e34;
        }
    </style>
</head>
<body>
    <h2>Step 2: Scan Face</h2>
    <video id="camera" width="400" autoplay></video>
    <br>
    <button onclick="finish()">Finish</button>

    <script>
        const video = document.getElementById('camera');

        navigator.mediaDevices.getUserMedia({ video: true })
            .then((stream) => {
                video.srcObject = stream;
            })
            .catch((err) => {
                alert('Camera access denied: ' + err);
            });

        function finish() {
            let tracks = video.srcObject.getTracks();
            tracks.forEach(track => track.stop());
            window.location.href = "/profile";
        }
    </script>
</body>
</html>
