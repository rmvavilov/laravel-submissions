# Project Setup and API Documentation

## Project Setup

### 1. Cloning the Repository
Clone the repository to your local machine using the following command:

```bash
# Using SSH
git clone git@github.com:rmvavilov/laravel-submissions.git project

# Using HTTPS
git clone https://github.com/rmvavilov/laravel-submissions.git project
```

### 2. Navigate to the Project Directory

Move into the project directory:

```bash 
cd project
```

### 3. Start Docker Containers with Sail

If you are using Laravel Sail, start the Docker containers:

```bash
./vendor/bin/sail up -d
```

### 4. Install Dependencies

Install the necessary dependencies using Composer through Sail:

```bash
./vendor/bin/sail composer install
```

### 5. Environment Setup

Copy the `.env.example` file to create your `.env` file:

```bash
cp .env.example .env
```

Then, open the `.env` file and configure your database and other necessary settings. Sail will automatically configure the `.env` file for Docker services.

### 6. Generate Application Key
Generate the application key:

```bash
./vendor/bin/sail artisan key:generate
```

### 7. Run Migrations

To create the necessary database tables, run the migrations:
    
```bash
./vendor/bin/sail artisan migrate
```

## Testing the API Endpoint

### 1. Start the Development Server

To test the API, you can start the Laravel development server using Sail:

```bash
./vendor/bin/sail artisan serve
```

The server will be available at `http://localhost`.

### 2. API Endpoint

The API endpoint for submitting data is:

`POST /submit`

### 3. Example Request
You can test the API endpoint using tools like [Postman](https://www.postman.com/) or [cURL](https://curl.se/).

**Request Body:**
```bash
{
    "name": "John Doe",
    "email": "john.doe@example.com",
    "message": "This is a test message."
}
```
**Example cURL Command:**
```bash
curl -X POST http://localhost/submit \
-H "Content-Type: application/json" \
-d '{
    "name": "John Doe",
    "email": "john.doe@example.com",
    "message": "This is a test message."
}'
```
If the request is successful, the API will process the data asynchronously and return a confirmation message.

### 4. Running the Queue Worker

If your API dispatches jobs to a queue, you'll need to run a queue worker. Start the queue worker using the following command:

```bash
./vendor/bin/sail artisan queue:work
```

This command will start processing jobs in the queue.

### 5. Checking the Database

To verify that the data has been saved, you can check the `submissions` table in your database. You can access the database through a database management tool connected to the Docker service or using the MySQL CLI within the container.


## Test Environment Setup

### Option 1: Using `.env.testing`

If you prefer to use a separate environment file for testing, you can create one by copying the `.env.example file`:

```bash
cp .env.example .env.testing
```

In `.env.testing`, set up the database connection for testing, typically using SQLite:

```bash
DB_CONNECTION=sqlite
DB_DATABASE=:memory:
```

### Option 2: Using `phpunit.xml`

If you prefer to configure the test environment directly in the `phpunit.xml` file, ensure the following environment variables are set:

```xml
<php>
    <env name="APP_ENV" value="testing"/>
    <env name="CACHE_DRIVER" value="array"/>
    <env name="QUEUE_CONNECTION" value="sync"/>
    <env name="SESSION_DRIVER" value="array"/>
    <env name="DB_CONNECTION" value="sqlite"/>
    <env name="DB_DATABASE" value=":memory:"/>
</php>
```

These settings configure the application to use an in-memory SQLite database during testing.

### Running Tests

To run your tests, use the following command with Sail:

```bash
./vendor/bin/sail test
```

This will execute your test suite using the configurations defined in either `.env.testing` or `phpunit.xml`.
