## Descrição do projeto

Integração com a API da plataforma Zapito p/ envio de mensagens via WhatsApp. 

## Para rodar o projeto (Instale o Docker e Docker-compose)

Entre no diretório do projeto via terminal: 

``cd teste-zapito``

Crie uma cópia e edite as configurações no arquivo .env:
(insira as credenciais do BD e da API Zapito)

``cp .env.example .env``

Execute: ``make up`` ou ``docker-compose up``

Entre no terminal do container da aplicação:

``docker exec -it teste-zapito bash``

Após estar dentro do bash do container:

``composer install``

``php artisan key:generate``

``php artisan backpack:install``

``php artisan migrate``

Libere permissão de acesso ao diretório caso necessário:

``chmod -R 777 storage/``

Abra o arquivo crontab p/ adicionar o comando:
``nano /etc/crontab``
e insira a linha abaixo, salve e feche o editor:

``* * * * * root cd /application && php artisan schedule:run >> /dev/null 2>&1``

Teste a aplicação no navegador cadastrando um usuário admin p/ acessar e
um(s) inscrito(s) p/ receber as mensagens.
