<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Python 3 Simülasyonu</title>
    <style>
        body {
            background: #1e1e2e;
            color: white;
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 20px;
        }
        canvas {
            border: 2px solid white;
            background-color: black;
        }
        .instagram {
            margin-top: 20px;
        }
        .instagram a {
            color: white;
            font-size: 20px;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <h1>🐍 Python Yılan Simülasyonu 🐍</h1>
    <canvas id="gameCanvas" width="400" height="400"></canvas>
    
    <div class="instagram">
        <a href="https://www.instagram.com/the.ecy.1" target="_blank">
            <img src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png" width="50" alt="Instagram">
            @the.ecy.1
        </a>
    </div>

    <script>
        const canvas = document.getElementById("gameCanvas");
        const ctx = canvas.getContext("2d");

        let snake = [{ x: 200, y: 200 }];
        let direction = "RIGHT";
        let food = { x: Math.floor(Math.random() * 20) * 20, y: Math.floor(Math.random() * 20) * 20 };

        function draw() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            ctx.fillStyle = "lime";
            snake.forEach(segment => ctx.fillRect(segment.x, segment.y, 20, 20));
            
            ctx.fillStyle = "red";
            ctx.fillRect(food.x, food.y, 20, 20);
        }

        function move() {
            let head = { ...snake[0] };
            if (direction === "RIGHT") head.x += 20;
            if (direction === "LEFT") head.x -= 20;
            if (direction === "UP") head.y -= 20;
            if (direction === "DOWN") head.y += 20;

            snake.unshift(head);
            if (head.x === food.x && head.y === food.y) {
                food = { x: Math.floor(Math.random() * 20) * 20, y: Math.floor(Math.random() * 20) * 20 };
            } else {
                snake.pop();
            }
        }

        function changeDirection(event) {
            const key = event.keyCode;
            if (key === 37 && direction !== "RIGHT") direction = "LEFT";
            if (key === 38 && direction !== "DOWN") direction = "UP";
            if (key === 39 && direction !== "LEFT") direction = "RIGHT";
            if (key === 40 && direction !== "UP") direction = "DOWN";
        }

        document.addEventListener("keydown", changeDirection);
        setInterval(() => { move(); draw(); }, 150);
    </script>

</body>
</html>
