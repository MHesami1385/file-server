# File-server developed for Windows

## How to configure?

### Prerequisites

- [php-8.3.17-nts-Win32-vs16-x64](https://windows.php.net/downloads/releases/php-8.4.4-Win32-vs17-x86.zip)
- [mysql-9.2.0-winx64](https://dev.mysql.com/downloads/file/?id=537330)
- [phpMyAdmin-5.2.2-all-languages](https://files.phpmyadmin.net/phpMyAdmin/5.2.2/phpMyAdmin-5.2.2-all-languages.zip)

> Install them manually or use a package manager like [Chocolatey](https://chocolatey.org/):
>
> - `choco install php --version=8.3.17 -y`
> - `choco install mysql -y`
> - `choco install phpmyadmin -y`
>
> **NOTES**:
>
> 1. `extension=msqli` and `extension=pdo_mysql` must be enabled in `php.ini`
> 2. Edit the database configuration in `C:\file-server\code\config.php`

### Deployment

> 1. Place the `file-server` in the `C:\` directry
> 2. Run the `RUN_ME.ps1` to do the necessary commands
> 3. Import the `database.gz` via `phpMyAdmin`
> 4. Navigate to the `C:\file-server` in console and start php using the command:  
>    `php -S <YOUR_IP_ADDRESS>:PORT_NUMBER -t code\public`
> 5. The file-server is ready to use, you can log in to the administrator account with following credentials:  
>    `Username: Administrator`  
>    `Password: abc@123`
>
> **NOTE**: To reset the password of the `Administrator`, edit the `password` field and paste the following hash value:  
> `$2y$10$UdcYwds1pRXdjW9QIUrY4.rAV5THgAMuA4D.A4EyGTo4g7laFiY/y`

## Final Words

- This project is developed to bo hosted on a Windows machine and the clients must support `SMB Protocol` to access the folders.
- The folders can be accessed in Windows by typing this address in the `File Explorer` or `Run(Win +R)`:  
  `\\<SERVER_IP_ADDRESS>` (_The process for other OS's may vary_)
- The username must be 10 digit number and the password is the same as the username by default.
- Users can change their passwords by signing in to the web interface.
- To reset the password of a user, they should contact the Administrator.
