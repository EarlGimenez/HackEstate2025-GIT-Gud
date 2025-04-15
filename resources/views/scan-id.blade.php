<!DOCTYPE html>
<html>
<head>
    <title>Scan Physical ID</title>
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
            border: 4px solid #007bff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 123, 255, 0.2);
        }

        button {
            margin-top: 20px;
            padding: 12px 24px;
            font-size: 16px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h2>Step 1: Scan Physical ID</h2>
    <video id="camera" width="400" autoplay></video>
    <br>
    <button onclick="goNext()">Next</button>

    <script>
        const video = document.getElementById('camera');

        navigator.mediaDevices.getUserMedia({ video: true })
            .then((stream) => {
                video.srcObject = stream;
            })
            .catch((err) => {
                alert('Camera access denied: ' + err);
            });

        function goNext() {
            let tracks = video.srcObject.getTracks();
            tracks.forEach(track => track.stop());
            window.location.href = "{{ route('scan.face') }}";
        }
    </script>
</body>
</html>
