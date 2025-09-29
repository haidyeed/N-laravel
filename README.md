
## commands to run the App

## Clone the App
git clone https://github.com/haidyeed/N-laravel.git

## open the App folder
cd N-laravel

## docker
docker-compose up 

## note: (no need for running any laravel comand, all are automated)

## run on ..
http://0.0.0.0:8000


## Docker services
backend:	Laravel app with Apache & PHP 8.2	on port:8000
frontend:	Placeholder for frontend assets	          N/A
mysql:	     MySQL 5.7 database	                on port:3306
adminer:	DB management UI                	on port:8081


## Laravel Entrypoint Script
<!-- The backend container uses an entrypoint.sh script to: -->

- Run composer install if vendor/ is missing
- Copy .env and generate APP_KEY
- Run php artisan migrate   to migrate the database
- RUN php artisan db:seed   to seed the database
- Start Apache

📁 Project Structure
Code
N-laravel/
├── backend/           # Laravel app
│   ├── Dockerfile
│   ├── entrypoint.sh
│   ├── .env.example
│   └── database
│   └── app
│     └── Http
│       └── Controllers    #for CRUD methods
│       └── Requests       #for validation
│     └── Models 
│     └── Services         #for the search method logic
├── docker-compose.yml
└── README.md

# useful commands in case of any   
# Run migrations
docker exec -it backend php artisan migrate

# Seed database
docker exec -it backend php artisan db:seed

# Clear caches
docker exec -it backend php artisan config:cache


## Api Doc

## List All Apartments
METHOD: GET
URL: http://0.0.0.0:8000/api/apartments
BODY:
RESPONSE: {
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "unit_name": "et dolorum",
            "unit_number": "PY-475",
            "project": "DuBuque Ltd",
            "description": "Ducimus vel delectus doloribus numquam. A minima eveniet architecto maiores. Itaque accusantium itaque itaque.",
            "price": "1231057.46",
            "bedrooms": 2,
            "bathrooms": 3,
            "area": "188.14",
            "floor": 19,
            "is_available": 1,
            "image": "https://m.media-amazon.com/images/I/71cVOgvystL._AC_UL640_QL65_.jpg",
            "created_at": "2025-09-27T23:39:25.000000Z",
            "updated_at": "2025-09-27T23:39:25.000000Z"
        },
        {
            "id": 2,
            "unit_name": "sed labore",
            "unit_number": "XH-982",
            "project": "Schmidt, Herman and Schmidt",
            "description": "Veritatis voluptatem porro architecto reprehenderit sunt ea. Qui sint omnis est vitae. Facere est magni est et et.",
            "price": "1349203.30",
            "bedrooms": 3,
            "bathrooms": 2,
            "area": "155.39",
            "floor": 9,
            "is_available": 1,
            "image": "https://m.media-amazon.com/images/I/71cVOgvystL._AC_UL640_QL65_.jpg",
            "created_at": "2025-09-27T23:39:25.000000Z",
            "updated_at": "2025-09-27T23:39:25.000000Z"
        },
       ...........
    ],
    "first_page_url": "http://0.0.0.0:8000/api/apartments?page=1",
    "from": 1,
    "last_page": 3,
    "last_page_url": "http://0.0.0.0:8000/api/apartments?page=3",
    "links": [
        {
            "url": null,
            "label": "&laquo; Previous",
            "page": null,
            "active": false
        },
        {
            "url": "http://0.0.0.0:8000/api/apartments?page=1",
            "label": "1",
            "page": 1,
            "active": true
        },
        {
            "url": "http://0.0.0.0:8000/api/apartments?page=2",
            "label": "2",
            "page": 2,
            "active": false
        },
        {
            "url": "http://0.0.0.0:8000/api/apartments?page=2",
            "label": "Next &raquo;",
            "page": 2,
            "active": false
        }
    ],
    "next_page_url": "http://0.0.0.0:8000/api/apartments?page=2",
    "path": "http://0.0.0.0:8000/api/apartments",
    "per_page": 20,
    "prev_page_url": null,
    "to": 20,
    "total": 50
}

## get a certain Apartment
METHOD: GET
URL: http://0.0.0.0:8000/api/apartments/5    
BODY:
RESPONSE: {
    "id": 5,
    "unit_name": "quis consequatur",
    "unit_number": "TT-555",
    "project": "Lemke, Ankunding and Corkery",
    "description": "Rerum voluptatem debitis sunt est et doloribus id. Qui est voluptatem sequi possimus iusto quia qui. Animi dolor blanditiis voluptas amet.",
    "price": "1385955.25",
    "bedrooms": 2,
    "bathrooms": 3,
    "area": "73.27",
    "floor": 6,
    "is_available": 0,
    "image": "https://m.media-amazon.com/images/I/71cVOgvystL._AC_UL640_QL65_.jpg",
    "created_at": "2025-09-27T23:39:25.000000Z",
    "updated_at": "2025-09-27T23:39:25.000000Z"
}

## create a new Apartment
METHOD: POST
URL: http://0.0.0.0:8000/api/apartments     
BODY: // (raw,json data)
{      
  "unit_name": "Skyview 302",
  "unit_number": "302A",
  "project": "Skyview Towers",
  "description": "Spacious apartment with city view",
  "price": 1200000,
  "bedrooms": 3,
  "bathrooms": 2,
  "area": 150.5,
  "floor": 3,
  "is_available": true,
  "order": 1
}
RESPONSE: {
    "unit_name": "Skyview 302",
    "unit_number": "302A",
    "project": "Skyview Towers",
    "description": "Spacious apartment with city view",
    "price": 1200000,
    "bedrooms": 3,
    "bathrooms": 2,
    "area": 150.5,
    "floor": 3,
    "order": 1,
    "is_available": 1,
    "updated_at": "2025-09-28T01:00:50.000000Z",
    "created_at": "2025-09-28T01:00:50.000000Z",
    "id": 52
}

## update a certain Apartment
METHOD: PUT
URL: http://0.0.0.0:8000/api/apartments/6
BODY: // (raw,json data)
{
    "unit_name":"my apartment"
}
RESPONSE: {
    "id": 6,
    "unit_name": "my apartment",
    "unit_number": "MF-536",
    "project": "Greenholt and Sons",
    "description": "Similique aliquam quisquam tempore velit. Nemo distinctio voluptates velit id dolor odit vitae dolore. Deleniti placeat maxime voluptatem sed ea expedita. Sunt officiis et soluta quia.",
    "price": "1234696.12",
    "bedrooms": 4,
    "bathrooms": 1,
    "area": "90.07",
    "floor": 7,
    "is_available": 0,
    "order": 53,
    "created_at": "2025-09-28T00:59:12.000000Z",
    "updated_at": "2025-09-28T01:09:10.000000Z"
}

## delete a certain Apartment
METHOD: DELETE
URL: http://0.0.0.0:8000/api/apartments/6
BODY: 
RESPONSE: {
    "message": "Apartment deleted"
}

## search apartments
METHOD: GET
URL: http://localhost:8000/api/apartments/search/my apartment
BODY: 
RESPONSE: {
    "message": "Apartments found",
    "data": {
        "current_page": 1,
        "data": [
            {
                "id": 6,
                "unit_name": "my apartment",
                "unit_number": "MF-536",
                "project": "Greenholt and Sons",
                "description": "Similique aliquam quisquam tempore velit. Nemo distinctio voluptates velit id dolor odit vitae dolore. Deleniti placeat maxime voluptatem sed ea expedita. Sunt officiis et soluta quia.",
                "price": "1234696.12",
                "bedrooms": 4,
                "bathrooms": 1,
                "area": "90.07",
                "floor": 7,
                "is_available": 0,
                "order": 53,
                "created_at": "2025-09-28T00:59:12.000000Z",
                "updated_at": "2025-09-28T01:09:10.000000Z"
            }
        ],
        "first_page_url": "http://localhost:8000/api/apartments/search/my%20apartment?page=1",
        "from": 1,
        "last_page": 1,
        "last_page_url": "http://localhost:8000/api/apartments/search/my%20apartment?page=1",
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "page": null,
                "active": false
            },
            {
                "url": "http://localhost:8000/api/apartments/search/my%20apartment?page=1",
                "label": "1",
                "page": 1,
                "active": true
            },
            {
                "url": null,
                "label": "Next &raquo;",
                "page": null,
                "active": false
            }
        ],
        "next_page_url": null,
        "path": "http://localhost:8000/api/apartments/search/my%20apartment",
        "per_page": 20,
        "prev_page_url": null,
        "to": 1,
        "total": 1
    }
}