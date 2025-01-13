<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messenger Inquiries Design</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f2f5;
        }

        .messenger-container {
            max-width: 400px;
            margin: 50px auto;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background-color: #0078ff;
            color: white;
            text-align: center;
            padding: 15px;
            font-size: 18px;
            font-weight: bold;
        }

        .messages {
            padding: 15px;
            max-height: 300px;
            overflow-y: auto;
        }

        .message {
            margin-bottom: 15px;
            display: flex;
            align-items: flex-end;
        }

        .message.inquiry {
            justify-content: flex-start;
        }

        .message.response {
            justify-content: flex-end;
        }

        .bubble {
            max-width: 70%;
            padding: 10px 15px;
            border-radius: 15px;
            line-height: 1.4;
            font-size: 14px;
        }

        .bubble.inquiry {
            background-color: #f0f0f0;
            color: #333;
            border-top-left-radius: 0;
        }

        .bubble.response {
            background-color: #0078ff;
            color: white;
            border-top-right-radius: 0;
        }

        .input-container {
            display: flex;
            border-top: 1px solid #ccc;
            padding: 10px;
            background-color: #f9f9f9;
        }

        .input-container input {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 20px;
            outline: none;
            font-size: 14px;
        }

        .input-container button {
            margin-left: 10px;
            background-color: #0078ff;
            color: white;
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .input-container button:hover {
            background-color: #005bb5;
        }
    </style>
</head>
<body>
    <div class="messenger-container">
        <div class="header">Message Inquiries</div>
        <div class="messages">
            <div class="message inquiry">
                <div class="bubble inquiry">Hi! I have a question about your services.</div>
            </div>
            <div class="message response">
                <div class="bubble response">Sure, feel free to ask!</div>
            </div>
            <div class="message inquiry">
                <div class="bubble inquiry">Do you offer support for international clients?</div>
            </div>
            <div class="message response">
                <div class="bubble response">Yes, we do! Our services are available globally.</div>
            </div>
        </div>
        <div class="input-container">
            <input type="text" placeholder="Type your message...">
            <button>&#10148;</button>
        </div>
    </div>
</body>
</html>
