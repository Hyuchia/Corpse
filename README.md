# Aegis Framework: Ikaros

Aegis is a simple and easy to use framework for web development. With a minimalistic aproach Aegis saves you from dependency hell and provides you with an awesome environment which will let you focus on what's important: Your Project.

Ikaros is the PHP flavor of Aegis.

## Requirements:
* Web server (Apache or Nginx)
* PHP 5.5 or higher

## Getting Started
### 1. Get the latest Release
You can find the latest release in the [releases page](https://github.com/AegisFramework/Ikaros/releases)

### 2. Setup your Project
Extract the contents and rename your project's directory

#### 2.1 Configure the Router
Set the Router Domain
The index.php file has the following domain by default:
 ```
Router::$domain = "localhost/Ikaros";
```
```
Router::$domain = "localhost/YourDirectory";
```
#### 2.2 Configure the .htaccess file
3. Set the Base Route in the .htaccess by changing the following line in it:
```
RewriteBase /Ikaros
```
```
RewriteBase /YourDirectory
```
4. Start Coding!

