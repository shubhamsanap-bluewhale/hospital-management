@echo off
title Smart Hospital - local server (c)
cd /d "%~dp0"

set "PHP=C:\php74\php.exe"
set "MYSQLD=C:\Program Files\MySQL\MySQL Server 8.4\bin\mysqld.exe"
set "DBINI=C:\smart-hospital-db\my.ini"

if not exist "%PHP%" (
    echo ERROR: PHP 7.4 not found at %PHP%
    pause
    exit /b 1
)
if not exist "%MYSQLD%" (
    echo ERROR: MySQL server not found at %MYSQLD%
    pause
    exit /b 1
)

rem ---- 1. Start the app's private MySQL database (port 3307) if it is not already running
call :portopen 127.0.0.1 3307 && goto dbready
echo Starting Smart Hospital database on port 3307 ...
start "Smart Hospital DATABASE - keep open" /min "%MYSQLD%" --defaults-file="%DBINI%"
for /L %%i in (1,1,40) do (
    call :portopen 127.0.0.1 3307 && goto dbready
    ping -n 2 127.0.0.1 >nul
)
echo ERROR: The database did not start. Check C:\smart-hospital-db\mysqld.err
pause
exit /b 1

:dbready
echo Database is running on port 3307.

rem ---- 2. If the web server is already running, just open the login page
call :portopen localhost 8000
if not errorlevel 1 (
    echo.
    echo Smart Hospital is already running. Opening http://localhost:8000/site/login ...
    start "" "http://localhost:8000/site/login"
    ping -n 4 127.0.0.1 >nul
    exit /b 0
)

echo.
echo ============================================================
echo  Smart Hospital is running at:  http://localhost:8000/
echo.
echo  Admin / staff login :  http://localhost:8000/site/login
echo  Patient login       :  http://localhost:8000/site/userlogin
echo.
echo  Keep this window OPEN while using the app.
echo  To stop: close this window AND the minimized
echo  "Smart Hospital DATABASE" window.
echo ============================================================
echo.

rem ---- 3. Open the login page after the web server has had a moment to start
start "" /b powershell -NoProfile -WindowStyle Hidden -Command "Start-Sleep -Seconds 2; Start-Process 'http://localhost:8000/site/login'"

rem ---- 4. Start the web server (blocks until this window is closed / Ctrl+C)
"%PHP%" -S localhost:8000
goto :eof

rem ---- helper: exit code 0 if a TCP connection to host %1 port %2 succeeds (tries IPv4, then IPv6)
:portopen
powershell -NoProfile -Command "$ok=$false; foreach ($af in 'InterNetwork','InterNetworkV6') { try { $c = New-Object Net.Sockets.TcpClient([Net.Sockets.AddressFamily]::$af); $c.Connect('%~1', %~2); $c.Close(); $ok=$true; break } catch {} }; if ($ok) { exit 0 } else { exit 1 }" >nul 2>&1
exit /b %errorlevel%
