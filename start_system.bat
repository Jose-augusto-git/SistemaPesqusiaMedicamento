@echo off
set "PHP_PATH=php"

where %PHP_PATH% >nul 2>nul
if %errorlevel% neq 0 (
    echo [AVISO] PHP não encontrado no seu sistema (PATH).
    echo Por favor, instale o PHP ou edite este arquivo indicando o caminho do seu php.exe.
    echo.
    echo Exemplo: set "PHP_PATH=C:\caminho\para\seu\php.exe"
    echo.
    pause
    exit /b
)


echo Usando PHP: "%PHP_PATH%"
echo.

echo Inicializando Banco de Dados SQLite...
"%PHP_PATH%" SistemaMedicamento\initialize_db.php

echo Iniciando servidor em http://localhost:8000 ...
echo Mantenha esta janela aberta enquanto estiver usando o sistema.
cd SistemaMedicamento
"%PHP_PATH%" -S localhost:8000
pause

