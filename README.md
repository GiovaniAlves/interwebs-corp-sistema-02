## <p align="center"> <i>Interwebs Corp - Sistema 02</i> </p>

### Passo a passo
#### Clone o Repositório
```
git clone https://github.com/GiovaniAlves/interwebs-corp-sistema-02.git
```
```
cd interwebs-corp-sistema-02/
```

#### Crie o Arquivo .env
```
cp .env.example .env
```

#### Atualize as variáveis de ambiente no arquivo .env
```
APP_NAME=nome_da_aplicacao
APP_URL=http://localhost:8180

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=nome_que_desejar_db
DB_USERNAME=root
DB_PASSWORD=root

```

#### Instalar as dependências do projeto
```
composer install
```

#### Gerar a key do projeto Laravel
```
php artisan key:generate
```

#### Executar as migrações
```
php artisan migrate
```

#### Subir o servidor
```
php artisan serve
```

#### Iniciar o trabalhador da fila
```
php artisan queue:work
```


#### Acesse o projeto em http://localhost:8180
