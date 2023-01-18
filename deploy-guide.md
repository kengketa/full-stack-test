1. clone https://github.com/kengketa/full-stack-test.git
2. RUN docker compose up -d --build
3. RUN docker exec -it web /bin/bash
4. COPY .env.example .env
5. RUN php artisan key:generate
6. RUN composer install
7. RUN npm install
8. RUN npm run build
9. RUN php artisan migrate:fresh --seed