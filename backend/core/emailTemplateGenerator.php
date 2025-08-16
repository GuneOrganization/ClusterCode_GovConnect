<?php

class EmailTemplateGenerator
{  

    public static function generateEmailTemplate($body)
    {

        return '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gov-Connect Email</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .header {
            background-color: #0056b3;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            padding: 30px;
            color: #333333;
            line-height: 1.6;
        }
        .content h2 {
            color: #0056b3;
            text-align: center;
        }
        .code-box {
            text-align: center;
            font-size: 32px;
            font-weight: bold;
            color: #0056b3;
            background-color: #f0f8ff;
            padding: 15px;
            border-radius: 6px;
            margin: 20px 0;
            letter-spacing: 4px;
        }
        .footer {
            background-color: #f4f4f4;
            color: #888888;
            font-size: 12px;
            text-align: center;
            padding: 15px;
        }
        @media (max-width: 600px) {
            .email-container {
                width: 100% !important;
                margin: 10px auto;
            }
            .content {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>Gov-Connect</h1>
        </div>
        '.$body.'
        <div class="footer">
            &copy; 2025 Gov-Connect. All rights reserved.<br>
        </div>
    </div>
</body>
</html>

';
    }
}
