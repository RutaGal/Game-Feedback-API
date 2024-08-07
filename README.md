**Game Feedback API - Setup Instructions
Introduction**

**Setup Instructions**
1. Clone the Repository

To create feedback entries, use Postman with the following setup:
```
git clone https://github.com/RutaGal/Game-Feedback-API.git
cd Game-Feedback-API/GameFeedbackAPIAndDashboard
```
3. Create the .env File

Copy the .env.example file to .env:
```
cp .env.example .env
```
3. Install Composer Dependencies

```
cp .env.example .env  docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```
5. Start Laravel Sail
```
./vendor/bin/sail up -d
```
6. Generate Application Key
```
./vendor/bin/sail artisan key:generate
```
7. Run Migrations and Seed Database
```
./vendor/bin/sail artisan migrate --seed
```

To create feedback entries, use Postman with the following setup:
```
URL: http://localhost:3001/api/feedback
Method: POST (assuming you are creating new feedback entries)
Headers:
    Accept: application/json
```
Ensure that you provide the necessary data in the request body in JSON format.
```
{
    "game_id": 1,
    "platform": "iOS",
    "version": "1.0.3",
    "category": "bug",
    "content": "The game crashes when I try to start level 3."
}
```
