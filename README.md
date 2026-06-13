# ♻️ Almenara Sustentável

Aplicação web feita em **Laravel 12** para gestão de **coleta seletiva e reciclagem** da cidade de Almenara. Permite consultar os pontos de coleta por bairro, registrar depósitos de recicláveis e gerenciar o perfil do usuário.

## ✨ Funcionalidades

- Página inicial, **Pontos de Coleta**, Educação Ambiental e Contato
- Login / cadastro de usuários (Laravel Breeze)
- Painel de perfil com registro de **depósitos** de recicláveis
- Banco populado automaticamente com **15 pontos de coleta** (bairros de Almenara)

## ✅ Requisitos

Antes de começar, tenha instalado:

- **PHP >= 8.2** com as extensões: `openssl`, `pdo`, `pdo_sqlite` (ou `pdo_mysql`), `mbstring`, `tokenizer`, `xml`, `ctype`, `curl`, `fileinfo`, `zip`, `intl`, `gd`
- **Composer 2.x**
- **Node.js >= 18** e **npm**
- *(Opcional)* **MySQL 8+** — por padrão o projeto roda em **SQLite**, sem precisar instalar nenhum banco

---

## 🚀 Instalação rápida (SQLite — recomendado)

Caminho mais simples: **não precisa instalar nem configurar banco de dados**.

```bash
# 1. Clonar o repositório
git clone https://github.com/lunaramalho/AlmenaraSustentavel.git
cd AlmenaraSustentavel

# 2. Instalar as dependências do PHP
composer install

# 3. Criar o arquivo de ambiente (.env)
copy .env.example .env        # Windows (PowerShell/CMD)
# cp .env.example .env        # Linux / macOS

# 4. Gerar a chave da aplicação
php artisan key:generate

# 5. Criar o arquivo do banco SQLite (vazio)
New-Item -ItemType File database\database.sqlite   # Windows (PowerShell)
# touch database/database.sqlite                    # Linux / macOS

# 6. Criar as tabelas
php artisan migrate

# 7. Popular o banco (usuário de teste + 15 pontos de coleta)
php artisan db:seed

# 8. Instalar e compilar o front-end
npm install
npm run build

# 9. Subir o servidor
php artisan serve
```

Pronto! Acesse **http://127.0.0.1:8000** 🎉

> 💡 Atalho: os passos 6 e 7 podem ser feitos de uma vez com `php artisan migrate --seed`.

---

## 🐬 Alternativa: usar MySQL

Se preferir MySQL no lugar do SQLite:

1. Crie um banco vazio:
   ```sql
   CREATE DATABASE almenara CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   ```
2. No arquivo **`.env`**, ajuste a seção do banco (substitua o bloco `DB_*`):
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=almenara
   DB_USERNAME=root
   DB_PASSWORD=sua_senha
   ```
3. **Pule o passo 5** (não precisa do `database.sqlite`) e siga os passos **6 a 9** acima (`migrate`, `db:seed`, `npm`, `serve`).

---

## 🔑 Acesso de teste

Após o `db:seed`, faça login com:

| Campo   | Valor                   |
|---------|-------------------------|
| E-mail  | `lunashow@hotmail.com`  |
| Senha   | `1234`                  |

Ou crie sua própria conta pela tela de **Cadastro**.

## 🌱 O que o `php artisan db:seed` popula

- **1 usuário de teste** (acima)
- **15 pontos de coleta** — bairros de Almenara com dia da semana e horário, exibidos na página *Pontos de Coleta*

## 🛠️ Comandos úteis

| Comando | O que faz |
|---------|-----------|
| `php artisan serve` | Inicia o servidor de desenvolvimento (porta 8000) |
| `php artisan migrate:fresh --seed` | Apaga e recria todo o banco, populando de novo |
| `npm run dev` | Compila os assets em modo de desenvolvimento (hot reload) |

## 🧰 Tecnologias

Laravel 12 · PHP 8.2+ · Laravel Breeze · Bootstrap 5 · Vite · SQLite/MySQL

---

Desenvolvido com [Laravel](https://laravel.com).
