<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to [Your Company Name]</title>
    <style>
        /* General styles for email */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        table {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #007BFF; /* Primary brand color */
            padding: 20px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }
        .header img {
            max-width: 60px;
        }
        .content {
            padding: 20px;
            text-align: left;
            color: #333;
        }
        .button {
            background-color: #28a745; /* Button color */
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            font-weight: bold;
        }
        .button:hover {
            background-color: #218838;
        }
        .contact-info {
            background-color: #f7f7f7;
            border-left: 4px solid #28a745;
            padding: 10px 20px;
            margin-top: 20px;
            border-radius: 4px;
        }
        .footer {
            background-color: #f8f8f8;
            color: #888888;
            text-align: center;
            padding: 20px;
            font-size: 12px;
            border-radius: 0 0 8px 8px;
        }
        .footer a {
            color: #007BFF; /* Footer link color */
            text-decoration: none;
        }
        .footer p {
            margin: 0;
        }
        @media (max-width: 600px) {
            table {
                padding: 15px;
            }
            .button {
                width: 100%;
                box-sizing: border-box;
            }
        }
    </style>
</head>
<body>
    <table>
        <!-- Header -->
        <tr>
            <td class="header">
                <?php $imageUrl = public_path('images/favicon.png');
                ?>
                <img src="{{$message->embed($imageUrl)}}" alt="favicon"> <!-- Replace with your logo URL -->
            </td>
        </tr>
        
        <!-- Welcome Message -->
        <tr>
            <td class="content">
                <h1>{{$mail_subject}}</h1>
                <p>{{$mail_message}}</p>
                <p>If you need help, don't hesitate to contact our support team at <a href="mailto:virtualapptechnologies@gmail.com">virtualapptechnologies@gmail.com</a>.</p>
            </td>
        </tr>

        <!-- Footer -->
        <tr>
            <td class="footer">
                <p>You're receiving this email because you signed up at [Your Company Name].</p>
                <p><a href="https://yourcompany.com/unsubscribe">Unsubscribe</a> | <a href="https://yourcompany.com/privacy-policy">Privacy Policy</a></p>
                <p>[Your Company Name], Address Line 1, City, State, ZIP Code</p>
            </td>
        </tr>
    </table>
</body>
</html>
