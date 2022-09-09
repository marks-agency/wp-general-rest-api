# wp-general-rest-api
Briefings-Generator API, foi desenvolvido usando o interface do WP REST API HANDBOOk;

# Modelo Conceitual

!["modelo_conceitual"](mark-docs/Conceitual_1.png)


# Documentação
Toda documentação foi gerada a partir do postman

# Project: wp-general-rest-api
# 📁 Collection: User 


## End-point: login
### Method: POST
>```
>{{baseURL}}/user/login
>```
### Body (**raw**)

```json
{
  "username": "claudio",
  "password": "BI)rrrrrrrrrrrr"
}
```

### 🔑 Authentication bearer

|Param|value|Type|
|---|---|---|
|token|{{token}}|string|


### Response: 200
```json
{
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0L3dvcmRwcmtytyyVzcyIsImlhdCI6MTY2MTAxOTMzNywiaWQiOiIxIiwiZXhwIjoxNjYxMDIzOTU3fQ.RzUHGriFA9DnwSNp2FVL1SWsj8a01RL-dzkKsRBFIOE",
    "id": "1",
    "user_email": "meusitepc@gmail.com",
    "user_nicename": "claudio",
    "user_display_name": "claudio"
}
```


⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: me
### Method: GET
>```
>{{baseURL}}/user/me
>```
### Response: 200
```json
{
    "id": 1,
    "email": "admin@claudionhangapc.com",
    "display_name": "admin",
    "first_name": "Claudio",
    "last_name": "nhanga",
    "user_login": "admin",
    "user_registered": "2021-06-25 15:26:38",
    "avatar_url": "https://secure.gravatar.com/avatar/9820e34afdef01c3389fb74500387f0d?s=96&d=mm&r=g",
    "user_roles": [
        "administrator",
        "author",
        "contributor",
        "customer",
        "editor",
        "melhor-envio-equipe-suporte",
        "shop_manager",
        "subscriber"
    ],
    "number_of_posts": 4
}
```


⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃
# 📁 Collection: Post 


## End-point: post
### Method: GET
>```
>{{baseURL}}/posts
>```
### Response: 200
```json
{
    "info": {
        "count": "3",
        "pages": 1
    },
    "results": [
        {
            "id": 109,
            "post_title": "questionario básico",
            "post_name": "questionario-basico",
            "post_date": "2022-08-19 01:20:43",
            "post_author_name": "claudio",
            "perma_link": "http://localhost/wordpress/markform/questionario-basico/",
            "number_of_chield": "0"
        },
        {
            "id": 108,
            "post_title": "Site advogado",
            "post_name": "site-advogado",
            "post_date": "2022-08-18 22:50:00",
            "post_author_name": "claudio",
            "perma_link": "http://localhost/wordpress/markform/site-advogado/",
            "number_of_chield": "0"
        },
        {
            "id": 57,
            "post_title": "Preço do transporte",
            "post_name": "preco-do-transporte",
            "post_date": "2022-07-20 11:12:27",
            "post_author_name": "claudio",
            "perma_link": "http://localhost/wordpress/markform/preco-do-transporte/",
            "number_of_chield": "2"
        }
    ]
}
```


⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: pagination
### Method: GET
>```
>{{baseURL}}/posts/page/1
>```

⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: single post
### Method: GET
>```
>{{baseURL}}/posts/109
>```

⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: search post
### Method: GET
>```
>{{baseURL}}/posts/search/loja
>```

⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃
# 📁 Collection: Entry 


## End-point: entries
### Method: GET
>```
>{{baseURL}}/entries
>```
### Response: 200
```json
[
    {
        "id": "2",
        "form_id": "57",
        "user_id": "1",
        "user_ip": "::1",
        "created_at": "2022-07-20 14:14:05",
        "user_data": {
            "user_name": "claudio",
            "user_email": "meusitepc@gmail.com"
        },
        "post": {
            "post_title": "Preço do transporte",
            "post_name": "preco-do-transporte",
            "post_type": "markform"
        }
    },
    {
        "id": "1",
        "form_id": "57",
        "user_id": "1",
        "user_ip": "::1",
        "created_at": "2022-07-20 14:14:05",
        "user_data": {
            "user_name": "claudio",
            "user_email": "meusitepc@gmail.com"
        },
        "post": {
            "post_title": "Preço do transporte",
            "post_name": "preco-do-transporte",
            "post_type": "markform"
        }
    }
]
```


⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: get enty by id
### Method: GET
>```
>{{baseURL}}/entries/625
>```
### Response: 200
```json
{
    "id": "625",
    "form_id": "18230",
    "user_id": "0",
    "user_ip": "189.114.99.16",
    "created_at": "2022-09-03 02:47:31",
    "user_data": [],
    "post": {
        "post_title": "Claudio Teste Azure",
        "post_name": "claudio-teste-azure",
        "post_type": "markform"
    }
}
```


⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: entry by form_id
### Method: GET
>```
>{{baseURL}}/posts/18230/entries/page/1
>```
### Response: 200
```json
{
    "info": {
        "count": "2",
        "pages": 1
    },
    "results": [
        {
            "id": "2",
            "form_id": "57",
            "user_id": "1",
            "user_ip": "::1",
            "created_at": "2022-07-20 14:14:05",
            "user_data": {
                "user_name": "claudio",
                "user_email": "meusitepc@gmail.com"
            },
            "post": {
                "post_title": "Preço do transporte",
                "post_name": "preco-do-transporte",
                "post_type": "markform"
            }
        },
        {
            "id": "1",
            "form_id": "57",
            "user_id": "1",
            "user_ip": "::1",
            "created_at": "2022-07-20 14:14:05",
            "user_data": {
                "user_name": "claudio",
                "user_email": "meusitepc@gmail.com"
            },
            "post": {
                "post_title": "Preço do transporte",
                "post_name": "preco-do-transporte",
                "post_type": "markform"
            }
        }
    ]
}
```


⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: find entry by user info
### Method: GET
>```
>{{baseURL}}/entries/user/search/claudio
>```
### Response: 200
```json
[
    {
        "id": "396",
        "form_id": "14676",
        "user_id": "398",
        "user_ip": "186.215.55.144",
        "created_at": "2022-03-18 00:09:14",
        "user_data": {
            "user_name": "claudio-teste",
            "user_email": "claudio@marks.agency",
            "avatar_url": "https://secure.gravatar.com/avatar/a754506a2519fd7d4c78f79fc87120ad?s=96&d=mm&r=g"
        },
        "post": {
            "post_title": "Carrinho Abandonado",
            "post_name": "carrinho-abandonado",
            "post_type": "markform"
        }
    },
    {
        "id": "395",
        "form_id": "14676",
        "user_id": "398",
        "user_ip": "186.215.55.144",
        "created_at": "2022-03-18 00:01:45",
        "user_data": {
            "user_name": "claudio-teste",
            "user_email": "claudio@marks.agency",
            "avatar_url": "https://secure.gravatar.com/avatar/a754506a2519fd7d4c78f79fc87120ad?s=96&d=mm&r=g"
        },
        "post": {
            "post_title": "Carrinho Abandonado",
            "post_name": "carrinho-abandonado",
            "post_type": "markform"
        }
    },
    {
        "id": "371",
        "form_id": "15218",
        "user_id": "398",
        "user_ip": "186.215.55.144",
        "created_at": "2022-03-15 23:41:44",
        "user_data": {
            "user_name": "claudio-teste",
            "user_email": "claudio@marks.agency",
            "avatar_url": "https://secure.gravatar.com/avatar/a754506a2519fd7d4c78f79fc87120ad?s=96&d=mm&r=g"
        },
        "post": {
            "post_title": "Agredecimento pela Inscrição",
            "post_name": "agredecimento-pela-inscricao",
            "post_type": "markform"
        }
    },
    {
        "id": "370",
        "form_id": "15218",
        "user_id": "398",
        "user_ip": "186.215.55.144",
        "created_at": "2022-03-15 23:39:54",
        "user_data": {
            "user_name": "claudio-teste",
            "user_email": "claudio@marks.agency",
            "avatar_url": "https://secure.gravatar.com/avatar/a754506a2519fd7d4c78f79fc87120ad?s=96&d=mm&r=g"
        },
        "post": {
            "post_title": "Agredecimento pela Inscrição",
            "post_name": "agredecimento-pela-inscricao",
            "post_type": "markform"
        }
    },
    {
        "id": "369",
        "form_id": "14676",
        "user_id": "398",
        "user_ip": "186.215.55.144",
        "created_at": "2022-03-15 23:39:05",
        "user_data": {
            "user_name": "claudio-teste",
            "user_email": "claudio@marks.agency",
            "avatar_url": "https://secure.gravatar.com/avatar/a754506a2519fd7d4c78f79fc87120ad?s=96&d=mm&r=g"
        },
        "post": {
            "post_title": "Carrinho Abandonado",
            "post_name": "carrinho-abandonado",
            "post_type": "markform"
        }
    },
    {
        "id": "364",
        "form_id": "15218",
        "user_id": "398",
        "user_ip": "186.215.55.144",
        "created_at": "2022-03-15 20:20:47",
        "user_data": {
            "user_name": "claudio-teste",
            "user_email": "claudio@marks.agency",
            "avatar_url": "https://secure.gravatar.com/avatar/a754506a2519fd7d4c78f79fc87120ad?s=96&d=mm&r=g"
        },
        "post": {
            "post_title": "Agredecimento pela Inscrição",
            "post_name": "agredecimento-pela-inscricao",
            "post_type": "markform"
        }
    },
    {
        "id": "363",
        "form_id": "15218",
        "user_id": "398",
        "user_ip": "186.215.55.144",
        "created_at": "2022-03-15 20:19:57",
        "user_data": {
            "user_name": "claudio-teste",
            "user_email": "claudio@marks.agency",
            "avatar_url": "https://secure.gravatar.com/avatar/a754506a2519fd7d4c78f79fc87120ad?s=96&d=mm&r=g"
        },
        "post": {
            "post_title": "Agredecimento pela Inscrição",
            "post_name": "agredecimento-pela-inscricao",
            "post_type": "markform"
        }
    },
    {
        "id": "362",
        "form_id": "15218",
        "user_id": "398",
        "user_ip": "186.215.55.144",
        "created_at": "2022-03-15 19:59:53",
        "user_data": {
            "user_name": "claudio-teste",
            "user_email": "claudio@marks.agency",
            "avatar_url": "https://secure.gravatar.com/avatar/a754506a2519fd7d4c78f79fc87120ad?s=96&d=mm&r=g"
        },
        "post": {
            "post_title": "Agredecimento pela Inscrição",
            "post_name": "agredecimento-pela-inscricao",
            "post_type": "markform"
        }
    },
    {
        "id": "361",
        "form_id": "15218",
        "user_id": "398",
        "user_ip": "186.215.55.144",
        "created_at": "2022-03-15 19:35:16",
        "user_data": {
            "user_name": "claudio-teste",
            "user_email": "claudio@marks.agency",
            "avatar_url": "https://secure.gravatar.com/avatar/a754506a2519fd7d4c78f79fc87120ad?s=96&d=mm&r=g"
        },
        "post": {
            "post_title": "Agredecimento pela Inscrição",
            "post_name": "agredecimento-pela-inscricao",
            "post_type": "markform"
        }
    },
    {
        "id": "360",
        "form_id": "15218",
        "user_id": "398",
        "user_ip": "186.215.55.144",
        "created_at": "2022-03-15 19:33:30",
        "user_data": {
            "user_name": "claudio-teste",
            "user_email": "claudio@marks.agency",
            "avatar_url": "https://secure.gravatar.com/avatar/a754506a2519fd7d4c78f79fc87120ad?s=96&d=mm&r=g"
        },
        "post": {
            "post_title": "Agredecimento pela Inscrição",
            "post_name": "agredecimento-pela-inscricao",
            "post_type": "markform"
        }
    }
]
```


⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃
# 📁 Collection: EntryMeta 


## End-point: Entry by form_id
### Method: GET
>```
>{{baseURL}}/entrymeta/mark_form_id/627
>```

⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: find answer
### Method: GET
>```
>{{baseURL}}/entrymeta/search/teste
>```
### Response: 200
```json
[
    {
        "id": "10",
        "mrk_oi_markform_entries_id": "8",
        "type": "questao_do_tipo_arquivo",
        "question": "introduzir o logo",
        "answer": "https://marktestingbucket.s3-sa-east-1.amazonaws.com/briefings/teste/arquivos/icone-branding.png, ",
        "audio": "",
        "comment": "",
        "formated_answer": [
            {
                "file_name": "icone-branding.png",
                "file_url": "https://oimark.blob.core.windows.net/briefings/teste/arquivos/icone-branding.png"
            }
        ]
    },
    {
        "id": "12",
        "mrk_oi_markform_entries_id": "9",
        "type": "questao_do_tipo_arquivo",
        "question": "introduzir o logo",
        "answer": "https://marktestingbucket.s3-sa-east-1.amazonaws.com/briefings/teste/arquivos/icone-branding.png, ",
        "audio": "",
        "comment": "",
        "formated_answer": [
            {
                "file_name": "icone-branding.png",
                "file_url": "https://oimark.blob.core.windows.net/briefings/teste/arquivos/icone-branding.png"
            }
        ]
    },
    {
        "id": "87",
        "mrk_oi_markform_entries_id": "19",
        "type": "questao_do_tipo_simples",
        "question": "Qual o nome da Loja?",
        "answer": "Teste",
        "audio": "",
        "comment": ""
    },
    {
        "id": "224",
        "mrk_oi_markform_entries_id": "35",
        "type": "questao_do_tipo_simples",
        "question": "Tem mais alguma informação/pedido que queira nos enviar?",
        "answer": "teste",
        "audio": "",
        "comment": ""
    },
    {
        "id": "333",
        "mrk_oi_markform_entries_id": "49",
        "type": "questao_do_tipo_simples",
        "question": "Qual o nome da Loja?",
        "answer": "teste",
        "audio": "",
        "comment": ""
    },
    {
        "id": "339",
        "mrk_oi_markform_entries_id": "49",
        "type": "questao_do_tipo_simples",
        "question": "Qual o link do Facebook da loja?",
        "answer": "teste",
        "audio": "",
        "comment": ""
    },
    {
        "id": "340",
        "mrk_oi_markform_entries_id": "49",
        "type": "questao_do_tipo_simples",
        "question": "Qual o Instagram da loja?",
        "answer": "teste",
        "audio": "",
        "comment": ""
    },
    {
        "id": "342",
        "mrk_oi_markform_entries_id": "50",
        "type": "questao_do_tipo_arquivo",
        "question": "Insira aqui o teu arquivo",
        "answer": "https://marktestingbucket.s3-sa-east-1.amazonaws.com/briefings/claudioTeste/arquivos/LogotipoColussiPizzas-scaled.jpg, ",
        "audio": "",
        "comment": "",
        "formated_answer": [
            {
                "file_name": "LogotipoColussiPizzas-scaled.jpg",
                "file_url": "https://oimark.blob.core.windows.net/briefings/claudioTeste/arquivos/LogotipoColussiPizzas-scaled.jpg"
            }
        ]
    },
    {
        "id": "349",
        "mrk_oi_markform_entries_id": "51",
        "type": "questao_do_tipo_simples",
        "question": "Qual o link do Facebook da loja?",
        "answer": "teste.com",
        "audio": "",
        "comment": ""
    },
    {
        "id": "350",
        "mrk_oi_markform_entries_id": "51",
        "type": "questao_do_tipo_simples",
        "question": "Qual o Instagram da loja?",
        "answer": "teste.com",
        "audio": "",
        "comment": ""
    },
    {
        "id": "371",
        "mrk_oi_markform_entries_id": "54",
        "type": "questao_do_tipo_simples",
        "question": "Qual o endereço da loja?",
        "answer": "teste",
        "audio": "",
        "comment": ""
    },
    {
        "id": "425",
        "mrk_oi_markform_entries_id": "61",
        "type": "questao_do_tipo_simples",
        "question": "Qual é o teu nome",
        "answer": "teste",
        "audio": "",
        "comment": ""
    },
    {
        "id": "578",
        "mrk_oi_markform_entries_id": "83",
        "type": "questao_do_tipo_simples",
        "question": "Possui alguma preferência de cores? E existe alguma cor que você não quer ver no seu logo?",
        "answer": "teste",
        "audio": "",
        "comment": ""
    },
    {
        "id": "605",
        "mrk_oi_markform_entries_id": "86",
        "type": "questao_do_tipo_simples",
        "question": "Qual é o Domínio?",
        "answer": "testet",
        "audio": "",
        "comment": ""
    },
    {
        "id": "673",
        "mrk_oi_markform_entries_id": "93",
        "type": "questao_do_tipo_simples",
        "question": "Qual o Nome da Empresa?",
        "answer": "teste",
        "audio": "",
        "comment": ""
    },
    {
        "id": "691",
        "mrk_oi_markform_entries_id": "94",
        "type": "questao_do_tipo_simples",
        "question": "Qual o Nome da Empresa?",
        "answer": "teste 01010",
        "audio": "",
        "comment": ""
    },
    {
        "id": "861",
        "mrk_oi_markform_entries_id": "100",
        "type": "questao_do_tipo_simples",
        "question": "Qual é número do teu endereço ?",
        "answer": "testet ",
        "audio": "",
        "comment": ""
    },
    {
        "id": "869",
        "mrk_oi_markform_entries_id": "100",
        "type": "questao_do_tipo_simples",
        "question": "Como você acha que as pessoas te vêem?",
        "answer": "teste ",
        "audio": "",
        "comment": ""
    },
    {
        "id": "943",
        "mrk_oi_markform_entries_id": "108",
        "type": "questao_do_tipo_simples",
        "question": "Qual o nome da Loja?",
        "answer": "Teste do Márcio",
        "audio": "",
        "comment": ""
    },
    {
        "id": "1174",
        "mrk_oi_markform_entries_id": "135",
        "type": "questao_do_tipo_simples",
        "question": "Qual o nome da Loja?",
        "answer": "teste",
        "audio": "",
        "comment": ""
    }
]
```


⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃
# 📁 Collection: User Expo Token 


## End-point: create
### Method: POST
>```
>{{baseURL}}/user/expo_token
>```
### Body (**raw**)

```json
{
    "expo_token":"ExponentPushToken[k2DLS2DgStFqCM9ttyCj7j]"
}
```

### Response: 200
```json
1
```


⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: delete
### Method: DELETE
>```
>{{baseURL}}/user/expo_token
>```
### Body (**raw**)

```json
{
    "expo_token":"ExponentPushToken[Rn1y4MFCv8uZ1tMqbcxuKl]"
}
```

### Response: 200
```json
1
```


⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: Expotoken by NotificationTypeID
### Method: GET
>```
>{{baseURL}}/user/expo_token/notification_type_id/1
>```
### Response: 200
```json
[
    {
        "expo_token": "ExponentPushToken[Rn1y4MFCv8uZ1tMqbcxuKn]"
    }
]
```


⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃
# 📁 Collection: Notification 


## End-point: notification
### Method: GET
>```
>{{baseURL}}/notification/page/1
>```
### Response: 200
```json
[
    {
        "id": "2",
        "meta_value": "",
        "created_at": "2022-08-24 02:07:22",
        "user_id": "2",
        "notification_type_id": "2",
        "type": "woocommerce_order",
        "text_message": "comprou"
    },
    {
        "id": "1",
        "meta_value": "",
        "created_at": "2022-08-24 02:07:22",
        "user_id": "1",
        "notification_type_id": "1",
        "type": "breafing_filled",
        "text_message": "preencheu o briefing"
    }
]
```


⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: create
### Method: POST
>```
>{{baseURL}}/notification
>```
### Body (**raw**)

```json
{
    "user_id": "1",
    "notification_type_id": "1",
    "meta_value": {"nome":"pedro", "idade":23}
}
```


⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: get order
### Method: GET
>```
>{{baseURL}}/notification/order/21712
>```
### Response: 200
```json
{
    "order_id": "21712",
    "billing_email": "tayla_stephanie2930@hotmail.com",
    "customer_name": "Tayla Stephanie de Oliveira",
    "billing_address": "Avenida Clavásio Alves da Silva, São Paulo - SP",
    "billing_phone": "(11) 95449-3153",
    "order_status": "completed",
    "payment_title": "",
    "date_created": {
        "date": "2022-09-06 20:46:03.000000",
        "timezone_type": 3,
        "timezone": "America/Sao_Paulo"
    }
}
```


⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: get site
### Method: GET
>```
>{{baseURL}}/notification/site/333
>```
### Response: 200
```json
{
    "registered": "2022-01-06 15:21:55",
    "last_updated": "2022-09-06 01:45:08",
    "siteurl": "https://welove-modafeminina.oimark.com.br",
    "blog_status": "Ativado"
}
```


⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃
# 📁 Collection: Notification Type 


## End-point: all
### Method: GET
>```
>{{baseURL}}/notification/type
>```
### Response: 200
```json
[
    {
        "id": "1",
        "type": "briefing_filled",
        "title": "Briefing preenchido",
        "text_message": "preencheu o briefing"
    },
    {
        "id": "2",
        "type": "woocommerce_order",
        "title": "Novo pedido",
        "text_message": "comprou"
    },
    {
        "id": "3",
        "type": "payment_received",
        "title": "Pagamento recebido",
        "text_message": "O Pagamento do pedido foi"
    },
    {
        "id": "4",
        "type": "deactivate_site",
        "title": "Desativação de site",
        "text_message": "o site da foi desativado"
    },
    {
        "id": "5",
        "type": "deactivate_site_alert",
        "title": "Alerta de desativação de site",
        "text_message": "o site vai ser desativado"
    }
]
```


⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: single
### Method: GET
>```
>{{baseURL}}/notification/type/1
>```
### Response: 200
```json
{
    "id": "1",
    "type": "breafing_filled",
    "title": "Briefing preenchido",
    "text_message": "preencheu o briefing"
}
```


⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃
# 📁 Collection: Notification Subscribe 


## End-point: subscribe user
### Method: POST
>```
>{{baseURL}}/notification/subscription
>```
### Body (**raw**)

```json
{
    "expo_token":"ExponentPushToken[k2DLS2DgStFqCM9ttyCj7j]"
}
```

### Response: 200
```json
false
```


⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: subscription
### Method: GET
>```
>{{baseURL}}/notification/subscription
>```
### Body (**raw**)

```json
{
    "expo_token":"ExponentPushToken[k2DLS2DgStFqCM9ttyCj7j]"
}
```

### Response: 200
```json
[
    {
        "id": "1",
        "user_token_id": "5",
        "notification_type_id": "1",
        "enabled": "1"
    },
    {
        "id": "2",
        "user_token_id": "5",
        "notification_type_id": "2",
        "enabled": "1"
    },
    {
        "id": "3",
        "user_token_id": "5",
        "notification_type_id": "3",
        "enabled": "1"
    }
]
```


⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: delete
### Method: DELETE
>```
>{{baseURL}}/notification/subscription
>```
### Body (**raw**)

```json
{
    "expo_token":"ExponentPushToken[ZjJS9LE64d6yj3uNwG4sXO]"
}
```

### Response: 200
```json
[]
```


⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: update
### Method: PUT
>```
>{{baseURL}}/notification/subscription/1/enabled
>```
### Body (**raw**)

```json
{
    "enabled": 0
}
```


⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: ping
### Method: GET
>```
>{{baseURL}}/ping
>```
### Response: 200
```json
{
    "ping": "pong"
}
```


⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃
_________________________________________________
Powered By: [postman-to-markdown](https://github.com/bautistaj/postman-to-markdown/)
