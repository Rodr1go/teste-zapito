## Descrição do projeto

Integração com a API da plataforma Zapito p/ envio de mensagens via WhatsApp. 

Entre no diretório do projeto via terminal: 
``cd teste-zapito``

Crie uma cópia e edite as configurações no arquivo .env:
(insira as credenciais do BD e da API Zapito)
``cp .env.example .env``

Baixe as dependências do projeito:
 ``composer install``

Para executar os comandos artisan:
``php artisan key:generate``
``php artisan backpack:install``
``php artisan migrate``

Libere permissão de acesso ao diretório caso necessário:
``chmod -R 777 storage/``

Execute a aplicação:
``php artisan serve``

Após executar a aplicação, abra o arquivo crontab:
``crontab -e``
e insira a linha abaixo, salve e feche o editor:
``* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1``

Obs: modifique "/path-to-your-project" pelo caminho 
completo de onde está o projeto.   

