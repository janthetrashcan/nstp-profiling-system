@echo off
setlocal EnableDelayedExpansion

:: Store the current directory
set "PROJECT_DIR=%CD%"

:: Kill any existing PHP and NPM processes
taskkill /F /IM "php.exe" /FI "WINDOWTITLE eq php artisan serve" 2>nul
taskkill /F /IM "node.exe" /FI "WINDOWTITLE eq npm run dev" 2>nul

:: Start PHP server in a new window
start "php artisan serve" cmd /c "php artisan serve"

:: Wait for PHP server to start
timeout /t 2 /nobreak > nul

:: Start Vite development server in a new window
start "npm run dev" cmd /c "npm run dev"

:: Wait for Vite server to start
timeout /t 5 /nobreak > nul

:: Open the default browser
start http://localhost:8000

:: Monitor for browser window
:CHECKBROWSER
:: Check if browser is still running (this example checks for common browsers)
tasklist /FI "IMAGENAME eq chrome.exe" 2>nul | find /I /N "chrome.exe">nul
if "%ERRORLEVEL%"=="0" goto CHECKBROWSER

tasklist /FI "IMAGENAME eq firefox.exe" 2>nul | find /I /N "firefox.exe">nul
if "%ERRORLEVEL%"=="0" goto CHECKBROWSER

tasklist /FI "IMAGENAME eq msedge.exe" 2>nul | find /I /N "msedge.exe">nul
if "%ERRORLEVEL%"=="0" goto CHECKBROWSER

:: If browser is closed, kill the servers
taskkill /F /IM "php.exe" /FI "WINDOWTITLE eq php artisan serve" 2>nul
taskkill /F /IM "node.exe" /FI "WINDOWTITLE eq npm run dev" 2>nul

:: Return to original directory
cd "%PROJECT_DIR%"

echo Development servers have been stopped.
timeout /t 3
exit
