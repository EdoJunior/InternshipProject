Start Xampp Control Panel
-run Apache and MySQL

Copy smart_dash folder into the following directory:
C:\xampp\htdoc

Open browswer and copy and past the link below and hit enter:
http://localhost:smart_dash/index.html

If faced with the following Error:
Fatal error: Uncaught exception 'LogicException' with message 'refresh token must be passed in or set as part of setAccessToken' in 
C:\xampp\XAMPP\htdocs\db_temp\includes\vendor\google\apiclient\src\Google\Client.php:258 Stack trace: #0
C:\xampp\XAMPP\htdocs\db_temp\includes\functions.php(168): Google_Client->fetchAccessTokenWithRefreshToken(NULL) #1
C:\xampp\XAMPP\htdocs\db_temp\includes\functions.php(251): getClient() #2 C:\xampp\XAMPP\htdocs\db_temp\pages\index.php(5): updateSheet() #3 {main} thrown in 
C:\xampp\XAMPP\htdocs\db_temp\includes\vendor\google\apiclient\src\Google\Client.php on line 258

Instruction to fixing the error mention above:
1. go to the following directory: C:\Users\[you_user_folder]\.credentials
2. delete the following file: sheets.googleapis.com-php-quickstart.json
3. Rund your command prompt (CMD) and navigate to the following
   directory in the internship fold:

Junion internship files>test_env>spreadsheet

4.enter the following command:
php test1.php

5. Copy and paste the link found into the browser.

6. Click allow

7. Copy the code give on the html page and paste it into the command prompt.



