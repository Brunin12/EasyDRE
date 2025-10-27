# Sistema EasyDRE

Projeto de **gestão financeira / DRE** feito em **CodeIgniter 3** + **MySQL**.

---

## O que faz

* Controla empresas, saldos, receitas, despesas e investimentos.
* Calcula **lucro líquido**, **margem de lucro** e **ROI**.
* Gera DRE e relatórios básicos.
* Interface administrativa via views do CodeIgniter 3.

---

## Tecnologias

* Backend: **PHP (CodeIgniter 3)**
* Banco: **MySQL**
* Frontend: HTML / CSS / JS (views do CI3)

---

## Instalação rápida (direto ao ponto)

1. Clone:

```bash
git clone https://github.com/brunin12/easydre.git
```

2. Coloque o projeto no `www`/`htdocs` do seu servidor (XAMPP, WAMP, Laragon).

3. **Ajuste o `base_url`** no CodeIgniter 3:

* Abra `application/config/config.php`
* Altere:

```php
$config['base_url'] = 'http:/localhost/';
```

Use a URL que você usa na sua máquina (ex.: `http://localhost/SEU_PROJETO/`).

4. Configure a conexão com o banco em `application/config/database.php`:

```php
$db['default'] = array(
  'dsn'   => '',
  'hostname' => 'localhost',
  'username' => 'SEU_USUARIO',
  'password' => 'SUA_SENHA',
  'database' => 'easydre',
  'dbdriver' => 'mysqli',
  // demais configurações
);
```

5. **Banco de dados**
   O arquivo `.sql` **não está incluído** neste repositório — é privado. Para obter o dump (estrutura + dados de teste) e instruções de importação, **entre em contato com o desenvolvedor**.

Importação (quem receber o `.sql`):

```bash
mysql -u USUARIO -p NOME_DO_BANCO < banco.sql
```

ou use MySQL Workbench / phpMyAdmin.

---

## Segurança e demo

* Se for avaliar o sistema, peça uma **demo hospedada** em vez do código-fonte.
* Não coloque credenciais reais em `database.php` antes de commitar. Use `.gitignore` para arquivos sensíveis.

---

## Observações rápidas

* Mantive o código enxuto e direto para facilitar entendimento.
* Se quiser, eu converto pra migrations ou preparo um dump sanitizado (somente estrutura + dados de teste).

---

## Contato (para obter o banco / negociar licença / demo)

**Bruno Parreira**

* Telefone/WhatsApp: **+55 75 99239-3146**
* Email: **[brunoparreira77@gmail.com](mailto:brunoparreira77@gmail.com)**
* GitHub: **brunin12**


## Licença

Este projeto está licenciado sob a Licença MIT - veja o arquivo [LICENSE](LICENSE) para detalhes.
