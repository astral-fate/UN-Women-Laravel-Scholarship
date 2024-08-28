<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class BackupDatabase extends Command
{
    protected $signature = 'backup:database {--filename= : The name of the backup file}';
    protected $description = 'Backup the database to a file';

    public function handle()
    {
        $databaseName = config('database.connections.mysql.database');
        $username = 'root';  // Using root as per your privileges
        $password = '';      // Assuming no password for root, adjust if necessary
        $host = 'localhost'; // Using localhost as it's in your privileges
        $port = config('database.connections.mysql.port', '3306');

        $filename = $this->option('filename') ?? $databaseName . '_' . now()->format('Y-m-d_H-i-s') . '.sql';
        $backupPath = 'backups/' . $filename;

        // Ensure the backups directory exists
        if (!Storage::exists('backups')) {
            Storage::makeDirectory('backups');
        }

        $fullPath = Storage::path($backupPath);

        $command = sprintf(
            'C:\xampp\mysql\bin\mysqldump --user=%s --host=%s --port=%s %s > %s',
            escapeshellarg($username),
            escapeshellarg($host),
            escapeshellarg($port),
            escapeshellarg($databaseName),
            escapeshellarg($fullPath)
        );

        $this->info("Executing command: " . $command);

        $returnVar = null;
        $output = null;

        exec($command, $output, $returnVar);

        if ($returnVar === 0) {
            $this->info('Database backup created successfully: ' . $backupPath);
        } else {
            $this->error('Database backup failed.');
            $this->error('Return code: ' . $returnVar);
            $this->error('Output: ' . implode("\n", $output));
            $this->error('Command: ' . $command);
        }
    }
}