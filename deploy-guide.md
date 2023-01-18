1. clone https://github.com/kengketa/full-stack-test.git
2. RUN docker compose up -d --build
3. RUN docker exec -it web /bin/bash
4. COPY cp .env.example .env
5. RUN composer install
6. RUN npm install
7. RUN npm run build
8. RUN php artisan key:generate
9. RUN php artisan migrate:fresh --seed
10. Vist on http://localhost:8000
11. visit phpmyadmin http://localhost:8888
    1. server: mariadb
    2. username: root
    3. password: password