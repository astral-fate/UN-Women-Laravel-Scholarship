# Assignment
search about laravel queues
	- https://laravel.com/docs/11.x/queues


## Laravel Queues
### Introduction
Laravel Queues provide a powerful way to defer time-consuming tasks, improving application performance and user experience. <br>
They offer a unified API across various queue backends, making it adaptable to different infrastructure needs.
Key features include:
- Improved application speed
- Enhanced user experience
- Support for multiple queue drivers
- Unified API across different backends

### Queue Configuration
Queue settings are managed in the config/queue.php file. This central configuration allows you to:

- Define multiple queue connections
- Set different drivers for each connection
- Configure queue-specific options

Supported drivers include:

- Database
- Redis
- Amazon SQS
- Beanstalkd

The default driver for local development is typically 'sync', which processes jobs synchronously.
Creating Jobs
Jobs are the core of Laravel's queue system. To create a job:

- Use the Artisan command: php artisan make:job JobName
- Implement the ShouldQueue interface
- Define the job logic in the handle() method

### Jobs can have various properties and methods:

- ``` $tries```: Sets maximum number of attempts
- ```$timeout```: Defines maximum execution time
- ```$backoff```: Specifies delay between retry attempts
- ```retryUntil()```: Sets a datetime for retry cutoff
- ```failed()```: Handles job failure scenarios

Dispatching Jobs
- Laravel offers several methods to dispatch jobs:

- dispatch(): Basic method for queuing a job
- dispatchIf() and dispatchUnless(): Conditional dispatching
- dispatch()->onQueue(): Specifies a particular queue
- dispatch()->delay(): Delays job execution
- dispatchAfterResponse(): Queues job after HTTP response is sent
- dispatchSync(): Runs the job immediately without queuing

### Job Chaining and Batching
- Job chaining allows you to specify a sequence of jobs to be run in order.
- Use Bus::chain() to create a chain. You can include both job classes and closures in a chain.
- Job batching groups related jobs together:

- Create batches with Bus::batch()
- Add callbacks: then(), catch(), finally()
- Dynamically add jobs to batches

### Unique Jobs and Middleware
Implement the ShouldBeUnique interface to prevent duplicate jobs from being queued. This is useful for avoiding race conditions.
Job middleware allows you to wrap custom logic around job execution. Use cases include:

### Rate limiting
Preventing job overlaps
Custom logic application

### Queue Workers and Supervisor
Queue workers process the jobs in the queue. Start a worker with php artisan queue:work. Options include:

--queue: Specify which queue to process
--sleep: Set sleep time when no jobs are available
--tries: Define maximum number of attempts

#### For production, use a process monitor like Supervisor to manage workers. Supervisor:

- Keeps queue workers running
- Automatically restarts failed workers
- Allows configuration of process numbers and runtime parameters

- Failed Jobs and Error Handling
- Laravel provides robust handling for failed jobs:

- Failed jobs are stored in a failed_jobs table
- Retry failed jobs with queue:retry
- Delete failed jobs using queue:forget
- Clear all failed jobs with queue:flush

- Define a failed() method in your job class for custom failure handling.
- Testing, Monitoring, and Horizon
#### For testing:

Use Queue::fake() to prevent actual job execution
Assert job dispatching with Queue::assertPushed()
Test job chains with Bus::assertChained()

### Monitor queues in production:

- Use queue:monitor command to watch queue sizes
- Set up notifications for queue thresholds

Laravel Horizon provides a dashboard for Redis queues, offering:

Real-time insights into queue performance
Job status monitoring
Direct job management interface
