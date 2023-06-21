# ℹ️ Imapi
Inventory Management API

# 🏃 Primeira instalação

<b>Clonar o código</b>

``git clone https://github.com/MarcosGalvao553/imapi``

<b>Entrar na pasta do projeto</b>

``cd imapi``

<b>Build da imagem da aplicação</b>

``docker build -t app_imapi . -f app.dockerfile``

<b>Build da imagem do webserver</b>

``docker build -t web_imapi . -f web.dockerfile``

<b>Subir os serviços </b>

``docker-compose up -d``

<b>Entrar no Container </b>

``docker exec -it app_imapi_1 bash``

<b>Instalar as Dependências </b>

``composer install``

<b>Liberar acessos para todos os arquivos</b>

``chmod -R 777 .``

